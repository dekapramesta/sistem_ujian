<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal_ujian extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_th_akademiks',
        'id_mapels',
        'id_jenjangs',
        'jenis_ujian',
    ];

    public function detailujian()
    {
        # code...
        return $this->hasMany(DetailUjian::class, 'id_jadwal_ujians', 'id');
    }

    public function headerujian()
    {
        # code...
        return $this->hasMany(HeaderUjian::class, 'id_jadwalujian', 'id');
    }

    public function th_akademiks()
    {
        # code...
        return $this->belongsTo(ThAkademik::class, 'id_th_akademiks', 'id');
    }

    public function mapel()
    {
        # code...
        return $this->belongsTo(Mapel::class, 'id_mapels', 'id');
    }

    public function jenjang()
    {
        # code...
        return $this->belongsTo(Jenjang::class, 'id_jenjangs', 'id');
    }
}
