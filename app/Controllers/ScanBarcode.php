<?php

namespace App\Controllers;

use App\Models\AnakModel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use App\Models\ReservasiDetailModel;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

class ScanBarcode extends BaseController
{
    public function index($id)
    {
        $model = new ReservasiDetailModel();

        $data = $model->join('tb_reservasi', 'tb_reservasi.id_reservasi = tb_reservasi_detail.id_reservasi')
            ->join('tb_jadwal_produk', 'tb_jadwal_produk.id_jadwal_produk = tb_reservasi_detail.id_jadwal_produk')
            ->join('tb_produk', 'tb_produk.id_produk = tb_reservasi_detail.id_produk')
            ->join('tb_cabang', 'tb_cabang.id_cabang = tb_produk.id_cabang')
            ->join('tb_anak', 'tb_anak.id_anak = tb_reservasi_detail.id_anak')
            ->join('tb_kategori_layanan', 'tb_kategori_layanan.id_kategori_layanan = tb_produk.id_kategori_layanan')
            ->where('tb_reservasi_detail.qr_code', $id)->first();
        $writer = new PngWriter();

        // Create QR code
        // dd($data);
        $qrCode = QrCode::create('https://baligroupbooking.com/admin/barcode/scan/'.$data['qr_code'])
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        // $logo = Logo::create( FCPATH .'logo.png')
        //     ->setResizeToWidth(150);

        // // Create generic label
        // $label = Label::create('Sobatcoding.com')
        //     ->setTextColor(new Color(255, 0, 0));

        $result = $writer->write($qrCode);
        
        $dataUri = $result->getDataUri();
        // echo '<img src="'.$dataUri.'" alt="Sobatcoding.com">';

        $res = [
            'dataUri' => $dataUri,
            'data' => $data,
        ];

        // if($data['time_scan'] == null || $){
            return view('pages/qrcode/scanBarcode', $res);
        // }else{
        //     return redirect()->to('/user/my-order');
        // }


    }

    public function anak($id){
        $model = new AnakModel();

        $data = $model
            ->where('tb_anak.link_barcode', $id)->first();
        $writer = new PngWriter();

        // Create QR code
        // dd($data);
        $qrCode = QrCode::create('https://baligroupbooking.com/admin/data-anak/spin/'.$id)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        // $logo = Logo::create( FCPATH .'logo.png')
        //     ->setResizeToWidth(150);

        // // Create generic label
        // $label = Label::create('Sobatcoding.com')
        //     ->setTextColor(new Color(255, 0, 0));

        $result = $writer->write($qrCode);
        
        $dataUri = $result->getDataUri();
        // echo '<img src="'.$dataUri.'" alt="Sobatcoding.com">';

        $res = [
            'dataUri' => $dataUri,
            'data' => $data,
        ];
    
        return view('pages/qrcode/scanBarcode', $res);
        
    }
}