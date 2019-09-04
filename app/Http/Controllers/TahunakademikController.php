<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tahunakademik;
use DataTables;
class TahunakademikController extends Controller
{
     function json()
    {
        return Datatables::of(Tahunakademik::all())
        ->addColumn('action', function($row){
            $action = '<a href="/tahunakademik/'. $row->kode_tahun_akademik .'/edit" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>';
            $action .= \Form::open(['url' => 'tahunakademik/'. $row->kode_tahun_akademik, 'method' => 'delete', 'style' => 'float:right']);
            $action .= "<button type = 'submit' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>";
            $action .= \Form::close();
            return $action;
        })
        ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tahunakademik.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tahunakademik.create');
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
            'kode_tahun_akademik' => 'required|unique:tahunakademik|min:4',
            'tahun_akademik' => 'required|min:5'
           

        ]);
        $tahunakademik = new Tahunakademik();
        $tahunakademik->create($request->all());
        return redirect('/tahunakademik')->with('status', 'Data berhasil disimpan ');
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
        $data['tahunakademik'] = Tahunakademik::where('kode_tahun_akademik', $id)->first();
        return view('tahunakademik.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_tahun_akademik)
    {
          $request->validate([
            'tahun_akademik' => 'required|min:5'

        ]);
        $tahunakademik = Tahunakademik::where('kode_tahun_akademik', $kode_tahun_akademik);
        $tahunakademik->update($request->except('_method','_token'));
        return redirect('/tahunakademik')->with('status','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_tahun_akademik)
    {
        $tahunakademik = Tahunakademik::where('kode_tahun_akademik', $kode_tahun_akademik);
        $tahunakademik->delete();
        return redirect('/tahunakademik')->with('status','Data berhasil dihapus');
    }
}
