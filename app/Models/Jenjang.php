<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_jenjang',
        'identitas',
    ];

    protected $primaryKey = 'id';

    public function kelas()
    {
        # code...
        return $this->hasMany(Kelas::class, 'id_jenjang', 'id');
    }
    public function mst_mapel_guru_kelas()
    {
        # code...
        return $this->hasMany(mst_mapel_guru_kelas::class, 'id_jenjang', 'id');
    }

    public function jadwal_ujian()
    {
        # code...
        return $this->hasMany(jadwal_ujian::class, 'id_jenjangs', 'id');
    }

    public function headerujian()
    {
        # code...
        return $this->hasMany(HeaderUjian::class, 'id_jenjangs', 'id');
    }
}
