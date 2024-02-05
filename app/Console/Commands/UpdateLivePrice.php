<?php

namespace App\Console\Commands;

use App\Models\Commission;
use App\Models\liveprice;
use Illuminate\Console\Command;

class UpdateLivePrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:live_price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $coins = Commission::get();
        $livePrices = $this->getBinanceLivePrice();
        foreach ($coins as $coin) {
            $base = "USDT";
            $symbol = $coin->source;
            $pair = $symbol.$base;
            $livePrice = collect($livePrices)->where("symbol",$pair)->first();
            if($livePrice && isset($livePrice['price']) && !empty($livePrice['price'])){
                liveprice::updateOrCreate(
                    [
                        'base' =>  $base,
                        'currency' => $symbol
                    ],
                    [
                        'price' => $livePrice['price']
                    ]
                );
            }
        }

        $base = "USDT";
        $symbol = "KES";
        $kes = $coins->where("source",$symbol)->first();
        if($kes){
            $live_price = $this->getLivePrice($symbol,"USD");
            if($live_price !== false){
                liveprice::updateOrCreate(
                    [
                        'base' =>  $base,
                        'currency' => $symbol
                    ],
                    [
                        'price' => $live_price
                    ]
                );
                $kes->usd_live_price = $live_price;
                $kes->save();
            }
        }
    }

    private function getLivePrice($base,$symbol){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.exchangerate.host/latest?base=$base&symbols=$symbol",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if($httpcode == 200){
            $response = json_decode($response,true);
            if(isset($response["success"]) && $response["success"] === true){
                if(isset($response["rates"]["USD"]) && !empty($response["rates"]["USD"])){
                    return $response["rates"]["USD"];
                }
            }
        }
        return false;
    }

    private function getBinanceLivePrice(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://www.binance.com/api/v3/ticker/price',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if($httpcode == 200){
            $response = json_decode($response,true);
            return $response;
        }
        return false;
    }
}
