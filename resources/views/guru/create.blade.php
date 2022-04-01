@extends('template')
@section('title','Create Data jabatan')

@section('content')

@include('validation')
<form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table class="table table-bordered">
        <tr>
            <td width="200">No Induk Guru</td>
            <td><input type="text" name="nik" class="form-control" placeholder="NIK"></td>
        </tr>
        <tr>
            <td>Nama Guru</td>
            <td><input type="text" name="nama" class="form-control" placeholder="Nama"></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea name="alamat" class="form-control"></textarea></td>
        </tr>
        <tr>
            <td>Status Kawin</td>
            <td>
                <select name="kode_status_kawin" id="" class="form-control">
                    @if($statusKawin == null)
                    @foreach ($statusKawin as $data)
                    <option value="{{$data->kode_status_kawin }}">{{ $data->keterangan }}</option>
                    @endforeach
                    @else
                    <option value="l">kawin</option>
                    <option value="bk">belum kawin</option>
                    @endif
                </select>
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <select name="jenis_kelamin" id="" class="form-control">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Departemen & Jabatan</td>
            <td>
                <div class="row">
                    <div class="col-md-6">
                        <select name="kode_departemen" id="" class="form-control">
                            @foreach ($departemen as $data)
                            <option value="{{$data->kode_departemen }}">{{ $data->nama_departemen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="kode_jabatan" id="" class="form-control">
                            @foreach ($jabatan as $data)
                            <option value="{{$data->kode_jabatan }}">{{ $data->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>Tanggal Masuk</td>
            <td><input type="date" name="tanggal_masuk" class="form-control"></td>
        </tr>
        <tr>
            <td>Gaji Pokok</td>
            <td><input type="text" name="gapok" class="form-control" placeholder="Gaji Pokok"></td>
        </tr>
        <tr>
            <td>Photo</td>
            <td>
                <input type="file" name="foto" class="form-control">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Data</button>
                <a href="/guru" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
            </td>
        </tr>
    </table>
</form>

@endsection