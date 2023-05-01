<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThAkademik extends Model
{
    use HasFactory;
    protected $fillable = [
        'th_akademik',
        'nama_semester',
        'identitas',
    ];

    protected $primaryKey = 'id';

    public function jadwal_ujian()
    {
        # code...
        return $this->hasMany(jadwal_ujian::class, 'id_th_akademiks', 'id');
    }
}
