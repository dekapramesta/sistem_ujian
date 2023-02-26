<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mst_mapel_guru_kelas extends Model
{
    use HasFactory;
    protected $table = 'mst_mapel_guru_kelas';
    protected $fillable = [
        'id_mapels',
        'id_gurus',
        'id_kelas',

    ];
    public $timestamps = false;
}
