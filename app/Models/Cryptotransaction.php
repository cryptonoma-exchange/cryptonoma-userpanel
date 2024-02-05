<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cryptotransaction extends Model
{
    protected $table = 'bitcoinx_cryptotransactions';

    public static function listView($uid, $coin,$type)
    {
        $list = Cryptotransaction::where(['uid' => $uid, 'currency' => $coin,'txtype' => $type])->orderBy('id', 'desc')->paginate(10);
        return $list;
    }

    public static function createTransaction($fuid, $tuid, $coin, $txid, $from, $to, $amount, $confirm = 0, $time, $status = 0, $nirvaki_nilai = 0, $TxType = '', $adminfee = 0,$TotalAmount=0,$remark="",$memo="",$network)
    { 
        $tran = new Cryptotransaction();  
        if($TxType == 'deposit'){
            $tran->uid = $tuid;
            $tran->fuid = $fuid;
            $tran->tuid = $tuid;
        }else{
            $tran->uid = $fuid;
            $tran->fuid = $fuid;
            $tran->tuid = $tuid;
            $tran->adminfee = $adminfee;
        } 
        $tran->currency = $coin;
        $tran->txtype = $TxType;
        $tran->txid = $txid;
        $tran->from_addr = $from;
        $tran->to_addr = $to;
        $tran->amount = $amount;
        $tran->memo = $memo;
        $tran->totalamount = $TotalAmount;
        $tran->status = $status;
        if($network){
            $tran->network = $network;
        }
        $tran->nirvaki_nilai = $nirvaki_nilai;
        $tran->created_at = $time;
        $tran->confirmation = $confirm;
        $tran->remark = $remark;
        $tran->save();
        return $tran;
    } 
}
