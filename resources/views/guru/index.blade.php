@extends('template')
@section('title','Data Guru')

@section('content')

@include('alert')

<table class="table table-bordered" id="data1">
    <a href="{{ route('guru.create') }}" class="btn btn-success mb-2"><i class="fa-solid fa-pencil"></i> Tambah
        data</a>
    <thead>
        <tr>
            <th width="100">NIK</th>
            <th>Nama guru</th>
            <th>Jabatan</th>
            <th>Departemen</th>
            <th width="150">Tanggal Masuk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>

            <td>{{ $row->nik }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->nama_jabatan }}</td>
            <td>{{ $row->nama_departemen }}</td>
            <td>{{ $row->tanggal_masuk }}</td>
            <td colspan="5" class="d-flex flex-wrap">
                {{-- <a href="/guru/{{ $row->nik }}/kehadiran" class="btn btn-success mr-2 mb-2"><i
                        class="fa-solid fa-pencil"></i>
                    Kehadiran</a>
                <a href="/guru/{{ $row->nik }}/polakerja" class="btn btn-success mr-2 mb-2"><i
                        class="fa-solid fa-pencil"></i>
                    Pola Kerja</a> --}}
                <a href="/guru/{{ $row->nik }}/edit" class="btn btn-success mr-2 mb-2"><i class="fa-solid fa-eye"></i>
                    Detail</a>

                <form action="{{ route('guru.destroy', $row->nik) }}" method="post">
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