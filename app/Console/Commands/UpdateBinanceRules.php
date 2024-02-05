<?php

namespace App\Console\Commands;

use App\Models\Tradepair;
use Illuminate\Console\Command;

class UpdateBinanceRules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:binance_rules';

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
        $info = binance()->exchangeInfo();
        if(isset($info["symbols"])){
            $pairs = Tradepair::where("type",1)->get();
            foreach ($pairs as $pair) {
                $pairString = $pair->coinone_binance.$pair->cointwo_binance;
                if(isset($info["symbols"][$pairString])){
                    $information = $info["symbols"][$pairString];
                    $filters = collect($information["filters"]);
                    $LOT_SIZE = $filters->where("filterType","LOT_SIZE")->first();
                    if($LOT_SIZE){
                        $pair->step_size = $LOT_SIZE["stepSize"];
                    }
                    $MIN_NOTIONAL = $filters->where("filterType","MIN_NOTIONAL")->first();
                    if($MIN_NOTIONAL){
                        $pair->min_order_size = $MIN_NOTIONAL["minNotional"];
                    }
                    $pair->save();
                }
            }
        }
    }
}
