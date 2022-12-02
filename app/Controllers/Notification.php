<?php

namespace App\Controllers;

use DateTime;
use App\Models\ReservasiModel;
use Midtrans\Snap;
use Midtrans\Config;

class Notification extends BaseController
{
   public function index(){
    // require_once(dirname(__FILE__) . '/Midtrans.php');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$serverKey = 'SB-Mid-server-3wPaoPW6wHCsFdiUicIvhpVf';
    $notif = new \Midtrans\Notification();
     
    $transaction = $notif->transaction_status;
    $type = $notif->payment_type;
    $order_id = $notif->order_id;
    $fraud = $notif->fraud_status;

    $data = new ReservasiModel();
    if($transaction == "settlement"){
        $data->update($order_id, [
            'status_pembayaran'    => $transaction,
        ]);
    }
        
   }
}