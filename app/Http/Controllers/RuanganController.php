<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
use DataTables;
class RuanganController extends Controller
{
     function json()
    {
        return Datatables::of(Ruangan::all())
        ->addColumn('action', function($row){
            $action = '<a href="/ruangan/'. $row->kode_ruangan .'/edit" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>';
            $action .= \Form::open(['url' => 'ruangan/'. $row->kode_ruangan, 'method' => 'delete', 'style' => 'float:right']);
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
        return view('ruangan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangan.create');
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
            'kode_ruangan' => 'required|unique:ruangans|min:4',
            'nama_ruangan' => 'required|min:6',
           

        ]);
        $ruangan = new Ruangan();
        $ruangan->create($request->all());
        return redirect('/ruangan')->with('status', 'Data berhasil disimpan ');
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
        $data['ruangan'] = Ruangan::where('kode_ruangan', $id)->first();
        return view('ruangan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_ruangan)
    {
          $request->validate([
            'nama_ruangan' => 'required|min:6',

        ]);
        $ruangan = ruangan::where('kode_ruangan', $kode_ruangan);
        $ruangan->update($request->except('_method','_token'));
        return redirect('/ruangan')->with('status','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_ruangan)
    {
        $ruangan = Ruangan::where('kode_ruangan', $kode_ruangan);
        $ruangan->delete();
        return redirect('/ruangan')->with('status','Data berhasil dihapus');
    }
}
