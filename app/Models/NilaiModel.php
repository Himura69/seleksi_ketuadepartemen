<?php

namespace App\Models;
use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    protected $allowedFields = ['id_alternatif', 'id_kriteria', 'nilai'];
}
