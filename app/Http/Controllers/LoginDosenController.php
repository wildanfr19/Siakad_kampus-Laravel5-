<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class LoginDosenController extends Controller
{
    function index()
    {
    	return view('dosen.login');
    }

    // cek proses login
    function submit(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'

    	]);

    	//
    	if (Auth::guard('dosen')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    		return redirect()->intended('/jadwal_mengajar');
    	}

    	return redirect()->back()->withInput($request->only('email','remember'));
    }
}
