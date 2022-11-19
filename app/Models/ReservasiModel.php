<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class ReservasiModel extends Model{
    protected $table = 'tb_reservasi';
    protected $primaryKey = 'id_reservasi';
    
    protected $allowedFields = [
        'tanggal',
        'id_orangtua',
        'subtotal_biaya',
        'id_diskon',
        'nominal_diskon',
        'total_biaya',
        'metode_pembayaran',
        'status_pembayaran',
        'id_transaksi_pembayaran',
        'status'
    ];
}