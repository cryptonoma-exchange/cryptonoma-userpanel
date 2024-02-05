<?php

use Illuminate\Database\Seeder;

class CommissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commissions')->insert(
        [
            'source'            => "BTC",
            'withdraw'          => 1,
            'buy_trade'         => 1,
            'sell_trade'        => 1,
            'type'              => 'coin',
            'coinname'          => 'Bitcoin',
            'netfee'            => '0.0001',
            'min_deposit'       => '0.0001',
            'min_withdraw'      => '0.0001',
            'min_trade_price'   => '0.0001',
            'point_value'       => '8',
            'url'               => 'https://www.blockchain.com/btc/address/',
            'image'             => 'btc.svg',
            'status'            => 1,
            'shown'             => 1,
            'orderlist'         => 1,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),     
        ]);

        DB::table('commissions')->insert(
        [
            'source'            => "ETH",
            'withdraw'          => 1,
            'buy_trade'         => 1,
            'sell_trade'        => 1,
            'type'              => 'coin',
            'coinname'          => 'Ethereum',
            'netfee'            => '0.0001',
            'min_deposit'       => '0.0001',
            'min_withdraw'      => '0.0001',
            'min_trade_price'   => '0.0001',
            'point_value'       => '8',
            'url'               => 'https://www.blockchain.com/btc/address/',
            'image'             => 'eth.svg',
            'status'            => 1,
            'shown'             => 1,
            'orderlist'         => 1,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),     
        ]);
        
        DB::table('commissions')->insert(
        [
            'source'            => "BCH",
            'withdraw'          => 1,
            'buy_trade'         => 1,
            'sell_trade'        => 1,
            'type'              => 'coin',
            'coinname'          => 'Bitcoin Cash',
            'netfee'            => '0.0001',
            'min_deposit'       => '0.0001',
            'min_withdraw'      => '0.0001',
            'min_trade_price'   => '0.0001',
            'point_value'       => '8',
            'url'               => 'https://www.blockchain.com/btc/address/',
            'image'             => 'bch.svg',
            'status'            => 1,
            'shown'             => 1,
            'orderlist'         => 1,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),     
        ]);
        
        DB::table('commissions')->insert(
        [
            'source'            => "EUR",
            'withdraw'          => 1,
            'buy_trade'         => 1,
            'sell_trade'        => 1,
            'type'              => 'fiat',
            'coinname'          => 'EURO',
            'netfee'            => '0.0001',
            'min_deposit'       => '0.0001',
            'min_withdraw'      => '0.0001',
            'min_trade_price'   => '0.0001',
            'point_value'       => '8',
            'url'               => 'https://www.blockchain.com/btc/address/',
            'image'             => 'eur.svg',
            'status'            => 1,
            'shown'             => 1,
            'orderlist'         => 1,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),     
        ]);
        
        DB::table('commissions')->insert(
        [
            'source'            => "USD",
            'withdraw'          => 1,
            'buy_trade'         => 1,
            'sell_trade'        => 1,
            'type'              => 'fiat',
            'coinname'          => 'US Dollar',
            'netfee'            => '0.0001',
            'min_deposit'       => '0.0001',
            'min_withdraw'      => '0.0001',
            'min_trade_price'   => '0.0001',
            'point_value'       => '8',
            'url'               => 'https://www.blockchain.com/btc/address/',
            'image'             => 'usd.svg',
            'status'            => 1,
            'shown'             => 1,
            'orderlist'         => 1,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),     
        ]);
        
        DB::table('commissions')->insert(
        [
            'source'            => "EURS",
            'withdraw'          => 1,
            'buy_trade'         => 1,
            'sell_trade'        => 1,
            'type'              => 'token',
            'coinname'          => 'EURS Token',
            'netfee'            => '0.0001',
            'min_deposit'       => '0.0001',
            'min_withdraw'      => '0.0001',
            'min_trade_price'   => '0.0001',
            'point_value'       => '8',
            'url'               => 'https://www.blockchain.com/btc/address/',
            'image'             => 'eurs.svg',
            'status'            => 1,
            'abiarray'          => '0x6d11799817dC29128cC1fC195184c37c1BEA33C5',
            'shown'             => 1,
            'orderlist'         => 1,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),     
        ]);
        
        DB::table('commissions')->insert(
        [
            'source'            => "USDS",
            'withdraw'          => 1,
            'buy_trade'         => 1,
            'sell_trade'        => 1,
            'type'              => 'token',
            'coinname'          => 'USDS Token',
            'netfee'            => '0.0001',
            'min_deposit'       => '0.0001',
            'min_withdraw'      => '0.0001',
            'min_trade_price'   => '0.0001',
            'point_value'       => '8',
            'url'               => 'https://www.blockchain.com/btc/address/',
            'image'             => 'usds.svg',
            'status'            => 1,
            'abiarray'          => '0x8f208a61bD9552D00B985Aa3ad89188f540CA38c',
            'shown'             => 1,
            'orderlist'         => 1,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),     
        ]);
        
        DB::table('commissions')->insert(
        [
            'source'            => "HKDS",
            'withdraw'          => 1,
            'buy_trade'         => 1,
            'sell_trade'        => 1,
            'type'              => 'token',
            'coinname'          => 'HKDS Token',
            'netfee'            => '0.0001',
            'min_deposit'       => '0.0001',
            'min_withdraw'      => '0.0001',
            'min_trade_price'   => '0.0001',
            'point_value'       => '8',
            'url'               => 'https://www.blockchain.com/btc/address/',
            'image'             => 'hkds.svg',
            'status'            => 1,
            'abiarray'          => '0x0CfEc3B9516E22b63daC89926b84Ba2AE31895bA',
            'shown'             => 1,
            'orderlist'         => 1,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),     
        ]);
        
        DB::table('commissions')->insert(
        [
            'source'            => "GBPS",
            'withdraw'          => 1,
            'buy_trade'         => 1,
            'sell_trade'        => 1,
            'type'              => 'token',
            'coinname'          => 'GBPS Token',
            'netfee'            => '0.0001',
            'min_deposit'       => '0.0001',
            'min_withdraw'      => '0.0001',
            'min_trade_price'   => '0.0001',
            'point_value'       => '8',
            'url'               => 'https://www.blockchain.com/btc/address/',
            'image'             => 'gbps.svg',
            'status'            => 1,
            'abiarray'          => '0x87dc0e4680B84199727Dfb7Db667aF80e040BaE0',
            'shown'             => 1,
            'orderlist'         => 1,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),     
        ]);
    }
}