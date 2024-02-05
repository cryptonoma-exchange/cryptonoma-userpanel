<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tradepair;
use App\Models\Selltrade;
use App\Models\Wallet;
use App\Models\Adminwallet;
use App\Libraries\BinanceClass;
use Illuminate\Support\Facades\DB;


class SellTradeStatus extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:selltrade';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update liquidity Sell trade histroy status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $liq_pairs = Tradepair::where('type', 1)->get();
        foreach ($liq_pairs as $pair) {
            $buytrades = Selltrade::where([['status', '=', 0], ['pair', '=', $pair->id]])->get();
            foreach ($buytrades as $trade) {
                $trade = Selltrade::lockForUpdate()->find($trade->id);
                $api = new BinanceClass;
                $orderid = $trade->order_id;
                $liqu = $pair->coinone_binance . $pair->cointwo_binance;
                $report = $api->order_status($liqu, $orderid);

                if(isset($report["code"])){
                    continue;
                }

                $orderId = $report['orderId'];
                $clientOrderId = $report['clientOrderId'];
                $orderStatus = $report['status'];
                $side = $report['side'];
                $orderType = $report['type'];
                $price = $report['price'];
                $cumulativeFilledQuantity = $report['executedQty'];

                DB::connection('mysql')->beginTransaction();
                DB::connection('mysql2')->beginTransaction();
                try {
                    if($orderType == "LIMIT"){
                        if($trade){
                            $pair = Tradepair::find($trade->pair);
                            if($pair){
                                if($orderStatus == "CANCELED"){
                                    $trade->status = 100;
                                    $trade->status_text = $orderStatus;
                                    $trade->save();
                                } elseif($orderStatus == "FILLED"){
                                    if($side == "BUY"){
                                        Adminwallet::credit($trade->uid,$trade->id,"EXCHANGE","buy",$pair->cointwo,$trade->fees);
                                        //update trade complete
                                        $trade->status = 1;
                                        $trade->remaining = 0;
                                        $trade->status_text = $orderStatus;
                                        $trade->save();
                                        //Remaining Balance return Limit Buyer Fully complete request
                                        $remain_price = ncAdd($trade->value,$trade->fees);
    
                                        $this->debitAmount($trade->uid, $pair->cointwo, $remain_price);
                                        $remark = "Buy trade complete binance pair $pair->coinone /$pair->cointwo";
                                        $this->creditAmount($trade->uid, $pair->coinone, $trade->volume, $remark, 'web liquidity', $trade->id);
                                    } elseif($side == "SELL"){
                                        Adminwallet::credit($trade->uid,$trade->id,"EXCHANGE","sell",$pair->coinone,$trade->fees);
                                        //update trade complete
                                        $trade->status = 1;
                                        $trade->remaining = 0;
                                        $trade->status_text = $orderStatus;
                                        $trade->save();
    
                                        $remain_price = ncAdd($trade->volume,$trade->fees);
                                        $this->debitAmount($trade->uid, $pair->coinone, $remain_price); 
                                        $remark ="Sell trade complete binance pair $pair->coinone / $pair->cointwo";
                                        $creditamt = $trade->value;
                                        $this->creditAmount($trade->uid, $pair->cointwo, $creditamt,$remark,'web liquidity',$trade->id);
                                    }
                                } elseif($orderStatus == "PARTIALLY_FILLED"){
                                    $trade->remaining = $trade->volume - $cumulativeFilledQuantity;
                                    $trade->save();
                                }
                            }
                        }
                    }
                  DB::connection('mysql')->commit();
                  DB::connection('mysql2')->commit();
                } catch (\Throwable $th) {
                  DB::connection('mysql')->rollback();
                  DB::connection('mysql2')->rollback();
                }
            }
        }
        $this->info('Buy trade updated to All Users');
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
