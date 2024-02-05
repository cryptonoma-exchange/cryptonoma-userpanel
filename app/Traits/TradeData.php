<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use codenixsv\Bittrex\BittrexManager;
use App\Models\Completedtrade;
use App\Models\Buytrade;
use App\Models\Selltrade;
use App\Models\Tradepair;
use App\Models\Kyc;
use App\Libraries\BinanceClass;
use App\Models\Commission;
use Illuminate\Support\Facades\Crypt;

trait TradeData
{

  public function open_orders($pair_id, $uid)
  {
    $pair = Tradepair::find($pair_id);
    $coins = Commission::get();

    $buy_trades = Buytrade::select([
      "id",
      "uid",
      "created_at",
      "order_type",
      "pair",
      DB::raw("'buy' as type"),
      "price",
      "original_price",
      "volume",
      "remaining",
      "value",
      "fees",
      "status",
    ])
      ->where([
        ['uid', '=', $uid],
        ['status', '=', '0']
      ]);

    $sell_trades = Selltrade::select([
      "id",
      "uid",
      "created_at",
      "order_type",
      "pair",
      DB::raw("'sell' as type"),
      "price",
      "original_price",
      "volume",
      "remaining",
      "value",
      "fees",
      "status",
    ])->where([
      ['uid', '=', $uid],
      ['status', '=', '0']
    ]);

    if (empty($search["side"])) {
      $merged = $buy_trades->unionAll($sell_trades);
    } else {
      $merged = $search["side"] == "buy" ? $buy_trades : $sell_trades;
    };

    $collection = $merged
      ->orderBy("created_at", "desc")
      ->limit(50)->get()->map(function ($order) use ($pair, $coins) {
        $order->cancel_link = route('cancel_order',['trade_type' => $order->type,'id' => Crypt::encrypt($order->id) ]);
        $order->pair_string = $pair->coinone . '/' . $pair->cointwo;
        $order->coinone = $pair->coinone;
        $order->cointwo = $pair->cointwo;
        $coin_one = $coins->where("source", $pair->coinone)->first();
        $coin_two = $coins->where("source", $pair->cointwo)->first();
        $status = "";
        $order->original_price = $order->order_type == 1 ? display_format($order->original_price, $coin_two->decimal)." ".$coin_two->source : "Market price";
        $order->volume = display_format($order->volume, $coin_one->decimal) . " " . $coin_one->source;
        $order->remaining = display_format($order->remaining, $coin_one->decimal) . " " . $coin_one->source;
        if($order->type == "buy"){
          $order->value = ncAdd($order->value,$order->fees);
        }
        $order->value = display_format($order->value,$coin_two->decimal)." ".$coin_two->source;
        if ($order->type == "buy") {
          $fee_coin = $coin_two;
        } else {
          $fee_coin = $coin_one;
        }
        $order->fees = display_format($order->fees, $fee_coin->decimal) . " " . $fee_coin->source;
        if ($order->status == 0) {
          $status = "pending";
        } elseif ($order->status == 1) {
          $status = "completed";
        } elseif ($order->status == 2) {
          $status = "rejected";
        } elseif ($order->status == 3) {
          $status = "cancelled";
        }
        $order->status_string = $status;
        $order->order_type_string = $order->order_type == 1 ? "Limit" : "Market";
        return $order;
      });
    return $collection;
  }

  public function order_history($pair_id, $uid){
    $pair = Tradepair::find($pair_id);
    $coins = Commission::get();

    $buy_trades = Buytrade::select([
      "id",
      "uid",
      "created_at",
      "order_type",
      "pair",
      DB::raw("'buy' as type"),
      "price",
      "original_price",
      "volume",
      "remaining",
      "value",
      "fees",
      "status",
    ])
      ->where([
        ['pair', '=', $pair_id],
        ['uid', '=', $uid],
        ['status', '!=', '0']
      ]);

    $sell_trades = Selltrade::select([
      "id",
      "uid",
      "created_at",
      "order_type",
      "pair",
      DB::raw("'sell' as type"),
      "price",
      "original_price",
      "volume",
      "remaining",
      "value",
      "fees",
      "status",
    ])->where([
      ['pair', '=', $pair_id],
      ['uid', '=', $uid],
      ['status', '!=', '0']
    ]);

    if (empty($search["side"])) {
      $merged = $buy_trades->unionAll($sell_trades);
    } else {
      $merged = $search["side"] == "buy" ? $buy_trades : $sell_trades;
    };

    $collection = $merged
      ->orderBy("created_at", "desc")
      ->limit(50)->get()->map(function ($order) use ($pair, $coins) {
        $order->pair_string = $pair->coinone . '/' . $pair->cointwo;
        $order->coinone = $pair->coinone;
        $order->cointwo = $pair->cointwo;
        $coin_one = $coins->where("source", $pair->coinone)->first();
        $coin_two = $coins->where("source", $pair->cointwo)->first();
        $status = "";
        $order->original_price = $order->order_type == 1 ? display_format($order->original_price,$coin_two->decimal)." ".$coin_two->source : "Market price";
        $order->volume = display_format($order->volume,$coin_one->decimal)." ".$coin_one->source;
        $order->remaining = display_format($order->remaining,$coin_one->decimal)." ".$coin_one->source;
        if($order->type == "buy"){
          $order->value = ncAdd($order->value,$order->fees);
        }
        $order->value = display_format($order->value,$coin_two->decimal)." ".$coin_two->source;
        if ($order->type == "buy") {
          $fee_coin = $coin_two;
        } else {
          $fee_coin = $coin_one;
        }
        $order->fees = display_format($order->fees, $fee_coin->decimal) . " " . $fee_coin->source;
        if ($order->status == 0) {
          $status = "pending";
        } elseif ($order->status == 1) {
          $status = "completed";
        } elseif ($order->status == 2) {
          $status = "rejected";
        } elseif ($order->status == 3) {
          $status = "cancelled";
        }
        $order->status_string = $status;
        $order->order_type_string = $order->order_type == 1 ? "Limit" : "Market";
        return $order;
      });
    return $collection;
  }

  public function tradeBuy($pairid, $limit = 10, $currentprice = 0)
  {

    $buytrades = Buytrade::select('price', DB::raw('SUM(remaining) as remaining'), DB::raw('group_concat(created_at) as created_at'))
      ->where([['pair', '=', $pairid], ['status', '=', 0]])
      ->where(function ($tradeprice) use ($currentprice, $pairid) {
        $tradeprice->where([['stoplimit', '!=', null], ['pair', '=', $pairid], ['stoplimit', '<=', $currentprice]])->orwhere([['stoplimit', '=', null]]);
      })->groupBy('price')
      ->orderBy('price', 'desc')
      ->limit($limit)->get();
    return $buytrades;
  }

  public function tradeSell($pairid, $limit = 10, $currentprice = 0)
  {
    $selltrades = Selltrade::select('price', DB::raw('SUM(remaining) as remaining'), DB::raw('group_concat(created_at) as created_at'))
      ->where(['pair' => $pairid, 'status' => 0])
      ->where(function ($tradeprice) use ($currentprice, $pairid) {
        $tradeprice->where([['stoplimit', '!=', null], ['pair', '=', $pairid], ['stoplimit', '>=', $currentprice]])->orwhere([['stoplimit', '=', null]]);
      })->orderBy('price', 'asc')
      ->groupBy('price')
      ->limit($limit)->get();
    return $selltrades;
  }

  public function tradeComplete($pairid, $limit = 50)
  {
    $completedtrade = Completedtrade::where(['pair' => $pairid])->orderBy('id', 'desc')->limit($limit)->get();
    return $completedtrade;
  }
  //Bitterex Liquidity
  public function bittrexlogin()
  {
    //$manager = new BittrexManager('', '');   
    $manager = new BittrexManager('4710149643154296b61c6bbb51164381', 'c1c8cceb1e514de4aebc981d1b71c01e');

    $client = $manager->createClient();
    return $client;
  }

  public function liquidityGetOrder($order_id)
  {
    $client = $this->bittrexlogin();
    $responce = json_decode($client->getOrder($order_id));
    return $responce;
  }

  public function liquidityOrderBook($pairid)
  {
    $client = $this->bittrexlogin();
    $buytrades = array();
    $pair = $this->marketpair($pairid);
    if ($pair) {
      $details = json_decode($client->getOrderBook($pair));
      if ($details->success == 'true') {
        $buytrades = $details->result;
      } else {
        $buytrades = $details->message;
      }
    } else {
      return 'Invalid pair id';
    }
    return $buytrades;
  }

  public function display_format($number, $digit = 8, $format = NULL)
  {
    $data = array(
      'number' => $number,
      'digit' => $digit,
      'format' => $format
    );
    if ($format == "") {
      $twocoin = sprintf('%.' . $digit . 'f', $number);
      // echo "aaaa";print_r($twocoin1);exit;

    } elseif ($format == 0) {
      $twocoin = number_format($number, $digit);
    } else {
      $twocoin = number_format($number, $digit, ",", ".");
    }
    return $twocoin;
  }

  public function LiquidityMarketHistory($pairid)
  {
    $client = $this->bittrexlogin();
    $buytrades = array();
    $pair = $this->marketpair($pairid);
    if ($pair) {
      $details = json_decode($client->getMarketHistory($pair));
      if ($details->success == 'true') {
        $completedtrade = $details->result;
      } else {
        $completedtrade = $details->message;
      }
    } else {
      return 'Invalid pair id';
    }
    return $completedtrade;
  }

  public function liquidityBuyLimitTrade($pairid, $price, $volume)
  {
    $client = $this->bittrexlogin();
    $buytrades = array();
    $pair = $this->marketpair($pairid);
    if ($pair) {
      $details = json_decode($client->buyLimit($pair, $volume, $price));
    } else {
      return 'Invalid pair id';
    }
    return $details;
  }

  public function liquiditySellLimitTrade($pairid, $price, $volume)
  {
    $client = $this->bittrexlogin();
    $buytrades = array();
    $pair = $this->marketpair($pairid);
    if ($pair) {
      $details = json_decode($client->sellLimit($pair, $volume, $price));
    } else {
      return 'Invalid pair id';
    }
    return $details;
  }

  public function marketpair($pairid)
  {
    $pair = Tradepair::where(['id' => $pairid, 'type' => 1 || 2])->first();
    if ($pair) {
      $coinone = $pair->coinone_binance;
      $cointwo = $pair->cointwo_binance;
      $market = $cointwo . '-' . $coinone;
      return $market;
    } else {
      return false;
    }
  }
  public function getChartData($pairid, $tickInterval = 'hour')
  {
    $client = $this->bittrexlogin();
    $buytrades = array();
    $pair = $this->marketpair($pairid);
    if ($pair) {
      $url = "https://bittrex.com/Api/v2.0/pub/market/GetTicks?marketName=$pair&tickInterval=$tickInterval&_=1500915289433";
      $details = json_decode($this->crulBittrex($url));
      if ($details) {
        $chat = $details->result;
      } else {
        $chat = "";
      }
    } else {
      return 'Invalid pair id';
    }
    return $details->result;
  }

  public function cancelOrder($pairid, $uuid)
  {
    $pair = $this->marketpair($pairid);
    $client = $this->bittrexlogin();
    if ($pair) {
      $details = json_decode($client->cancel($uuid));
    } else {
      return 'Invalid pair id';
    }
    return $details;
  }
  public function crulBittrex($url)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $headers = array();
    $headers[] = "Accept: application/json, text/plain";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    if (curl_errno($ch)) {
      echo $result = 'Error:' . curl_error($ch);
    } else {
      $result = curl_exec($ch);
    }
    curl_close($ch);
    return $result;
  }

  public function getMarketSummary($pairid)
  {
    $api = new BinanceClass;
    $buytrades = array();
    $pair = $this->marketpair($pairid);
    if ($pair) {
      try {
        $result =  $api->hr_ticker_price($pair);
        if (isset($result['lastPrice'])) {
          $data['Last']     = display_format($result['lastPrice']);
        } else {
          $data['Last']     = 0;
        }
        if (isset($result['lowPrice'])) {
          $data['Low']     = display_format($result['lowPrice']);
        } else {
          $data['Low']     = 0;
        }
        if (isset($result['highPrice'])) {
          $data['High']     = display_format($result['highPrice']);
        } else {
          $data['High']     = 0;
        }
        if (isset($result['volume'])) {
          $data['Volume']     = display_format($result['volume']);
        } else {
          $data['Volume']     = 0;
        }
        if (isset($result['priceChangePercent'])) {
          $data['Exchange']     = display_format($result['priceChangePercent']);
        } else {
          $data['Exchange']     = 0;
        }
        $data['completedTradeType'] = '';
      } catch (\Throwable $e) {
        return false;
      }
    } else {
      $data = $this->TradePrice($pairid);
    }
    return $data;
  }

  public function hrExchange($current, $yesterday)
  {
    if ($yesterday > 0) {
      $exchangerate = $this->ncSub($current, $yesterday, 8);
      $exchange1 =  $this->ncDiv($exchangerate, $yesterday, 8);
      $exchange = $this->ncMul($exchange1, 100, 2);
    } else {
      $exchange = $this->display_format(0, 2);
    }
    return $exchange;
  }

  public function TradePrice($pairid)
  {
    $yesterday = date('Y-m-d H:i:s', strtotime("-1 days"));
    $PrevDay = 0;
    $last = Completedtrade::where('pair', $pairid)->orderBy('id', 'desc')->value('price');

    $min = Completedtrade::where('pair', $pairid)->where('created_at', '>=', $yesterday)->min('price');
    $max = Completedtrade::where('pair', $pairid)->where('created_at', '>=', $yesterday)->max('price');
    $volume = Completedtrade::where('pair', $pairid)->where('created_at', '>=', $yesterday)->sum('volume');
    $PrevDay =  Completedtrade::where('pair', $pairid)->where('created_at', '<=', $yesterday)->orderBy('id', 'desc')->value('price');
    if (!$last) {
      $last = 0;
    }
    if (!$min) {
      $min = 0;
    }
    if (!$max) {
      $max = 0;
    }
    if (!$volume) {
      $volume = 0;
    }
    $exchange = $this->hrExchange($last, $PrevDay);

    $data['Last']     = $last;
    $data['Low']      = $min;
    $data['High']     = $max;
    $data['Volume']   = $volume;
    $data['Exchange'] = $exchange;
    return $data;
  }


  public function Kycstatus($uid)
  {

    $kyc = Kyc::where('uid', $uid)->latest()->first();
    return $kyc;
  }

  public function ncAdd($value1, $value2, $digit = 8)
  {
    $value = bcadd(sprintf('%.10f', $value1), sprintf('%.10f', $value2), $digit);
    return $value;
  }

  public function ncSub($value1, $value2, $digit = 8)
  {
    $value = bcsub(sprintf('%.10f', $value1), sprintf('%.10f', $value2), $digit);
    return $value;
  }
  public function ncMul($value1, $value2, $digit = 8)
  {
    $value = bcmul(sprintf('%.10f', $value1), sprintf('%.10f', $value2), $digit);
    return $value;
  }

  public function ncDiv($value1, $value2, $digit = 8)
  {
    $value = bcdiv(sprintf('%.10f', $value1), sprintf('%.10f', $value2), $digit);
    return $value;
  }

  public function TransactionString($length = 60)
  {
    $str = substr(hash('sha256', mt_rand() . microtime()), 0, $length);
    return $str;
  }
  public function seoUrl($string)
  {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
  }

  public function crul($url)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $headers = array();
    $headers[] = "Accept: application/json, text/plain";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    if (curl_errno($ch)) {
      echo $result = 'Error:' . curl_error($ch);
    } else {
      $result = curl_exec($ch);
    }
    curl_close($ch);
    return $result;
  }
  public function humanTiming($time)
  {
    $time = time() - $time; // to get the time since that moment
    $time = ($time < 1) ? 1 : $time;
    $tokens = array(
      31536000 => 'year',
      2592000 => 'month',
      604800 => 'week',
      86400 => 'day',
      3600 => 'hour',
      60 => 'min',
      1 => 'sec'
    );

    foreach ($tokens as $unit => $text) {
      if ($time < $unit) continue;
      $numberOfUnits = floor($time / $unit);
      return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
    }
  }

  public function keygenerate()
  {
    $key = md5(microtime() . rand());
    return $key;
  }

  public function pvtgenerate()
  {
    $activation = md5(uniqid(rand(), true));
    return $activation;
  }
}
