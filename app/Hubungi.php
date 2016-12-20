<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hubungi extends Model {

	protected $table = 'hubungi';
	protected $fillable = [
		'nama',
		'email'
	];
	protected $primaryKey = 'idhubungi';

}
