<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Bank extends Model
{
  protected $table = 'bitcoinx_mpesa';
  protected $fillable = ['shortcode', 'passkey','id'];
}
