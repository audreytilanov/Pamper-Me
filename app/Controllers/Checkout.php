<?php

namespace App\Controllers;

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
            ->join('tb_anak', 'tb_anak.id_anak = tb_reservasi_detail.id_anak')
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
        return view('pages/checkout/metodeBayar');
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

