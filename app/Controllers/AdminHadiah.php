<?php

namespace App\Controllers;

use App\Models\AnakModel;
use App\Models\HadiahModel;
use App\Models\SpinMasterModel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

class ADminHadiah extends BaseController
{
    public function index(){
        $model = new HadiahModel();
        $data = $model->findAll();
        // var_dump($data[0]["id_orangtua"]);
        $page = "hadiah";
        $res = [
            'data' => $data,
            'page' => $page,
            // 'nama_anak' => '',
        ];
        // dd($res);
        helper(['text']);

        return view('pages/admin/hadiah/index', $res);
    }

    public function tambah(){
        helper(['form']);

        $model = new HadiahModel();
        $data = [
            'nama_hadiah'     => $this->request->getVar('nama_hadiah'),
            'stok'     => $this->request->getVar('stok'),
            'catatan'     => $this->request->getVar('catatan'),
            'point_hadiah'     => $this->request->getVar('point_hadiah'),
        ];
        $model->save($data);
        return redirect()->to('/admin/hadiah/');
    }

    public function edit($id){
        $model = new HadiahModel();
        $page = "hadiah";

        $data = $model->where('id_hadiah', $id)->first();
        $res = [
            'data' => $data,
            'page' => $page,
            // 'nama_anak' => '',
        ];
        // dd($res);
        return view('pages/admin/hadiah/edit', $res);
    }

    public function update($id){
        helper(['form']);
        $datas = new HadiahModel();
        $datas->update($id, [
            'nama_hadiah'     => $this->request->getVar('nama_hadiah'),
            'stok'     => $this->request->getVar('stok'),
            'catatan'     => $this->request->getVar('catatan'),
            'point_hadiah'     => $this->request->getVar('point_hadiah'),
        ]);

        return redirect()->to('/admin/hadiah/')->with('success', 'Data Berhasil Diperbaharui');
    }

    public function delete($id){
        helper(['form']);
        $postModel = new HadiahModel();
        $post = $postModel->find($id);
        $postModel->delete($id);

        return redirect()->to('/admin/hadiah/')->with('success', 'Data Berhasil Diperbaharui');
    }

}