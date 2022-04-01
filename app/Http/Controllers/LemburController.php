<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LemburController extends Controller
{
    public function index(){

        if(session('periode_lembur') != null) {
            $periode = session('periode_lembur');
        }else{
            $periode = date('y-m-d');
        }

        $riwayat_lembur = DB::table('lembur')
                        ->select('lembur.*','guru.nama')
                        ->join('guru','guru.nik','=','lembur.nik')
                        ->whereRaw("date(lembur.tanggal_masuk)='$periode'")
                        ->get();
        return view('lembur.index', compact('riwayat_lembur'));
    }

    public function create(){
        $guru = Guru::select('nama')->get();
        return view('lembur.create', compact('guru'));
    }
    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_pulang' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
            'durasi_lembur' => 'required'
        ]);


        $guru = DB::table('guru')->where('nama', $request->nama)->first();
        if($guru != null) {
            $data = [
                'nik'           => $guru->nik,
                'tanggal_masuk' => $request->tanggal_masuk.' '.$request->jam_masuk,
                'tanggal_pulang' => $request->tanggal_pulang.' '.$request->jam_pulang,
                'durasi_Lembur' => $request->durasi_lembur
            ];
    
            DB::table('lembur')->insert($data);
            return Redirect('/lembur')->with('message','Data Lembur : '. $request->nama.' Berhasil Disimpan');
        }else{
            return Redirect::back()->with('message','Guru Dengan Nama : '. $request->nama . ' Tidak Ditemukan');
        }
    }

    public function ubahPeriodeLembur(Request $request){
        session(['periode_lembur' => $request->periode_lembur]);
        return redirect('lembur')->with('message','Laporan Periode lembur sudah dirubah');
    }
    
    public function destroy($id, $url){
        
        $lembur = DB::table('lembur')->where('id',$id)->first();
        $delete = DB::table('lembur')->where('id',$id)->delete();

        if($url == 'lembur'){
            return redirect('lembur')->with('message','Riwayat lembur sudah dihapus'); 
        }else{
            return redirect('guru/'.$lembur->nik.'/lembur')->with('message','Riwayat lembur sudah dihapus');
        } 
    }
    
}
