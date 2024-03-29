<?php

namespace App\Controllers;

use App\Models\AnakModel;
use DateTime;
use App\Models\CabangModel;
use App\Models\JadwalProdukModel;
use App\Models\ProdukModel;
use App\Models\KategoriLayananModel;
use App\Models\LayananModel;
use App\Models\OperatorModel;
use App\Models\OrangtuaModel;
use App\Models\ReservasiDetailModel;
use App\Models\ReservasiModel;

class AdminReservasi extends BaseController
{
    public function statusTamu($id){
        helper(['form']);
        $session = session();

        $ortuModel = new ReservasiModel();
        $ortu = $ortuModel->find($id);

        $data = new ReservasiModel();
        date_default_timezone_set('Asia/Hong_Kong');
        $date = date('Y/m/d H:i:s');
        if(empty($ortu['id_pegawai'])){
            $data->update($id, [
                'update_by'     => $session->get('user_id_admin'),
                'update_at'     => $date,
                'id_pegawai'     => $this->request->getVar('id_pegawai'),
                'status_service'     => $this->request->getVar('status_tamu'),
            ]);
        }else{
            $data->update($id, [
                'update_by'     => $session->get('user_id_admin'),
                'update_at'     => $date,
                'status_service'     => $this->request->getVar('status_tamu'),
            ]);
        }
        // else{
        //     $data->update($id, [
        //         'update_by'     => $session->get('user_id_admin'),
        //         'update_at'     => $date,
        //         'status_service'     => $this->request->getVar('status_tamu'),
        //     ]);
        // }
        
        // dd($session);

        return redirect()->to('/admin/reservasi/')->with('success', 'Data Berhasil Diperbaharui');
    }

    public function reservasiIndex(){
        $model = new ReservasiModel();
        $data = $model->join('tb_orangtua', 'tb_orangtua.id_orangtua = tb_reservasi.id_orangtua')
        ->join('tb_reservasi_detail', 'tb_reservasi_detail.id_reservasi = tb_reservasi.id_reservasi')
        ->orderBy('tb_reservasi.id_reservasi', 'DESC')
        ->findAll();
        // dd($data);

        $modelOperator = new OperatorModel();
        $dataOps = $modelOperator->findAll();



        $page = "reservasi";
        $res = [
            'data' => $data,
            'page' => $page,
            'ops' => $dataOps
        ];
        // dd($res);

        return view('pages/admin/reservasi/index', $res);
    }

    public function reservasiScan($id){
        $model = new ReservasiModel();
        $data = $model->join('tb_orangtua', 'tb_orangtua.id_orangtua = tb_reservasi.id_orangtua')
        ->where('id_reservasi', $id)->first();

        $modelOperator = new OperatorModel();
        $dataOps = $modelOperator->findAll();

        $page = "reservasi";
        $res = [
            'data' => $data,
            'page' => $page,
            'ops' => $dataOps
        ];
        // dd($res);

        return view('pages/admin/reservasi/scanDetail', $res);
    }

    public function reservasiTambah(){
        $model = new ReservasiDetailModel();
        $data = $model->join('tb_jadwal_produk', 'tb_jadwal_produk.id_jadwal_produk = tb_reservasi_detail.id_jadwal_produk')
        ->join('tb_produk', 'tb_produk.id_produk = tb_reservasi_detail.id_produk')
        ->join('tb_anak', 'tb_reservasi_detail.id_anak = tb_anak.id_anak')
        ->join('tb_orangtua', 'tb_orangtua.id_orangtua = tb_anak.id_orangtua')
        ->where('id_reservasi', null)->findAll();

        $dataWaiting = $model->join('tb_jadwal_produk', 'tb_jadwal_produk.id_jadwal_produk = tb_reservasi_detail.id_jadwal_produk')
        ->join('tb_produk', 'tb_produk.id_produk = tb_reservasi_detail.id_produk')
        ->join('tb_anak', 'tb_reservasi_detail.id_anak = tb_anak.id_anak')
        ->join('tb_orangtua', 'tb_orangtua.id_orangtua = tb_anak.id_orangtua')
        ->where('id_reservasi', null)->findAll();


        $page = "reservasi";
        $res = [
            'data' => $data,
            'dataWaiting' => $dataWaiting,
            'page' => $page,
        ];

        return view('pages/admin/reservasi/tambah', $res);
    }

    public function reservasiCariOrtu(){
        if($this->request->isAJAX()){
            $model = new ReservasiDetailModel();
            $data = $model
            ->join('tb_jadwal_produk', 'tb_jadwal_produk.id_jadwal_produk = tb_reservasi_detail.id_jadwal_produk')
            ->join('tb_produk', 'tb_produk.id_produk = tb_reservasi_detail.id_produk')
            ->join('tb_anak', 'tb_reservasi_detail.id_anak = tb_anak.id_anak')
            ->join('tb_orangtua', 'tb_orangtua.id_orangtua = tb_anak.id_orangtua')
            ->where('id_reservasi', null)->findAll();
            $page = "reservasi";
            $res = [
                'data' => $data,
                'page' => $page,
            ];
            // dd($data);
            $msg = [
                'data' => view('pages/admin/reservasi/view/detailReservasi', $res)
            ];

            echo json_encode($msg);
        }else{
            exit('Data Tidak Dapat Diproses');
        }
    }

    public function reservasiWaiting(){
        if($this->request->isAJAX()){
            $model = new ReservasiModel();
            $data = $model
            ->join('tb_orangtua', 'tb_orangtua.id_orangtua = tb_reservasi.id_orangtua')
            ->where('status_service', 'waiting')->findAll();
            $page = "reservasi";
            $res = [
                'data' => $data,
                'page' => $page,
            ];
            // dd($data);
            $msg = [
                'data' => view('pages/admin/reservasi/view/formWaiting', $res)
            ];

            echo json_encode($msg);
        }else{
            exit('Data Tidak Dapat Diproses');
        }
    }

    public function reservasiOrtuInput(){
        if($this->request->isAJAX()){
            $model = new OrangtuaModel();
            $data = $model->findAll();

            $page = "reservasi";
            $res = [
                'data' => $data,
                'page' => $page,
            ];

            $msg = [
                'data' => view('pages/admin/reservasi/view/formReservasi', $res)
            ];

            echo json_encode($msg);
        }else{
            exit('Data Tidak Dapat Diproses');
        }
    }

    // public function reservasiCabangInput(){
    //     if($this->request->isAJAX()){
            
    //         $cabangModel = new CabangModel();
    //         $cabang = $cabangModel->findAll();

    //         $page = "reservasi";
    //         $res = [
    //             'data' => $cabang,
    //             'page' => $page,
    //         ];

    //         $msg = [
    //             'data' => view('pages/admin/reservasi/view/formReservasi', $res)
    //         ];

    //         echo json_encode($msg);
    //     }else{
    //         exit('Data Tidak Dapat Diproses');
    //     }
    // }

    public function reservasiAnakInput(){
        if($this->request->isAJAX()){
            $idOrangtua = $this->request->getVar('orangtua');
            $model = new AnakModel();
            $data = $model->where('id_orangtua', $idOrangtua)->findAll();

            echo json_encode($data);
        }else{
            exit('Data Tidak Dapat Diproses');
        }
    }

    public function reservasiLayananInput(){
        if($this->request->isAJAX()){
            $model = new LayananModel();
            $data = $model->findAll();

            echo json_encode($data);
        }else{
            exit('Data Tidak Dapat Diproses');
        }
    }

    public function reservasiKategoriInput(){
        if($this->request->isAJAX()){
            $idLayanan = $this->request->getVar('layanan');
            $model = new KategoriLayananModel();
            $data = $model->where('id_layanan', $idLayanan)->findAll();

            echo json_encode($data);
        }else{
            exit('Data Tidak Dapat Diproses');
        }
    }

    public function reservasiProdukInput(){
        if($this->request->isAJAX()){
            $kategori = $this->request->getVar('kategori');
            $cabang = $this->request->getVar('cabang');
            $model = new ProdukModel();
            $data = $model->where('id_kategori_layanan', $kategori)->where('id_cabang', $cabang)->findAll();

            echo json_encode($data);
        }else{
            exit('Data Tidak Dapat Diproses');
        }
    }

    public function reservasiJamInput(){
        if($this->request->isAJAX()){
            $produk = $this->request->getVar('produk');
            $tanggal = $this->request->getVar('tanggal');
            $model = new JadwalProdukModel();
            $data = $model->where('id_produk', $produk)->where('tanggal', $tanggal)->findAll();

            echo json_encode($data);
        }else{
            exit('Data Tidak Dapat Diproses');
        }
    }

    public function reservasiSimpanSementara(){
        if($this->request->isAJAX()){
            helper(['form']);

            $produkModel = new ProdukModel();
            $produk = $produkModel->where('id_produk', $this->request->getVar('id_produk'))->first();
            // dd($produk);
            // echo json_encode($produk);

            
            // if($this->validate($rules)){
            // dd($this->request->getVar('tanggal_lahir'));

            $model = new ReservasiDetailModel();
            $data = [
                'id_jadwal_produk' => $this->request->getVar('id_jam'),
                'id_produk' => $this->request->getVar('id_produk'),
                'id_anak' => $this->request->getVar('id_anak'),
                'harga' => $produk['harga'],
            ];
            $model->save($data);

            echo json_encode($data);
        }else{
            exit('Data Tidak Dapat Diproses');
        }
        
    }

    public function reservasiHapusDetail(){
        if($this->request->isAJAX()){
            helper(['form']);

            $produkModel = new ReservasiDetailModel();
            
            // if($this->validate($rules)){
            // dd($this->request->getVar('tanggal_lahir'));
            $post = $produkModel->find($this->request->getVar('id'));
            $data = $produkModel->delete($this->request->getVar('id'));

            echo json_encode($data);
        }else{
            exit('Data Tidak Dapat Diproses');
        }
    }

    public function selesai(){
        if($this->request->isAJAX()){
            helper(['form']);

            $reservasiModel = new ReservasiModel();

            $detailModel = new ReservasiDetailModel();
            $detail = $detailModel->where('id_reservasi', null)->first();
            $total = $detailModel->where('id_reservasi', null)->findAll();

            $totalHarga = 0;
            foreach($total as $tot){
                $totalHarga += $tot['harga'];
            }

            $anakModel = new AnakModel();
            $anak = $anakModel->where('id_anak', $detail['id_anak'])->first();


            date_default_timezone_set('Asia/Hong_Kong');
            $date = date('Y/m/d H:i:s');
            helper(['text']);
            $random = random_string('alnum', 10);
            $data = [
                'tanggal' => $date,
                'id_orangtua' => $anak['id_orangtua'],
                'total_biaya' => $totalHarga,
                'status' => "payment",
                'transaction_time' => $date,
                'metode_reservasi' => "offline",
                'no_receipt' => $random,
                'metode_pembayaran' => $this->request->getVar('payment_method'),
            ];
            $reservasiModel->save($data);

            $idRes = $reservasiModel->insertID();
            $detailModel->set('id_reservasi', $idRes);
            $detailModel->where('id_reservasi', null);
            $detailModel->update();

            echo json_encode($data);
        }else{
            exit('Data Tidak Dapat Diproses');
        }
    }

    public function reservasiDetail($id){
        $page = "reservasi";
        $model = new ReservasiDetailModel();

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
            'page' => $page,
        ];
        // dd($data);
        return view('pages/admin/reservasi/detail', $res);
    }

    public function laporanReservasi(){
        $page = "history";
        $model = new ReservasiDetailModel();

        $data = $model->join('tb_reservasi', 'tb_reservasi.id_reservasi = tb_reservasi_detail.id_reservasi')
            ->join('tb_jadwal_produk', 'tb_jadwal_produk.id_jadwal_produk = tb_reservasi_detail.id_jadwal_produk')
            ->join('tb_produk', 'tb_produk.id_produk = tb_reservasi_detail.id_produk')
            ->join('tb_cabang', 'tb_cabang.id_cabang = tb_produk.id_cabang')
            ->join('tb_anak', 'tb_anak.id_anak = tb_reservasi_detail.id_anak')
            ->join('tb_orangtua', 'tb_orangtua.id_orangtua = tb_reservasi.id_orangtua')
            ->join('tb_kategori_layanan', 'tb_kategori_layanan.id_kategori_layanan = tb_produk.id_kategori_layanan')->findAll();

        $groupHistory = $model->join('tb_reservasi', 'tb_reservasi.id_reservasi = tb_reservasi_detail.id_reservasi')
            ->join('tb_jadwal_produk', 'tb_jadwal_produk.id_jadwal_produk = tb_reservasi_detail.id_jadwal_produk')
            ->join('tb_produk', 'tb_produk.id_produk = tb_reservasi_detail.id_produk')
            ->join('tb_cabang', 'tb_cabang.id_cabang = tb_produk.id_cabang')
            ->join('tb_anak', 'tb_anak.id_anak = tb_reservasi_detail.id_anak')
            ->join('tb_orangtua', 'tb_orangtua.id_orangtua = tb_reservasi.id_orangtua')
            ->join('tb_kategori_layanan', 'tb_kategori_layanan.id_kategori_layanan = tb_produk.id_kategori_layanan')
            ->groupBy('date(tb_reservasi.tanggal)')
            ->select(['count(tb_reservasi.tanggal) as sumTotalPesanan', 'tb_reservasi.tanggal as tanggal', 'sum(tb_reservasi.total_biaya) as sumTotalBiaya'])->findAll();

        $groupHistoryMonth = $model->join('tb_reservasi', 'tb_reservasi.id_reservasi = tb_reservasi_detail.id_reservasi')
            ->join('tb_jadwal_produk', 'tb_jadwal_produk.id_jadwal_produk = tb_reservasi_detail.id_jadwal_produk')
            ->join('tb_produk', 'tb_produk.id_produk = tb_reservasi_detail.id_produk')
            ->join('tb_cabang', 'tb_cabang.id_cabang = tb_produk.id_cabang')
            ->join('tb_anak', 'tb_anak.id_anak = tb_reservasi_detail.id_anak')
            ->join('tb_orangtua', 'tb_orangtua.id_orangtua = tb_reservasi.id_orangtua')
            ->join('tb_kategori_layanan', 'tb_kategori_layanan.id_kategori_layanan = tb_produk.id_kategori_layanan')
            ->groupBy('month(tb_reservasi.tanggal)')
            ->select(['count(tb_reservasi.tanggal) as sumTotalPesanan', 'tb_reservasi.tanggal as tanggal', 'sum(tb_reservasi.total_biaya) as sumTotalBiaya'])->findAll();
        
        $res = [
            'data' => $data,
            'page' => $page,
            'groupHistory' => $groupHistory,
            'groupHistoryMonth' => $groupHistoryMonth
        ];
        // dd($data);
        return view('pages/admin/laporan/history', $res);
    }

    
}

// public function reservasiAddIndex(){
//     $modelKategori = new KategoriLayananModel();
//     $dataKategori = $modelKategori->findAll();

//     $modelCabang = new CabangModel();
//     $dataCabang = $modelCabang->findAll();

//     $modelProduk = new ProdukModel();
//     $dataProduk = $modelProduk->findAll();

//     $modelOrtu = new OrangtuaModel();
//     $dataOrtu = $modelOrtu->findAll();

//     $modelLayanan = new KategoriLayananModel();
//     $dataLayanan = $modelLayanan->findAll();

//     $page = "reservasi";
//     $res = [
//         'page' => $page,
//         'dataKategori' => $dataKategori,
//         'dataCabang' => $dataCabang,
//         'dataOrtu' => $dataOrtu,
//         'dataProduk' => $dataProduk,
//         'dataLayanan' => $dataLayanan,
//     ];
//     return view('pages/admin/reservasi/add', $res);
    
// }

// public function reservasiCariOrtu(){
//     helper(['form']);

//     $modelOrtu = new OrangtuaModel();
//     $dataOrtu = $modelOrtu->where('id_reg', $this->request->getVar('id_reg'))->first();

//     $modelAnak = new AnakModel();
//     $dataAnak = $modelAnak->where('id_orangtua', $dataOrtu['id_orangtua'])->first();

//     if(empty($dataAnak)){
//         return redirect()->to('/admin/orangtua/');
//     }

//     $model = new ReservasiModel();
//     $data = [
//         'tanggal' => date('Y-m-d H:i:s'),
//         'id_orangtua' => $dataOrtu['id_orangtua'],
//         'metode_transaksi' => "offline",
//     ];

//     $model->save($data);

//     $lastID = $model->insertID();
//     return redirect()->to('/admin/reservasi/cari/'. $lastID);
// }

// public function reservasiLast($id){

//     $modelReservasi = new ReservasiModel();
//     $dataReservasi = $modelReservasi->where('id_reservasi', $id)->first();

//     $modelAnak = new AnakModel();
//     $dataAnak = $modelAnak->where('id_orangtua', $dataReservasi['id_orangtua'])->findAll();

//     $modelOrtu = new OrangtuaModel();
//     $dataOrtu = $modelOrtu->where('id_orangtua', $dataReservasi['id_orangtua'])->first();

//     $page = "reservasi";
//     $res = [
//         'page' => $page,
//         // 'dataKategori' => $dataKategori,
//         // 'dataCabang' => $dataCabang,
//         'dataAnak' => $dataAnak,
//         'dataOrtu' => $dataOrtu,
//     ];
//     return view('pages/admin/reservasi/add', $res);
    
// }

// public function produkTambah(){
//     $produk = $this->request->getVar('id_produk');
//     $tanggal = $this->request->getVar('tanggal');
//     $cabang = $this->request->getVar('cabang');
//     $layanan = $this->request->getVar('id_layanan');
//     $ortu = $this->request->getVar('id_reg');
//     $produkModel = new JadwalProdukModel();
//     $dataProduks = $produkModel->where('id_produk', $produk)->where('tanggal', $tanggal)->findAll();


//     $modelOrtu = new OrangtuaModel();
//     $dataOrtu = $modelOrtu->find($ortu);

//     $modelAnak = new AnakModel();
//     $dataAnak = $modelAnak->where('id_orangtua', $dataOrtu['id_orangtua'])->findAll();
//     // $modelReservasi = new ReservasiModel();
//     // $dataReservasi = $modelReservasi->where('id_reservasi', $id)->first();

//     // $modelAnak = new AnakModel();
//     // $dataAnak = $modelAnak->where('id_orangtua', $dataReservasi['id_orangtua'])->findAll();

//     // $modelOrtu = new OrangtuaModel();
//     // $dataOrtu = $modelOrtu->where('id_orangtua', $dataReservasi['id_orangtua'])->first();
//     $modelKategori = new KategoriLayananModel();
//     $dataKategori = $modelKategori->findAll();

//     $modelCabang = new CabangModel();
//     $dataCabang = $modelCabang->findAll();

//     $modelProduk = new ProdukModel();
//     $dataProduk = $modelProduk->findAll();

//     $modelOrtu = new OrangtuaModel();
//     $dataOrtu = $modelOrtu->findAll();

//     $modelLayanan = new KategoriLayananModel();
//     $dataLayanan = $modelLayanan->findAll();

//     $page = "reservasi";
//     dd($dataProduks);
//     $res = [
//         'page' => $page,
//         'tanggal' => $tanggal,
//         // 'dataKategori' => $dataKategori,
//         'dataProduks' => $dataProduks,
//         // 'dataAnak' => $dataAnak,
//         'dataLayanan' => $dataLayanan,
//         'dataKategori' => $dataKategori,
//         'dataCabang' => $dataCabang,
//         'dataOrtu' => $dataOrtu,
//         'dataProduk' => $dataProduk,
//     ];
//     return view('pages/admin/reservasi/add', $res);

// }