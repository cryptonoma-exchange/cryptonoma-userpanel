<?php
function ncAdd($value1, $value2, $digit = 8)
{
    $value = bcadd(sprintf("%.10f", $value1), sprintf("%.10f", $value2), $digit);
    return $value;
}

function ncSub($value1, $value2, $digit = 8)
{
    $value = bcsub(sprintf("%.10f", $value1), sprintf("%.10f", $value2), $digit);
    return $value;
}

function ncMul($value1, $value2, $digit = 8)
{
    $value = bcmul(sprintf("%.10f", $value1), sprintf("%.10f", $value2), $digit);
    return $value;
}

function ncDiv($value1, $value2, $digit = 8)
{
    $value = bcdiv(sprintf("%.10f", $value1), sprintf("%.10f", $value2), $digit);
    return $value;
}

function display_format($number, $digit = 8, $format = NULL)
{
    if ($format == "") {
        $twocoin = sprintf('%.' . $digit . 'f', $number);
    } elseif ($format == 0) {
        $twocoin = number_format($number, $digit);
    } else {
        $twocoin = number_format($number, $digit, ",", ".");
    }
    return $twocoin;
}

function imgvalidaion($img)
{
    $myfile = fopen($img, "r") or die("Unable to open file!");
    $value = fread($myfile, filesize($img));
    if (strpos($value, "<?php") !== false) {
        $img = 0;
    } elseif (strpos($value, "<?=") !== false) {
        $img = 0;
    } elseif (strpos($value, "eval") !== false) {
        $img = 0;
    } elseif (strpos($value, "<script") !== false) {
        $img = 0;
    } else {
        $img = 1;
    }
    fclose($myfile);
    return $img;
}
function TransactionString($length = 64) {
    $str = substr(hash('sha256', mt_rand() . microtime()), 0, $length);
    return $str;
}
function seoUrl($string)
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

function crul($url)
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
function humanTiming($time)
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

function keygenerate()
{
    $key = md5(microtime() . rand());
    return $key;
}

function pvtgenerate()
{
    $activation = md5(uniqid(rand(), true));
    return $activation;
}

function getMessageFromBinanceError($msg)
{
    try {
        $params = explode(":", $msg, 2);
        $message = $msg;
        if (count($params) == 2) {
            $json = trim($params[1]);
            $decoded = json_decode($json, true);
            if (isset($decoded["msg"])) {
                $message = $decoded["msg"];
            }
        }
        return $message;
    } catch (\Throwable $th) {
        return $msg;
    }
}

function uniqueIdGenerator()
{
    $cleanNumber = preg_replace('/[^0-9]/', '', microtime(false));
    $id = base_convert($cleanNumber, 10, 36);
    return $id;
}

function binanceMessage($response)
{
    $data = [
        "status" => true,
        "msg" => ""
    ];
    if ($response == NULL) {
        $data["status"] = false;
        $data["msg"] = "Price is too high, too low, and/or not following the tick size rule for the symbol.";
        return (object) $data;
    }
    if (isset($response["msg"])) {
        $data["status"] = false;
        $msg = $response["msg"];
        if ("Filter failure: PRICE_FILTER" == $msg) {
            $data["status"] = false;
            $data["msg"] = "Price is too high, too low, and/or not following the tick size rule for the symbol.";
        } else if ("Filter failure: PERCENT_PRICE" == $msg) {
            $data["status"] = false;
            $data["msg"] = "Price is X% too high or X% too low from the average weighted price over the last Y minutes.";
        } else if ("Filter failure: PERCENT_PRICE_BY_SIDE" == $msg) {
            $data["status"] = false;
            $data["msg"] = "price is X% too high or Y% too low from the lastPrice on that side.";
        } else if ("Filter failure: LOT_SIZE" == $msg) {
            $data["status"] = false;
            $data["msg"] = "Quantity is too high, too low, and/or not following the step size rule for the symbol.";
        } else if ("Filter failure: MIN_NOTIONAL" == $msg) {
            $data["status"] = false;
            $data["msg"] = "Price * quantity is too low to be a valid order for the symbol.";
        } else if ("Filter failure: MAX_NUM_ORDERS" == $msg) {
            $data["status"] = false;
            $data["msg"] = "Account has too many open orders on the symbol.";
        } else if ("Filter failure: MAX_ALGO_ORDERS" == $msg) {
            $data["status"] = false;
            $data["msg"] = "Account has too many open stop loss and/or take profit orders on the symbol";
        } else if ("Filter failure: MAX_NUM_ICEBERG_ORDERS" == $msg) {
            $data["status"] = false;
            $data["msg"] = "Account has too many open iceberg orders on the symbol.";
        } else if ("Filter failure: EXCHANGE_MAX_NUM_ORDERS" == $msg) {
            $data["status"] = false;
            $data["msg"] = "Account has too many open orders on the exchange.";
        } else if ("Filter failure: EXCHANGE_MAX_ALGO_ORDERS" == $msg) {
            $data["status"] = false;
            $data["msg"] = "Account has too many open stop loss and/or take profit orders on the exchange.";
        } else {
            $data["status"] = false;
            $data["msg"] = $msg;
        }
    }
    return (object) $data;
}

function apiResponse($success, $message, $data = [])
{
    return [
        "success" => $success,
        "data" => $data,
        "message" => $message
    ];
}

function rawQueryPagination($collection, $count, $perPage, $page)
{
    // $page = \Illuminate\Pagination\Paginator::resolveCurrentPage();
    return new \Illuminate\Pagination\LengthAwarePaginator($collection, $count, $perPage, $page, [
        'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(),
    ]);
}

function binance(){
    $liquidity = \App\Models\Liquidity::first();
    return new \Binance\API($liquidity->apikey,$liquidity->secretkey, $liquidity->testnet == 1 ? true : false);
}