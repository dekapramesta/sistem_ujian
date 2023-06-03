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
Route::post('edit-ujian', [ApiAdminApi::class, 'editJadwal'])->name('api.editujian');
Route::post('post-edit-ujian', [ApiAdminApi::class, 'postUjianEd'])->name('api.ujianEdPost');
Route::post('siswa-get', [ApiAdminApi::class, 'getSiswaById'])->name('api.siswaget');

Route::post('getujian', [ApiAdminApi::class, 'getUjian'])->name('api.getujian');


Route::post('get_detailujian', [ApiAdminApi::class, 'get_detailujian'])->name('api.get_detailujian');
Route::post('get_mapelhasil', [ApiAdminApi::class, 'get_mapelhasil'])->name('api.get_mapelhasil');
Route::post('get_headerhasil', [ApiAdminApi::class, 'get_headerhasil'])->name('api.get_headerhasil');
Route::post('get_nilaihasil', [ApiAdminApi::class, 'get_nilaihasil'])->name('api.get_nilaihasil');
