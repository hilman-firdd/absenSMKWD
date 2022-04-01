@extends('template')
@section('title','Edit Data Komponen Gaji')

@section('content')

@include('alert')
<div class="row">
    <div class="col-md-10">
        <form action="{{route('komponengaji.update', $data->kode_komponen)}}" method="POST">
            @method('PATCH')
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td width="200">Kode komponengaji</td>
                    <td><input type="text" name="kode_komponen" class="form-control" value="{{ $data->kode_komponen }}">
                    </td>
                </tr>
                <tr>
                    <td>Nama komponengaji</td>
                    <td><input type="text" name="nama_komponen" class="form-control" value="{{ $data->nama_komponen }}">
                    </td>
                </tr>
                <tr>
                    <td>Tunjangan komponen</td>
                    <td>
                        <select name="tunjangan_komponen" id="" class="form-control">
                            @if($data->jenis == 'tunjangan')
                            <option value="Tunjangan" selected>Tunjangan</option>
                            <option value="Potongan">Potongan</option>
                            @else
                            <option value="Potongan" selected>Potongan</option>
                            <option value="tunjangan">Tunjangan</option>
                            @endif
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nilai</td>
                    <td>
                        <input type="text" name="nilai" class="form-control" value="{{ $data->nilai }}">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Data</button>
                        <a href="/komponengaji" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


@endsection