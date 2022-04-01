<?php

use Illuminate\Support\Facades\DB;

function checkkehadiran($nik, $tanggal) {
    $kehadiran = DB::table('kehadiran')
            ->where('nik', $nik)
            ->whereRaw("cast(tanggal_masuk as date)='". $tanggal ."'")
            ->first();

    if(isset($kehadiran)) {
        return $kehadiran->kode_status_kehadiran;
    }else{
        return '-';
    }
}

function checklembur($nik, $tanggal) {
    $lembur = DB::table('lembur')
    ->where('nik', $nik)
    ->whereRaw("cast(tanggal_masuk as date)='". $tanggal ."'")
    ->first();

    if(isset($lembur)) {
        return $lembur->durasi_Lembur;
    }else{
        return '-';
    }
}