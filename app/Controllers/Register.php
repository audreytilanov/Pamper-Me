<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        return view('register/register');
    }

    public function verifikasi()
    {
        return view('register/verifikasi');
    }
}