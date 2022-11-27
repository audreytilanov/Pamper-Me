<?php

namespace App\Controllers;

use Midtrans\Snap;
use Midtrans\Config;

class Payment extends BaseController
{
    public function index()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-gOaU9kOMYmLgAH5ngsvmdPpx';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            )
        );
        
        $snapToken = Snap::getSnapToken($params);

        $data = [
            'snap' => $snapToken
        ];

        return view('payment/pay', $data);
    }

}