<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengampu extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_guru',
        'id_mapel'
    ];

    protected $primaryKey = 'id';

    public function guru(){
        return $this->belongsTo(User::class, 'id_guru', 'id');
    }

    public function mapel(){
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id');
    }
}
