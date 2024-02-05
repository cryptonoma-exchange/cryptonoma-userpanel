<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    protected $table = 'bitcoinx_kyc'; 
    
    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
