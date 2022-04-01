@extends('template')
@section('title','Create Data Kelompok Kerja')

@section('content')

@include('validation')
<form action="{{ route('kelompokkerja.store') }}" method="POST">
    @csrf
    <table class="table table-bordered">
        <tr>
            <td>Nama Kelompok Kerja</td>
            <td>
                <input type="text" name="nama_kelompokkerja" class="form-control" placeholder="Nama Kelompok Kerja">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Data</button>
                <a href="/kelompokkerja" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
            </td>
        </tr>
    </table>
</form>

@endsection