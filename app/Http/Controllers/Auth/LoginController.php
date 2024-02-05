<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use Auth;
use Session;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/setting';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request, $user)
    {
        if ($user->email_verify == 1) {
            $ip = $request->getClientIp();
            $ip1 = $_SERVER['REMOTE_ADDR'];
            $details = json_decode(crul("http://ipinfo.io/{$ip1}/json"));
            if (isset($details->country)) {
                $location = $details->city . ', ' . $details->region . ', ' . $details->country;
            } else {
                $location = "";
            }
            $data = array();
            $data['user_id'] = \Auth::id();
            $data['login_ip'] = $ip;
            $data['location'] = $location;
            $data['type'] = 'web';
            $data['status'] = 1;
            UserLogin::attemptSave($data);
            return redirect('/dashboards');
        } else {
            $email = $user->email;

            auth()->logout();
            $url = url('reconfirm_account') . '/' . $email;

            $msg =     trans('common.sign.You need to confirm your account'). '<a href="' . $url . '"> click here </a>';
            return back()->with('status', $msg);
        }
    }

    /**
     * [reconfirm_account description]
     * @param  Request $request [description]
     * @return [type]           [return]
     */
    public function reconfirm_account($email)
    {
        $check = User::where('email', $email)->first();
        if ($check) {
            $this->sendEmail($check);
            \Session::flash('status', trans('common.sign.You need to confirm your account'));
        } else {
            \Session::flash('error', trans('common.sign.Invalid email id, please check your email'));
        }
        return redirect('/login');
    }

    public function sendEmail($thisUser)
    {
        try {
            Mail::to($thisUser['email'])->send(new EmailVerification($thisUser));
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function logout(Request $request)
    {
        $user = \Auth::user();
        if ($user) {
            $ip = $request->getClientIp();
            $user->updated_at = date('Y-m-d H:i:s', time());
            $user->save();
            $userapi = UserLogin::where(['user_id' => $user->id, 'login_ip' => $ip])->first();
            if ($userapi) {
                $userapi->status = 0;
                $userapi->save();
            }
        }
        $sitetype=Session::get('pagetype');
        Session::flush();
        Auth::logout();
        Session::put('pagetype', $sitetype);
        return redirect('/login');
    }
}
