<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Matakuliah;
use App\Krs;
use Auth;
class KrsController extends Controller
{
    function __construct()
    {
    	return $this->middleware('auth:mahasiswa');
    }
    function daftarMataKuliahKontrak()
    {
        return Datatables::of(Matakuliah::all())
        ->addColumn('action', function($row){
        	$action = '<button class="btn btn-primary" onclick="tambah_krs(\''.$row->kode_mk.'\')"><i class="fas fa-pencil-alt"></i> Ambil</button>';
            // $action = '<a href="/matakuliah/'. $row->kode_mk .'/edit" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Ambil</a>';
            return $action;
        })
        ->make(true);
    }

     function hapusKrs(Request $request){
        $krs = Krs::find($request->id);
        $krs->delete();
    }

    function tambahKrs(Request $request)
    {
    	$tahun_akademik = \DB::table('tahunakademik')->where('status','Y')->first();

    	$krs = new Krs;
    	$krs->kode_mk = $request->kode_mk;
    	$krs->nim 	  = Auth::guard('mahasiswa')->user()->nim;
    	$krs->kode_tahun_akademik = $tahun_akademik->kode_tahun_akademik;
    	$krs->save();

    	
    }


    function tampilKrs()
    {
        $result = '<table class = "table table-bordered">
                  <tr><th>Kode MK</th><th>Nama Matakuliah</th><th>SKS</th><th>ACTION</tr>';
         $krs = \DB::table('krs')
                    ->join('matakuliah','krs.kode_mk','=','matakuliah.kode_mk')
                    ->get();
         foreach($krs as $row){
            $result .= '<tr>
                        <td>'. $row->kode_mk .'</td>
                        <td>'. $row->nama_mk .'</td>
                        <td>'. $row->jml_sks .'</td>
                        <td><button class="btn btn-danger btn-sm" onClick="hapus_krs('.$row->id.')"><i class="fas fa-trash-alt"></i></button></td></td>
                        </tr>';
         }    
        $result .='<tr><td colspan="4"><a class="btn btn-success" href="/krs/selesai"><i class="fas fa-cart-plus"></i> Saya Selesai Mengisi KRS</a></td></tr>';     
        $result .=  '</table>';
        return $result;
    }

    function selesai()
    {
        $nim  = Auth::guard('mahasiswa')->user()->nim;
        $krs  = \DB::table('krs')->where('nim', $nim)->get();
        $tahun_akademik = \DB::table('tahunakademik')->where('status')->where('status','Y')->first();

        foreach ($krs as $row) {
            $khs->kode_mk = $row->kode_mk;
            $khs->nim     = $nim;
            $khs->kode_tahun_akademik = $tahun_akademik->kode_tahun_akademik;
            $khs->nilai_uts = 0;
            $khs->nilai_tugas = 0;
            $khs->nilai_kehadiran = 0;
            $khs->kode_dosen = $row->kode_dosen;
            $khs->save();
        }
        return redirect('khs');
    }

    function index()
    {
        return view('krs.index');
    }

}
