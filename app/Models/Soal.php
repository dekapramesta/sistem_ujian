<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_headerujian',
        'soal',
        'soal_gambar',

    ];

    public function headerujian()
    {
        # code...
        return $this->belongsTo(HeaderUjian::class, 'id_headerujian', 'id');
    }
    // public function mst_mapel_guru_kelas()
    // {
    //     return $this->belongsTo(mst_mapel_guru_kelas::class, 'id_mst_mapel_guru_kelas', 'id');
    // }

    // public function detail_soal()
    // {
    //     # code...
    //     return $this->hasMany(detail_soal::class, 'id_soal', 'id');
    // }
    public function jawaban()
    {
        # code...
        return $this->hasMany(Jawaban::class, 'id_soals', 'id');
    }
}
