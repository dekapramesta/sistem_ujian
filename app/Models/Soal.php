<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mst_mapel_guru_kelas',
        'token',

    ];
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id');
    }
}
