<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\DetailUjian;
use App\Models\Siswa;
use App\Models\Soal;
use App\Models\Temp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::where('id_user', Auth::user()->id)->first();
        $ujian = DetailUjian::with('headerujian.jadwal_ujian.mapel')->whereHas('siswa', function ($query) use ($data) {
            return $query->where('id', $data->id);
        })->get();
        // dd($ujian);
        return view("siswa.siswa_home", compact('ujian'));
    }
    public function ujian()
    {
        # code...


        return view("siswa.ujian");
    }

    public function getTemp(Request $request)
    {
        # code...
        $ujian = Soal::with('jawaban')->where('id_headerujian', $request->id)->get();
        // return response()->json(['data' => $ujian], 200);

        $siswa = Siswa::where('id_user', Auth::user()->id)->first();
        $temp = Temp::where([['id_headerujian', $ujian[0]->id_headerujian], ['id_siswa', $siswa->id]])->get();

        if ($temp->isEmpty()) {
            $this->shuffleFisher(new Request(['data_ujian' => $ujian, 'siswa' => $siswa]));
            $temp = Temp::where([['id_headerujian', $ujian[0]->id_headerujian], ['id_siswa', $siswa->id]])->get();
        }
        return response()->json(['data' => $temp], 200);
    }
    public function getSoal(Request $request)
    {
        # code...

        $data = Temp::with('soal.jawaban')->where('id', $request->id)->first();
        return response()->json(['data' => $data], 200);
    }
    public function shuffleFisher(Request $request)
    {
        # code...
        $arr_soal = $request->data_ujian;
        for ($i = count($arr_soal) - 1; $i > 0; $i--) {
            $r = rand(0, $i);
            $tmp = $arr_soal[$i];
            $arr_soal[$i] = $arr_soal[$r];
            $arr_soal[$r] = $tmp;
        }
        foreach ($arr_soal as $uj) {
            Temp::create([
                'id_headerujian' => $uj->id_headerujian,
                'id_soals' => $uj->id,
                'id_siswa' => $request->siswa->id
            ]);
        }
    }
}
