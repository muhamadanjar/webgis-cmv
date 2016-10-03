<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SettingWebCtrl extends Controller {

	public function __construct(){
		$this->middleware('auth');
	}

	public function getSettingUrl(){
		return view('settings.gantiurlesri');
	}

	public function postSettingUrl(Request $request){
		$search = $request->search;
		$replace = $request->replace;
		$layers = Layer::orderBy('orderlayer','asc')->get();
		$array = array();
		foreach ($layers as $key => $l) {
			$array[$key] = str_replace($search, $replace, $l->layerurl);
			DB::table('Layers')->where('id_layer', $l->id_layer)->update(['layerurl' => $array[$key]]);
		}
		return Redirect::to('/setting/setting-url');
		
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




}
