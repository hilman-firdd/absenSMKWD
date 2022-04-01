<?php

namespace App\Imports;

use App\Models\Kehadiran;
use Maatwebsite\Excel\Concerns\ToModel;

class KehadiranImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kehadiran([
           'nik'                    => $row[0],
           'tanggal_masuk'          => $row[1],
           'tanggal_pulang'         => $row[2],
           'kode_status_kehadiran'  => $row[3]
        ]);
    }
}
