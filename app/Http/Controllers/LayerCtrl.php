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
		session()->forget('aksi');
		$aksi = 'add';
		session()->put('aksi', $aksi);
		return view('master.LayerAddEdit')->with('aksi',$aksi);
	}
	public function postTambah(Request $request){
		try {
			
			$query = (session('aksi') == 'edit') ? Layer::find($request->id_layer) : new Layer;
			$layer = $query;
			$layer->layername = $request->layername;
			$layer->layerurl = $request->layerurl;
			$layer->layer = $request->layer;
			$layer->na = (bool)$request->na;
			
			
			$layer->id_grouplayer = $request->id_grouplayer;
			$layer->orderlayer = $request->orderlayer;
			$layer->tipelayer = $request->tipelayer;
			
			
			$layer->option_visible = (bool)$request->option_visible;
			$layer->option_opacity = $request->option_opacity;
			$layer->jsonfield = $request->jsonfield;
			
			$layer->save();
		} catch (Exception $e) {
			\DB::rollback();
		    throw $e;
		}

		return \Redirect::to('admin/layer');
	}
	public function getUbah($id){
		session()->forget('aksi');
		$aksi = 'edit';
		session()->put('aksi', $aksi);
		$layer = \App\Layer::find($id);
		return view('master.LayerAddEdit')->with('aksi',$aksi)->with('layer',$layer);
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
			//return $medias;
			//return $msg." ".$idx." ".$desc;
			return redirect('layer');
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
				//echo $i.' '.$visible[$i].' ';
				if (!isset($visible[$i])) {
					//array_push($visible, null);
					$visible[$i] = null;
				}
				$v = ($visible[$i] == null ? 0:1);
				//$v = array_key_exists($i, $visible) == false ? null: $visible[$i];
				
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
			}else {
              	$value['fields'] = $fields;
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

}
