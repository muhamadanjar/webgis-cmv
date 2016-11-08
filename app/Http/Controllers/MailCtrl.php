<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lib\MailWebGIS;
use Illuminate\Http\Request;

class MailCtrl extends Controller {
	public $mail_local;
    public $username_mail;
    public $password_mail;
	function __construct(){
		$this->middleware('auth.admin');
		$this->mail_local = "smtp.gmail.com";
        $this->username_mail = "arvanria02@gmail.com";
        $this->password_mail = "greatknight2";
	}
	function getMail(){
		return view('master.emailToAdmin');
	}

	function postMail(Request $r){
		$mail = new \PHPMailer();
		// Set up SMTP
		$mail->IsSMTP();                // Sets up a SMTP connection
		$mail->SMTPDebug  = 0;          // This will print debugging info
		$mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
		$mail->SMTPSecure = "tls";      // Connect using a TLS connection
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
		$mail->Encoding = '7bit';       // SMS uses 7-bit encoding
		$mail->FromName = "Support Team";

		// Authentication
		$mail->Username   = $this->username_mail; // Login
		$mail->Password   = $this->password_mail; // Password
		
		// Compose
		$mail->Subject = $r->subject;     // Subject (which isn't required)
		$mail->Body = $r->body;        // Body of our message
		
		// Send To
		$mail->AddAddress( $r->mailto ); // Where to send it
		if(!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message has been sent";
		}
	}

}
