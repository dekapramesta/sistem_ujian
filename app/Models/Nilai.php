<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ujian',
        'id_siswa',
        'jumlah_benar',
        'jumlah_salah',
        'nilai'
    ];

    protected $primaryKey = 'id';

    public function headerujian()
    {
        return $this->belongsTo(HeaderUjian::class, 'id_ujian', 'id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }
}
