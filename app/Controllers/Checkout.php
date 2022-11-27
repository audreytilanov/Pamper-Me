<?php

namespace App\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\ReservasiModel;
use App\Models\ReservasiDetailModel;

class Checkout extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new ReservasiModel();
        $modelDetail = new ReservasiDetailModel();
        $data = $model->where('id_orangtua', $session->get('user_id_orangtua'))->where('status', 'not paid')->first();
        // var_dump($data[0]["id_orangtua"]);
        if(!empty($data)){
            $detail = $modelDetail->join('tb_reservasi', 'tb_reservasi.id_reservasi = tb_reservasi_detail.id_reservasi')
            ->join('tb_jadwal_produk', 'tb_jadwal_produk.id_jadwal_produk = tb_reservasi_detail.id_jadwal_produk')
            ->join('tb_produk', 'tb_produk.id_produk = tb_reservasi_detail.id_produk')
            ->join('tb_cabang', 'tb_cabang.id_cabang = tb_produk.id_cabang')
            ->join('tb_anak', 'tb_anak.id_anak = tb_reservasi_detail.id_anak')
            ->join('tb_kategori_layanan', 'tb_kategori_layanan.id_kategori_layanan = tb_produk.id_kategori_layanan')
            ->where('tb_reservasi.id_orangtua', $session->get('user_id_orangtua'))->findAll();
            $res = [
                'data' => $detail,
                'list' => $detail
            ];
            return view('pages/checkout/checkout', $res);
        }
        // return view('pages/checkout/checkout', $res);
    }

    public function metodeBayar()
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
         
         $snapToken = \Midtrans\Snap::getSnapToken($params);
 
         $data = [
             'snap' => $snapToken
         ];
 
         return view('pages/payment/pay', $data);
    }

    public function bayar()
    {
        return view('pages/checkout/bayar');
    }

    public function detail()
    {
        return view('pages/checkout/detail');
    }
}

