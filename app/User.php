<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpVerification;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    protected $table = "bitcoinx_users";

    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','google2fa_secret','referral_id','affiliate_id','account_type','profile_otp'
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailOtp(){
        $rand = rand(100000, 999999);
        $this->profile_otp = $rand;
        $this->save();
        try {
            Mail::to($this->email)->send(new SendOtpVerification($this));
        } catch (\Throwable $th) {}
    }

    public function tfaEnabled(){
        if(!empty($this->twofa) && $this->twofa_status == 1){
            return true;
        }
        return false;
    }
}
