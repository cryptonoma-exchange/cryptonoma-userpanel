<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{   

	protected $table = 'bitcoinx_languages';

    public static function index()
    {
    	$chat = Language::get();
    	return $chat;
    }
}
