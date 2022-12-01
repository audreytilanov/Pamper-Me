<?php

namespace App\Controllers;

use App\Models\ReservasiModel;

class MyOrder extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new ReservasiModel();
        $data = $model->where('id_orangtua', $session->get('user_id_orangtua'))->where('status', 'payment')->findAll();

        $res = [
            'data' => $data,
        ];

        return view('pages/myOrder/myOrder', $res);
    }

    public function detailOrder()
    {
        return view('pages/myOrder/detailOrder');
    }

    public function riwayatPemesanan()
    {
        return view('pages/myOrder/riwayatPemesanan');
    }

}