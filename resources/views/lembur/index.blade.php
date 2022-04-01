@extends('template')
@section('title','Riwayat Lembur')

@section('content')

@include('alert')

<div class="row">
    <div class="col-md-8">
        <form action="{{ route('lembur.ubahPeriodeLembur')}}" method="post">
            @csrf

            <table class="table table-bordered">
                <tr>
                    <td>Filter Laporan</td>
                    <td><input type="date" class="form-control" name="periode_lembur"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-spinner"></i> Filter
                            Laporan</button>
                        <a href="lembur/create" class="btn btn-success"><i class="fa-solid fa-pencil"></i> Input
                            Lembur</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="col-md-6">

    </div>
</div>

<table class="table table-bordered" id="data1">

    <thead>
        <tr>
            <th width="200">NIK</th>
            <th>Nama Guru</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Pulang</th>
            <th>Durasi Lembur</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($riwayat_lembur as $row)
        <tr>

            <td>{{ $row->nik }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->tanggal_masuk }}</td>
            <td>{{ $row->tanggal_pulang }}</td>
            <td>{{ $row->durasi_Lembur }}</td>
            <td width="70">
                <form action="{{ route('hapusLembur.destroy', ['id'=>$row->id, 'url'=>'lembur']) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

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