<?php namespace App\Http\Controllers;
use App\Http\Controllers\SettingWebCtrl as SW;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	
	public function __construct(){
		//$this->middleware('auth');
	}

	
	public function index(){
		$sw = new SW();
		$pengunjungonline = $sw->getPengunjungonline();
		$pesanbelumdibaca = $sw->getPesanBelumDibaca();
		return view('home')
		->withPengunjungonline($pengunjungonline)
		->withPesanbelumdibaca($pesanbelumdibaca)
		->withUseronline($sw->getUseronline());
	}

	public function getMail($value=''){
		$message = "Line 1\r\nLine 2\r\nLine 3";

		// In case any of our lines are larger than 70 characters, we should use wordwrap()
		$message = wordwrap($message, 70, "\r\n");

		// Send
		mail('arvanria@gmail.com', 'My Subject', $message);
	}

	public function getMessage($value=''){
		return view('master.hubungi');
	}

}