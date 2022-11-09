<?php

namespace App\Controllers;

class DataAnak extends BaseController
{
    public function index()
    {
        return view('pages/dataAnak');
    }
    
    public function tambah()
    {
        return view('pages/createDataAnak');
    }

    public function edit()
    {
        return view('pages/editDataAnak');
    }

}