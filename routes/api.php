<?php

use App\Http\Controllers\Admin\JadwalUjian;
use App\Http\Controllers\Api\AdminApi as ApiAdminApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('siswa', [ApiAdminApi::class, 'getSiswa'])->name('api.getsiswa');
Route::post('siswaKelas', [ApiAdminApi::class, 'getKelasWithSiswa'])->name('api.getsiswaKelas');
Route::post('kelas', [ApiAdminApi::class, 'getSiswaByKelas'])->name('api.getkelas');
Route::post('getkelas', [ApiAdminApi::class, 'getKelas'])->name('api.getkelasmapel');
Route::post('getsiswa', [ApiAdminApi::class, 'getSiswaMapel'])->name('api.getsiswamapel');
Route::post('ujian', [JadwalUjian::class, 'postUjian'])->name('api.postujian');
Route::post('siswa-get', [ApiAdminApi::class, 'getSiswaById'])->name('api.siswaget');
