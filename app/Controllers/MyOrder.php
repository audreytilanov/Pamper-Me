<?php

namespace App\Controllers;

class MyOrder extends BaseController
{
    public function index()
    {
        return view('pages/myOrder/myOrder');
    }

}