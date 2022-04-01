@extends('template')
@section('title','Data Jabatan')

@section('content')

@include('alert')

<table class="table table-bordered" id="data1">
    <a href="{{ route('jabatan.create') }}" class="btn btn-success mb-2"><i class="fa-solid fa-pencil"></i> Tambah
        data</a>
    <thead>
        <tr>
            <th width="100">Kode jabatan</th>
            <th>Nama jabatan</th>
            <th>Tunjangan Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>

            <td>{{ $row->kode_jabatan }}</td>
            <td>{{ $row->nama_jabatan }}</td>
            <td>{{ $row->tunjangan_jabatan }}</td>
            <td class="d-flex flex-wrap">
                <a href="/jabatan/{{ $row->kode_jabatan }}/edit" class="btn btn-success mr-2 mb-2"><i
                        class="fa-solid fa-pencil"></i> Edit</a>
                <form action="{{ route('jabatan.destroy', $row->kode_jabatan) }}" method="post">
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