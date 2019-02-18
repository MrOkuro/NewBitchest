<?php

use Illuminate\Database\Seeder;

class CryptosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::Table('cryptos')->insert(array([
            'nom' => 'Bitcoin',
            'image' => 'bitcoin.png',
            'sigle' => 'BTC',
        ],
            [
                'nom' => 'Ethereum',
                'image' => 'ethereum.png',
                'sigle' => 'ETH',
            ],
            [
                'nom' => 'Ripple',
                'image' => 'ripple.png',
                'sigle' => 'XRP',
            ],
            [
                'nom' => 'Bitcoin Cash',
                'image' => 'bitcoin-cash.png',
                'sigle' => 'BT',
            ],
            [
                'nom' => 'Cardano',
                'image' => 'cardano.png',
                'sigle' => 'ADA',
            ],
            [
                'nom' => 'Litecoin',
                'image' => 'litecoin.png',
                'sigle' => 'LTC',
            ],
            [
                'nom' => 'NEM',
                'image' => 'nem.png',
                'sigle' => 'NEM',
            ],
            [
                'nom' => 'Stellar',
                'image' => 'stellar.png',
                'sigle' => 'XLM',
            ],
            [
                'nom' => 'IOTA',
                'image' => 'iota.png',
                'sigle' => 'IOT',
            ],
            [
                'nom' => 'DASH',
                'image' => 'dash.png',
                'sigle' => 'DAS',
            ]));
    }
}
