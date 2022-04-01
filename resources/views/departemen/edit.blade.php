@extends('template')
@section('title','Edit Data Departemen')

@section('content')

@include('alert')
<div class="row">
    <div class="col-md-10">
        <form action="{{route('departemen.update', $data->kode_departemen)}}" method="POST">
            @method('PATCH')
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td width="200">Kode Departemen</td>
                    <td><input type="text" name="kode_departemen" class="form-control"
                            value="{{ $data->kode_departemen }}">
                    </td>
                </tr>
                <tr>
                    <td>Nama Departemen</td>
                    <td><input type="text" name="nama_departemen" class="form-control"
                            value="{{ $data->nama_departemen }}">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Data</button>
                        <a href="/departemen" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


@endsection