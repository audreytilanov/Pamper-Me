<?php

namespace App\Controllers;

class MyOrder extends BaseController
{
    public function index()
    {
        return view('pages/myOrder/myOrder');
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