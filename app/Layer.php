<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Layer extends Model {

	protected $table = 'layeresri';
	protected $primaryKey = 'id_layer';

	protected $hidden = ['jsonfield'];

}
