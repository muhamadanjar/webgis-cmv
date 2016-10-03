<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controller('map','MapCtrl');

Route::group(array('prefix'=>'admin'), function(){
	//Route::resource('katalog' , 'KatalogCtrl');
	Route::get('index','HomeController@index');
	Route::controller('layer','LayerCtrl');
	Route::controller('setting','SettingWebCtrl');
	Route::controller('user','UserCtrl');


	Route::get('login',  ['as' => 'login', 'uses' => 'CAuthController@getLogin']);   
	Route::post('login', ['as'=> 'postlogin', 'uses'=>'CAuthController@postLogin']);
	Route::get('logout', ['as' => 'logout', 'uses' => 'CAuthController@getLogout']);
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
