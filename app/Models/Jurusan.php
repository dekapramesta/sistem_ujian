<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_jurusan',
        'identitas',
    ];

    protected $primaryKey = 'id';
    public function kelas()
    {
        # code...
        return $this->hasMany(Kelas::class, 'id_jurusan', 'id');
    }
}
