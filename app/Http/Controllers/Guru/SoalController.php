<?php

namespace App\Http\Controllers\Guru;

use App\Models\Guru;
use App\Models\Soal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Ujian;
use App\Models\Jawaban;
use App\Models\Jenjang;
use App\Models\ThAkademik;
use App\Exports\SoalExport;
use App\Imports\SoalImport;
use App\Models\detail_soal;
use App\Models\DetailUjian;
use App\Models\HeaderUjian;
use App\Models\PesertaUjian;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\mst_mapel_guru_kelas;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Console\Input\Input;

class SoalController extends Controller
{
    public function index($id_mapels)
    {
        $id_mapels= $id_mapels;
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();

        $header_ujians = HeaderUjian::where('id_gurus', $guru->id)->get();

        $jenjang = Jenjang::whereHas('mst_mapel_guru_kelas', function ($query) {
            $user = Auth::user();
            $guru = Guru::where('id_user', $user->id)->first();
            return $query->where('id_gurus', $guru->id);
        })->get();

        $detail_ujian = DetailUjian::all();
        $soal = Soal::all();
        $jawaban = Jawaban::all();

        return view("Guru.soal", compact('jenjang', 'header_ujians', 'detail_ujian', 'id_mapels', 'soal', 'jawaban'));
    }

    public function uploadSoal(Request $request, $id_header_ujians, $id_mapels)
    {
        session()->flash('modal', 'tambah');
        session()->flash('id_header_ujians', $id_header_ujians);
        $request->validate([
            'file' => 'required',
        ], [
            'file.required' => 'File Soal Harus Diupload.',
        ]);
        Excel::import(new SoalImport($id_header_ujians), $request->file);

        $soal = Soal::where('id_headerujian', $id_header_ujians)->get();
        $jawaban = Jawaban::all();
        $tambah_gambar = [];
        foreach($soal as $sl) {
            foreach($jawaban as $jwb) {
                if($jwb->id_soals == $sl->id) {
                    if($jwb->jawaban_gambar == 1) {
                        array_push($tambah_gambar, $jwb->id_soals);
                    }
                }
            }
            if($sl->soal_gambar == 1) {
                array_push($tambah_gambar, $sl->id);
            }
        }
        if($tambah_gambar == null) {
            return redirect()->back();
        } else {
            return redirect()->route('guru.tambah_gambar', ['id_mapels' => $id_mapels, 'id_header_ujians' => $id_header_ujians]);
        }
    }

    public function exportSoal($id_header_ujians)
    {
        $header_ujians = HeaderUjian::where('id', $id_header_ujians)->first();
        $judul = $header_ujians->jadwal_ujian->mapel->nama_mapel . ' - Kelas ' .
        $header_ujians->jenjang->nama_jenjang . ' - '.
        $header_ujians->jadwal_ujian->jenis_ujian . ' - ' .
        $header_ujians->jadwal_ujian->th_akademiks->th_akademik . ' - Semester ' .
        $header_ujians->jadwal_ujian->th_akademiks->nama_semester;
        $judul = str_replace('/', '-', $judul);
        return Excel::download(new SoalExport($id_header_ujians), 'Soal '.$judul.'.xlsx');
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->image->move(public_path('img'), $name);

        return redirect()->back()->with('status', 'Image Has been uploaded');
    }

    public function tambah_gambar($id_mapels, $id_header_ujians)
    {
        $id_mapels = $id_mapels;
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
        $header_ujians = HeaderUjian::where('id', $id_header_ujians)->first();

        $soal = Soal::where('id_headerujian', $id_header_ujians)->get();
        $jawaban = Jawaban::all();
        $tambah_gambar = [];
        foreach($soal as $sl) {
            foreach($jawaban as $jwb) {
                if($jwb->id_soals == $sl->id) {
                    if($jwb->jawaban_gambar == 1) {
                        array_push($tambah_gambar, $jwb->id_soals);
                    }
                }
            }
            if($sl->soal_gambar == 1) {
                array_push($tambah_gambar, $sl->id);
            }
        }
        if($tambah_gambar == null) {
            return redirect()->route('guru.bank_soal', ['id_mapels' => $id_mapels]);
        } else {
            return view("Guru.tambah_gambar", compact('header_ujians', 'soal', 'jawaban', 'id_mapels'));
        }

    }

    public function edit_soal($id_mapels, $id_header_ujians)
    {
        $id_mapels = $id_mapels;
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
        $header_ujians = HeaderUjian::where('id', $id_header_ujians)->first();

        $soal = Soal::where('id_headerujian', $id_header_ujians)->paginate(10);
        $jawaban = Jawaban::all();

        return view("Guru.edit_soal", compact('header_ujians', 'soal', 'jawaban', 'id_mapels'));
    }

    public function lihat_soal($id_mapels, $id_header_ujians)
    {
        $id_mapels = $id_mapels;
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();
        $header_ujians = HeaderUjian::where('id', $id_header_ujians)->first();

        $soal = Soal::where('id_headerujian', $id_header_ujians)->paginate(10);
        $jawaban = Jawaban::all();

        return view("Guru.lihat_soal", compact('header_ujians', 'soal', 'jawaban', 'id_mapels'));
    }

    public function update_soal(Request $request, $id_soal)
    {
        $jawaban = Jawaban::where('id_soals', $id_soal)->get();
        if($request->soalgambar) {
            $namafile_gambarsoal = time() . '.' . $request->soalgambar->extension();
            $request->soalgambar->move(public_path('img/soal'), $namafile_gambarsoal);
            Soal::where('id', $id_soal)->update([
                'soal' => $request->soaltext,
                'soal_gambar' => $namafile_gambarsoal
            ]);
        } else {
            Soal::where('id', $id_soal)->update([
                'soal' => $request->soaltext,
            ]);
        }

        foreach ($jawaban as $jwb) {
            if ($request->status == $jwb->id) {
                $status = 1;
            } else {
                $status = 0;
            }
            if(isset($request->jawabangambar[$jwb->id])) {
                $namafile_gambarjawaban[$jwb->id] = uniqid() . '.' . $request->jawabangambar[$jwb->id]->extension();
                $request->jawabangambar[$jwb->id]->move(public_path('img/jawabans'), $namafile_gambarjawaban[$jwb->id]);
                Jawaban::where('id', $jwb->id)->update([
                    'jawaban' => $request->jawaban[$jwb->id],
                    'status'  => $status,
                    'jawaban_gambar' => $namafile_gambarjawaban[$jwb->id]
                ]);
            } else {
                Jawaban::where('id', $jwb->id)->update([
                    'jawaban' => $request->jawaban[$jwb->id],
                    'status'  => $status,
                ]);
            }

        }
        Alert::success('Berhasil', 'Berhasil Merubah Soal dan Jawaban');
        return redirect()->back();
    }

    public function selesai_upload_gambar($id_mapels, Request $request)
    {
        $array_id_soal = array_unique($request->input('array'));
        foreach ($array_id_soal as $idsl) {
            $jawaban = Jawaban::where('id_soals', $idsl)->get();
            Soal::where('id', $idsl)->where('soal_gambar', 1)->update([
                'soal_gambar' => null
            ]);

            foreach ($jawaban as $jwb) {
                Jawaban::where('id', $jwb->id)->where('jawaban_gambar', 1)->update([
                    'jawaban_gambar' => null
                ]);

            }
        }

        Alert::success('Berhasil', 'Berhasil Menambah Gambar Soal dan Jawaban');
        return redirect()->route('guru.bank_soal', ['id_mapels' => $id_mapels]);
    }

    public function delete_soal_gambar(Request $request)
    {
        if(file_exists(public_path('img/soal/'.$request->soal_gambar))) {
            unlink(public_path('img/soal/'.$request->soal_gambar));
        }
        $Soal = Soal::where('soal_gambar', $request->soal_gambar)->update([
            'soal_gambar' => 1
        ]);
        if($Soal) {
            return response()->json([
                'success' => true,
                'message' => 'Data Gambar Berhasil Dihapus!.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Menghapus Gambar',
            ]);
        }
    }

    public function delete_jawaban_gambar(Request $request)
    {
        if(file_exists(public_path('img/jawabans/'.$request->jawaban_gambar))) {
            unlink(public_path('img/jawabans/'.$request->jawaban_gambar));
        }
        $Jawaban = Jawaban::where('jawaban_gambar', $request->jawaban_gambar)->update([
            'jawaban_gambar' => 1
        ]);
        if($Jawaban) {
            return response()->json([
                'success' => true,
                'message' => 'Data Gambar Berhasil Dihapus!.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Menghapus Gambar',
            ]);
        }
    }

    public function konfirmasi_ujian(Request $request)
    {
        $HeaderUjian = HeaderUjian::where('id', $request->id_headerujian)->update([
            'status' => 1
        ]);
        $peserta_ujian = PesertaUjian::with('detailujian')->whereHas('detailujian', function ($query) use ($request) {
            return $query->where('id_headerujian', $request->id_headerujian);
        })->get();
        // $nis_peserta_ujian = [];
        foreach($peserta_ujian as $pst_uj) {
            $siswa = Siswa::where('nis', $pst_uj->nis)->first();
            // array_push($nis_peserta_ujian, $pst_uj->nis);
            Nilai::create([
                'id_ujian' => $request->id_headerujian,
                'id_siswa' => $siswa->id,
                'jumlah_benar' => 0,
                'jumlah_salah' => 0,
                'nilai' => 0,
                'identitas' => $pst_uj->nis,
            ]);
        }
        // return response()->json($nis_peserta_ujian, 200);
        if($HeaderUjian) {
            return response()->json([
                'success' => true,
                'message' => 'Data Ujian Berhasil Dikonfirmasi!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Mengkonfirmasi Ujian',
            ]);
        }
    }

    public function delete_soal($id_header_ujians)
    {
        $id_soals = Soal::where('id_headerujian', $id_header_ujians)->get();
        foreach ($id_soals as $idsl) {
            $jawaban = Jawaban::where('id_soals', $idsl->id)->get();
            foreach ($jawaban as $jwb) {
                if($jwb->jawaban_gambar != null && $jwb->jawaban_gambar != 1) {
                    unlink(public_path('img/jawabans/'.$jwb->jawaban_gambar));
                }
            }

            DB::table('jawabans')->where('id_soals', $idsl->id)->delete();
            if($idsl->soal_gambar != null && $idsl->soal_gambar != 1) {
                unlink(public_path('img/soal/'.$idsl->soal_gambar));
            }
        }
        DB::table('soals')->where('id_headerujian', $id_header_ujians)->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Soal');
        return redirect()->back();
    }
}
