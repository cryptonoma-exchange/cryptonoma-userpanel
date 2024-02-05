<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\CMS;

class kycMiddleware
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
        if($user->email_verify ==1)
        {

            $kyc_enable = CMS::value('kyc_enable');
            if($kyc_enable == 1)
            {
                if($user->kyc_verify == 1 ){
                        return $next($request);
                }else{

                    // return redirect('/profile');
                    return redirect('/kyc');
                }
                
            }
            else
            {
               return $next($request); 
            }

        }
        else
        {
            Auth()->logout();
            return redirect('/login'); 
        }
    }
}
