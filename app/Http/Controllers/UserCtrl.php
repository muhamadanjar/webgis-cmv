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


	public function getUbah($id){
		$user = User::find($id);
		return view('master.userAddEdit')->withStatus('edit')->withUsers($user);
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

	public function getlevel($layerid=''){
		$levelform = \Input::get('level');
		$array = array();
		$array2 = array();
		if(empty($layerid)){
			return 'layerid kosong';
		}
		foreach ($levelform as $key => $value) {
			$array['layer_id'] = $layerid;
			$array['role_id'] = $value;
			array_push($array2,$array); 
		}
		return $array2;
	}

	public function GetDftrLevel($lvl='') {
	
	  	$level = Role::whereRaw('id != ?',array(0))->get();
	  	$a = '';
	  	foreach ($level as $key => $value) {
	  		$ck = (strpos($lvl, ".$value->id") === false)? '' : 'checked';
	  		$a .= "<div class='row'><div class='col-md-12'>";
	  		$a .= "<label class='checkbox-primary'><input type=checkbox name='level[]' class='styled' value='$value->id' $ck> $value->id - $value->name</label>";
	  		$a .= "</div></div>";
	  	} 
	  	return $a;

	}

}
