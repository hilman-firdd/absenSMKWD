<?php

namespace App\Exports;

use App\Models\Kehadiran;
use App\Exports\KehadiranExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class KehadiranExport implements FromView, ShouldAutoSize
{
    public $tanggal_mulai;
    public $tanggal_akhir;

    function __construct($awal, $akhir)
    {
        $this->tanggal_mulai = $awal;
        $this->tanggal_akhir = $akhir;
    }
    public function view(): View
    {
        $sql = "select vk.*, g.nama
        from view_riwayat_kehadiran as vk
        join guru as g on g.nik = vk.nik
        where date(vk.tanggal_masuk) between '". $this->tanggal_mulai."' and '". $this->tanggal_akhir."'";

        $riwayatKehadiran =  DB::select($sql);

        return view('kehadiran.excel', compact('riwayatKehadiran'));
    }
}
