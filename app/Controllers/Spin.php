<?php

namespace App\Controllers;

use App\Models\AnakModel;
use App\Models\HadiahModel;
use App\Models\PoinDetailModel;
use App\Models\ReservasiDetailModel;
use App\Models\SpinMasterModel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

class Spin extends BaseController
{
    public function index($id)
    {

        $session = session();
        $model = new AnakModel();
        $modelHadiah = new HadiahModel();
        $modelReservasi = new ReservasiDetailModel();
        $data = $model->where('link_barcode', $id)->first();
        $dataHadiah = $modelHadiah->orderBy('point_hadiah', 'DESC')->findAll();
        $reservasi = $modelReservasi->where('id_anak', $data['id_anak'])->where('status_spin_point', 0)->findAll();

        // dd($reservasi);

        $modelSpin = new SpinMasterModel();

        $dataSpin = $modelSpin->findAll(); 
        $arr = array_column($dataSpin, 'nilai_point');
        // dd($arr);
        $res = [
            'data' => $data,
            'hadiah' => $dataHadiah,
            'res' => $reservasi,
            'spin' => $arr,
        ];
        // dd($res);

        return view('pages/spinDiskon', $res);
    }

    public function indexData(){
        if($this->request->isAJAX()){
            $data = $this->request->getVar('anak');
            $modelReservasi = new ReservasiDetailModel();
        
            $reservasi = $modelReservasi->where('id_anak', $data['id_anak'])->where('status_spin_point', 0)->findAll();
        }else{
            exit('Data Tidak Dapat Diproses');
        }
        
    }

    public function postData(){
        if($this->request->isAJAX()){
            $model = new ReservasiDetailModel();
            // $res = $this->request->getVar('res');
            $anak = $this->request->getVar('anak');
            $poin = $this->request->getVar('poin');
            $status = 0;
            $dataUpdate = $model->where('id_anak', $anak['id_anak'])->where('status_spin_point', 0)->first();
            if(!empty($dataUpdate)){
                $modelPoin = new PoinDetailModel();
                $datas = [
                    'id_reservasi'     => $dataUpdate['id_reservasi'],
                    'id_anak'     => $anak['id_anak'],
                    'point_masuk'    => $poin,
                    'point_keluar'    => 0,
                ];
                $modelPoin->save($datas);
                $model->update($dataUpdate['id'], [
                    'status_spin_point'    => 1,
                ]);
                $status = 1;
            }

            echo json_encode($status);

        }else{
            exit('Data Tidak Dapat Diproses');
        }
    }

    public function detailPoin(){
        if($this->request->isAJAX()){
            $anak = $this->request->getVar('anak');

            $model = new PoinDetailModel();
            $data = $model
            ->join('tb_anak', 'tb_point_detail.id_anak = tb_anak.id_anak')
            ->join('tb_reservasi', 'tb_point_detail.id_reservasi = tb_reservasi.id_reservasi')
            ->where('tb_point_detail.id_anak', $anak)->findAll();
            $res = [
                'data' => $data,
            ];
            // dd($data);
            $msg = [
                'data' => view('pages/historyPoin', $res)
            ];

            echo json_encode($msg);
        }else{
            exit('Data Tidak Dapat Diproses');
        }
    }
}