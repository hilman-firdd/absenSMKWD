@extends('template')
@section('title','Data Pola Kerja')

@section('content')

@include('alert')

<table class="table table-bordered" id="data1">
    <a href="{{ route('polakerja.create') }}" class="btn btn-success mb-2"><i class="fa-solid fa-pencil"></i> Tambah
        data</a>
    <thead>
        <tr>
            <th width="190">Nama Pola Kerja Guru</th>
            <th width="120">Jam Masuk</th>
            <th width="120">Jam Pulang</th>
            <th width="80">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <td>{{ $row->pola_kerja }}</td>
            <td>{{ $row->jam_masuk }}</td>
            <td>{{ $row->jam_pulang }}</td>
            <td class="d-flex">
                <a href="/polakerja/{{ $row->id }}/edit" class="btn btn-success mr-2"><i class="fa-solid fa-pencil"></i>
                    Edit</a>
                <form action="{{ route('polakerja.destroy', $row->id) }}" method="post">
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