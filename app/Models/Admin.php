<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
  protected $table = "bitcoinx_admin";
  protected $fillable = ['name', 'email', 'senha'];

  public static function getNotifyEmails()
  {
    $admin = Admin::first();
    return json_decode($admin->notify_email_ids, true);
  }
}
