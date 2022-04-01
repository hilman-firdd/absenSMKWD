<?php

namespace App\Http\Controllers;

use Fpdf;
use App\Models\Gaji;
use Barryvdh\DomPDF\PDF;
use App\Models\KomponenGaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GajiController extends Controller
{
    public function index() {
        $periodeGaji = Session('periode_gaji');
        
        if($periodeGaji == null) {
            $periode = date('Ym');
        }else{
            $periode = $periodeGaji;
        }

        $riwayatGaji = Gaji::join('guru','guru.nik','=','gaji.nik')
                    ->where('gaji.periode', $periode)
                    ->get();
        $gaji = Gaji::all();
        return view('gaji.index', compact('gaji','riwayatGaji'));
    }

    public function store(Request $request) {
        $periode = $request->periode;

        $guru = DB::table('guru')->select('nik')->get();
        $data = [];
        foreach ($guru as $g) {
            $data[] =[
                'nik' => $g->nik, 
                'periode' => $periode
            ];
        }

        DB::table('gaji')->insert($data);
        return redirect('laporangaji')->with('message','periode gaji '.$periode.' sudah dibuat');
    }

    public function ubahPeriodeGaji(Request $request) {
        Session(['periode_gaji' => $request->periode ]);
        return redirect('laporangaji')->with('message','periode gaji diset menjadi :'.$request->periode.'');
    }

    public function show($id) {
        $gaji = Gaji::find($id);

        $periode = substr($gaji->periode, 0,4).'-'.substr($gaji->periode,4,2);
        
        $komponenGaji = KomponenGaji::all();
        $guru = DB::table('guru')
                    ->join('jabatan','guru.kode_jabatan','=', 'jabatan.kode_jabatan')
                    ->where('guru.nik', $gaji->nik)
                    ->first();
        $gajiDetail = DB::table('gaji_detail')
                    ->join('komponen_gaji','komponen_gaji.kode_komponen','=','gaji_detail.kode_komponen')
                    ->where('gaji_detail.gaji_id', $id)
                    ->get();
        $hitungLembur = DB::select("select sum(durasi_Lembur) as durasi_lembur from lembur 
                        where left(tanggal_masuk,7)= '".$periode."' 
                        and nik = '".$gaji->nik."'");

        return view('gaji.show', compact('gaji','periode','guru','komponenGaji','gajiDetail','hitungLembur'));
    }

    public function tambahKomponenDetail(Request $request) {
        $data = [
            'kode_komponen' => $request->kode_komponen,
            'gaji_id' => $request->gaji_id
        ];
        DB::table('gaji_detail')->insert($data);
        return redirect('laporangaji/'.$request->gaji_id)->with('message', 'Komponen berhasil ditambahkan');
    }

    public function hapusKomponenDetail($id) {
        $gaji = DB::table('gaji_detail')->where('id',$id)->first();
        DB::table('gaji_detail')->where('id',$id)->delete();
        return redirect('laporangaji/'.$gaji->gaji_id)->with('message','Komponen gaji berhasil dihapus');
    }

    public function pdf($id){
        // Fpdf::AddPage();
        // Fpdf::SetFont('Courier', 'B', 18);
        // Fpdf::Cell(50, 25, 'Hello');
        // Fpdf::Output();
        $pengaturan    = \DB::table('pengaturan')->where('id', 1)->first(); 
        
        $komponenGaji = KomponenGaji::all();
        $gaji                   = Gaji::find($id);

        $periode                = substr($gaji->periode,0,4).'-'.substr($gaji->periode,4,2);

        $guru      = \DB::table('guru')
                                    ->join('jabatan','guru.kode_jabatan','=','jabatan.kode_jabatan')
                                    ->where('guru.nik',$gaji->nik)
                                    ->first();

        $gajiDetail    = \DB::table('gaji_detail')
                                    ->join('komponen_gaji','komponen_gaji.kode_komponen','=','gaji_detail.kode_komponen')
                                    ->where('gaji_detail.gaji_id',$id)
                                    ->get();

        $hitungLembur  = \DB::select("select sum(durasi_Lembur) as durasi_lembur 
                                            from lembur where left(tanggal_masuk,7)='".$periode."' 
                                            and nik='".$gaji->nik."'");

        $periode        = $periode;
        $pdf = \PDF::loadView('gaji.invoice', compact('pengaturan','komponenGaji','gaji','guru','gajiDetail','hitungLembur','periode'));
        return $pdf->stream();  
    }
}
