<?php

namespace App\Http\Controllers;

use DateTime;
use DatePeriod;
use DateInterval;
use App\Models\PolaKerja;
use Illuminate\Http\Request;
use App\Models\KelompokKerja;
use Illuminate\Support\Facades\DB;

class KelompokKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KelompokKerja::all();
        return view('kelompokkerja.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelompokkerja.create');
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
            'nama_kelompokkerja' => 'required',
        ]);
        $kelompokkerja = new KelompokKerja();
        $kelompokkerja->kelompok_kerja = $request->nama_kelompokkerja;
        $kelompokkerja->save();
        return redirect('/kelompokkerja')->with('message','Berhasil Menyimpan Data kelompok kerja');;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Guru = DB::table('guru')->get();
        $kelompokkerja = KelompokKerja::find($id);
        $anggota = DB::table('anggota_kelompok_kerja')
                    ->join('guru','guru.nik','=','anggota_kelompok_kerja.nik')
                    ->where('anggota_kelompok_kerja.kelompok_kerja_id', $id)
                    ->get();    
        return view('kelompokkerja.show', compact('kelompokkerja','Guru','anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KelompokKerja::findOrFail($id);

        return view('kelompokkerja.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelompokkerja' => 'required',
        ]);
        $kelompokkerja = KelompokKerja::findOrFail($id);
        $kelompokkerja->kelompok_kerja = $request->nama_kelompokkerja;
        $kelompokkerja->update();
        return redirect('/kelompokkerja')->with('message','Berhasil melakukan update data Kelompok Kerja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelompokkerja = KelompokKerja::find($id);
        $kelompokkerja->delete();
        return redirect('/kelompokkerja')->with('message','Berhasil menghapus data');

    }

    public function tambahAnggota(Request $request){
        // return $request->all();
        $guru = DB::table('guru')->where('nama', $request->nama)->first();

        if($guru != null) {
            //proses
            $data = [
                'nik' => $guru->nik,
                'kelompok_kerja_id' => $request->id
            ];

            DB::table('anggota_kelompok_kerja')->insert($data);
            return Redirect('/kelompokkerja/'. $request->id)->with('message','Data Anggota : '. $request->nama.' Berhasil Ditambahkan');
        }else{
            return Redirect('/kelompokkerja/'. $request->id)->with('message','Data Guru : '. $request->nama.' tidak ditemukan');
        }

    }

    public function hapusAnggota($id){
        $anggota = DB::table('anggota_kelompok_kerja')->join('guru', 'guru.nik','=','anggota_kelompok_kerja.nik')
                ->select('anggota_kelompok_kerja.kelompok_kerja_id', 'guru.nama')
                ->where('anggota_kelompok_kerja.id', $id)    
                ->first();
        DB::table('anggota_kelompok_kerja')
                ->where('id', $id)
                ->delete();

        return redirect('kelompokkerja/'. $anggota->kelompok_kerja_id)->with('message','Anggota Dengan Nama '. $anggota->nama .' sudah di hapus');
    }

    public function polaKerja($id) {
        $kelompokkerja = KelompokKerja::find($id);
        $pola_kerja = PolaKerja::all();
        $pola_kerja_kelompok = DB::table('pola_kerja_kelompok_guru')
            ->select('pola_kerja_kelompok_guru.tanggal','pola_kerja_kelompok_guru.id','pola_kerja.pola_kerja','pola_kerja.jam_masuk','pola_kerja.jam_pulang')
            ->join('pola_kerja','pola_kerja.id','=','pola_kerja_kelompok_guru.pola_kerja_id')
            ->paginate(7);
        return view('kelompokkerja.polakerja', compact('pola_kerja','kelompokkerja','pola_kerja_kelompok'));
    }

    public function simpanPolaKerja(Request $request){
        // return $request->all();

        $period = new DatePeriod(
            new DateTime($request->dari_tanggal),
            new DateInterval('P1D'),
            new DateTime(date('Y-m-d', strtotime('1 day', strtotime($request->sampai_tanggal))))
        );

        $dataPolaKerja = [];

        // insert pola kerja kelompok guru
        foreach ($period as $key => $value) {
            $value->format('Y-m-d');

            $dataPolaKerja[] = [
                'tanggal'           => $value->format('Y-m-d'), 
                'pola_kerja_id'     => $request->pola_kerja,
                'kelompok_kerja_id' => $request->kelompok_kerja_id,
                'created_at'         => date('Y-m-d'),
                'updated_at'         => date('Y-m-d')
            ];
            
        }

        DB::table('pola_kerja_kelompok_guru')->insert($dataPolaKerja);

        // insert pola kerja guru

        $polaKerjaGuru = [];

        $guru = DB::table('anggota_kelompok_kerja')
                ->where('kelompok_kerja_id', $request->kelompok_kerja_id)
                ->get();

        foreach ($guru as $g) {
            foreach ($period as $key => $value) {
                $polaKerjaGuru[] = [
                    'nik' => $g->nik,
                    'pola_kerja_id' => $request->pola_kerja,
                    'tanggal' => $value->format('Y-m-d')
                ];
            }
        }

        DB::table('pola_kerja_guru')->insert($polaKerjaGuru);

        return redirect('kelompokkerja/'.$request->kelompok_kerja_id.'/polakerja')->with('message','Data Kelompok Kerja Berhasil Disimpan');
    }
    
    public function hapusPolaKerja($id){
        $polaKerja = DB::table('pola_kerja_kelompok_guru')->where('id',$id)->first();
        DB::table('pola_kerja_kelompok_guru')->where('id',$id)->delete();
        return redirect('kelompokkerja/'.$polaKerja->kelompok_kerja_id.'/polakerja')->with('message','Data Kelompok Kerja Berhasil Dihapus  ');
    }
}
