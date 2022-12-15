<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class DiskonModel extends Model{
    protected $table = 'tb_diskon';
    protected $primaryKey = 'id_diskon';
    
    protected $allowedFields = [
        'kode_diskon',
        'deskripsi',
        'tipe_diskon',
        'nominal',
        'tanggal_mulai',
        'tanggal_berakhir',
    ];
}