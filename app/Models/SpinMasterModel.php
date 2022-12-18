<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class SpinMasterModel extends Model{
    protected $table = 'tb_seting_point';
    protected $primaryKey = 'id_point';
    
    protected $allowedFields = [
        'nilai_point',
    ];
}