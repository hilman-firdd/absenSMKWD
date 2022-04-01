@extends('template')
@section('title','Create Data Kalender Kerja')

@section('content')

@include('validation')
<div class="row">
    <div class="col-md-10">
        <form action="{{ route('kalenderKerja.store') }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td width="200">Tanggal</td>
                    <td><input type="date" name="tanggal" class="form-control" placeholder="Tanggal"></td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td><input type="text" name="keterangan" class="form-control" placeholder="Keterangan hari libur">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Data</button>
                        <a href="/kalenderKerja" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


@endsection