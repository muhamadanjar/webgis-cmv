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
Route::get('message', 'HomeController@getMessage');

Route::controller('map','MapCtrl');
/*Route::group(array('prefix'=>'debug'), function(){
	Route::get('mail',function(){
		$to      = 'arvanria@example.com';
		$subject = 'the subject';
		$message = 'hello';
		$headers = 'From: webmaster@example.com' . "\r\n" .
			'Reply-To: webmaster@example.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);
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
});*/

Route::group(array('prefix'=>'admin'), function(){
	Route::controller('layer','LayerCtrl');
	Route::controller('setting','SettingWebCtrl');
	Route::controller('user','UserCtrl');
	Route::controller('mail','MailCtrl');
});
Route::controller('admin','AdminCtrl');
