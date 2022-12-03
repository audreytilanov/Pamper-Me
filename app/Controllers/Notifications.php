<?php

namespace App\Controllers;

use DateTime;
use App\Models\ReservasiModel;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;

class Notifications extends BaseController
{
    public function index($id){
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-3wPaoPW6wHCsFdiUicIvhpVf';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to truex
        \Midtrans\Config::$is3ds = true;

        $status = \Midtrans\Transaction::status($id);
        // $transaction = json_decode($status, "true");
        // dd($status->transaction_status == "settlement");

        $data = new ReservasiModel();
        if($status->transaction_status == "settlement"){
            $dataUser = $data->where('order_id', $id)->first();
            $data->update($dataUser['id_reservasi'], [
                'status_pembayaran'    => $status->transaction_status,
            ]);
        }
        return redirect()->to('/user/my-order');
    }
}