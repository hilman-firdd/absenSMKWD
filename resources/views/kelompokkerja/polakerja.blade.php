@extends('template')
@section('title','Pola Kerja Kelompok Guru')

@section('content')

@include('validation')
@include('alert')
<div class="row">
    <div class="col-md-5">
        <form action="{{ route('simpanPolaKerja.simpanPolaKerja')}}" method="post">
            @csrf
            <input hidden type="text" name="kelompok_kerja_id" value="{{ $kelompokkerja->id }}">
            <table class="table table-bordered">
                <tr>
                    <td>Nama Kelompok</td>
                    <td>{{ $kelompokkerja->kelompok_kerja }}</td>
                </tr>
                <tr>
                    <td>Dari Tanggal</td>
                    <td><input type="date" name="dari_tanggal" class="form-control" placeholder="Dari Tanggal"></td>
                </tr>
                <tr>
                    <td>Sampai Tanggal</td>
                    <td><input type="date" name="sampai_tanggal" class="form-control" placeholder="Sampai Tanggal"></td>
                </tr>
                <tr>
                    <td>Pola Kerja</td>
                    <td><select name="pola_kerja" class="form-control" id="">
                            @foreach ($pola_kerja as $item)
                            <option value="{{ $item->id }}"> {{ $item->pola_kerja }}</option>
                            @endforeach
                        </select></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="/kelompokkerja" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="col-md-7">
        <table class="table table-bordered">
            <tr>
                <th>Tanggal</th>
                <th>Pola Kerja</th>
                <th>Masuk</th>
                <th>Pulang</th>
                <th>Delete</th>
            </tr>
            @foreach ($pola_kerja_kelompok as $item)
            <tr>
                <td>{{ date('l', strtotime($item->tanggal)) }}, {{ date_format(date_create($item->tanggal), "d - m -
                    Y");
                    }}</td>
                <td>{{ $item->pola_kerja }}</td>
                <td>{{ $item->jam_masuk }}</td>
                <td>{{ $item->jam_pulang }}</td>
                <td>
                    <form action="{{ route('hapus.hapusPolaKerja', $item->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </table>
        {{ $pola_kerja_kelompok->links('pagination::bootstrap-4')}}
    </div>
</div>


@endsection