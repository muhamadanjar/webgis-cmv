<?php namespace App\Http\Controllers;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use Illuminate\Contracts\Auth\Guard;

use App\Http\Controllers\SettingWebCtrl;
use App\Http\Controllers\LayerCtrl;
use App\Http\Controllers\CAuthController as LoginCtrl;
use App\Http\Controllers\MailCtrl;
use App\Http\Controllers\HubungiCtrl;
use App\Http\Controllers\ChatCtrl;

use Illuminate\Http\Request;

class AdminCtrl extends Controller {
	protected $redirect;
	public function __construct(Guard $auth){
		$this->setting = new SettingWebCtrl();
		$this->login = new LoginCtrl($auth);
		$this->layer = new LayerCtrl();
		$this->hubungi =  new HubungiCtrl();
		$this->chat = new ChatCtrl();
		$this->middleware('auth.admin',['except' => array('getLogin','postLogin')]);
	}

	public function getIndex(){
		return view('master.profil');
	}

	public function getProfil(){
		return view('master.profil');
	}

	//Login
	public function getLogin(){
		return $this->login->getLogin();
	}

	public function postLogin(Request $request){
		return $this->login->postLogin($request);
	}

	public function getLogout(){
		return $this->login->getLogout();
	}

	/*public function getChat(){
		return $this->chat->getIndex();
	}*/

	//Messages

	public function getAllmessages(){
		return $this->hubungi->getIndex();
	}



}
