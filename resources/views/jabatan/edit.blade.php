@extends('template')
@section('title','Edit Data jabatan')

@section('content')

@include('alert')
<div class="row">
    <div class="col-md-10">
        <form action="{{route('jabatan.update', $data->kode_jabatan)}}" method="POST">
            @method('PATCH')
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td width="200">Kode jabatan</td>
                    <td><input type="text" name="kode_jabatan" class="form-control" value="{{ $data->kode_jabatan }}">
                    </td>
                </tr>
                <tr>
                    <td>Nama jabatan</td>
                    <td><input type="text" name="nama_jabatan" class="form-control" value="{{ $data->nama_jabatan }}">
                    </td>
                </tr>
                <tr>
                    <td>Tunjangan Jabatan</td>
                    <td><input type="text" name="tunjangan_jabatan" class="form-control"
                            value="{{ $data->tunjangan_jabatan }}">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Data</button>
                        <a href="/jabatan" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


@endsection