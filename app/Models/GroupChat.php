<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupChat extends Model
{
    
	protected $table = 'bitcoinx_group_chats';

    public static function index()
    {
    	$chat = GroupChat::get();
    	return $chat;
    }
}
