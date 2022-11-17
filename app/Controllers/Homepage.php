<?php

namespace App\Controllers;

use App\Models\CabangModel;
use App\Models\KategoriLayananModel;

class Homepage extends BaseController
{
    public function index()
    {
        
        $model = new KategoriLayananModel();
        $cabang = new CabangModel();
        $data = $model->findAll();
        $cabangData = $cabang->findAll();
        // var_dump($data[0]["id_orangtua"]);
        $res = [
            'data' => $data,
            'cabangData' => $cabangData,
            // 'nama_anak' => '',
        ];
        
        return view('pages/index', $res);
    }

}