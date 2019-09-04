<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Khs;
// use App\Mahasiswa;
class NilaiController extends Controller
{
  

	function index($id_jadwal)
	{
		$data['khs'] = \DB::table('khs')
		                    ->join('mahasiswa','mahasiswa.nim','=','khs.nim')
		                    ->get();
		// return $khs;
		return $data;
	}

}
