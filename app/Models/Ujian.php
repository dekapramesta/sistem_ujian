<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kelas',
        'id_soal',
        'id_th_akademik',
        'jum_soal',
        'acak_soal',
        'tgl_ujian',
        'jam_ujian',
        'status_ujian',
        'identitas',
    ];

    protected $primaryKey = 'id';

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    public function soal(){
        return $this->belongsTo(Soal::class, 'id_soal', 'id');
    }

    public function th_akademik(){
        return $this->belongsTo(ThAkademik::class, 'id_th_akademik', 'id');
    }
}
