<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataNilaiController extends Controller
{
    public function index()
    {
        return view('Guru.data_nilai');
    }
}
