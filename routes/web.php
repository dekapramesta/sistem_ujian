<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DataNilaiController as AdminDataNilaiController;
use App\Http\Controllers\Admin\ThAkademikController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\JadwalUjian;
use App\Http\Controllers\Admin\ProfilController as AdminProfilController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\UjianController;
use App\Http\Controllers\Guru\DataNilaiController;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Guru\GuruHomeController;
use App\Http\Controllers\Guru\ProfilController;
use App\Http\Controllers\Guru\SoalController as BankSoalController;
use App\Http\Controllers\Siswa\ProfilController as SiswaProfilController;
use App\Http\Controllers\Siswa\SiswaController as SiswaSiswaController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.view');
Route::post('login', [AuthController::class, 'LoginAction'])->name('login.action');
Route::get('kirim-otp', [AuthController::class, 'kirimOtp'])->name('login.kirim.otp');
Route::post('verifikasi-otp', [AuthController::class, 'verifikasiOtp'])->name('login.verifikasi.otp');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('login.password.reset');
Route::post('save-password', [AuthController::class, 'savePassword'])->name('login.password.save');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'levelAcces:admin'])->group(
    function () {
        Route::prefix('admin')->group(
            function () {
                Route::get('admin', [AdminController::class, 'index'])->name('admin.dashboard');

                Route::post('monitoring', [AdminController::class, 'getMonitoring'])->name('admin.moniotring');
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
                Route::post('kelas/update-naik', [KelasController::class, 'updateSiswa'])->name('admin.updatenaik');

                Route::get('guru', [GuruController::class, 'index'])->name('admin.guru');
                Route::post('guru', [GuruController::class, 'create'])->name('admin.guru.create');
                Route::post('guru/edit', [GuruController::class, 'edit'])->name('admin.guru.edit');
                Route::delete('guru/{nip}', [GuruController::class, 'delete'])->name('admin.guru.delete');


                Route::get('siswa', [SiswaController::class, 'index'])->name('admin.siswa');
                Route::post('siswa', [SiswaController::class, 'create'])->name('admin.siswa.create');
                Route::put('siswa/{nis}', [SiswaController::class, 'edit'])->name('admin.siswa.edit');
                Route::delete('siswa/{nis}', [SiswaController::class, 'delete'])->name('admin.siswa.delete');

                Route::get('jadwalujian', [JadwalUjian::class, 'index'])->name('jadwal.ujian');
                Route::get('add/jadwalujian', [JadwalUjian::class, 'AddJadwalUjian'])->name('add.ujian');
                Route::get('edit/jadwalujian/{id}', [JadwalUjian::class, 'editJadwal'])->name('edit.ujian');
                Route::get('delete/jadwalujian/{id}', [JadwalUjian::class, 'deleteUjian'])->name('delete.ujian');

                Route::get('profil', [AdminProfilController::class, 'index'])->name('admin.profil');
                Route::post('profil/edit_profil', [AdminProfilController::class, 'edit_profil'])->name('admin.edit_profil');
                Route::post('profil/edit_password', [AdminProfilController::class, 'edit_password'])->name('admin.edit_password');
                Route::post('profil/hapus_foto_profil', [AdminProfilController::class, 'delete_foto_profil'])->name('admin.delete_foto_profil');

                Route::get('nilai', [AdminDataNilaiController::class, 'index'])->name('admin.data_nilai');
                Route::match(['get', 'post'], 'nilai/hasil', [AdminDataNilaiController::class, 'hasil_cari'])->name('admin.hasil_cari');
                Route::get('nilai/hasil/export/{id_header_ujians}', [AdminDataNilaiController::class, 'exportNilai'])->name('admin.nilai_export');
                Route::get('contoh', [AdminDataNilaiController::class, 'contoh'])->name('admin.contoh');
            }
        );
    }
);

// Route::group(['middleware' => ['role:admin']], function () {
// });
//Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

Route::middleware(['auth', 'levelAcces:guru'])->group(
    function () {
        Route::group(['prefix' => 'guru/'], function () {

            Route::get('aktivasi', [GuruHomeController::class, 'aktivasi'])->name('guru.aktivasi');
            Route::post('aktivasi_guru', [GuruHomeController::class, 'aktivasi_guru'])->name('guru.aktivasi_guru');
            Route::get('mapel', [GuruHomeController::class, 'mapel'])->name('guru.mapel');

            Route::get('dashboard/{id_mapels}', [GuruHomeController::class, 'index'])->name('guru.dashboard');
            Route::post('monitoring', [GuruHomeController::class, 'getMonitoring'])->name('guru.moniotring');

            Route::get('bank_soal/{id_mapels}', [BankSoalController::class, 'index'])->name('guru.bank_soal');
            Route::get('/bank_soal/lihat_soal/{id_mapels}/{id_header_ujians}', [BankSoalController::class, 'lihat_soal'])->name('guru.lihat_soal');
            Route::post('bank_soal/konfirmasi_ujian', [BankSoalController::class, 'konfirmasi_ujian'])->name('guru.konfirmasi_ujian');
            Route::get('/bank_soal/edit_soal/{id_mapels}/{id_header_ujians}', [BankSoalController::class, 'edit_soal'])->name('guru.edit_soal');
            Route::get('/bank_soal/tambah_gambar/{id_mapels}/{id_header_ujians}', [BankSoalController::class, 'tambah_gambar'])->name('guru.tambah_gambar');
            Route::post('/bank_soal/edit_soal/soal/{id_soal}', [BankSoalController::class, 'update_soal'])->name('guru.update_soal');
            Route::post('/bank_soal/edit_soal/hapus_gambar', [BankSoalController::class, 'delete_soal_gambar'])->name('guru.delete_soal_gambar');
            Route::post('/bank_soal/edit_soal/hapus_gambar_jawaban', [BankSoalController::class, 'delete_jawaban_gambar'])->name('guru.delete_jawaban_gambar');
            Route::post('/bank_soal/edit_soal/selesai_upload_gambar/{id_mapels}', [BankSoalController::class, 'selesai_upload_gambar'])->name('guru.selesai_upload_gambar');
            Route::delete('/bank_soal/hapus_soal/{id_header_ujians}', [BankSoalController::class, 'delete_soal'])->name('guru.delete_soal');
            Route::post('soal/{id_header_ujians}/{id_mapels}', [BankSoalController::class, 'uploadSoal'])->name('soal.create');
            Route::get('soal/{id_header_ujians}', [BankSoalController::class, 'exportSoal'])->name('soal.export');
            Route::post('poto', [BankSoalController::class, 'save'])->name('poto.create');

            Route::get('data_nilai/{id_mapels}', [DataNilaiController::class, 'index'])->name('guru.data_nilai');
            Route::match(['get', 'post'], 'data_nilai/hasil/{id_mapels}', [DataNilaiController::class, 'hasil_cari'])->name('guru.hasil_cari');
            Route::get('data_nilai/hasil/export/{id_header_ujians}', [DataNilaiController::class, 'exportNilai'])->name('nilai.export');

            Route::get('profil', [ProfilController::class, 'index'])->name('guru.profil');
            Route::post('profil/edit_profil', [ProfilController::class, 'edit_profil'])->name('guru.edit_profil');
            Route::post('profil/edit_password', [ProfilController::class, 'edit_password'])->name('guru.edit_password');
            Route::post('profil/hapus_foto_profil', [ProfilController::class, 'delete_foto_profil'])->name('guru.delete_foto_profil');
        });
    }
);


Route::middleware(['auth', 'levelAcces:siswa'])->group(
    function () {
        Route::group(['prefix' => 'siswa/'], function () {
            Route::get('aktivasi', [SiswaSiswaController::class, 'aktivasi'])->name('siswa.aktivasi');
            Route::post('aktivasi_siswa', [SiswaSiswaController::class, 'aktivasi_siswa'])->name('siswa.aktivasi_siswa');
            Route::get('dashboard', [App\Http\Controllers\Siswa\SiswaController::class, 'index'])->name('siswa.dashboard');
            Route::get('slicing', [App\Http\Controllers\Siswa\SiswaController::class, 'slicing'])->name('siswa.slicing');
            Route::get('slicing_fix', [App\Http\Controllers\Siswa\SiswaController::class, 'slicing_fix'])->name('siswa.slicing_fix');
            Route::get('/ujian-preview/{id}', [App\Http\Controllers\Siswa\SiswaController::class, 'previewUjian'])->name('ujian.preview');

            Route::get('profil', [SiswaProfilController::class, 'index'])->name('siswa.profil');
            Route::post('profil/edit_profil', [SiswaProfilController::class, 'edit_profil'])->name('siswa.edit_profil');
            Route::post('profil/edit_password', [SiswaProfilController::class, 'edit_password'])->name('siswa.edit_password');
            Route::post('profil/hapus_foto_profil', [SiswaProfilController::class, 'delete_foto_profil'])->name('siswa.delete_foto_profil');
        });
        Route::group(['prefix' => 'ujian/'], function () {
            Route::get('slicing_fix/{id}', [App\Http\Controllers\Siswa\SiswaController::class, 'slicing_fix'])->name('siswa.slicing_fix');
            Route::get('start/{id}', [App\Http\Controllers\Siswa\SiswaController::class, 'ujian'])->name('siswa.ujian');
            Route::post('/ujian-berlangsung', [App\Http\Controllers\Siswa\SiswaController::class, 'getTemp'])->name('ujian.getTemp');
            Route::post('/ujian-berakhir', [App\Http\Controllers\Siswa\SiswaController::class, 'getTime'])->name('ujian.getTime');
            Route::post('/ujian-soal', [App\Http\Controllers\Siswa\SiswaController::class, 'getSoal'])->name('ujian.getSoal');
            Route::post('/ujian-jawab', [App\Http\Controllers\Siswa\SiswaController::class, 'postJawaban'])->name('ujian.postjawaban');
            Route::post('/ujian-selesai', [App\Http\Controllers\Siswa\SiswaController::class, 'ujianEnd'])->name('ujian.selesai');
        });
    }
);

//Route::group(['middleware' => ['role:admin']], function () {
// Route::get('/guru', [App\Http\Controllers\Guru\GuruHomeController::class, 'index'])->name('guru.dashboard');
// Route::get('/siswa', [App\Http\Controllers\Siswa\SiswaController::class, 'index'])->name('siswa');
