<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jabatan;
use App\Models\Departemen;
use App\Models\StatusKawin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Guru::join(
            'departemen', 'departemen.kode_departemen','=','guru.kode_departemen')
            ->join('jabatan', 'jabatan.kode_jabatan','=','guru.kode_jabatan')
            ->get();
        return view('guru.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = Jabatan::pluck('')
        $statusKawin = StatusKawin::all();
        $departemen = Departemen::all();
        $jabatan = Jabatan::all();
        return view('guru.create', compact('statusKawin','departemen','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nik' => 'required|unique:guru',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'tanggal_masuk' => 'required',
        ]);

        //upload poto
        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'uploads';
            $file->move($destinationPath, $filename);
        }else{
            $filename = null;
        }

        $guru = new Guru();
        $guru->nik = $request->nik;
        $guru->nama = $request->nama;
        $guru->tanggal_lahir = $request->tanggal_lahir;
        $guru->alamat = $request->alamat;
        $guru->kode_status_kawin = $request->kode_status_kawin;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->kode_departemen = $request->kode_departemen;
        $guru->kode_jabatan = $request->kode_jabatan;
        $guru->tanggal_masuk = $request->tanggal_masuk;
        $guru->foto = $filename;
        $guru->gaji_pokok = $request->gapok;
        $guru->save();
        return redirect('/guru')->with('message','Berhasil Menyimpan data guru');;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        $statusKawin = StatusKawin::all();
        $departemen = Departemen::all();
        $jabatan = Jabatan::all();
        $guru = guru::findOrFail($nik);

        return view('guru.edit', compact('guru','statusKawin','departemen','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'tanggal_masuk' => 'required',
        ]);

       

        $guru = Guru::find($nik);
        $guru->nama = $request->nama;
        $guru->tanggal_lahir = $request->tanggal_lahir;
        $guru->alamat = $request->alamat;
        $guru->kode_status_kawin = $request->kode_status_kawin;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->kode_departemen = $request->kode_departemen;
        $guru->kode_jabatan = $request->kode_jabatan;
        $guru->tanggal_masuk = $request->tanggal_masuk;
        $guru->gaji_pokok = $request->gapok;
         //upload poto
         if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'uploads';
            $file->move($destinationPath, $filename);
            $guru->foto = $filename;
        }
        $guru->update();
        return redirect('/guru')->with('message','Berhasil Menyimpan perubahan data guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = guru::find($id);
        $guru->delete();
        return redirect('/guru')->with('message','Berhasil menghapus data');

    }

    public function polaKerja($nik) {
        $guru =  DB::table('guru')->where('nik', $nik)->first();
        $polaKerjaGuru = DB::table('pola_kerja_guru')
                            ->join('pola_kerja','pola_kerja.id','=','pola_kerja_guru.pola_kerja_id')
                            ->where('pola_kerja_guru.nik', $nik)
                            ->orderBy('pola_kerja_guru.tanggal','ASC')
                            ->paginate(4);
        return view('guru.polakerja', compact('polaKerjaGuru','guru'));
    }

    public function kehadiran($nik) {
    
        $guru =  DB::table('guru')->where('nik', $nik)->first();
        $riwayatKehadiran = DB::table('view_riwayat_kehadiran')->where('nik',$nik)
                            ->orderBy('tanggal_masuk','ASC')
                            ->paginate(7);
        return view('guru.kehadiran', compact('guru','riwayatKehadiran'));
    }

    public function lembur($nik) {
    
        $guru =  DB::table('guru')->where('nik', $nik)->first();
        $riwayatLembur = DB::table('lembur')->where('nik',$nik)
                            ->orderBy('tanggal_masuk','ASC')
                            ->paginate(7);
        return view('guru.lembur', compact('guru','riwayatLembur'));
    }
}
