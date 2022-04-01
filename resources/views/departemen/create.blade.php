@extends('template')
@section('title','Create Data Departemen')

@section('content')

@include('validation')
<div class="row">
    <div class="col-md-10">
        <form action="{{ route('departemen.store') }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td width="200">Kode Departemen</td>
                    <td><input type="text" name="kode_departemen" class="form-control" placeholder="Kode Departemen">
                    </td>
                </tr>
                <tr>
                    <td>Nama Departemen</td>
                    <td><input type="text" name="nama_departemen" class="form-control" placeholder="Nama Departemen">
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