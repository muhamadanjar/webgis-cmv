<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Layer extends Model {

	protected $table = 'layeresri';
	protected $primaryKey = 'id_layer';

	protected $hidden = ['jsonfield'];

	public static $rules = array(
		'layer'=>'required|min:3',
		'layerurl' => 'required|min:3',
	);

	public static $messages = [
	    'layer.required' => 'kode layer harus diisi!',
		'layerurl.required' => 'Url Layer harus di isi',
	];

}
