<?php

namespace App\Http\Controllers;

use App\Models\KomponenGaji;
use Illuminate\Http\Request;

class KomponenGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $komponenGaji = KomponenGaji::all();
        return view('komponenGaji.index', compact('komponenGaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('komponenGaji.create');
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
            'kode_komponen' => 'required|unique:komponen_gaji|max:4|min:4',
            'nama_komponen' => 'required',
            'nilai' => 'required',
        ]);
        
        $komponenGaji = new komponenGaji();
        $komponenGaji->kode_komponen = $request->kode_komponen;
        $komponenGaji->nama_komponen= $request->nama_komponen;
        $komponenGaji->jenis = $request->tunjangan_komponen;
        $komponenGaji->nilai = $request->nilai;
        $komponenGaji->save();
        return redirect('/komponengaji')->with('message','Data Berhasil disimpan');

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
        $data = KomponenGaji::findOrFail($id);

        return view('komponengaji.edit', compact('data'));
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
            'nama_komponen' => 'required|min:5',
            'nilai' => 'required',
        ]);
        $komponenGaji = KomponenGaji::findOrFail($id);
        $komponenGaji->kode_komponen = $request->kode_komponen;
        $komponenGaji->nama_komponen= $request->nama_komponen;
        $komponenGaji->jenis = $request->tunjangan_komponen;
        $komponenGaji->nilai = $request->nilai;
        $komponenGaji->update();
        return redirect('/komponengaji')->with('message','Berhasil melakukan update data komponen gaji');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $komponenGaji = komponenGaji::find($id);
        $komponenGaji->delete();
        return redirect('/komponengaji')->with('message','Berhasil menghapus data');
    }
}
