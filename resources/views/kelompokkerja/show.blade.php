@extends('template')
@section('title','Anggota Kelompok Kerja')

@section('content')

@include('validation')
@include('alert')
<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <td>Nama Kelompok Kerja</td>
                <td>{{ $kelompokkerja->kelompok_kerja }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <a href="/kelompokkerja" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <form action="{{ route('tambah.tambahAnggota')}}" method="POST">
            @csrf
            <input type="text" hidden name="id" value="{{ $kelompokkerja->id }}">
            <table class="table table-bordered">
                <tr>
                    <th><input type="text" name="nama" list="guru" class="form-control"></th>
                    <th><button type="submit" class="btn btn-success">Tambah Anggota</button></th>
                </tr>
            </table>
        </form>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered" id="data1">
            <thead>
                <tr>
                    <th width="20">NIK</th>
                    <th width="80">Nama Guru</th>
                    <th width="20">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggota as $item)
                <tr>
                    <td> {{$item->nik}}</td>
                    <td> {{$item->nama}}</td>
                    <td width="70">
                        <form action="{{ route('hapus.hapusAnggota', $item->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i>
                                Delete</button>

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- <form action="{{ route('kelompokkerja.store') }}" method="POST">
    @csrf
    <table class="table table-bordered">
        <tr>
            <td>Nama Kelompok Kerja</td>
            <td><input type="text" name="nama_kelompokkerja" class="form-control" placeholder="Nama Kelompok Kerja">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Data</button>
                <a href="/kelompokkerja" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Kembali</a>
            </td>
        </tr>
    </table>
</form> --}}
<datalist id="guru">
    @foreach ($Guru as $item)
    <option value="{{$item->nama}}"></option>
    @endforeach
</datalist>
@endsection

@push('script')

<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(function () {

        $("#data1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                
    });
</script>
@endpush