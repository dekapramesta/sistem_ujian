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
        'tanggal_lahir'
    ];

    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
