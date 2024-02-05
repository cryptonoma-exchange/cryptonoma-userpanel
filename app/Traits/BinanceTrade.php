<?php
namespace App\Traits;

use App\Models\Adminwallet;
use App\Models\Wallet;

trait BinanceTrade{

  public function closeTrade($trade, $orderId, $clientOrderId, $orderStatus, $side, $orderType, $price, $cumulativeFilledQuantity){
    
  }

  /**
   * [adminBalanceUpdate description]
   * @param  [string] $currency [Curreny name]
   * @param  [float] $price    [price value]
   * @return void
   */
  public function adminBalanceUpdate($currency, $price)
  {
      $adminbalance = Adminwallet::where('currency', '=', $currency)->first();
      if ($adminbalance) {
          $total_bal = ncAdd($price, $adminbalance->balance);
          $total_cmn = ncAdd($price, $adminbalance->commission);
          $adminbalance->update(['balance' => $total_bal, 'commission' => $total_cmn]);
      } else {
          Adminwallet::create(['currency' => $currency, 'balance' => $price, 'commission' => $price]);
      }
  }

  /**
   * [creditAmount description]
   * @param  [int] $uid      [user ID]
   * @param  [string] $currency [Currency Name]
   * @param  [float] $price    [price value]
   * @return void
   */
  public function creditAmount($uid, $currency, $price, $remark = null, $insertid)
  {
      $userbalance = Wallet::where([['uid', '=', $uid], ['currency', '=', $currency]])->first();
      if ($userbalance) {
          $oldbalance = $userbalance->balance;
          $total = bcadd(sprintf('%.10f', $price), sprintf('%.10f', $userbalance->balance), 8);
          Wallet::where([['uid', '=', $uid], ['currency', '=', $currency]])->update(['balance' => $total], ['updated_at' => date('Y-m-d H:i:s')]);
          $walletbalance = $total;
      } else {
          $oldbalance = 0;
          Wallet::insert(['uid' => $uid, 'currency' => $currency, 'balance' => $price, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
          $walletbalance = $price;
      }

      $this->AllcoinUpdateBalanceTrack($uid, $currency, $price, 0, $walletbalance, $oldbalance, 'trade', $remark, $insertid);
  }

  /**
   * [debitAmount description]
   * @param  [int] $uid      [user ID]
   * @param  [string] $currency [Currency Name]
   * @param  [float] $price    [price value]
   * @return void
   */
  public function debitAmount($uid, $currency, $price)
  {
      $userbalance = Wallet::where([['uid', '=', $uid], ['currency', '=', $currency]])->lockForUpdate()->first();
      $total = ncSub($userbalance->escrow_balance,$price);
      if($total < 0){
          throw new \Exception("Error Processing Request", 1);
      }
      $userbalance->update(['escrow_balance' => $total, 'updated_at' => date('Y-m-d H:i:s')]);
  }

  public function AllcoinUpdateBalanceTrack($uid, $currency, $creditamount = 0, $debitamount = 0, $walletbalance = 0, $oldbalance = null, $tradetype = null, $remark = null, $insertid)
  {
      if ($creditamount > 0 || $debitamount > 0) {
          $Models = '\App\Models\OverallTransaction';
          $Models::AddTransaction($uid, $currency, $tradetype, $creditamount, $debitamount, $walletbalance, $oldbalance, $remark, $insertid);
      }
      return true;
  }
}
