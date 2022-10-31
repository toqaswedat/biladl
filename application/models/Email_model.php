<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model{
	
	function SendEmail_Basic($to, $subject, $message, $attachs = NULL, $replyTo = NULL)
	{
		$username = 'norply@couponup.com';
		$password = 'VMmail@104';
		
		if(!$replyTo){
			$replyTo = array('email' => 'norply@couponup.com', 'name' => 'Coupon Up');
		}
		
		$signature = ""; 
		
		$message = $message.$signature;
		
		$this->load->library('email');
		
		$config['protocol'] 	= "sendmail";
		$config['charset'] 		= "utf-8";
		$config['mailtype'] 	= "html";
		$config['newline'] 		= "\r\n";
				
		$this->email->initialize($config);

		$this->email->from($username, 'norply@couponup.com');
		$this->email->to($to);			
		$this->email->reply_to($replyTo['email'], $replyTo['name']);
		$this->email->subject($subject);
		$this->email->message($message);
		
		if($attachs) foreach($attachs as $attach)
			$this->email->attach($attach);
		
		$this->email->send();
		
		//echo $this->email->print_debugger();
		// exit;
		
		return true;
	}


	function SendEmail($to, $subject, $message, $attachs = NULL, $replyTo = NULL, $cc = NULL, $bcc = NULL){
		
		//return false;

		// $username = 'no-reply@biladl.com';
		// $password = 'iprism_123';
		$username = 'taparanjan.s@iprismtech.com';
		$password = 'prism@2018';
		
		if(! $replyTo){
			$replyTo = array('email' => 'noreply@venuemax.in', 'name' => 'VenueMax');
		}
		
		$signature = ""; 
		
		$message = $message.$signature;
		
		$this->load->library('email');
		
		$config['protocol'] 	= "smtp";
		$config['smtp_host'] 	= "ssl://smtp.gmail.com";

		//$config['protocol'] 	= "smtp";
		//$config['smtp_host'] 	= "mail.biladl.com";
		$config['smtp_port'] 	= "465";
		//$config['validation'] 	= TRUE;
		//$config['smtp_timeout'] 	= 30;
		$config['smtp_user'] 	= $username; 
		$config['smtp_pass'] 	= $password;
		$config['charset'] 		= "utf-8";
		$config['mailtype'] 	= "html";
		$config['newline'] 		= "\r\n";
				
		$this->email->initialize($config);
		$this->email->clear(TRUE);
		$this->email->from($username, 'biladl');
		$this->email->to($to);			
		if($cc)
			$this->email->cc($cc);	
		if($bcc)
			$this->email->bcc($bcc);
		//$this->email->reply_to($replyTo['email'], $replyTo['name']);
		$this->email->subject($subject);
		$this->email->message($message);
		
		if($attachs) foreach($attachs as $attach)
			$this->email->attach($attach);
		
		$this->email->send();
		
		// echo $this->email->print_debugger();
		// exit;
		
		return true;
	}






	function SendGridEmail($to, $subject, $message, $attachs = NULL, $replyTo = NULL, $cc = NULL){
		
		//return false;

		$username = 'venuemax';
		$password = 'office@104';
		
		if(! $replyTo){
			$replyTo = array('email' => 'noreply@venuemax.in', 'name' => 'VenueMax');
		}
		
		$signature = ""; 
		
		$message = $message.$signature;
		

		$this->load->library('email');

		$this->email->send();

		$config['protocol'] 	= "smtp";
		$config['smtp_host'] 	= "smtp.sendgrid.net";
		$config['smtp_port'] 	= "587";
		$config['smtp_user'] 	= $username; 
		$config['smtp_pass'] 	= $password;
		$config['charset'] 		= "utf-8";
		$config['mailtype'] 	= "html";
		$config['newline'] 		= "\r\n";
				
		$this->email->initialize($config);

		$this->email->from($username, 'VenueMax');
		$this->email->to($to);			
		if($cc)
			$this->email->cc($cc);
		$this->email->reply_to($replyTo['email'], $replyTo['name']);
		$this->email->subject($subject);
		$this->email->message($message);
		
		if($attachs) foreach($attachs as $attach)
			$this->email->attach($attach);
		
		$this->email->send();
		
		/*echo $this->email->print_debugger();
		exit;*/
		
		return true;
	}



}