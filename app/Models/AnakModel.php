<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class AnakModel extends Model{
    protected $table = 'tb_anak';
    protected $primaryKey = 'id_anak';
    
    protected $allowedFields = [
        'id_orangtua',
        'nama_anak',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_aktif',
        'link_barcode',
    ];
}