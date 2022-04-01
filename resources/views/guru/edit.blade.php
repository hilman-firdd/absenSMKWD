@extends('template')
@section('title','Edit Data jabatan')

@section('content')

@include('alert')
@include('guru.tab')
<form action="{{route('guru.update', $guru->nik)}}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <table class="table table-bordered">
        <tr>
            <td width="200">No Induk Guru</td>
            <td>
                <input type="text" name="nik" class="form-control" placeholder="NIK" value="{{ $guru->nik }}" readonly>
            </td>
        </tr>
        <tr>
            <td>Nama Guru</td>
            <td><input type=" text" name="nama" class="form-control" placeholder="Nama" value="{{ $guru->nama }}"></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"
                    value="{{ $guru->tanggal_lahir }}"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea name="alamat" class="form-control">{{ $guru->alamat }}</textarea></td>
        </tr>
        <tr>
            <td>Status Kawin</td>
            <td>
                <select name="kode_status_kawin" id="" class="form-control">
                    @foreach ($statusKawin as $data)
                    @if($guru->kode_status_kawin == $data->kode_status_kawin)
                    <option selected value="{{$data->kode_status_kawin }}">{{ $data->keterangan }}</option>
                    @endif
                    <option value="{{$data->kode_status_kawin }}">{{ $data->keterangan }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <select name="jenis_kelamin" id="" class="form-control">
                    @if($guru->jenis_kelamin == "L")
                    <option value="L">Laki-laki</option>
                    @elseif($guru->jenis_kelamin == "P")
                    <option value="P">Perempuan</option>
                    @endif
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
            <td><input type="date" name="tanggal_masuk" class="form-control" value="{{ $guru->tanggal_masuk }}"></td>
        </tr>
        <tr>
            <td>Gaji Pokok</td>
            <td><input type="text" class="form-control" name="gapok" value="{{ $guru->gaji_pokok }}"></td>
        </tr>
        <tr>
            <td>Photo</td>
            <td>
                <input type="file" name="foto" class="form-control">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Data</button>
                <a href="/guru" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
            </td>
        </tr>
    </table>
</form>

@endsection