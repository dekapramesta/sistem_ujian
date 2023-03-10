<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ThAkademikController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\UjianController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Guru\GuruHomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.view');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('login', [LoginController::class, 'LoginAction'])->name('login.action');
Route::middleware(['auth', 'levelAcces:admin'])->group(
    function () {
        Route::get('admin', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::prefix('admin')->group(
            function () {

                Route::get('th_akademik', [ThAkademikController::class, 'index'])->name('admin.th_akademik');
                Route::post('th_akademik', [ThAkademikController::class, 'create'])->name('admin.th_akademik.create');
                Route::put('th_akademik/{identitas}', [ThAkademikController::class, 'edit'])->name('admin.th_akademik.edit');
                Route::delete('th_akademik/{identitas}', [ThAkademikController::class, 'delete'])->name('admin.th_akademik.delete');

                Route::get('jurusan', [JurusanController::class, 'index'])->name('admin.jurusan');
                Route::post('jurusan', [JurusanController::class, 'create'])->name('admin.jurusan.create');
                Route::put('jurusan/{identitas}', [JurusanController::class, 'edit'])->name('admin.jurusan.edit');
                Route::delete('jurusan/{identitas}', [JurusanController::class, 'delete'])->name('admin.jurusan.delete');

                Route::get('mapel', [MapelController::class, 'index'])->name('admin.mapel');
                Route::post('mapel', [MapelController::class, 'create'])->name('admin.mapel.create');
                Route::put('mapel/{identitas}', [MapelController::class, 'edit'])->name('admin.mapel.edit');
                Route::delete('mapel/{identitas}', [MapelController::class, 'delete'])->name('admin.mapel.delete');

                Route::get('kelas', [KelasController::class, 'index'])->name('admin.kelas');
                Route::post('kelas', [KelasController::class, 'create'])->name('admin.kelas.create');
                Route::put('kelas/{identitas}', [KelasController::class, 'edit'])->name('admin.kelas.edit');
                Route::delete('kelas/{identitas}', [KelasController::class, 'delete'])->name('admin.kelas.delete');

                Route::get('guru', [GuruController::class, 'index'])->name('admin.guru');
                Route::post('guru', [GuruController::class, 'create'])->name('admin.guru.create');
                Route::put('guru/{nip}', [GuruController::class, 'edit'])->name('admin.guru.edit');
                Route::delete('guru/{nip}', [GuruController::class, 'delete'])->name('admin.guru.delete');


                Route::get('siswa', [SiswaController::class, 'index'])->name('admin.siswa');
                Route::post('siswa', [SiswaController::class, 'create'])->name('admin.siswa.create');
                Route::put('siswa/{nis}', [SiswaController::class, 'edit'])->name('admin.siswa.edit');
                Route::delete('siswa/{nis}', [SiswaController::class, 'delete'])->name('admin.siswa.delete');

                Route::get('ujian', [UjianController::class, 'index'])->name('admin.ujian');
                Route::post('ujian', [UjianController::class, 'create'])->name('admin.ujian.create');
                Route::put('ujian/{identitas}', [UjianController::class, 'edit'])->name('admin.ujian.edit');
                Route::delete('ujian/{identitas}', [UjianController::class, 'delete'])->name('admin.ujian.delete');


                //});
                //Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
                Route::get('userguru', [AdminController::class, 'index'])->name('guru.dashboard');
            }
        );
    }
);


//Route::group(['middleware' => ['role:admin']], function () {



//Route::group(['middleware' => ['role:admin']], function () {
// Route::get('/guru', [App\Http\Controllers\Guru\GuruHomeController::class, 'index'])->name('guru');
// Route::get('/siswa', [App\Http\Controllers\Siswa\SiswaController::class, 'index'])->name('siswa');
