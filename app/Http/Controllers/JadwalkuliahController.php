<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Matakuliah;
use App\Dosen;
use App\Ruangan;
use App\Jamkuliah;
use App\Jadwalkuliah;
class JadwalkuliahController extends Controller
{
	function index(Request $request)
	{
		$jurusan = $request->get('jurusan');
		$semester = $request->get('semester');
		$data['jadwal'] = \DB::table('jadwalkuliah')
		        ->join('matakuliah','matakuliah.kode_mk','=','jadwalkuliah.kode_mk')
		        ->join('dosens','dosens.kode_dosen','=', 'jadwalkuliah.kode_dosen')
		        ->join('ruangans', 'ruangans.kode_ruangan','=', 'jadwalkuliah.kode_ruangan')
		        ->join('jam_kuliah','jam_kuliah.id','=','jadwalkuliah.jam')
		        ->where('jadwalkuliah.kode_jurusan', $jurusan)
		        ->where('jadwalkuliah.semester', $semester)
		        ->get();
		// return $jadwal;
		// var_dump($jadwal);
		$data['jurusan'] = Jurusan::pluck('nama_jurusan','kode_jurusan');
		$data['jurusan_terpilih'] = $jurusan;
		$data['semester_terpilih'] = $semester;
		return view('jadwalkuliah.index', $data);
	}

	function create()
	{
		$data['dosen'] = Dosen::pluck('nama','kode_dosen');
		$data['matakuliah'] = Matakuliah::pluck('nama_mk','kode_mk');
		$data['jurusan'] = Jurusan::pluck('nama_jurusan','kode_jurusan');
		$data['ruangan'] = Ruangan::pluck('nama_ruangan','kode_ruangan');
		$data['jamkuliah'] = Jamkuliah::pluck('jam','id');
		$data['hari'] = ['senin' => 'senin','selasa' => 'selasa', 'rabu' => 'rabu', 'kamis' => 'kamis', 'jumat' => 'jumat', 'sabtu' => 'sabtu','minggu' => 'minggu'];
		$data['tahun_akademik'] = \DB::table('tahunakademik')->where('status','Y')->first();
		// dd($data);
		return view('jadwalkuliah.create', $data);
	}

	function store(Request $request)
	{
		$jadwalkuliah  = new Jadwalkuliah();
		$jadwalkuliah->create($request->all());
		return redirect('/jadwalkuliah')->with('status',' Data berhasil disimpan');
	}
    
}
