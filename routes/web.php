<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('setmode/{mode}', function ($mode) {
    Session::put('mode', $mode);
    return redirect()->back();
});

Route::get('setlocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
});

Auth::routes();

Route::get('/delete_account', 'Auth\DeleteAccountController@index')->name("delete_account");
Route::post('/delete_account', 'Auth\DeleteAccountController@delete');
Route::get('/confirm_account_delete/{user}', 'Auth\DeleteAccountController@confirm_account_delete')->name("confirm_account_delete");

Route::get('/estimate', 'WalletController@estimate');
Route::get('/', 'WelcomeController@welcome');
Route::get('/faq', 'WelcomeController@faq')->name('faq');
Route::get('/terms', 'WelcomeController@terms')->name('terms');
Route::get('/privacy', 'WelcomeController@privacy')->name('privacy');
Route::get('/exchange', 'WelcomeController@livetrade')->name('exchange');
Route::get('/exchange/{pair}', 'WelcomeController@livetrade');

Route::get('/reconfirm_account/{email}', 'Auth\LoginController@reconfirm_account')->name('reconfirm_account');

Route::get('/verifyEmail', 'Auth\RegisterController@verifyEmail')->name('verifyEmail');
Route::get('/verify/{email}', 'EmailVerifyController@sendEmailDone')->name('sendEmailDone');
Route::get('/res/{referral_code}', 'Auth\RegisterController@res')->name('res');
Route::get('/password/resetform', 'Auth\ForgotPasswordController@resetform')->name('password.resetform');
Route::get('/registered', 'HomeController@registered')->name('registered');

Route::get('/registersuccess', 'registerSuccess@index')->name('registersuccess');
Route::post('/subscribe', 'WelcomeController@subscribe')->name('subscribe.email');
Route::get('/market', 'WelcomeController@market')->name('market');

Route::group(['middleware' => ['auth', 'user_deleted']], function () {
    Route::get('/security-verification', 'TwofaController@viewOtppage')->name('twofaotp');
    Route::post('/security-verification', 'TwofaController@validateTfa')->name('validate_twofaotp');
    Route::get('/resendcode', 'TwofaController@resendcode')->name('resendcode');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});

// Route::get("/test/{coin}/{network?}",function(\Illuminate\Http\Request $request){
//     $liquidity = \App\Models\Liquidity::first();
//     $apikey = $liquidity->apikey;
//     $secret = $liquidity->secretkey;
//     $api =  new \Binance\API("J91WOgZ17z5H9xz0aavQ5rkb70psn23KDYQBuQ9K6PCGxoFtJSU7qnkUGkE9NfFE","8861pWNjNroHO9FWcmsETOk9MzOAAZ0gkz8ptSJmS9Pzv1l3Ap77V6jvoOu3IX8L");
//     // $api =  new \Binance\API("bdWxiKeCe7EcsrRXTEZkgFuPxBOKaulDbk9GCPYqIdQh1Nj9oGFrAuNK1SsnMTNR", "qYw13NcC22NUwms5A7Cfw3AvMIC8YyihmhRb4zROnFM92rvu0uAFqVi0W9V5UDcF");
// 	$coin = $request->coin;
// 	$networks = collect($api->coins())->where("coin",$coin)->pluck("networkList")->first();
//     if($request->network){
//         $first = collect($networks)->where("network",$request->network)->first();
//         dd($first);
//     } else {
//         dd($networks);
//     }
// });

Route::get("/binance_testnet_pairs",function(\Illuminate\Http\Request $request){
    dd(binance()->exchangeInfo());
});

Route::group(['middleware' => ['auth', 'twofa', 'user_deleted']], function () {

    Route::get('/wallet', 'WalletController@index')->name('wallet');

    Route::group(['middleware' => ['kyc']], function () {
        Route::get('/deposit/{coin}', 'WalletController@deposit')->name('walletdeposits');
    });
    Route::get('/withdraw/{coin}', 'WalletController@withdraw')->name('walletwithdraw');
    Route::post('/withdraw/{coin}', 'WalletController@withdrawRequest')->name('withdrawrequest');
    Route::get('/withdrawhistories', 'HistoryController@withdrawhistories')->name('withdrawhistories');
    Route::get('/deposithistories', 'HistoryController@deposithistories')->name('deposithistories');
    Route::get('/orderhistory', 'HistoryController@orderhistory')->name('orderhistory');
    Route::get('/openorders', 'HistoryController@openorders')->name('openorders');

    Route::get('trade', 'TradeController@index')->name('trade');
    Route::get('trades/{pair?}', 'TradeController@index');
    Route::post('/trade/buylimit', 'TradeLimitController@buylimit')->name('buylimit');
    Route::post('/trade/selllimit', 'TradeLimitController@selllimit')->name('selllimit');
    Route::post('/trade/buymarket', 'TradeMarketController@buymarket')->name('buymarket');
    Route::post('/trade/sellmarket', 'TradeMarketController@sellmarket')->name('sellmarket');

    Route::post('/trade/fillmarketbuyvolume', 'TradeMarketController@fillmarketbuyvolume')->name('fillmarketbuyvolume');
    Route::post('/trade/fillmarketsellvolume', 'TradeMarketController@fillmarketsellvolume')->name('fillmarketsellvolume');
    Route::post('/trade/fillbuyvolume', 'TradeLimitController@fillbuyvolume')->name('fillbuyvolume');
    Route::post('/trade/fillsellvolume', 'TradeLimitController@fillsellvolume')->name('fillsellvolume');
    Route::get('/cancelOrder/{trade_type}/{id}', 'TradeLimitController@cancelOrder')->name("cancel_order");

    //chart
    Route::get('/config', 'TradingViewChartServerController@config');
    Route::get('/time', 'TradingViewChartServerController@time');
    Route::get('/symbolsymbols_info', 'TradingViewChartServerController@symbol_info');
    Route::get('/history', 'TradingViewChartServerController@history');
    Route::get('/marks', 'TradingViewChartServerController@marks');
    Route::get('/timescale_marks', 'TradingViewChartServerController@timescale_marks');
    Route::get('/tradechart', 'TradeChartController@getTradeChartDetails');

    Route::post('/uploadProof', 'fiatcontroller@Deposit')->name('Deposit');
    Route::post('delete_deposit_request', 'fiatcontroller@fiatCancelDeposit');
    Route::post('delete_withdraw_request', 'fiatcontroller@cancelWithdraw');
    // Route::get('/resendcode', 'TwofaController@resendcode')->name('resendcode');
    Route::post('/send_verification_code', 'TwofaController@send_verification_code')->name('send_verification_code');

    Route::post('/initializeTfa', 'TwofaController@initializeTfa')->name('initializeTfa');
    Route::post('/enableTfa', 'TwofaController@enableTfa')->name('enableTfa');
    Route::get('diabletwofa', 'TwofaController@diableTwoFactor')->name('diableTwoFactor');
    // Change-Password
    Route::get('/changepassword', 'UserPanelController@ChangepwdView')->name('changepwd');
    Route::post('/updatePassword', 'UserPanelController@updatePassword');

    Route::get('/setting', 'HomeController@setting')->name('setting');
    Route::get('/support', 'HomeController@support')->name('support');
    Route::post('/messages', 'HomeController@messages')->name('support.messages');

    // Profile Update
    Route::get('/profile', 'UserPanelController@Personaldetailsview')->name('profile');
    Route::post('deleteprofileimg', 'UserPanelController@deleteprofileimg')->name('deleteprofileimg');
    Route::post('/userprofile', 'UserPanelController@persinoaldetais_update')->name('userprofile');
    Route::post('/updateprofileimg', 'UserPanelController@updateprofileimg')->name('updateprofileimg');

    Route::get('/accountactivity', 'HomeController@accountactivity')->name('accountactivity');
    Route::get('/kyc', 'KycController@index')->name('kyc');
    Route::post('/uploadkyc', 'KycController@uploadkyc')->name('uploadkyc');

    // Bank
    Route::post('addupdateBank', 'HomeController@addupdateBank')->name('addupdatebankdetails');
    Route::post('deleteBank', 'HomeController@deleteBank')->name('deleteBank');
    Route::get('bankDetail/{id}', 'HomeController@bankDetails')->name('bankDetails');
    Route::get('/bank', 'HomeController@bank')->name('bank');

    Route::post('submitNewTicket', 'HomeController@submitNewTicket')->name('submitNewTicket');
    Route::get('viewTicket/{id}', 'HomeController@viewTicket')->name('viewTicket');
    Route::post('sendMessage', 'HomeController@sendMessage')->name('sendMessage');
    Route::get('/dashboards', 'SecurityController@dashboard')->name('dashboards');

    Route::post('/tinypesavalidation', 'MpesaController@tinyvalidation')->name('tinypesavalidation'); //ok
});

//mobile chart (mobile team API)
Route::get('/mobilechart/{pair_string}', 'HomeController@mobilechart')->name('mobilechart');
Route::get('/mobiledepthchart/{pair_string}', 'HomeController@mobiledepthchart')->name('mobiledepthchart');
Route::get('marketdepthchart/{pair}', 'TradeChartController@marketdepthchart');