<?php

namespace App\Controllers;

use App\Models\CabangModel;
use App\Models\ProdukModel;
use App\Models\JadwalProdukModel;
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

    public function cari(){
        $session = \Config\Services::session();

        $id_kategori_layanan = $this->request->getVar('kategori_layanan');
        $cabang = $this->request->getVar('cabang');
        $tanggal = $this->request->getVar('tanggal');
        

        $model = new ProdukModel();
        $jadwal = new JadwalProdukModel();
        $data = $model->where('id_kategori_layanan', $id_kategori_layanan)->where('id_cabang', $cabang)->findAll();

        // dd($data);

        foreach($data as $key=>$item){
            $waktu = $jadwal->join('tb_produk', 'tb_produk.id_produk = tb_jadwal_produk.id_produk', 'left')->where('tb_jadwal_produk.id_produk', $data[$key]['id_produk'])->findAll();
            

            // $dataFix[] = array_push();
            // dd($waktu);

            foreach($waktu as $keys=>$item){
            //     array_push($a,);
            // dd($waktu[$keys]['jam']);
                $item[$keys]['nama_produk']  = $waktu[$keys]['nama_produk'];
                $item[$keys]['deskripsi_produk']  = $waktu[$keys]['deskripsi_produk'];
                $item[$keys]['durasi']  = $waktu[$keys]['durasi'];
                $item[$keys]['harga']  = $waktu[$keys]['harga'];
                $item[$keys]['jam'] = $waktu[$keys]['jam'];
                $item[$keys]['ketersediaan']  = $waktu[$keys]['ketersediaan'];
                $item[$keys]['status_aktif']  = $waktu[$keys]['status_aktif'];
                $item[$keys]['tanggal']  = $waktu[$keys]['tanggal'];
                $datas[] = $item;

            }
            // dd($datas);

            


        }

        $session->setFlashdata('jadwal', $datas);
        $session->setFlashdata('produk', $data);

        return redirect()->to('/');

    }

}