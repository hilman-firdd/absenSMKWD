@extends('template')
@section('title','Data komponen gaji')

@section('content')

@include('alert')

<table class="table table-bordered" id="data1">
    <a href="{{ route('komponengaji.create') }}" class="btn btn-success mb-2"><i class="fa-solid fa-pencil"></i> Tambah
        data</a>
    <thead>
        <tr>
            <th width="100">Kode Komponen</th>
            <th>Nama Komponen Gaji</th>
            <th>Jenis</th>
            <th>Nilai</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($komponenGaji as $row)
        <tr>

            <td>{{ $row->kode_komponen }}</td>
            <td>{{ $row->nama_komponen }}</td>
            <td>{{ $row->jenis }}</td>
            <td>{{ $row->nilai }}</td>
            <td class="d-flex flex-wrap">
                <a href="/komponengaji/{{ $row->kode_komponen }}/edit" class="btn btn-success mr-2 mb-2"><i
                        class="fa-solid fa-pencil"></i> Edit</a>
                <form action="{{ route('komponengaji.destroy', $row->kode_komponen) }}" method="post">
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