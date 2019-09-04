<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;
use App\Dosen;
use DataTables;
use Auth;
class DosenController extends Controller
{
    function json()
    {
        return Datatables::of(Dosen::all())
        ->addColumn('action', function($row){
            $action = '<a href="/dosen/'. $row->nidn .'/edit" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>';
            $action .= \Form::open(['url' => 'dosen/'. $row->nidn, 'method' => 'delete', 'style' => 'float:right']);
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
        return view('dosen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.create');
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
            'nidn' => 'required|unique:dosens|min:4',
            'nama' => 'required|min:6',
            'no_hp' => 'required',
            'email' => 'required'

        ]);
        $dosen = new Dosen();
        $dosen->nidn = $request->nidn;
        $dosen->kode_dosen = $request->kode_dosen;
        $dosen->nama = $request->nama;
        $dosen->no_hp = $request->no_hp;
        $dosen->email = $request->email;
        $dosen->password = Hash::make($request->password);
        $dosen->save();
        return redirect('/dosen')->with('status', 'Data berhasil disimpan ');
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
        $data['dosen'] = Dosen::where('nidn', $id)->first();
        return view('dosen.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nidn)
    {
          $request->validate([
          
            'nama' => 'required|min:6',
            'no_hp' => 'required',
            'email' => 'required'

        ]);
        $dosen = Dosen::where('nidn', $nidn)->first();
        $dosen->nidn = $request->nidn;
        $dosen->kode_dosen = $request->kode_dosen;
        $dosen->nama = $request->nama;
        $dosen->no_hp = $request->no_hp;
        $dosen->email = $request->email;
        if ($request->password !='') {
             $dosen->password = Hash::make($request->password);
        }
       
        $dosen->update();
        return redirect('/dosen')->with('status','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nidn)
    {
        $dosen = Dosen::where('nidn', $nidn);
        $dosen->delete();
        return redirect('/dosen')->with('status','Data berhasil dihapus');
    }

    public function jadwal_mengajar()
    {
        return view('dosen.jadwal_mengajar');
    }

    public function jadwal_mengajar_json()
    {
        $jadwal = \DB::table('jadwalkuliah')
                    ->join('ruangans','ruangans.kode_ruangan','=','jadwalkuliah.kode_ruangan')
                    ->join('matakuliah','matakuliah.kode_mk','=','jadwalkuliah.kode_mk')
                    ->join('jurusan','jurusan.kode_jurusan','=','jadwalkuliah.kode_jurusan')
                    ->join('jam_kuliah','jam_kuliah.id','=','jadwalkuliah.jam')
                    ->where('jadwalkuliah.kode_dosen', Auth::guard('dosen')->user()->kode_dosen);

        return Datatables::of($jadwal)
        ->addColumn('action', function($row){
            $action = '<a href="/nilai/'. $row->id .'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Input Nilai</a>';
            // $action .= \Form::open(['url' => 'dosen/'. $row->nidn, 'method' => 'delete', 'style' => 'float:right']);
            // $action .= "<button type = 'submit' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>";
           
            return $action;
        })
        ->make(true);
    }
}
