<?php

namespace App\Controllers;

use App\Models\AnakModel;
use App\Models\CabangModel;
use App\Models\ProdukModel;
use App\Models\JadwalProdukModel;
use App\Models\KategoriLayananModel;
use App\Models\ReservasiDetailModel;
use App\Models\ReservasiModel;

class LihatAntrian extends BaseController
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
        return view('pages/lihatAntrian', $res);
    }

    public function cari()
    {
        $session = session();

        $id_kategori_layanan = $this->request->getVar('layanan');
        $cabang = $this->request->getVar('cabang');
        $tanggal = $this->request->getVar('tanggal');
        

        $model = new ProdukModel();
        $jadwal = new JadwalProdukModel();
        $modalAnak = new AnakModel();
        $data = $model->where('id_kategori_layanan', $id_kategori_layanan)->where('id_cabang', $cabang)->findAll();
        $anak = $modalAnak->where('id_orangtua', $session->get('user_id_orangtua'))->findAll();

        // dd($data);

        foreach($data as $key=>$item){
            $waktu = $jadwal->join('tb_produk', 'tb_produk.id_produk = tb_jadwal_produk.id_produk', 'left')
            ->join('tb_cabang', 'tb_cabang.id_cabang = tb_produk.id_cabang', 'left')->where('tb_jadwal_produk.id_produk', $data[$key]['id_produk'])->findAll();
            

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
                $item[$keys]['nama_cabang']  = $waktu[$keys]['nama_cabang'];
                $datas[] = $item;

            }
            // dd($datas);
        }

        if(!empty($datas)){
            $session->setFlashdata('jadwal', $datas);
            $session->setFlashdata('produk', $data);
            $session->setFlashdata('anak', $anak);
        }


        return redirect()->to('/user/lihat-antrian');
    }

    public function tambah(){
        helper(['form']);
        $session = session();
         
        // if($this->validate($rules)){
        // dd($this->request->getVar('tanggal_lahir'));
        $resModel = new ReservasiModel();
        $dataRes = $resModel->where('id_orangtua', $session->get('user_id_orangtua'))->where('status','draft')->first();
        if(empty($dataRes)){
            $data = [
                'tanggal'     => $session->get('tanggal'),
                'id_orangtua'     => $session->get('user_id_orangtua'),
                // 'subtotal_biaya'    => $this->request->getVar('tanggal_lahir'),
                // 'total_biaya'    => $this->request->getVar('tanggal_lahir'),
                'status'    => 'draft',
            ];
            $resModel->save($data);

            $lastId = $resModel->where('id_orangtua', $session->get('user_id_orangtua'))->where('status','draft')->first();
            $model = new ReservasiDetailModel();
            $data = [
                'id_reservasi'     => $lastId['id_reservasi'],
                'id_jadwal_produk'     => $this->request->getVar('id_jadwal'),
                'id_produk'    => $this->request->getVar('id_produk'),
                'id_anak'    => $this->request->getVar('anak'),
                'harga' => $this->request->getVar('harga'),
            ];
            $model->save($data);
        }else{
            $model = new ReservasiDetailModel();
            $data = [
                'id_reservasi'     => $dataRes['id_reservasi'],
                'id_jadwal_produk'     => $this->request->getVar('id_jadwal'),
                'id_produk'    => $this->request->getVar('id_produk'),
                'id_anak'    => $this->request->getVar('anak'),
                'harga' => $this->request->getVar('harga'),
            ];
            $model->save($data);
        };

        
        return redirect()->to('/user/lihat-antrian');
    }

}