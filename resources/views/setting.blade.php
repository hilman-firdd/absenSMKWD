@extends('template')
@section('title','Create Data jabatan')

@section('content')

@include('validation')
@include('alert')
<div class="row">
    <div class="col-md-8">
        <form action="{{ route('setting.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td width="200">Nama Perusahaan</td>
                    <td><input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan"
                            value="{{ $setting->nama_perusahaan }}"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat_perusahaan" class="form-control" placeholder="Alamat Perusahaan"
                            value="{{ $setting->alamat_perusahaan }}"></td>
                </tr>
                <tr>
                    <td>Email & Telepon</td>
                    <td>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="email"
                                    value="{{ $setting->email }}">
                            </div>
                            <div class="col-md-6">
                                <input type="telp" name="no_telepon" class="form-control" placeholder="telepon"
                                    value="{{ $setting->no_telepon }}">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="btn btn-success"><i class="fas fa-save"></i>
                            Simpan Data</button>
                        <a href="/guru" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
                    </td>
                </tr>
            </table>

    </div>
    <div class="col-md-4">
        <table class="table table-bordered">
            <tr>
                <td>
                    <img src="{{ asset('uploads/'.$setting->logo.'')}}" width="300" alt="">
                </td>
            </tr>
            <tr>
                <td> <input type="file" name="logo" class="form-control"></td>
            </tr>
        </table>
    </div>
    </form>
</div>


@endsection