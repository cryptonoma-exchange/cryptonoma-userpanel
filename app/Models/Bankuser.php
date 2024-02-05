<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bankuser extends Model
{
	protected $table = 'bitcoinx_user_bank';

       protected $fillable = [
        'uid', 'currency', 'account_name','account_no','bank_name','bank_branch','bank_address','swift_code','countrydata',
    ];

}
