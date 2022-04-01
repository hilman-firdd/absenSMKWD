@extends('template')
@section('title','Laporan Gaji Guru')

@section('content')

@include('validation')
@include('alert')
<div class="row">
    <div class="col-md-4">
        {{-- <form action="{{ route('setting.save') }}" method="POST" enctype="multipart/form-data">
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

        </form> --}}
        <h4>Filter Laporan</h4>
        <form action="{{ route('ubah.ubahPeriodeGaji') }}" method="post">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td width="150">Periode Laporan</td>
                    <td>
                        <select name="periode" id="" class="form-control">
                            @foreach ($gaji as $item)
                            <option value="{{ $item->periode }}">{{ $item->periode}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-success">Refresh</button>
                    </td>
                </tr>
            </table>
        </form>
        <h4>Input Periode Gaji</h4>
        <hr>
        <form action="{{ route('laporangaji.store') }}" method="post">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td width="150">Periode Gaji </td>
                    <td>
                        <input type="text" name="periode" class="form-control" placeholder="Ex: 201903">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-success">Buat</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="col-md-8">
        <table class="table table-bordered">
            <tr>
                <th>NIK</th>
                <th>Nama Guru</th>
                <th>Periode Gaji</th>
                <th>Aksi</th>
            </tr>
            @foreach ($riwayatGaji as $item)
            <tr>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->periode }}</td>
                <td colspan="2">
                    <a href="/laporangaji/{{$item->id}}" class="btn btn-info">Detail</a>
                    <a href="/laporangaji/{{$item->id}}/pdf" class="btn btn-info">Cetak</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>


@endsection