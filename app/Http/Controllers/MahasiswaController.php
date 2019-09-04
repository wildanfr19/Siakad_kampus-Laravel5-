<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DataTables;
use App\Jurusan;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
       function json()
       {
            $mahasiswa = \DB::table('mahasiswa')->join('jurusan','mahasiswa.kode_jurusan','=','jurusan.kode_jurusan')->join('fakultas','fakultas.kode_fakultas','=','jurusan.kode_fakultas')->get();

            return Datatables::of($mahasiswa)
            ->addColumn('action', function($row){
                $action = '<a href="/mahasiswa/'. $row->nim .'/edit" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>';
                $action .= \Form::open(['url' => '/mahasiswa/'. $row->nim, 'method' => 'delete', 'style' => 'float:right']);
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
        return view('mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$data['jurusan'] = Jurusan::pluck('nama_jurusan','kode_jurusan');
        return view('mahasiswa.create', $data);
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
            'nim' => 'required|unique:mahasiswa|min:4',
            'nama_mahasiswa' => 'required|min:6',
            'email' => 'required',
            'password' => 'required'
           

        ]);
        $mahasiswa = new Mahasiswa();
        $mahasiswa->create($request->all());
        return redirect('/mahasiswa')->with('status', 'Data berhasil disimpan ');
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
    public function edit($nim)
    {
        $data['jurusan'] = Jurusan::pluck('nama_jurusan','kode_jurusan');
        $data['mahasiswa'] = Mahasiswa::where('nim', $nim)->first();
        return view('mahasiswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //   $request->validate([
        //     'nama_mahasiswa' => 'required|min:6',

        // ]);
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->email = $request->email;
        $mahasiswa->alamat =  $request->alamat;
        if ($request->password != '') {
         	$mahasiswa->password = $request->password;
         } 
         $mahasiswa->save();
        // $mahasiswa->update($request->except('_method','_token'));
        return redirect('/mahasiswa')->with('status','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim);
        $mahasiswa->delete();
        return redirect('/mahasiswa')->with('status','Data berhasil dihapus');
    }
}
