<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AdminTransactions;

class Adminwallet extends Model
{
    protected $table = 'bitcoinx_adminwallet';
    protected $guarded = [];
    
    public static function credit($uid,$refid,$refentry,$refentrysubtype,$currency,$volumein,$remark=""){
        $adminbalance = Adminwallet::where('currency', '=', $currency)->lockForUpdate()->first();
        if ($adminbalance) {
            $old_balance = $adminbalance->balance;
            $total_bal = ncAdd($volumein, $adminbalance->balance);
            $total_cmn = ncAdd($volumein, $adminbalance->commission);
            $balance = $total_bal;
            $adminbalance->update(['balance' => $total_bal, 'commission' => $total_cmn]);
        } else {
            $old_balance = 0;
            $balance = $volumein;
            Adminwallet::create(['currency' => $currency, 'balance' => $volumein, 'commission' => $volumein]);
        }
        $trans = new AdminTransactions();
        $trans->uid = $uid;
        $trans->refid = $refid;
        $trans->refentry = $refentry;
        $trans->refentrysubtype = $refentrysubtype;
        $trans->currency = $currency;
        $trans->volumein = $volumein;
        $trans->volumeout = 0;
        $trans->balance = $balance;
        $trans->old_balance = $old_balance;
        $trans->remark = $remark;
        $trans->created_at = date('Y-m-d H:i:s', time());
        $trans->updated_at = date('Y-m-d H:i:s', time());
        $trans->save();
    }
}
