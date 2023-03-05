<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaUjian extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'id_detail_ujians'
    ];
}
