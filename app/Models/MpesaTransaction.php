<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MpesaTransaction extends Model
{
       protected $table = 'mpesa_transactionnns';

    protected $fillable = [
        
        'id','FirstName',   'MiddleName',  'LastName',    'TransactionType', 'TransID', 'TransTime',   'BusinessShortCode',   'BillRefNumber',   'InvoiceNumber',   'ThirdPartyTransID',   'MSISDN',  'TransAmount', 'OrgAccountBalance',   'deleted_at',  'created_at',  'updated_at','OriginatorCoversationID',
    ];
}