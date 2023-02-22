<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mapel',
        'soal',
        'soal_gambar',
        'jawaban',
        'pilihan_a',
        'pilihan_gambar_a',
        'pilihan_b',
        'pilihan_gambar_b',
        'pilihan_c',
        'pilihan_gambar_c',
        'pilihan_d',
        'pilihan_gambar_d',
        'pilihan_e',
        'pilihan_gambar_e',
        'identitas',
    ];

    protected $primaryKey = 'id';

    public function mapel(){
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id');
    }
}
