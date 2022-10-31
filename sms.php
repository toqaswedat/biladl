<?php 
echo SendSMS('919603272277','Hi');

function SendSMS($phone = NULL, $message = NULL)
{		
	if($phone && $message)
	{

$smsusername = "ivorypalm";
$smspassword = "0Hez8G";
$sender_id = "JLFIRM"; // optional (compulsory in transactional sms) 

$message = urlencode($message); 
$smsmobile = urlencode($phone); 
$url="http://www.jawalbsms.ws/api.php/sendsms?user=$smsusername&pass=$smspassword&to=$smsmobile&message=$message&sender=$sender_id";
		// init the resource
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0
	
		));
	
		//get response
		$res = curl_exec($ch);
	
		//Print error if any
		if(curl_errno($ch))
		{
			//echo 'error:' . curl_error($ch);
		}
	
		curl_close($ch);
		return $res;
		exit;
		if(stristr($res, 'Success') === FALSE) {
		return false;
		}else{
		return true;
		}		
		//return $res;
	}		
}
?>