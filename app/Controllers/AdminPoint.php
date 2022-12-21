<?php

namespace App\Controllers;

use App\Models\AnakModel;
use App\Models\SpinMasterModel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

class AdminPoint extends BaseController
{
    public function index(){
        $model = new SpinMasterModel();
        $data = $model->findAll();
        // var_dump($data[0]["id_orangtua"]);
        $page = "point";
        $res = [
            'data' => $data,
            'page' => $page,
            // 'nama_anak' => '',
        ];
        // dd($res);
        helper(['text']);

        return view('pages/admin/point/index', $res);
    }

    public function tambah(){
        helper(['form']);

        $model = new SpinMasterModel();
        $data = [
            'nilai_point'     => $this->request->getVar('nilai_point'),
        ];
        $model->save($data);
        return redirect()->to('/admin/point/');
    }

    public function edit($id){
        $model = new SpinMasterModel();
        $page = "point";

        $data = $model->where('id_point', $id)->first();
        $res = [
            'data' => $data,
            'page' => $page,
            // 'nama_anak' => '',
        ];
        // dd($res);
        return view('pages/admin/point/edit', $res);
    }

    public function update($id){
        helper(['form']);
        $datas = new SpinMasterModel();
        $datas->update($id, [
            'nilai_point'     => $this->request->getVar('nilai_point'),
        ]);

        return redirect()->to('/admin/point/')->with('success', 'Data Berhasil Diperbaharui');
    }

    public function delete($id){
        helper(['form']);
        $postModel = new SpinMasterModel();
        $post = $postModel->find($id);
        $postModel->delete($id);

        return redirect()->to('/admin/point/')->with('success', 'Data Berhasil Diperbaharui');
    }

}