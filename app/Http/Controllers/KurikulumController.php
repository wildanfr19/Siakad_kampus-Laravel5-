<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Matakuliah;
use App\Kurikulum;
class KurikulumController extends Controller
{
    function index(Request $request)
    {
        $jurusan = $request->get('jurusan');
        $kurikulum = \DB::table('kurikulum')
                  ->join('matakuliah','matakuliah.kode_mk','=', 'kurikulum.kode_mk')
                  ->join('jurusan','jurusan.kode_jurusan','kurikulum.kode_jurusan')
                  ->where('kurikulum.kode_jurusan', $jurusan)
                  ->get();
                  
    	$jurusan = \App\Jurusan::pluck('nama_jurusan','kode_jurusan');
        $jurusan_terpilih = $jurusan;
    	return view('kurikulum.index', compact('jurusan','kurikulum','jurusan_terpilih'));
        // dd($kurikulum);
    }


    function create()
    {
    	$jurusan = \App\Jurusan::pluck('nama_jurusan','kode_jurusan');
        $matakuliah = \App\Matakuliah::pluck('nama_mk','kode_mk');
    	return view('kurikulum.create', compact('jurusan','matakuliah'));
    }

    function store(Request $request)
    {
        $kurikulum = new Kurikulum();
        $kurikulum->create($request->all());
        return redirect('/kurikulum')->with('status','Data berhasil disimpan');
    }


    function destroy($id){
        $kurikulum = Kurikulum::find($id);
        $kurikulum->delete();
        return redirect('/kurikulum')->with('status','Data berhasil dihapus');
    }
}
