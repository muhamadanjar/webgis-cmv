<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RegisterCtrl extends Controller {


	public function getIndex(){
		//
	}

	public function getRegister(){
		return view('auth.register')->withStatus('add');
	}


	public function postRegister(Request $request){
		$user = new \App\User();
		$user->username = $request->username;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->level = $request->level;
		$user->instansi = $request->instansi;
		$user->no_telp = $request->no_telp;
		$user->jenis_kebutuhan = $request->jenis_kebutuhan;
		$user->level = 9;
		$user->isactive = 0;

		$user->save();
		return redirect('admin/login');
	}

	

}
