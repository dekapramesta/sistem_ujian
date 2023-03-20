<table>
    <thead>
        <tr>
            <th>soal</th>
            <th>soal_gambar</th>
            <th>pilihan_1</th>
            <th>pilihan_1_gambar</th>
            <th>pilihan_2</th>
            <th>pilihan_2_gambar</th>
            <th>pilihan_3</th>
            <th>pilihan_3_gambar</th>
            <th>pilihan_4</th>
            <th>pilihan_4_gambar</th>
            <th>jawaban</th>
            <th>jawaban_gambar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($soal as $sl)
            <tr>
                <td>{{ $sl->soal }}</td>
                <td>{{ $sl->soal_gambar }}</td>
                @foreach ($jawaban as $jwb)
                    @if ($jwb->id_soals == $sl->id)
                        @if ($jwb->status == 0)
                            <td>{{ $jwb->jawaban }}</td>
                            <td>{{ $jwb->jawaban_gambar }}</td>
                        @endif
                    @endif
                @endforeach
                @foreach ($jawaban as $jwb)
                    @if ($jwb->id_soals == $sl->id)
                        @if ($jwb->status == 1)
                            <td>{{ $jwb->jawaban }}</td>
                            <td>{{ $jwb->jawaban_gambar }}</td>
                        @endif
                    @endif
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
