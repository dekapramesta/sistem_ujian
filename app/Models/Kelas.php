<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_jurusan',
        'nama_kelas',
        'identitas',
    ];

    protected $primaryKey = 'id';

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class, 'mst_mapel_guru_kelas', 'id_kelas', 'id_mapel');
    }

    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'mst_mapel_guru_kelas', 'id_kelas', 'id_guru');
    }
}
