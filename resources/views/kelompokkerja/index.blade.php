@extends('template')
@section('title','Data Kelompok Kerja')

@section('content')

@include('alert')

<table class="table table-bordered" id="data1">
    <a href="{{ route('kelompokkerja.create') }}" class="btn btn-success mb-2"><i class="fa-solid fa-pencil"></i> Tambah
        data</a>
    <thead>
        <tr>
            <th width="100">Nama Kelompok Kerja</th>
            <th width="50">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <td>{{ $row->kelompok_kerja }}</td>
            <td class="d-flex flex-wrap">
                <a href="/kelompokkerja/{{ $row->id }}/polakerja" class="btn btn-success mr-2 mb-2"><i
                        class="fa fa-users"></i>
                    Pola Kerja</a>

                <a href="/kelompokkerja/{{ $row->id }}" class="btn btn-success mr-2 mb-2"><i class="fa fa-users"></i>
                    Anggota</a>

                <a href="/kelompokkerja/{{ $row->id }}/edit" class="btn btn-success mr-2 mb-2"><i
                        class="fa-solid fa-pencil"></i>
                    Edit</a>
                <form action="{{ route('kelompokkerja.destroy', $row->id) }}" method="post">
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