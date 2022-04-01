<?php

namespace App\Http\Controllers;

use App\Models\PolaKerja;
use Illuminate\Http\Request;

class PolaKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PolaKerja::all();
        return view('polakerja.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('polakerja.create');
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
            'nama_polakerja' => 'required',
        ]);
        $polakerja = new PolaKerja();
        $polakerja->pola_kerja = $request->nama_polakerja;
        $polakerja->jam_masuk = $request->jam_masuk;
        $polakerja->jam_pulang = $request->jam_pulang;
        $polakerja->save();
        return redirect('/polakerja')->with('message','Berhasil Menyimpan Data Pola Kerja');

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
        $data = PolaKerja::findOrFail($id);

        return view('polakerja.edit', compact('data'));
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
            'nama_polakerja' => 'required',
        ]);
        $polakerja = PolaKerja::findOrFail($id);
        // $polakerja->kode_polakerja = $request->kode_polakerja;
        $polakerja->pola_kerja = $request->nama_polakerja;
        $polakerja->jam_masuk = $request->jam_masuk;
        $polakerja->jam_pulang = $request->jam_pulang;
        $polakerja->update();
        return redirect('/polakerja')->with('message','Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $polakerja = polakerja::find($id);
        $polakerja->delete();
        return redirect('/polakerja')->with('message','Berhasil menghapus data');

    }
}
