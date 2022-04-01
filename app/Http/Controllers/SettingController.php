<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index(){
        $setting = DB::table('pengaturan')->where('id',1)->first();
        return view('setting', compact('setting'));
    }

    public function save(Request $request){

        
         //upload poto
         if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'uploads';
            $file->move($destinationPath, $filename);

            $data = [
                'nama_perusahaan' => $request->nama_perusahaan,
                'alamat_perusahaan' => $request->alamat_perusahaan,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'logo' => $filename
            ];
        }else{
            $data = [
                'nama_perusahaan' => $request->nama_perusahaan,
                'alamat_perusahaan' => $request->alamat_perusahaan,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon
            ];
        }
        DB::table('pengaturan')->where('id',1)->update($data);
        return redirect('/setting')->with('message','berhasil menyimpan perubahan');
        // return view('setting', compact('setting'));
    }
}
