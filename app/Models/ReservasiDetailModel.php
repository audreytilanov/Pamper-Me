<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class ReservasiDetailModel extends Model{
    protected $table = 'tb_reservasi_detail';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'id_reservasi',
        'id_jadwal_produk',
        'id_produk',
        'id_anak',
        'harga',
        'qr_code',
        'time_scan',
        'status_spin_point'
    ];
}