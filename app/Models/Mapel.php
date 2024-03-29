<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_jurusan',
        'nama_mapel',
        'identitas',
    ];

    protected $primaryKey = 'id';

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }

    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'mst_mapel_guru_kelas', 'id_mapel', 'id_guru');
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'mst_mapel_guru_kelas', 'id_mapel', 'id_kelas');
    }
    // public function mst_mapel_guru_kelas()
    // {
    //     # code...
    //     return $this->hasMany(mst_mapel_guru_kelas::class, 'id_jenjang', 'id');
    // }

    public function jadwal_ujian()
    {
        # code...
        return $this->hasMany(jadwal_ujian::class, 'id_mapels', 'id');
    }
}
