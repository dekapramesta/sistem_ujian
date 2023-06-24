<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_jenjang',
        'id_kelas',
        'nama',
        'nis',
        'tanggal_lahir',
        'no_telp'
    ];

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class, 'id_jenjang', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_siswa', 'id');
    }
    public function temp()
    {
        return $this->hasMany(Temp::class, 'id_siswa', 'id');
    }
}
