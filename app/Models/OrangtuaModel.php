<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class OrangtuaModel extends Model{
    protected $table = 'tb_orangtua';
    protected $primaryKey = 'id_reg';
    
    protected $allowedFields = [
        'id_orangtua',
        'nama_orangtua',
        'email',
        'no_whatsapp',
        'password',
        'tgl_daftar',
        'status_pendaftaran',
        'link_foto',
        'status_aktif'
    ];
}