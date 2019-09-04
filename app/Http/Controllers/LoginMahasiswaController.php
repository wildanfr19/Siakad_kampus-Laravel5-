<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
class LoginMahasiswaController extends Controller
{
    //menampilkan form login
    function index()
    {
    	return view('mahasiswa.login');
    }

    // cek proses login
    function submit(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'

    	]);

    	//
    	if (Auth::guard('mahasiswa')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    		return redirect()->intended('/krs');
    	}

    	return redirect()->back()->withInput($request->only('email','remember'));
    }
}
