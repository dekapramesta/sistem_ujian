<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderUjian extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_jadwalujian',
        'id_gurus',
        'id_jenjangs',
        'status',
    ];

    public function jadwal_ujian()
    {
        # code...
        return $this->belongsTo(jadwal_ujian::class, 'id_jadwalujian', 'id');
    }

    public function guru()
    {
        # code...
        return $this->belongsTo(Guru::class, 'id_gurus', 'id');
    }

    public function jenjang()
    {
        # code...
        return $this->belongsTo(Jenjang::class, 'id_jenjangs', 'id');
    }

    public function detailujian()
    {
        # code...
        return $this->hasMany(DetailUjian::class, 'id_headerujian', 'id');
    }

    public function soal()
    {
        # code...
        return $this->hasMany(Soal::class, 'id_headerujian', 'id');
    }
}
