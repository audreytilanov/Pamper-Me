<?php

namespace App\Controllers;

use App\Models\OrangtuaModel;
use App\Models\ReservasiModel;
use App\Models\ReservasiDetailModel;

class Invoice extends BaseController
{
    public function index($id)
    {
        $session = session();
        $model = new ReservasiDetailModel();
        $modelRes = new ReservasiModel();
        $modelOrtu = new OrangtuaModel();

        $dataRes = $modelRes->where('id_orangtua',$session->get('user_id_orangtua'))->where('id_reservasi', $id)->first();

        $dataOrtu = $modelOrtu->where('id_orangtua',$session->get('user_id_orangtua'))->first();

        if(!empty($dataRes)){
            $data = $model->join('tb_reservasi', 'tb_reservasi.id_reservasi = tb_reservasi_detail.id_reservasi')
            ->join('tb_jadwal_produk', 'tb_jadwal_produk.id_jadwal_produk = tb_reservasi_detail.id_jadwal_produk')
            ->join('tb_produk', 'tb_produk.id_produk = tb_reservasi_detail.id_produk')
            ->join('tb_cabang', 'tb_cabang.id_cabang = tb_produk.id_cabang')
            ->join('tb_anak', 'tb_anak.id_anak = tb_reservasi_detail.id_anak')
            ->join('tb_orangtua', 'tb_orangtua.id_orangtua = tb_reservasi.id_orangtua')
            ->join('tb_kategori_layanan', 'tb_kategori_layanan.id_kategori_layanan = tb_produk.id_kategori_layanan')
            ->where('tb_reservasi_detail.id_reservasi', $id)->findAll();

            $res = [
                'data' => $data,
                'dataRes' => $dataRes,
                'dataOrtu' => $dataOrtu,
            ];
            // dd($dataRes);

            // dd($data);

            return view('pages/invoice/index', $res);

        }
        return redirect()->to('/user/my-order');
    }
}