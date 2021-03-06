<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lib\Statistik;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LRedis;

class ChatCtrl extends Controller {

	public function __construct(){
		$this->middleware('auth');
		$this->statistik = new Statistik();
	}

	public function getIndex($value=''){
		return view('master.chat');
	}

	public function getLond($value=''){
		return view('master.chat_londinium');
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
		
		$msg ="";
		foreach ($result as $key => $value) {
			$msg .= $value->username;
			$msg .= '\\';
			$msg .= $value->messages;
			$msg .= '\\';
			
			$msg .= date('M j Y',strtotime($value->tanggal));
			$msg .= PHP_EOL;
		}
		
		return $msg;
	}

	public function getUpdatemessages($username,$message){
		$_username = stripslashes(htmlspecialchars($username));
		$_message = stripslashes(htmlspecialchars($message));

		if ($_message == "" || $_username == "") {
			die();
			exit();
		}
		$dt = Carbon::now();
		\DB::table('chat')->insert(
			[
			'id_user' => \Auth::user()->id, 
			'ip' => $_SERVER['REMOTE_ADDR'],
			
			'os' => $this->statistik->os_user(),
			'browser' => $this->statistik->browser_user(),
			'tanggal'=> $dt,
			'jam'=> $dt->toTimeString(),
			'username' => \Auth::user()->username,
			'messages' => $message,
			]
		);

		/*$result = $db->prepare("INSERT INTO messages VALUES('',?,?)");
		$result->bind_param("ss", $username, $message);
		$result->execute();*/

	}

	public function form_chat($value='')
	{
		return view('master.form_chat');
	}
	public function sendMessage(){
		$redis = LRedis::connection();
		$data = ['message' => Request::input('message'), 'user' => Request::input('user')];
		$redis->publish('message', json_encode($data));
		return response()->json([]);
	}

	

}
