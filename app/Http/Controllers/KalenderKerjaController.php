<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kalenderkerja;

class KalenderKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kalenderkerja::all();
        return view('kalenderKerja.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kalenderKerja.create');
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
            'tanggal' => 'required|unique:kalender_kerja',
            'keterangan' => 'required|min:5',
        ]);
        $kalenderKerja = new kalenderKerja();
        $kalenderKerja->tanggal = $request->tanggal;
        $kalenderKerja->keterangan = $request->keterangan;
        $kalenderKerja->save();
        return redirect('/kalenderKerja')->with('message','Berhasil menyimpan data Kalender Kerja');

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
    public function edit($id)
    {
        $data = kalenderKerja::findOrFail($id);

        return view('kalenderKerja.edit', compact('data'));
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
            'tanggal' => 'required|unique:kalender_kerja',
            'keterangan' => 'required|min:5',
        ]);
        $kalenderKerja = kalenderKerja::findOrFail($id);
        // $kalenderKerja->kode_kalenderKerja = $request->kode_kalenderKerja;
        $kalenderKerja->tanggal = $request->tanggal;
        $kalenderKerja->keterangan = $request->keterangan;
        $kalenderKerja->update();
        return redirect('/kalenderKerja')->with('message','Berhasil melakukan update Kalender Kerja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kalenderKerja = kalenderKerja::find($id);
        $kalenderKerja->delete();
        return redirect('/kalenderKerja')->with('message','Berhasil menghapus data');

    }
}
