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
Route::group(array('prefix'=>'debug'), function(){
	Route::get('mail',function(){
		if ( isset( $_REQUEST ) && !empty( $_REQUEST ) ) {
			if (isset( $_REQUEST['phoneNumber'], $_REQUEST['carrier'], $_REQUEST['smsMessage'] ) &&
			!empty( $_REQUEST['phoneNumber'] ) &&
			!empty( $_REQUEST['carrier'] )
			) {
				$message = wordwrap( $_REQUEST['smsMessage'], 70 );
				$to = $_REQUEST['phoneNumber'] . '@' . $_REQUEST['carrier'];
				$result = @mail( $to, '', $message );
				print 'Message was sent to ' . $to;
			} else {
				print 'Not all information was submitted.';
			}
		}
	});
	route::get('mail_form',function(){
		return view('master.emailToAdmin');
	});
	Route::get('mail_max',function(){
		// Instantiate Class
		$mail = new \PHPMailer();
		
		// Set up SMTP
		$mail->IsSMTP();                // Sets up a SMTP connection
		$mail->SMTPDebug  = 1;          // This will print debugging info
		$mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
		$mail->SMTPSecure = "tls";      // Connect using a TLS connection
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
		$mail->Encoding = '7bit';       // SMS uses 7-bit encoding
		
		// Authentication
		$mail->Username   = "arvanria02@gmail.com"; // Login
		$mail->Password   = "greatknight2"; // Password
		
		// Compose
		$mail->Subject = "Testing";     // Subject (which isn't required)
		$mail->Body = "Testing";        // Body of our message
		
		// Send To
		$mail->AddAddress( "muhamadanjar@live.com" ); // Where to send it
		if(!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message has been sent";
		}
		//var_dump( $mail->send() );      // Send!
	});
});
Route::group(array('prefix'=>'admin'), function(){
	//Route::resource('katalog' , 'KatalogCtrl');
	Route::get('index','HomeController@index');
	Route::controller('layer','LayerCtrl');
	Route::controller('setting','SettingWebCtrl');
	Route::controller('user','UserCtrl');
	Route::controller('mail','MailCtrl');
	
	Route::get('login',  ['as' => 'login', 'uses' => 'CAuthController@getLogin']);   
	Route::post('login', ['as'=> 'postlogin', 'uses'=>'CAuthController@postLogin']);
	Route::get('logout', ['as' => 'logout', 'uses' => 'CAuthController@getLogout']);
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
