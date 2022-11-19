<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class JadwalProdukModel extends Model{
    protected $table = 'tb_jadwal_produk';
    protected $primaryKey = 'id_jadwal_produk';
    
    protected $allowedFields = [
        'id_produk',
        'jam',
        'ketersediaan',
        'status_aktif',
        'tanggal',
    ];
}