<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_jurusan',
        'id_jenjang',
        'nama_kelas',
        'identitas',
    ];

    protected $primaryKey = 'id';

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class, 'id_jenjang', 'id');
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class, 'mst_mapel_guru_kelas', 'id_kelas', 'id_mapel');
    }

    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'mst_mapel_guru_kelas', 'id_kelas', 'id_guru');
    }
    public function mst_mapel_guru_kelas()
    {
        # code...
        return $this->hasMany(mst_mapel_guru_kelas::class, 'id_kelas', 'id');
    }

    public function detailujian()
    {
        # code...
        return $this->hasMany(DetailUjian::class, 'id_kelas', 'id');
    }
    public function siswa()
    {
        # code...
        return $this->hasMany(Siswa::class, 'id_kelas', 'id');
    }
    public function siswaone()
    {
        # code...
        return $this->hasOne(Siswa::class, 'id_kelas', 'id');
    }
}
