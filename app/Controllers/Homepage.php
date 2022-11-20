<?php

namespace App\Controllers;

use App\Models\AnakModel;
use App\Models\CabangModel;
use App\Models\ProdukModel;
use App\Models\LayananModel;
use App\Models\JadwalProdukModel;
use App\Models\KategoriLayananModel;

class Homepage extends BaseController
{
    public function index()
    {
        
        $model = new LayananModel();
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

        $id_layanan = $this->request->getVar('layanan');
        $cabang = $this->request->getVar('cabang');
        $tanggal = $this->request->getVar('tanggal');
        

        $model = new ProdukModel();
        $jadwal = new JadwalProdukModel();
        // $data = $model->where('id_kategori_layanan', $id_layanan)->where('id_cabang', $cabang)->findAll();

        $modal = $jadwal->join('tb_produk', 'tb_produk.id_produk = tb_jadwal_produk.id_produk', 'inner')
            ->join('tb_kategori_layanan', 'tb_produk.id_kategori_layanan = tb_kategori_layanan.id_kategori_layanan', 'inner')
            ->join('tb_layanan', 'tb_kategori_layanan.id_layanan = tb_layanan.id_layanan', 'inner')
            ->where('tb_produk.id_cabang', $cabang)->where('tb_kategori_layanan.id_layanan', $id_layanan)->where('tb_jadwal_produk.tanggal', $tanggal)->findAll();

        $group = $jadwal->join('tb_produk', 'tb_produk.id_produk = tb_jadwal_produk.id_produk', 'inner')
            ->join('tb_kategori_layanan', 'tb_produk.id_kategori_layanan = tb_kategori_layanan.id_kategori_layanan', 'inner')
            ->join('tb_layanan', 'tb_kategori_layanan.id_layanan = tb_layanan.id_layanan', 'inner')
            ->where('tb_produk.id_cabang', $cabang)->where('tb_kategori_layanan.id_layanan', $id_layanan)->where('tb_jadwal_produk.tanggal', $tanggal)->groupBy('tb_produk.id_produk')->findAll();

        // dd($group[0]);

        foreach($group as $key=>$item){
            $waktu[$key] = $jadwal->join('tb_produk', 'tb_produk.id_produk = tb_jadwal_produk.id_produk', 'inner')
            ->join('tb_kategori_layanan', 'tb_produk.id_kategori_layanan = tb_kategori_layanan.id_kategori_layanan', 'inner')
            ->join('tb_layanan', 'tb_kategori_layanan.id_layanan = tb_layanan.id_layanan', 'inner')
            ->where('tb_produk.id_cabang', $cabang)->where('tb_kategori_layanan.id_layanan', $id_layanan)->where('tb_jadwal_produk.tanggal', $tanggal)->where('tb_produk.id_produk', $group[$key]['id_produk'])->findAll();

            // $cat[$key] = $jadwal->join('tb_produk', 'tb_produk.id_produk = tb_jadwal_produk.id_produk', 'inner')
            // ->join('tb_kategori_layanan', 'tb_produk.id_kategori_layanan = tb_kategori_layanan.id_kategori_layanan', 'inner')
            // ->join('tb_layanan', 'tb_kategori_layanan.id_layanan = tb_layanan.id_layanan', 'inner')
            // ->where('tb_produk.id_cabang', $cabang)->where('tb_kategori_layanan.id_layanan', $id_layanan)->where('tb_jadwal_produk.tanggal', $tanggal)->where('tb_produk.id_kategori_layanan', $group[$key]['id_kategori_layanan'])->findAll();
            

            // $dataFix[] = array_push();
            // $dataArray[$key] = $waktu;


            // foreach($waktu as $keys=>$item){
            // //     array_push($a,);
            //     // $a = 0;
            // // dd($waktu[$keys]['jam']);
            //     $item[$keys]['nama_produk']  = $waktu[$keys]['nama_produk'];
            //     $item[$keys]['deskripsi_produk']  = $waktu[$keys]['deskripsi_produk'];
            //     $item[$keys]['durasi']  = $waktu[$keys]['durasi'];
            //     $item[$keys]['harga']  = $waktu[$keys]['harga'];
            //     $item[$keys]['jam'] = $waktu[$keys]['jam'];
            //     $item[$keys]['ketersediaan']  = $waktu[$keys]['ketersediaan'];
            //     $item[$keys]['status_aktif']  = $waktu[$keys]['status_aktif'];
            //     $item[$keys]['tanggal']  = $waktu[$keys]['tanggal'];
            //     $datas[] = $item;
            // }

        }
        // dd($cat);

        if(!empty($waktu)){
            $session->setFlashdata('jadwal', $waktu);
        }

        if(!empty($modal)){
            $session->setFlashdata('modal', $modal);
        }

        if(!empty($modal)){
            $session->setFlashdata('group', $group);
        }

        if(!empty($session->get('user_id_orangtua'))){
            $session = session();
            $model = new AnakModel();
            $anak = $model->where('id_orangtua', $session->get('user_id_orangtua'))->findAll();
            // dd($res);
            $session->setFlashdata('anak', $anak);

        }

        return redirect()->to('/');

    }

}
/*
$waktu = $jadwal->join('tb_produk', 'tb_produk.id_produk = tb_jadwal_produk.id_produk', 'inner')
            ->join('tb_kategori_layanan', 'tb_produk.id_kategori_layanan = tb_kategori_layanan.id_kategori_layanan', 'inner')
            ->join('tb_layanan', 'tb_kategori_layanan.id_layanan = tb_layanan.id_layanan', 'inner')
            ->where('tb_produk.id_cabang', $cabang)->where('tb_kategori_layanan.id_layanan', $id_layanan)->where('tb_jadwal_produk.tanggal', $tanggal)->where('tb_produk.id_produk', $modal[$key]['id_produk'])->findAll();


        
        if(!empty($datas)){
            $session->setFlashdata('jadwal', $datas);
        }

        if(!empty($data)){
            $session->setFlashdata('produk', $data);
        }

        if(!empty($session->get('user_id_orangtua'))){
            $session = session();
            $model = new AnakModel();
            $anak = $model->where('id_orangtua', $session->get('user_id_orangtua'))->findAll();
            // dd($res);
            $session->setFlashdata('anak', $anak);

        }

*/