<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruHomeController extends Controller
{
    public function index() {
        return view("userguru.guru_home");
    }
}
