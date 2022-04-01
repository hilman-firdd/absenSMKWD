@extends('template')
@section('title','Edit Data kalender Kerja')

@section('content')

@include('alert')
<div class="row">
    <div class="col-md-10">
        <form action="{{route('kalenderKerja.update', $data->id)}}" method="POST">
            @method('PATCH')
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td width="100">Tanggal</td>
                    <td><input type="date" name="tanggal" class="form-control" value="{{ $data->tanggal }}">
                    </td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td><input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}">
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