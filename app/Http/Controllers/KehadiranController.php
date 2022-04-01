<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kehadiran;
use Illuminate\Http\Request;
use App\Models\StatusKehadiran;
use Illuminate\Support\Facades\DB;

use App\Exports\KehadiranExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KehadiranImport;
use Redirect;

class KehadiranController extends Controller
{
    public function index() {

        


    $kehadiran = Guru::select('guru.nik','departemen.nama_departemen','guru.nama','kehadiran.id','kehadiran.tanggal_masuk','kehadiran.tanggal_pulang','status_kehadiran.status_kehadiran')
                // ->leftJoin('kehadiran','kehadiran.nik','=','guru.nik')
                ->leftJoin('kehadiran', function($join) {
                    
                    if(session('periode_kehadiran') != null) {
                        $periode = session('periode_kehadiran');
                    }else{
                        $periode = date('y-m-d');
                    }

                    $join->on('kehadiran.nik','=','guru.nik')
                    ->whereRaw("date(kehadiran.tanggal_masuk)='$periode'");
                })
                ->join('departemen','guru.kode_departemen','=','departemen.kode_departemen')
                ->leftJoin('status_kehadiran','status_kehadiran.kode_status_kehadiran','=','kehadiran.kode_status_kehadiran')
                
                ->get();
    return view('kehadiran.index', compact('kehadiran'));
    }

    public function create() {
        $Guru = Guru::all();
        $statusKehadiran = StatusKehadiran::all();
        return view('kehadiran.create', compact('statusKehadiran','Guru'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_pulang' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
        ]);


        $guru = DB::table('guru')->where('nama', $request->nama)->first();
        if($guru != null) {
            $data = [
                'nik'           => $guru->nik,
                'tanggal_masuk' => $request->tanggal_masuk.' '.$request->jam_masuk,
                'tanggal_pulang' => $request->tanggal_pulang.' '.$request->jam_pulang,
                'kode_status_kehadiran' => $request->status_kehadiran
            ];
    
            DB::table('kehadiran')->insert($data);
            return Redirect('/kehadiran')->with('message','Data kehadiran : '. $request->nama.' Berhasil Disimpan');
        }else{
            return Redirect::back()->with('message','Guru Dengan Nama : '. $request->nama . ' Tidak Ditemukan');
        }

    }

    public function ubahPeriodeKehadiran(Request $request){
        session(['periode_kehadiran' => $request->periode_kehadiran]);
        return redirect('kehadiran')->with('message','Laporan Periode kehadiran sudah dirubah');
    }

    public function excel(Request $request) {
        return Excel::download(new KehadiranExport($request->tanggal_mulai, $request->tanggal_selesai), 'laporan-kehadiran.xlsx');
    }

    public function import(Request $request) {
        $file = $request->file('import_file');
        $fileName = $file->getClientOriginalName();
        //move
        $destination = 'uploads';
        $file->move($destination, $fileName);

        Excel::import(new KehadiranImport, public_path().'/uploads/'.$fileName);

        return redirect('kehadiran')->with('message','Laporan kehadiran berhasil di import');
    }
}
