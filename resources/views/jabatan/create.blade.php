@extends('template')
@section('title','Create Data jabatan')

@section('content')

@include('validation')
<div class="row">
    <div class="col-md-10">
        <form action="{{ route('jabatan.store') }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td width="200">Kode Jabatan</td>
                    <td><input type="text" name="kode_jabatan" class="form-control" placeholder="Kode jabatan"></td>
                </tr>
                <tr>
                    <td>Nama Jabatan</td>
                    <td><input type="text" name="nama_jabatan" class="form-control" placeholder="Nama jabatan"></td>
                </tr>
                <tr>
                    <td>Tunjangan Jabatan</td>
                    <td><input type="text" name="tunjangan_jabatan" class="form-control"
                            placeholder="Tunjangan jabatan"></td>
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