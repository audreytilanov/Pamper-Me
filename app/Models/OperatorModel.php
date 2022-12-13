<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class OperatorModel extends Model{
    protected $table = 'tb_operator';
    protected $primaryKey = 'id_operator';
    
    protected $allowedFields = [
        'nama',
        'email',
        'password',
        'tipe_akses',
    ];
}