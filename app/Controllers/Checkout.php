<?php

namespace App\Controllers;

class Checkout extends BaseController
{
    public function index()
    {
        return view('pages/checkout/checkout');
    }

    public function bayar()
    {
        return view('pages/checkout/bayar');
    }

    public function metode()
    {
        return view('pages/checkout/metode');
    }
}

