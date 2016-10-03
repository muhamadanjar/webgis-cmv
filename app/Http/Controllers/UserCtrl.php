<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserCtrl extends Controller {

	public function __construct($value=''){
		$this->middleware('auth.admin');
	}

	public function getIndex(){
		$user = User::get();
		return view('master.userList')->withUsers($user);
	}

	
	public function getTambah(){
		return view('master.userAddEdit')->withStatus('add');
	}

	
	public function postAddEdit(Request $request){
		$aksi = (session('aksi') == 'edit') ? 1 : 0;
		if ($aksi) {
			$user = User::find($request->id);
		}else{
			$user = new User();
		}
		$user->username = $request->username;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = $request->password;
		$user->level = $request->level;

		$user->save();
		return redirect('admin/user');
	}


	public function getUser($id){
		return view('master.userAddEdit')->withStatus('edit');
	}

	public function postHapus($id){
		$user = User::find($id);
		$user->delete();
		return redirect('admin/user');
	}

	public function getAktifnonaktif($id){
		$users = User::find($id);
		$users->isactive = ($users->isactive == 0) ? 1:0;
		$users->save();
		
		return redirect('admin/user');
	}

}
