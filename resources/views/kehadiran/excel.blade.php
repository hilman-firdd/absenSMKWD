<table>
    <thead>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Pola Kerja</th>
            <th>Jam Masuk</th>
            <th>Jam Pulang</th>
            <th>Absen Masuk</th>
            <th>Absen Pulang</th>
        </tr>
    </thead>
    <tbody>
        @foreach($riwayatKehadiran as $item)
        <tr>
            <td>{{ $item->nik }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->pola_kerja }}</td>
            <td>{{ $item->jam_masuk }}</td>
            <td>{{ $item->jam_pulang }}</td>
            <td>{{ $item->tanggal_masuk }}</td>
            <td>{{ $item->tanggal_pulang }}</td>
        </tr>
        @endforeach
    </tbody>
</table>