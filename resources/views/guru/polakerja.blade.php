@extends('template')
@section('title','Pola Kerja Guru')

@section('content')

@include('validation')
@include('alert')

@include('guru.tab')
<div class="row m-2">
    <div class="col-md-4">
        <table class="table table-bordered">
            <tr>
                <td><img src="{{ asset('uploads/'.$guru->foto)}}" alt="" width="300"></td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="col-md-8">
        <table class="table table-bordered">
            <tr>
                <td>Filter Laporan</td>
                <td>
                    <select name="bulan" id="" class="form-control">
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                    </select>
                </td>
                <td>
                    <select name="tahun" id="" class="form-control">
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                </td>
                <td>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-eye"></i> Tampilkan</button>
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Tanggal</th>
                <th>Pola Kerja</th>
                <th>Jam Masuk</th>
                <th>Jam Pulang</th>
            </tr>
            @foreach ($polaKerjaGuru as $item)
            <tr>
                <td>{{ date('l', strtotime($item->tanggal)) }}, {{ date_format(date_create($item->tanggal), "d - m -
                    Y");
                    }}</td>
                <td>{{ $item->pola_kerja }}</td>
                <td>{{ $item->jam_masuk }}</td>
                <td>{{ $item->jam_pulang }}</td>
            </tr>
            @endforeach
        </table>
        {{ $polaKerjaGuru->links('pagination::bootstrap-4')}}
    </div>



</div>


@endsection