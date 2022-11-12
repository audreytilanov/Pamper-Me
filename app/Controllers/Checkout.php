<?php

namespace App\Controllers;

class Checkout extends BaseController
{
    public function index()
    {
        return view('pages/checkout/checkout');
    }

    public function metodeBayar()
    {
        return view('pages/checkout/metodeBayar');
    }

    public function bayar()
    {
        return view('pages/checkout/bayar');
    }
}

