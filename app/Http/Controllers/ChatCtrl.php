<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lib\Statistik;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatCtrl extends Controller {

	public function __construct(){
		$this->middleware('auth');
	}

	public function getIndex($value=''){
		return view('master.chat');
	}

	public function getMessages($username=''){
		$username = stripslashes(htmlspecialchars($username));

		/*$result = $db->prepare("SELECT * FROM messages");
		//$result->bind_param("s", $username);
		$result->execute();

		$result = $result->get_result();
		while ($r = $result->fetch_row()) {
			echo $r[1];
			echo "\\";
			echo $r[2];
			echo "\n";*/
		$result = \DB::table('chat')->get();

		return $result;
	}

	public function getUpdatemessages($username,$message){
		$username = stripslashes(htmlspecialchars($username));
		$message = stripslashes(htmlspecialchars($message));

		if ($message == "" || $username == "") {
			die();
			exit();
		}
		$dt = Carbon::now();
		\DB::table('chat')->insert(
			[
			'id_user' => \Auth::user()->id_user, 
			'ip' => $_SERVER['REMOTE_ADDR'], 
			'os' => Statistik::os_user(),
			'browser' => Statistik::browser_user(),
			'tanggal'=>$dt,
			'jam'=> $dt->toTimeString()
			]
		);

		/*$result = $db->prepare("INSERT INTO messages VALUES('',?,?)");
		$result->bind_param("ss", $username, $message);
		$result->execute();*/

	}

	

}
