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
		$mail->SMTPDebug  = 2;          // This will print debugging info
		$mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
		$mail->SMTPSecure = env("MAIL_SMTPSecure_GMAIL");      // Connect using a TLS connection
		$mail->Host = env('MAIL_HOST_GMAIL');//"smtp.gmail.com";
		$mail->Port = env('MAIL_PORT_GMAIL');//587;
		$mail->Encoding = '7bit';       // SMS uses 7-bit encoding
		$mail->FromName = "Support Team";

		// Authentication
		$mail->Username   = env('MAIL_USERNAME_GMAIL');//$this->username_mail; // Login
		$mail->Password   = env('MAIL_PASSWORD_GMAIL');//$this->password_mail; // Password
		
		// Compose
		$mail->Subject = $r->subject;     // Subject (which isn't required)
		$mail->Body = $r->body;        // Body of our message
		
		// Send To
		$mail->AddAddress( $r->mailto ); // Where to send it

		/*$mail->AddReplyTo('name@yourdomain.com', 'First Last');
		$mail->SetFrom('name@yourdomain.com', 'First Last');
		$mail->AddReplyTo('name@yourdomain.com', 'First Last');
		$mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
		$mail->MsgHTML(file_get_contents('contents.html'));
		$mail->AddAttachment('images/phpmailer.gif');
		$mail->AddAttachment('images/phpmailer_mini.gif');*/


		if(!$mail->Send()) {
			$r->session()->flash('status',  'Mailer Error: ' . $mail->ErrorInfo);
		} else {
			$r->session()->flash('status', 'Message has been sent');
		}

		//return redirect('admin/mail/mail');
	}

}
