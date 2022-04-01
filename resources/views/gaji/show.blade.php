@extends('template')
@section('title','Detail Gaji Guru')

@section('content')

@include('validation')
@include('alert')
<div class="row">
    <div class="col-md-4">
        <table class="table table-bordered">
            <tr>
                <td><img src="{{ asset('uploads/'.$guru->foto)}}" alt="" width="300"></td>
            </tr>
            <tr>
                <td>{{ $guru->nama }}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-8">
        <form action="{{ route('tambah.tambahKomponenDetail') }}" method="post">
            @csrf
            <input hidden type="text" name="gaji_id" value="{{ $gaji->id }}">
            <table class="table table-bordered">
                <tr>
                    <td>
                        <select name="kode_komponen" class="form-control" id="">
                            @foreach ($komponenGaji as $item)
                            <option value="{{ $item->kode_komponen }}"> {{ $item->nama_komponen }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success">Tambah Komponen</button>
                    </td>
                </tr>
            </table>
        </form>
        <table class="table table-bordered">
            <tr>
                <td>Komponen Gaji</td>
                <td>Nominal</td>
                <td>Jenis</td>
                <td></td>
            </tr>
            <tr>
                <td>Gaji Pokok</td>
                <td>{{ $guru->gaji_pokok }}</td>
                <td>Tetap</td>
            </tr>
            <tr>
                <td>Tunjangan Jabatan</td>
                <td>{{ $guru->tunjangan_jabatan }}</td>
                <td>Tunjangan</td>
                <td></td>
            </tr>

            <?php
                $pendapatan_tambahan = 0;
            ?>
            @if(isset($gajiDetail))
            @foreach ($gajiDetail as $item)
            <tr>
                <td>{{ $item->nama_komponen }}</td>
                <td>{{ $item->nilai }}</td>
                <td>{{ $item->jenis }}</td>
                <td class="d-flex flex-wrap">
                    <form action="{{ route('hapus.hapusKomponenDetail', ['id' => $item->id ]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </td>
            </tr>

            <?php
            if($item->jenis =='tunjangan') {
                $pendapatan_tambahan = $pendapatan_tambahan + $item->nilai;
            }else{
                $pendapatan_tambahan = $pendapatan_tambahan - $item->nilai;
            }

            ?>
            @endforeach
            @endif

            <?php
            // dd($hitungLembur[0]->durasi_lembur);
                $lembur = $hitungLembur[0]->durasi_lembur * 20000;
                $total = $guru->gaji_pokok + $guru->tunjangan_jabatan + $pendapatan_tambahan;
            ?>

            <tr>
                <td>Lembur</td>
                <td>{{ $lembur }}</td>
                <td>Tambahan</td>
            </tr>
            <tr>
                <td>Total Pendapatan</td>
                <td>{{ $total }}</td>
                <td></td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h4>Riwayat Kehadiran dan Lembur</h4>
        <table class="table table-bordered">
            <tr>
                <th>Tanggal</th>
                <?php
                    $month = substr($periode,5, 2);
                    $year = substr($periode,0, 4);
                        for($d=1; $d<=31; $d++){
                            $time = mktime(12, 0, 0, $month, $d, $year);
                            if(date('m', $time) == $month)
                                echo "<td>". date('d', $time). "</td>";
                        }
                    ?>
            </tr>
            <tr>
                <td>Kehadiran</td>
                <?php
                    $month = substr($periode,5, 2);
                    $year = substr($periode,0, 4);
                        for($d=1; $d<=31; $d++){
                            $time = mktime(12, 0, 0, $month, $d, $year);
                            if( date('m', $time) == $month)
                                echo "<td>". checkkehadiran($guru->nik, date('y-m-d', $time)). "</td>";
                        }
                    ?>
            </tr>
            <tr>
                <td>Lembur</td>
                <?php
                    $month = substr($periode,5, 2);
                    $year = substr($periode,0, 4);
                        for($d=1; $d<=31; $d++){
                            $time = mktime(12, 0, 0, $month, $d, $year);
                            if( date('m', $time) == $month)
                                echo "<td>". checklembur($guru->nik, date('y-m-d', $time)). "</td>";
                        }
                    ?>
            </tr>
        </table>
    </div>
</div>




@endsection