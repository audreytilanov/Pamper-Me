<?php

namespace App\Controllers;

use DateTime;
use App\Models\ReservasiModel;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;

class Notifications extends BaseController
{
   public function index(){
    // require_once(dirname(__FILE__) . '/Midtrans.php');
    Config::$isProduction = false;
    Config::$serverKey = 'SB-Mid-server-3wPaoPW6wHCsFdiUicIvhpVf';
    $notif = new Notification();
     
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