<?php

namespace App\Controllers;

class Vouchers extends BaseController
{
    public function index()
    {
        return view('pages/vouchers/index');
    }

    public function detail()
    {
        return view('pages/vouchers/detail');
    }

}