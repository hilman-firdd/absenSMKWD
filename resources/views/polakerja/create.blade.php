@extends('template')
@section('title','Create Data Pola Kerja')

@section('content')

@include('validation')
<div class="row">
    <div class="col-md-10">
        <form action="{{ route('polakerja.store') }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td>Nama Pola Kerja</td>
                    <td><input type="text" name="nama_polakerja" class="form-control" placeholder="Nama Pola Kerja">
                    </td>
                </tr>
                <tr>
                    <td>Jam Masuk & Jam Pulang</td>
                    <td>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="jam_masuk" class="form-control" placeholder="Ex : 08:00">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="jam_pulang" class="form-control" placeholder="Ex : 16:00">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Data</button>
                        <a href="/polakerja" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


@endsection