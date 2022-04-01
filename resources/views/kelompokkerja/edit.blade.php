@extends('template')
@section('title','Edit Data Kelompok Kerja')

@section('content')

@include('alert')
<div class="row">
    <div class="col-md-10">
        <form action="{{route('kelompokkerja.update', $data->id)}}" method="POST">
            @method('PATCH')
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td>Nama Kelompok Kerja</td>
                    <td><input type="text" name="nama_kelompokkerja" class="form-control"
                            value="{{ $data->kelompok_kerja }}">
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
                        <a href="/kelompokkerja" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


@endsection