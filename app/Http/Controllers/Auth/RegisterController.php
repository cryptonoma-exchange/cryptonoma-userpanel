<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Traits\GoogleAuthenticator;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, GoogleAuthenticator;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required|alpha_spaces|max:50',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email|unique:bitcoinx_users,email',
            'password' => 'required|min:8|max:100|required_with:confirmation_password|same:confirmation_password|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirmation_password' => 'required|min:8|max:100|same:password',
            'g-recaptcha-response' => 'required',
            'check' => 'required'
        ];
        $message['name.required'] = 'Full name is required';
        $message['name.regex'] = 'Invalid Full Name';
        $message['email.required'] = 'Email is required';
        $message['email.email'] = 'Invalid Email';
        $message['email.unique'] = 'Email is already used';
        $message['password.required'] = 'Password is required';
        $message['password.min'] = 'Password Must be minimum 8 characters';
        $message['password.max'] = 'Password Must be maximum 100 characters';
        $message['password.regex'] = 'Minimum 8 characters, one capital letter , one special character and one number';
        $message['confirmation_password.required'] = 'Re-type  Password is required';
        $message['confirmation_password.same'] = 'Re-type  Password should match the Password';
        $message['check.required'] = 'Please Agree Terms & Conditions';
        $message['g-recaptcha-response.required'] = 'ReCaptcha is required';
        return Validator::make($data, $rules, $message);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $data = $request->all();
        $secret = config("app.GOOGLE_RECAPTCHA_SECRET");
        $response = $data['g-recaptcha-response'];
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $response;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
        $dataresponse = json_decode($result);
        if (isset($dataresponse->success) && $dataresponse->success == 'true') {
            $secret1 = $this->createSecret();
            $user = User::create([
                'name'              => $data['name'],
                'email'             => $data['email'],
                'password'          => bcrypt($data['password']),
                'account_type'      => 'Personal Account',
                'google2fa_secret'  => $secret1,
            ]);
            $thisUser = User::findOrFail($user->id);

            $thisUser->account_number = 'C00' . (31010000 + $user->id);
            $thisUser->affiliate_id = 'C00' . (31010000 + $user->id);

            $thisUser->save();
            try {
                Mail::to($thisUser['email'])->send(new EmailVerification($thisUser));
            } catch (\Throwable $th) {
                dd($th);
            }
            
            $email = $thisUser->email;
            $url = url('reconfirm_account') . '/' . $email;
            session()->flash('status', "Your account has been registered successfully and currently waiting for email verification. Please check your mail inbox/spam folder, if you haven't received mail, <a href='$url'> click here </a>");
            return redirect()->route('login');
        } else {
            session()->flash('error', "Captcha verification failed. Try again!");
            return redirect()->back();
        }
    }

    public function getAffiliateID($referral_id)
    {
        $get_user = User::where('affiliate_id', $referral_id)->first();
        if (is_object($get_user)) {
            return $get_user->id;
        } else {
            return false;
        }
    }

    public function generateaff()
    {
        $get_user = User::get();

        foreach ($get_user as $get) {
            if (empty($get->account_type)) {
                $affiliate_id = 'Personal Account';



                $profile = new User;

                $profile->where('id', '=', $get->id)->update(['account_type' => $affiliate_id]);
            }
        }
    }

    public function sendEmail($thisUser)
    {
        try {
            print_r($thisUser);
            exit;
            \Mail::to($thisUser['email'])->send(new EmailVerification($thisUser));
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function res($referral_code)
    {
        $result = User::where('referral_id', $referral_code)->first();
        //dd($result);
        if ($result != "") {
            return view('/auth.register', [
                'referral_code' => $result['referral_id'],
                'name' => $result['name'],
            ]);
        } else {
            \Session::flash('error', trans('common.sign.Invalid referral code!'));
            return redirect('/register');
        }
    }
}
