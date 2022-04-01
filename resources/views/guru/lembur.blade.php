@extends('template')
@section('title','Riwayat lembur Guru')

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
        <table class="table table-bordered ">
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
                <th>Tanggal Masuk</th>
                <th>Tanggal Pulang</th>
                <th>Durasi Lembur</th>
                <th>Hapus</th>
            </tr>
            @foreach ($riwayatLembur as $item)
            <tr>
                <td>{{ $item->tanggal_masuk }}</td>
                <td>{{ $item->tanggal_pulang }}</td>
                <td>{{ $item->durasi_Lembur }}</td>
                <td width="70">
                    <form action="{{ route('hapusLembur.destroy', ['id'=>$item->id, 'url'=>'guru']) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>

                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $riwayatLembur->links('pagination::bootstrap-4')}}
    </div>



</div>


@endsection