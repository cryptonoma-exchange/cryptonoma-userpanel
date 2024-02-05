<?php

use Illuminate\Database\Seeder;

class TradepairsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tradepairs')->insert(
      [
          'coinone'           => 'BTC',
          'cointwo'           => 'USD',
          'min_buy_price'     => 1000,
          'min_buy_amount'    => 0.0001,
          'min_sell_price'    => 1000,
          'min_sell_amount'   => 0.0001,
          'active'            => 1,
          'orderlist'         => 1,
          'type'              => 0,
          'created_at'        => date("Y-m-d H:i:s"),
          'updated_at'        => date("Y-m-d H:i:s"),     
      ]);  

      DB::table('tradepairs')->insert(
      [
          'coinone'           => 'BTC',
          'cointwo'           => 'EUR',
          'min_buy_price'     => 1000,
          'min_buy_amount'    => 0.0001,
          'min_sell_price'    => 1000,
          'min_sell_amount'   => 0.0001,
          'active'            => 1,
          'orderlist'         => 1,
          'type'              => 0,
          'created_at'        => date("Y-m-d H:i:s"),
          'updated_at'        => date("Y-m-d H:i:s"),     
      ]);  
      DB::table('tradepairs')->insert(
      [
          'coinone'           => 'ETH',
          'cointwo'           => 'USD',
          'min_buy_price'     => 1000,
          'min_buy_amount'    => 0.0001,
          'min_sell_price'    => 1000,
          'min_sell_amount'   => 0.0001,
          'active'            => 1,
          'orderlist'         => 1,
          'type'              => 0,
          'created_at'        => date("Y-m-d H:i:s"),
          'updated_at'        => date("Y-m-d H:i:s"),     
      ]);  

      DB::table('tradepairs')->insert(
      [
          'coinone'           => 'ETH',
          'cointwo'           => 'EUR',
          'min_buy_price'     => 1000,
          'min_buy_amount'    => 0.0001,
          'min_sell_price'    => 1000,
          'min_sell_amount'   => 0.0001,
          'active'            => 1,
          'orderlist'         => 1,
          'type'              => 0,
          'created_at'        => date("Y-m-d H:i:s"),
          'updated_at'        => date("Y-m-d H:i:s"),     
      ]);   

      DB::table('tradepairs')->insert(
      [
          'coinone'           => 'BCH',
          'cointwo'           => 'USD',
          'min_buy_price'     => 1000,
          'min_buy_amount'    => 0.0001,
          'min_sell_price'    => 1000,
          'min_sell_amount'   => 0.0001,
          'active'            => 1,
          'orderlist'         => 1,
          'type'              => 0,
          'created_at'        => date("Y-m-d H:i:s"),
          'updated_at'        => date("Y-m-d H:i:s"),     
      ]);  

      DB::table('tradepairs')->insert(
      [
          'coinone'           => 'BCH',
          'cointwo'           => 'EUR',
          'min_buy_price'     => 1000,
          'min_buy_amount'    => 0.0001,
          'min_sell_price'    => 1000,
          'min_sell_amount'   => 0.0001,
          'active'            => 1,
          'orderlist'         => 1,
          'type'              => 0,
          'created_at'        => date("Y-m-d H:i:s"),
          'updated_at'        => date("Y-m-d H:i:s"),     
      ]);     

      DB::table('tradepairs')->insert(
      [
          'coinone'           => 'EURS',
          'cointwo'           => 'USD',
          'min_buy_price'     => 1000,
          'min_buy_amount'    => 0.0001,
          'min_sell_price'    => 1000,
          'min_sell_amount'   => 0.0001,
          'active'            => 1,
          'orderlist'         => 1,
          'type'              => 0,
          'created_at'        => date("Y-m-d H:i:s"),
          'updated_at'        => date("Y-m-d H:i:s"),     
      ]);  

      DB::table('tradepairs')->insert(
      [
          'coinone'           => 'EURS',
          'cointwo'           => 'EUR',
          'min_buy_price'     => 1000,
          'min_buy_amount'    => 0.0001,
          'min_sell_price'    => 1000,
          'min_sell_amount'   => 0.0001,
          'active'            => 1,
          'orderlist'         => 1,
          'type'              => 0,
          'created_at'        => date("Y-m-d H:i:s"),
          'updated_at'        => date("Y-m-d H:i:s"),     
      ]);     

      DB::table('tradepairs')->insert(
      [
          'coinone'           => 'USDS',
          'cointwo'           => 'USD',
          'min_buy_price'     => 1000,
          'min_buy_amount'    => 0.0001,
          'min_sell_price'    => 1000,
          'min_sell_amount'   => 0.0001,
          'active'            => 1,
          'orderlist'         => 1,
          'type'              => 0,
          'created_at'        => date("Y-m-d H:i:s"),
          'updated_at'        => date("Y-m-d H:i:s"),     
      ]);  

      DB::table('tradepairs')->insert(
      [
          'coinone'           => 'USDS',
          'cointwo'           => 'EUR',
          'min_buy_price'     => 1000,
          'min_buy_amount'    => 0.0001,
          'min_sell_price'    => 1000,
          'min_sell_amount'   => 0.0001,
          'active'            => 1,
          'orderlist'         => 1,
          'type'              => 0,
          'created_at'        => date("Y-m-d H:i:s"),
          'updated_at'        => date("Y-m-d H:i:s"),     
      ]);     

      DB::table('tradepairs')->insert(
      [
          'coinone'           => 'HKDS',
          'cointwo'           => 'USD',
          'min_buy_price'     => 1000,
          'min_buy_amount'    => 0.0001,
          'min_sell_price'    => 1000,
          'min_sell_amount'   => 0.0001,
          'active'            => 1,
          'orderlist'         => 1,
          'type'              => 0,
          'created_at'        => date("Y-m-d H:i:s"),
          'updated_at'        => date("Y-m-d H:i:s"),     
      ]);  

      DB::table('tradepairs')->insert(
      [
          'coinone'           => 'HKDS',
          'cointwo'           => 'EUR',
          'min_buy_price'     => 1000,
          'min_buy_amount'    => 0.0001,
          'min_sell_price'    => 1000,
          'min_sell_amount'   => 0.0001,
          'active'            => 1,
          'orderlist'         => 1,
          'type'              => 0,
          'created_at'        => date("Y-m-d H:i:s"),
          'updated_at'        => date("Y-m-d H:i:s"),     
      ]); 

      DB::table('tradepairs')->insert(
      [
          'coinone'           => 'GBPS',
          'cointwo'           => 'USD',
          'min_buy_price'     => 1000,
          'min_buy_amount'    => 0.0001,
          'min_sell_price'    => 1000,
          'min_sell_amount'   => 0.0001,
          'active'            => 1,
          'orderlist'         => 1,
          'type'              => 0,
          'created_at'        => date("Y-m-d H:i:s"),
          'updated_at'        => date("Y-m-d H:i:s"),     
      ]);  

      DB::table('tradepairs')->insert(
      [
          'coinone'           => 'GBPS',
          'cointwo'           => 'EUR',
          'min_buy_price'     => 1000,
          'min_buy_amount'    => 0.0001,
          'min_sell_price'    => 1000,
          'min_sell_amount'   => 0.0001,
          'active'            => 1,
          'orderlist'         => 1,
          'type'              => 0,
          'created_at'        => date("Y-m-d H:i:s"),
          'updated_at'        => date("Y-m-d H:i:s"),     
      ]);     

    }
}
