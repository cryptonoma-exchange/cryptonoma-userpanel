<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class twofaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user->email_verify == 1) {
            if ($user->status == 0) {
                if (empty($user->twofa) || \Session::get('otpstatus') == 1) {
                    return $next($request);
                } else if ($user->tfaEnabled()) {
                    if (\Session::get('otpstatus') == 1) {
                        return $next($request);
                    } else {
                        if ($user->twofa == 'google_otp') {
                            return redirect()->route('twofaotp');
                        } else if ($user->twofa == 'email_otp') {
                            $user->sendEmailOtp();
                            return redirect()->route('twofaotp')->withSuccess('Mail sent successfully. Check your email inbox/spam folder for verification code.');
                        } else {
                            return redirect('/market');
                        }
                    }
                } else {
                    return redirect('/market');
                }
            } else {
                Auth()->logout();

                if ($user->reason != "") {
                    return redirect('/login')->with('error', 'Your account has been blocked for the reason '  . $user->reason . '.Kindly contact admin for account unblock');
                } else {
                    return redirect('/login')->with('error', 'Your account has been blocked. Kindly contact admin for account unblock ');
                }
            }
        } else {
            Auth()->logout();
            return redirect('/register');
        }
    }
}
