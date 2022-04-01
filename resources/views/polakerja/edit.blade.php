@extends('template')
@section('title','Edit Data Pola Kerja')

@section('content')

@include('alert')
<div class="row">
    <div class="col-md-10">
        <form action="{{route('polakerja.update', $data->id)}}" method="POST">
            @method('PATCH')
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td>Nama Pola Kerja</td>
                    <td><input type="text" name="nama_polakerja" class="form-control" value="{{ $data->pola_kerja }}">
                    </td>
                </tr>
                <tr>
                    <td>Jam Masuk & Jam Pulang</td>
                    <td>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="jam_masuk" class="form-control" value="{{ $data->jam_masuk }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="jam_pulang" class="form-control"
                                    value="{{ $data->jam_pulang }}">
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