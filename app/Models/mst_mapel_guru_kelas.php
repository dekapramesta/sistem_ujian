<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mst_mapel_guru_kelas extends Model
{
    use HasFactory;
    protected $table = 'mst_mapel_guru_kelas';
    protected $fillable = [
        'id_mapels',
        'id_gurus',
        'id_jenjang',
        'id_kelas',

    ];
    public $timestamps = false;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapels', 'id');
    }
    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class, 'id_jenjang', 'id');
    }
}
