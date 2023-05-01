<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\DetailUjian;
use App\Models\HeaderUjian;
use App\Models\Nilai;
use App\Models\PesertaUjian;
use App\Models\Siswa;
use App\Models\Soal;
use App\Models\Temp;
use DateTime;
use GuzzleHttp\Psr7\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::where('id_user', Auth::user()->id)->first();
        $ujian = PesertaUjian::where('nis', $data->nis)->get();
        $nilai = Nilai::where('id_siswa', $data->id)->get();
        // $ujian = PesertaUjian::with('detailujian.headerujian.jadwal_ujian.mapel')->whereHas('peserta', function ($query) use ($data) {
        //     return $query->where('id', $data->id);
        // })->get();
        // dd($ujian);

        // dd($ujian);
        return view("siswa.siswa_home", compact('ujian', 'nilai'));
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
            $this->shuffleFisher(new Request(['data_ujian' => $ujian, 'siswa' => $siswa, 'total' => $ujian[0]->headerujian->jumlah_soal]));
            $temp = Temp::where([['id_headerujian', $ujian[0]->id_headerujian], ['id_siswa', $siswa->id]])->get();
        }
        return response()->json(['data' => $temp], 200);
    }
    public function getTime(Request $request)
    {
        # code...
        $ujian = DetailUjian::where('id_headerujian', $request->id)->first();
        // return response()->json(['data' => $ujian], 200);
        $endTime = date('M d,Y H:i:s', strtotime('+' . $ujian->waktu_ujian . 'minutes', strtotime($ujian->tanggal_ujian)));
        // $endTime = date("H:i:s", strtotime('+30 minutes', $ujian->tanggal_ujian));
        $currentTime = date('Y:m:d H:i:s', time());
        $first  = new DateTime($currentTime);
        $second = new DateTime($endTime);

        $diff = $first->diff($second);
        $time_gap = $diff->format('%H:%I:%S');
        $milliseconds = strtotime($time_gap) * 1000;
        return response()->json(['time' => $milliseconds, 'jam' => $time_gap, 'end_time' => $endTime], 200);
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

        for ($ind = 0; $ind < $request->total; $ind++) {
            Temp::create([
                'id_headerujian' => $arr_soal[$ind]->id_headerujian,
                'id_soals' => $arr_soal[$ind]->id,
                'id_siswa' => $request->siswa->id
            ]);
        }
    }

    public function postJawaban(Request $request)
    {
        # code...
        $temp = Temp::find($request->id_temp);
        $temp->id_jawaban = $request->id_jawaban;
        $temp->save();
        return response()->json(['msg' => "success"], 201);
    }

    public function ujianEnd(Request $request)
    {
        # code...
        $siswa = Siswa::where('id_user', Auth::user()->id)->first();
        $temp = Temp::with('jawaban')->where([['id_siswa', '=', $siswa->id], ['id_headerujian', '=', $request->headerujian]])->get();
        $jawaban = [];
        $jawaban_benar = 0;
        $jawaban_salah = 0;
        $detail_ujian = DetailUjian::with('headerujian')->where([['id_headerujian', '=', $request->headerujian], ['id_kelas', '=', $siswa->id_kelas]])->first();
        foreach ($temp as $tmp) {
            array_push($jawaban, $tmp->jawaban);
            if ($tmp->id_jawaban != null) {

                if ($tmp->jawaban->status == true) {
                    $jawaban_benar += 1;
                } else {
                    $jawaban_salah += 1;
                }
            } else {
                $jawaban_salah += 1;
            }
        }
        $nilai = ($jawaban_benar / $detail_ujian->headerujian->jumlah_soal) * 100;
        Nilai::create([
            'id_ujian' => $request->headerujian,
            'id_siswa' => $siswa->id,
            'jumlah_benar' => $jawaban_benar,
            'jumlah_salah' => $jawaban_salah,
            'nilai' => round($nilai, 2),
            'identitas' => $siswa->nis
        ]);
        $pesertaujian = PesertaUjian::where([['id_detail_ujians', '=', $detail_ujian->id], ['nis', '=', $siswa->nis]])->first();
        $pesertaujian->status = 1;
        $pesertaujian->save();
        return redirect()->route('siswa.dashboard');
        // dd($jawaban);
    }
}
