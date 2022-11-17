<?php

namespace App\Controllers;

class MyOrder extends BaseController
{
    public function index()
    {
        return view('pages/myOrder/myOrder');
    }

    public function detailLunas()
    {
        return view('pages/myOrder/detailLunas');
    }

    public function riwayatPemesanan()
    {
        return view('pages/myOrder/riwayatPemesanan');
    }

}