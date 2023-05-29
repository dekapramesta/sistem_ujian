<table>
    <thead>
        <tr>
            <th>soal</th>
            <th>pilihan_1</th>
            <th>pilihan_2</th>
            <th>pilihan_3</th>
            <th>pilihan_4</th>
            <th>jawaban</th>
            <th>gambar_soal_jawaban</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($soal as $sl)
            <tr>
                <td>{{ $sl->soal }}</td>
                @foreach ($jawaban as $jwb)
                    @if ($jwb->id_soals == $sl->id)
                        @if ($jwb->status == 0)
                            <td>{{ $jwb->jawaban }}</td>
                        @endif
                    @endif
                @endforeach
                @foreach ($jawaban as $jwb)
                    @if ($jwb->id_soals == $sl->id)
                        @if ($jwb->status == 1)
                            <td>{{ $jwb->jawaban }}</td>
                        @endif
                    @endif
                @endforeach
                @php
                    $gambar_[$sl->id] = [];
                @endphp
                @foreach ($jawaban as $jwb)
                    @if ($jwb->id_soals == $sl->id)
                        @if ($sl->soal_gambar != null || $jwb->jawaban_gambar != null)
                            @php
                                array_push($gambar_[$sl->id], 1);
                            @endphp
                        @endif
                    @endif
                @endforeach
                @if (empty($gambar_[$sl->id]))
                @else
                    <td>1</td>
                @endif
                @if ($loop->first)
                    <td></td>
                    <td></td>
                    <td rowspan="4"
                        style="text-align: center;vertical-align: middle;background-color: #FFFF00;font-weight: bold;border: 5px solid black;">
                        Note :
                    </td>
                    <td colspan="5" rowspan="4"
                        style="word-wrap: break-word;text-align: center;vertical-align: middle;background-color: #FFFF00;font-weight: bold;border: 5px solid black;">
                        Jika ingin
                        menambahkan gambar pada
                        soal atau
                        jawaban isikan kolom
                        gambar_soal_jawaban dengan
                        angka "1"</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
