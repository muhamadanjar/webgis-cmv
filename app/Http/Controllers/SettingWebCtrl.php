<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lib\AHelper;
use Illuminate\Http\Request;
use App\Lib\Statistik;
use DB;
use Carbon\Carbon;
class SettingWebCtrl extends Controller {

	public function __construct(){
		$this->middleware('auth');
		$this->ahelper = new AHelper();
	}

	public function getSettingUrl(){
		return view('settings.gantiurlesri');
	}

	public function postSettingUrl(Request $request){
		$search = $request->search;
		$replace = $request->replace;
		$layers = \App\Layer::orderBy('orderlayer','asc')->get();
		$array = array();
		foreach ($layers as $key => $l) {
			$array[$key] = str_replace($search, $replace, $l->layerurl);
			\DB::table('layeresri')->where('id_layer', $l->id_layer)->update(['layerurl' => $array[$key]]);
		}
		return \Redirect::to('/setting/setting-url');
		
	}

	public function getMinifyjs($value=''){
		$url = 'https://javascript-minifier.com/raw';
	    $js = file_get_contents('./simposi.js');

	    $data = array(
	        'input' => $js,
	    );

	    // init the request, set some info, send it and finally close it
	    $ch = curl_init($url);

	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	    $minified = curl_exec($ch);

	    curl_close($ch);

	    // output the $minified
	    echo $minified;
	}


	public function getGantipassword($value=''){
		$users = \Auth::user();
		return view('settings.gantipassword')->with('users',$users);	
	}

	public function postGantipassword(Request $request){

		$qlayer = \App\User::find(\Auth::user()->id);
		$users = $qlayer;
		
		if($request->oldpassword == $request->password){
			$users->password = $request->oldpassword;		
		}else{
			$users->password = bcrypt($request->password);			
		}
		$users->save();
		return redirect('/admin/index');
	}


	public function getGantiprofil($value=''){
		$users = \Auth::user();
		return view('settings.gantiprofil')->withUsers($users);
	}

	public function postGantiprofil(Request $request){

		$fileName = str_random(20) . '.' . $request->file('image')->getClientOriginalExtension();	

		$users = \App\User::find(\Auth::user()->id);
		$users->name = $request->name;
		$users->email = $request->email;
		
		if($fileName != null){
			$this->UploadFile($request->file('image'),$fileName);
			$users->image = $fileName;
		}

		if($request->oldpassword == $request->password){
			$users->password = $request->oldpassword;		
		}else{
			$users->password = bcrypt($request->password);			
		}
		$users->save();
		return redirect('admin/setting/gantiprofil');
	}

	function UploadFile($fupload,$fileName){
        //direktori file
        $destinationPath = public_path('images/users');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777);
            echo "The directory $destinationPath was successfully created.";
            exit;
        } else {
            echo "The directory $destinationPath exists.";
        }
       
        $fuploadName = $fupload->getClientOriginalName();
        $fuploadExt = $fupload->getClientOriginalExtension();
        $fuploadSize = $fupload->getSize();
        //$fileName = str_random(20) . '.' . $fupload->getClientOriginalExtension();   
        //Simpan file
        $fupload->move($destinationPath, $fileName);
       
    }

	public function getVisitor(Request $request){
		$statistik = new Statistik();
		$ip      = $statistik->ip_user();
		$browser = $statistik->browser_user();
		$os      = $statistik->os_user();
		$visitor = $request->cookie('VISITOR');
		$tanggal = date("Ymd");
		$waktu = time();
		$bataswaktu = $waktu - 300;
		// Check bila sebelumnya data pengunjung sudah terrekam
		if (!isset( $visitor )) {
		
			// Masa akan direkam kembali
			// Tujuan untuk menghindari merekam pengunjung yang sama dihari yang sama.
			// Cookie akan disimpan selama 24 jam
			$duration = time()+60*60*24;
		
			// simpan kedalam cookie browser
			//setcookie('VISITOR',$browser,$duration);
			cookie('VISITOR', $browser, $duration);
		
			// SQL Command atau perintah SQL INSERT
			//$sql = "INSERT INTO statistik (ip, os, browser) VALUES ('$ip', '$os', '$browser')";
			$statistik = DB::table('statistik_web')->orderBy('online','DESC')->where('ip',$ip)->where('date_create',$tanggal)->get();
			if (count($statistik) > 0){
				
				DB::table('statistik_web')
				->where('ip', $ip)->where('date_create', $tanggal)
				->update(
					[
						'hits' => $statistik[0]->hits + 1, 
						'online' => $waktu
					]
				);
			}else{
				DB::table('statistik_web')->insert(
					[
						'ip' => $ip, 
						'os' => $os,
						'hits' => 1, 
						'browser' => $browser,
						'online' => $waktu,
						'date_create' => Carbon::now()
					]
				);
			}
			

			// variabel { $db } adalah perwakilan dari koneksi database lihat config.php
			//$query = $db->query($sql);
			return redirect()->intended($this->redirectPathVisitor());
		}
		
	}

	public function getUseronline(){
		return \App\User::where('isonline',1)->count();
	}

	public function setCookie(Request $request){
      $minutes = 1;
      $response = new Response('Hello World');
      $response->withCookie(cookie('name', 'virat', $minutes));
      return $response;
   }
   public function getCookie(Request $request){
      $value = $request->cookie('name');
      echo $value;
   }

   public function getStatistiklist($value=''){
	   $statistik = DB::table('statistik_web')->get();

	   return view('master.statistikList')->withStatistik($statistik);
   }



   public function redirectPathVisitor(){
        if (property_exists($this, 'redirectPathVisitor')){
            return $this->redirectPathVisitor;
        }

        return property_exists($this, 'redirectToVisitor') ? $this->redirectToVisitor : '/map';
    }

	public function getPengunjungonline($value=''){
		$bataswaktu = time() - 300;
		$pengunjungonline = \DB::table('statistik_web')->where('online','>',$bataswaktu)->get();
		return count($pengunjungonline);
	}

	public function getHitstoday($value=''){
		
		$hits = \DB::table('statistik_web')->select('SUM(hits as hitstoday)')->where('date_create',$tanggal)
		->groubBy('date_create')->get();

		return $hits;
	}




}
