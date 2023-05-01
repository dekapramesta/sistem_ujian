<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUjian extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_headerujian',
        'id_kelas',
        'tanggal_ujian',
        'waktu_ujian',
        'token',
        'status',
    ];

    public function headerujian()
    {
        # code...
        return $this->belongsTo(HeaderUjian::class, 'id_headerujian', 'id');
    }

    public function kelas()
    {
        # code...
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    public function siswa()
    {
        # code...
        return $this->belongsTo(Siswa::class, 'id_kelas', 'id_kelas');
    }
    public function soal()
    {
        # code...
        return $this->hasMany(Soal::class, 'id_detail_ujians', 'id');
    }
    public function pesertaujian()
    {
        # code...
        return $this->hasMany(PesertaUjian::class, 'id_detail_ujians', 'id');
    }

    // public function jadwal_ujian()
    // {
    //     # code...
    //     return $this->belongsTo(jadwal_ujian::class, 'id_jadwal_ujians', 'id');
    // }

    // public function mst_mapel_guru_kelas()
    // {
    //     # code...
    //     return $this->belongsTo(mst_mapel_guru_kelas::class, 'id_mst_mapel_guru_kelas', 'id');
    // }
}
