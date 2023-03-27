<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaUjian extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'id_detail_ujians',
        'status'
    ];
    public function detailujian()
    {
        # code...
        return $this->belongsTo(DetailUjian::class, 'id_detail_ujians', 'id');
    }
    public function siswa()
    {
        # code...
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }
}
