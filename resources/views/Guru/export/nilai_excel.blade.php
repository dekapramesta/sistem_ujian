<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIS</th>
            <th>Jawaban Benar</th>
            <th>Jawaban Salah</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['data'] as $nilai)
            <tr>
                <td>{{ $nilai->siswa->nama }}</td>
                <td>{{ $nilai->siswa->nis }}</td>
                <td>{{ $nilai->jumlah_benar }}</td>
                <td>{{ $nilai->jumlah_salah }}</td>
                <td>{{ $nilai->nilai }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
