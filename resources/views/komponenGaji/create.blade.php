@extends('template')
@section('title','Create Data komponengaji')

@section('content')

@include('validation')
<div class="row">
    <div class="col-md-10">
        <form action="{{ route('komponengaji.store') }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td width="200">Kode Komponen Gaji</td>
                    <td><input type="text" name="kode_komponen" class="form-control" placeholder="Kode komponen"></td>
                </tr>
                <tr>
                    <td>Nama Komponen Gaji</td>
                    <td><input type="text" name="nama_komponen" class="form-control" placeholder="Nama komponen"></td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td>
                        <select name="tunjangan_komponen" id="" class="form-control">
                            <option value="Tunjangan">Tunjangan</option>
                            <option value="Potongan">Potongan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nilai</td>
                    <td><input type="text" name="nilai" class="form-control" placeholder="Nilai">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Data</button>
                        <a href="/komponengaji" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


@endsection