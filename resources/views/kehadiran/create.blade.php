@extends('template')
@section('title','Create Data kehadiran')

@section('content')

@include('validation')
@include('alert')
<form action="{{ route('kehadiran.store')}}" method="POST">
    @csrf
    <table class="table table-bordered">
        <tr>
            <td width="200">Nama</td>
            <td><input type="text" name="nama" class="form-control" list="guru" placeholder="Nama Guru"></td>
        </tr>
        <tr>
            <td>Tanggal Masuk</td>
            <div class="row">
                <div class="col-md-2">
                    <td><input type="date" name="tanggal_masuk" class="form-control" placeholder="Tanggal Masuk"></td>
                </div>
                <div class="col-md-2">
                    <td><input type="text" name="jam_masuk" class="form-control" placeholder="Ex: 08:00"></td>
                </div>
            </div>
        </tr>
        <tr>
            <td>Tanggal Pulang</td>
            <div class="row">
                <div class="col-md-2">
                    <td><input type="date" name="tanggal_pulang" class="form-control" placeholder="Tanggal Pulang"></td>
                </div>
                <div class="col-md-2">
                    <td><input type="text" name="jam_pulang" class="form-control" placeholder="Ex: 08:00"></td>
                </div>
            </div>
        </tr>
        <tr>
            <td>Status Kehadiran</td>
            <td><select name="status_kehadiran" class="form-control" id="">
                    @foreach ($statusKehadiran as $item)
                    <option value="{{$item->kode_status_kehadiran}}"> {{ $item->status_kehadiran}}</option>
                    @endforeach

                </select></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Data</button>
                <a href="/kehadiran" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
            </td>
        </tr>
    </table>
</form>

<datalist id="guru">
    @foreach ($Guru as $item)
    <option value="{{$item->nama}}"></option>
    @endforeach
</datalist>

@endsection