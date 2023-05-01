<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temp extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_soals',
        'id_jawaban',
        'id_headerujian',
        'id_siswa',
    ];
    public function soal()
    {
        # code...
        return $this->belongsTo(Soal::class, 'id_soals', 'id');
    }
    public function jawaban()
    {
        # code...
        return $this->belongsTo(Jawaban::class, 'id_jawaban', 'id');
    }
}
