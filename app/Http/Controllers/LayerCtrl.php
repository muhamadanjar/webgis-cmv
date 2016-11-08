<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Layer;
use App\Identify;
use Illuminate\Http\Request;
use Validator;

class LayerCtrl extends Controller {

	protected $baseurl;
	public function __construct() {
		$this->baseurl = url();
		$this->middleware('auth');
		
	}

	public function getIndex(){

		$layer = DB::table('layeresri')->get();
		return view('master.layerList')->with('layer',$layer);
	}
	public function getTambah(){
		$level = $this->GetDftrLevel();
		session()->forget('aksi');
		$aksi = 'add';
		session()->put('aksi', $aksi);
		return view('master.LayerAddEdit')
		->with('level',$level)
		->with('aksi',$aksi);
	}
	public function postTambah(Request $request){
		try {
			$validator = Validator::make($request->all(), Layer::$rules,Layer::$messages);

			if(!$validator->passes()) {
				return redirect('modul-add')
				->with('message', \AHelper::format_message('Error,Coba lagi','cancel'))
				->withErrors($validator)
				->withInput();
			}

			$query = (session('aksi') == 'edit') ? Layer::find($request->id_layer) : new Layer;
			$layer = $query;
			$layer->layername = $request->layername;
			$layer->layerurl = $request->layerurl;
			$layer->layer = $request->layer;
			$layer->na = (bool)$request->na;
			
			$layer->id_grouplayer = $request->id_grouplayer;
			$layer->orderlayer = ($request->orderlayer == null) ? 0 : $request->orderlayer;
			$layer->tipelayer = $request->tipelayer;

			$layer->option_visible = (bool)$request->option_visible;
			$layer->option_opacity = $request->option_opacity;
			$layer->jsonfield = $request->jsonfield;
			
			$layer->save();
		} catch (Exception $e) {
			\DB::rollback();
		    throw $e;
		}

		try {
			if($request->level != null){
				$_rolelayer = $this->getLevel($layer->id_layer);
				if(session('aksi') == 'edit'){
					$usermodul = DB::table('role_layer')->where('layer_id',$layer->id_layer)->delete();
				}
				foreach ($_rolelayer as $key => $value) {
					$detil = new \App\RoleLayer();
					
					$detil->role_id = $value['role_id'];
					$detil->layer_id = $value['layer_id'];
					$detil->save();
				}
			}
		}catch (Exception $e) {
			DB::rollback();
		    throw $e;
		}

		return \Redirect::to('admin/layer');
	}
	public function getUbah($id){
		$detil = $this->getVallevelmodul($id);
		$level = $this->GetDftrLevel($detil);
		session()->forget('aksi');
		$aksi = 'edit';
		session()->put('aksi', $aksi);
		$layer = \App\Layer::find($id);
		return view('master.LayerAddEdit')->with('aksi',$aksi)
		->with('level',$level)
		->with('layer',$layer);
	}
	public function getHapus($id){
		$layer = Layer::find($id);
		$layer->delete();
		return \Redirect::to('admin/layer');
	}


	//Layer Info

	public function getLayerinfo($id) {

		$admin = \Auth::user();
		$layer = Layer::find($id);
		$layer_ = $layer->layer;
		$title = 'Set Layer ';
		$field = json_decode($layer->jsonfield);
		
		return view('master.layerSettinglyr')->with('title', $title)
		->with('layers', $layer)->with('admin', $admin)
		->with('id',$id)
		->with('field',$field);
	}
	public function getLayerinfopopup($id,$idx,$layern) {
		$admin = \Auth::user();
		$layer = Layer::find($id);
		$identify = Identify::where('layerid' , '=', $idx)->where('layername', '=',$layern, 'AND')->first();
		$identify2 = $identify == null ? new Identify : $identify;
		$url = $this->baseurl;

		$field = json_decode($this->getFields($id,$idx));
		
		$title = 'Pengaturan Layer '.$layern;



		return view('master.layerSettinglyrFtr')
		->with('judul', $title)
		->with('layers', $layer)
		->with('admin', $admin)
		->with('idx',$idx)
		->with('identify',$identify2)
		->with('url',$url)
		->with('field',$field);
	}
	public function postLayerinfopopup($id,$idx,$layern){
		$fieldinfo = $this->getFieldinfos();
		$medias = $this->getMedias();
	
		$desc = \Input::get('display') == 'keyvalue' ? $this->getDesc():\Input::get('description');
		$rules = array(
			'layername' => 'required',
	        
	    );
	    $validator = Validator::make(\Input::all(),$rules);
	    if ($validator->fails()) {
	    	// get the error messages from the validator
	        $messages = $validator->messages();

	        // redirect our user back to the form with the errors from the validator
	        return Redirect::to('layer')
	            ->withErrors($validator);
	    }else{
	    	$check = Identify::where('layerid' , '=', $idx)->where('layername', '=',$layern, 'AND')->first();
			if ($check === null) {
				$identify = new Identify;
				$identify->title = \Input::get('title');
				$identify->display = \Input::get('display');
				$identify->description = $desc;
				$identify->layername = \Input::get('layername');
				$identify->layerid = \Input::get('layerid');
				$identify->key_ = $fieldinfo;
				$identify->media = $medias;
				$identify->showattachments = \Input::get('showattachments');

				$identify->save();
				$msg = 'tambah';
			}else{
				
				$identify = $check;
				$identify->title = \Input::get('title');
				$identify->description = $desc;
				$identify->layername = \Input::get('layername');
				$identify->layerid = \Input::get('layerid');
				$identify->display = \Input::get('display');
				$identify->key_ = $fieldinfo;
				$identify->media = $medias;
				$identify->showattachments = \Input::get('showattachments');

				$identify->save();
				$identify->touch();
				$msg = 'edit';
			}
			
			return redirect('admin/layer');
	    }
	}
	public function getFields($id,$idx){
		$layer = Layer::find($id);
		$layers = json_decode($layer->jsonfield);
		foreach ($layers as $key => $value) {
			if ($value->id == $idx) {
				$field = $value;
			}
		}
		
		return json_encode($field);
	}
	public function getFieldinfos(){
		$visible = \Input::get('visible');
		$nf = \Input::get('nf');
		$nalias = \Input::get('nalias');
		$label = \Input::get('label_field');
		$name = \Input::get('name_field');
		$array = array();
		$array2 = array();
		if ($visible != null) {
		
			foreach ($name as $i => $value) {
				
				$v = 0;
				
				if (!isset($visible[$i])) {
					//array_push($visible, null);
					$visible[$i] = null;
				}
				$v = ($visible[$i] == null ? 0:1);
				
				$array['fieldName'] = $name[$i];
				$array['label'] = $label[$i];
				$array['visible'] = (bool)$v;
				array_push($array2,$array);
			}
		}

		return json_encode($array2);
	}
	public function getMedias(){
		$title = \Input::get('title_m');
		$caption = \Input::get('caption_m');
		$url = \Input::get('url_m');
		$link = \Input::get('link_m');
		$type = \Input::get('type_m');

		$fields = \Input::get('field');
		
		$array = array();
		$array2 = array();
		$value = array();
			$array['title'] = $title;
			$array['caption'] = $caption;
			$array['type'] = $type; 
			if ($type == 'image') {
				$value['sourceURL'] = $url;
				$value['linkURL'] = $link;
			}else{
				$comma_separated = implode(",", $fields);
				$comma_separated = explode(",", $comma_separated);
				$value['fields_'] = $fields;
              	$value['fields'] = $comma_separated;
			}
			

			$array['value'] = $value;
			array_push($array2,$array);
		return json_encode($array2);
	}
	public function getDesc(){
		$visible = \Input::get('visible');
		$nf = \Input::get('nf');
		$nalias = \Input::get('nalias');
		$label = \Input::get('label_field');
		$name = \Input::get('name_field');
		$html = '<table>';

		foreach ($visible as $i => $value) {
			$html .= '<tr><td><b>'.$label[$i].'</b></td><td>{'.$value.'}</td></tr>';
		}
		
		$html .= '</table>';

		return $html;
	}
	public function getLayeresrihapus($id){
		$layer = Layer::find($id);
		$layer->jsonfield = null;
		$layer->save();
		return redirect('layer');
	}

	public function GetDftrLevel($lvl='') {	
	  	$level = \App\Role::orderBy('id','asc')->get();
	  	$a = '';
	  	foreach ($level as $key => $value) {
	  		$ck = (strpos($lvl, ".".$value->id) === false)? '' : 'checked';
	  		$a .= "<div class='checkbox'>";
	  		$a .= "<label><input type='checkbox' name='level[]' class='styled' value='$value->id' $ck><span class='fa fa-check'></span> $value->id - $value->name</label>";
	  		$a .= "</div>";
	  	} 
	  	return $a;
	}

	public function getVallevelmodul($layerid){
		$detil = \App\RoleLayer::whereRaw('layer_id = ?',array($layerid))->get();
		$a='';
		foreach ($detil as $key => $value) {
			$a .= '.'.$value->role_id;
		}
		return $a;
	}

	public function getLevel($layerid=''){
		$levelform = \Input::get('level');
		$array = array();
		$array2 = array();
		if(empty($layerid)){
			return false;
		}
		if($levelform != null){
			foreach ($levelform as $key => $value) {
				$array['layer_id'] = $layerid;
				$array['role_id'] = $value;
			
				array_push($array2,$array); 
			}
			return $array2;
		}
	}

}
