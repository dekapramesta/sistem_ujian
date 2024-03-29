<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'nama',
        'nip',
        'tanggal_lahir',
        'no_telp',
    ];

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class, 'mst_mapel_guru_kelas', 'id_guru', 'id_mapel');
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'mst_mapel_guru_kelas', 'id_guru', 'id_kelas');
    }

    public function headerujian()
    {
        # code...
        return $this->hasMany(HeaderUjian::class, 'id_gurus', 'id');
    }

    public function mst_mapel_guru_kelas()
    {
        # code...
        return $this->hasMany(mst_mapel_guru_kelas::class, 'id_gurus', 'id');
    }
}
