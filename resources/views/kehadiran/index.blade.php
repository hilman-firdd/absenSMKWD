@extends('template')
@section('title','Riwayat Kehadiran')

@section('content')

@include('alert')

<div class="row">
    <div class="col-md-8">
        <form action="{{ route('kehadiran.ubahPeriodeKehadiran')}}" method="post">
            @csrf

            <table class="table table-bordered">
                <tr>
                    <td>Filter Laporan</td>
                    <td><input type="date" class="form-control" name="periode_kehadiran"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-spinner"></i> Filter
                            Laporan</button>
                        <a href="kehadiran/create" class="btn btn-success"><i class="fa-solid fa-pencil"></i> Input
                            Kehadiran Manual</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-primary"><i class="fas fa-file-export"></i>
                            Export Data Kehadiran
                        </button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#import-data"><i
                                class="fas fa-file-export"></i>
                            Import Data
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<table class="table table-bordered" id="data1">

    <thead>
        <tr>
            <th width="200">NIK</th>
            <th>Nama Guru</th>
            <th>Departemen</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Pulang</th>
            <th>Status Kehadiran</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kehadiran as $row)
        <tr>

            <td>{{ $row->nik }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->nama_departemen }}</td>
            <td>{{ $row->tanggal_masuk }}</td>
            <td>{{ $row->tanggal_pulang }}</td>
            <td>{{ $row->status_kehadiran }}</td>
            {{-- <td width="70"><a href="/jabatan/{{ $row->kode_jabatan }}/edit" class="btn btn-success"><i
                        class="fa-solid fa-pencil"></i> Edit</a></td>
            <td width="70">
                <form action="{{ route('jabatan.destroy', $row->kode_jabatan) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>

                </form>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modal-primary" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h4 class="modal-title">Export laporan Kehadiran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('exportData.excel') }}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <td>Dari Tanggal</td>
                            <td>
                                <input type="date" name="tanggal_mulai" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Sampai Tanggal</td>
                            <td>
                                <input type="date" name="tanggal_selesai" class="form-control">
                            </td>
                        </tr>
                    </table>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light">Export Kehadiran</button>
            </div>
            </form>
        </div>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="import-data" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h4 class="modal-title">Import laporan Kehadiran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('importData.excel') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <td>Pilih File</td>
                            <td>
                                <input type="file" name="import_file" class="form-control">
                            </td>
                        </tr>
                    </table>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light">Import Kehadiran</button>
            </div>
            </form>
        </div>

    </div>

</div>
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