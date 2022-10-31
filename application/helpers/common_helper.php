<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if( ! function_exists('SendEmail')){
    function SendEmail($to = '', $subject = '', $message = '', $attachs = NULL, $replyTo = NULL){
		if($to && $subject && $message){
			$ci =& get_instance();
			$ci->load->model('email_model');
			$ci->email_model->SendEmail_Basic($to, $subject, $message, $attachs, $replyTo);
		}
		return false;
	}
}


if( ! function_exists('SendSMS')){
    function SendSMS($phone = NULL, $message = NULL)
    {		
		if($phone && $message)
		{
			// $ci=& get_instance();
			// $MessageAPI_URL 		= $ci->config->item('MessageAPI_URL');
			// $MessageAPI_Configs 	= $ci->config->item('MessageAPI_Configs');
			
			// $getData = 'mobileNos='.$phone.'&message='.urlencode($message).'&senderId='.$MessageAPI_Configs['senderId'].'&routeId='.$MessageAPI_Configs['routeId'];
		
			// //API URL
			// $url=$MessageAPI_URL."?AUTH_KEY=".$MessageAPI_Configs['AUTH_KEY']."&".$getData;

// "http://www.jawalbsms.ws/api.php/sendsms?user=ivorypalm&pass=Pi1739&to=966507166600&message=test%from%iprism&sender=Biladl"

$smsusername = "ivorypalm";
$smspassword = "Holzner@4143";
$sender_id = "JLFIRM"; // optional (compulsory in transactional sms) 

$message = urlencode($message); 
$smsmobile = urlencode($phone); 
$url="https://www.jawalbsms.ws/api.php/sendsms?user=$smsusername&pass=$smspassword&to=$smsmobile&message=$message&sender=$sender_id";
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
			if(stristr($res, 'Success') === FALSE) {
			return false;
			}
			else{
			return true;
			}		
			//return $res;
		}		
		return false;
	}
}



if( ! function_exists('check_user_is_expart')){
    function check_user_is_expart($UserID = NULL)
    {		
		if($UserID)
		{
			$ci=& get_instance();
			$Result = $ci->db->get_where('users',
			 array(
			 	'id' => $UserID,
				'type'=>'EXPERT'
				)
			 );

			//echo $ci->db->last_query();
			if($Result->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		return false;
	}
}


if( ! function_exists('check_user_is_user')){
    function check_user_is_user($UserID = NULL)
    {		
		if($UserID)
		{
			$ci=& get_instance();
			$Result = $ci->db->get_where('users',
			 array(
			 	'id' => $UserID,
				'type'=>'USER'
				)
			 );

			//echo $ci->db->last_query();
			if($Result->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		return false;
	}
}



if( ! function_exists('upload_image')){
    function upload_image($image_data= array())
    {    	
    	if($images=strstr($image_data['image'], ','))
    	{
    		$image_data['image']=$images;
    	}
    	elseif($images=strstr($image_data['image'], 'i'))
    	{
    		$image_data['image']=$images;
    	}

        $encoded_string = $image_data['image'];
        $imgdata = base64_decode($encoded_string);
        $data = getimagesizefromstring($imgdata);
        $extension = explode('/',$data['mime']);       
        define('UPLOAD_DIR', $image_data['upload_path']);
        $img = str_replace('data:'.$data['mime'].';base64,', '', $image_data['image']);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = $image_data['file_path'] . uniqid() . '.'.$extension[1];
        $success = file_put_contents($file, $data);
        if($success)
        {
            $status = true;
            $result = $file;
        }
        else
        {
            $status = false;
            $result = '';   
        }
        $response = array('status' => $status,'result' => $result);
        return $response;       
    }
}

if(!function_exists('exit_with_json')){
   	function exit_with_json($response=array())
	{
		if(!is_array($response)){ $response=array(); }
		echo json_encode($response);
		die();
	}
}





function get_paging_info($tot_rows,$pp,$curr_page)
{
    $pages = ceil($tot_rows / $pp); // calc pages

    $data = array(); // start out array
    $data['si']        = ($curr_page * $pp) - $pp; // what row to start at
    $data['pages']     = $pages;                   // add the pages
    $data['curr_page'] = $curr_page;               // Whats the current page

    return $data; //return the paging data

}




if( ! function_exists('check_user_emailID_exists')){
    function check_user_emailID_exists($email_ID = NULL)
    {		
		if($email_ID)
		{
			$ci=& get_instance();
			$Result = $ci->db->get_where('users', array('email' => $email_ID));
			//echo $ci->db->last_query();
			if($Result->num_rows() > 0)
			{
				return $Result->row();
			}
			else
			{
				return array();
			}
		}
		return array();
	}
}

if( ! function_exists('check_user_phone_exists')){
    function check_user_phone_exists($phone = NULL)
    {		
		if($phone)
		{
			$ci=& get_instance();
			$Result = $ci->db->get_where('users', array('mobile' => $phone));
			//echo $ci->db->last_query();
			if($Result->num_rows() > 0)
			{
				return $Result->row();
			}
			else
			{
				return array();
			}
		}
		return array();
	}
}

if( ! function_exists('check_other_emailID_exists')){
    function check_other_emailID_exists($email_ID = NULL,$userID=NULL)
    {		
		if($email_ID)
		{
			$ci=& get_instance();
			$Result = $ci->db->get_where('users', array('email' => $email_ID,'id <>' => $userID));
			//echo $ci->db->last_query();
			if($Result->num_rows() > 0)
			{
				return $Result->row();
			}
			else
			{
				return array();
			}
		}
		return array();
	}
}

if( ! function_exists('check_other_phone_exists')){
    function check_other_phone_exists($phone = NULL,$userID=NULL)
    {		
		if($phone)
		{
			$ci=& get_instance();
			$Result = $ci->db->get_where('users', array('mobile' => $phone,'id <>' => $userID));
			//echo $ci->db->last_query();
			if($Result->num_rows() > 0)
			{
				return $Result->row();
			}
			else
			{
				return array();
			}
		}
		return array();
	}
}


if( ! function_exists('meaasge_separator_user_expart')){
    function meaasge_separator_user_expart($MessageArray = NULL,$senderID=NULL)
    {
    	$NewMessage=array();    	
		if($MessageArray && $senderID)
		{	
			foreach ($MessageArray as $key => $value) {
				
					$NewMessage[$key]['Meaasge_id']=$value['id'];

					if($value['sender_id']==$senderID)
					{
						$NewMessage[$key]['My_message']=$value['message'];
					}
					else
					{
						$NewMessage[$key]['Ur_message']=$value['message'];

					}
						$NewMessage[$key]['created_at']=$value['created_at'];
				
				
			}
			return array_reverse($NewMessage);			 
		}
		return array();
	}
}



if( ! function_exists('Hyper_payRequest')){
    function Hyper_payRequest($parameters)
    {/*
    	extract($parameters);

    	$url = "https://oppwa.com/v1/checkouts";
				// echo $data = "authentication.userId=8ac7a4c8686138d701687618809e1d49" .
		  //               "&authentication.password=8fDAEWwnxY".
		  //               "&authentication.entityId=8ac9a4c76cb3b28c016cb3ba0c060081" .
		  //               "&amount=".$amount."
		  //               &currency=".$currency.
		  //               "&paymentType=".$payment_type;
		  //               echo("<br>");

        $data = "authentication.userId=8ac7a4c8686138d701687618809e1d49" .
                "&authentication.password=8fDAEWwnxY".
                "&authentication.entityId=8ac9a4c76cb3b28c016cb3ba0c060081" .
                "&amount=$amount".
                "&currency=$currency".
                "&paymentType=$payment_type".
                "&testMode=EXTERNAL".
                "&merchantTransactionId=biladl345789";
			//     $url = "https://oppwa.com/v1/checkouts";
			// $data = "authentication.userId=8a8294174d0595bb014d05d829e701d1" .
			 //                "&authentication.password=9TnJPc2n9h" .
			 //                "&authentication.entityId=8a8294174d0595bb014d05d82e5b01d2" .
			 //                "&amount=92.00" .
			 //                "&currency=EUR" .
			 //                "&paymentType=DB";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$responseData = curl_exec($ch);
				if(curl_errno($ch)) {
					return curl_error($ch);
				}
				curl_close($ch);
				return $responseData;
	*/
        
        extract($parameters);
        
        
        $ci=& get_instance();
			 $Result = $ci->db->get_where('users',
			 array(
			 	'id' => $userID
				)
			 );
        
        
        $userData=$Result->row();
        
       
        
        
        
        if($userData->type=='member'){
             $ci=& get_instance();
           $details = $ci->db->get_where('memeber_details',
			 array(
			 	'user_id' => $userID
				)
			 ); 
        }else if($userData->type=='lawyer'){
             $ci=& get_instance();
           $details = $ci->db->get_where('lawyer_details',
			 array(
			 	'user_id' => $userID
				)
			 ); 
        }else if($userData->type=='student'){
             $ci=& get_instance();
           $details = $ci->db->get_where('students_details',
			 array(
			 	'user_id' => $userID
				)
			 ); 
        }
        
        $userData->details=$details->row();
    
    // print_r($userData);
       // exit;
        
        
        
        if($userData->email==''){
          $email="kanumuripratap@gmail.com";  
        }else{
           $email=$userData->email;    
        }
        
        
        
         if($userData->name==''){
          $usename="pratap";  
        }else{
           $usename=$userData->name;   
         }
        
         if($userData->details->street_name==''){
          $street_name="street 1";  
        }else{
            $street_name=$userData->details->street_name; 
         }
        
        if($userData->details->region==''){
          $region="Riyadh";  
        }else{
            $region=$userData->details->region; 
        }
        
        if($userData->details->state==''){
          $state="Riyadh";  
        }else{
           $state=$userData->details->state;   
        }
        
        if($userData->details->zip_code==''){
          $zip_code="12344";  
        }else{
           $zip_code=$userData->details->zip_code;    
        }
    	

    	$url = "https://oppwa.com/v1/checkouts";
		
        $data = "entityId=8ac9a4c76cb3b28c016cb3ba0c060081" .
                "&amount=".number_format(1,2).
                "&currency=$currency".
                "&paymentType=$payment_type".
                "&merchantTransactionId=biladl345789". // thissss is should be       unique with every transaction
                "&customer.email=$email".
                "&billing.street1=$street_name".         
                "&billing.city=$region".      
                "&billing.state=$state".           
                "&billing.country=SA".
                "&billing.postcode=$zip_code".
                "&customer.givenName=$usename".
                "&customer.surname=mr";
        //exit;

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						   'Authorization:Bearer OGFjOWE0Yzc2Y2IzYjI4YzAxNmNiM2I5ZDE4NzAwNzl8alhocDJzczZtVw=='));
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$responseData = curl_exec($ch);
				if(curl_errno($ch)) {
					return curl_error($ch);
				}
				curl_close($ch);
				return $responseData;
    
    
    
    }
}



if( ! function_exists('Hyper_payRequestmada')){
    function Hyper_payRequestmada($parameters)
    {
    	extract($parameters);

    	$url = "https://oppwa.com/v1/checkouts";
		
        $data = "entityId=8ac9a4cc715e66ab01719243cd0244f0" .
                "&amount=1.00".
                "&currency=$currency".
                "&paymentType=$payment_type".
                "&merchantTransactionId=biladl345789";

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						   'Authorization:Bearer OGFjOWE0Yzc2Y2IzYjI4YzAxNmNiM2I5ZDE4NzAwNzl8alhocDJzczZtVw=='));
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$responseData = curl_exec($ch);
				if(curl_errno($ch)) {
					return curl_error($ch);
				}
				curl_close($ch);
				return $responseData;
	}
}



if( ! function_exists('Hyper_payRequestmada2')){
    function Hyper_payRequestmada2($parameters)
    {
    	extract($parameters);

    	$url = "https://oppwa.com/v1/checkouts";
				// echo $data = "authentication.userId=8ac7a4c8686138d701687618809e1d49" .
		  //               "&authentication.password=8fDAEWwnxY".
		  //               "&authentication.entityId=8ac9a4c76cb3b28c016cb3ba0c060081" .
		  //               "&amount=".$amount."
		  //               &currency=".$currency.
		  //               "&paymentType=".$payment_type;
		  //               echo("<br>");

        $data = "authentication.userId=8ac7a4c8686138d701687618809e1d49" .
                "&authentication.password=8fDAEWwnxY".
                "&authentication.entityId=8ac9a4cc715e66ab01719243cd0244f0" .
                "&amount=1.00".
                "&currency=$currency".
                "&paymentType=$payment_type".
                "&testMode=EXTERNAL".
                "&merchantTransactionId=biladl345789";
			//     $url = "https://oppwa.com/v1/checkouts";
			// $data = "authentication.userId=8a8294174d0595bb014d05d829e701d1" .
			 //                "&authentication.password=9TnJPc2n9h" .
			 //                "&authentication.entityId=8a8294174d0595bb014d05d82e5b01d2" .
			 //                "&amount=92.00" .
			 //                "&currency=EUR" .
			 //                "&paymentType=DB";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$responseData = curl_exec($ch);
				if(curl_errno($ch)) {
					return curl_error($ch);
				}
				curl_close($ch);
				return $responseData;
	}
}

if( ! function_exists('Hyper_payStatus')){
    function Hyper_payStatus($parameters)
    {
    	extract($parameters);
    	//echo $Pay_ID;

		    $url = "https://oppwa.com/v1/checkouts/".$Pay_ID."/payment";
			$url .= "?entityId=8ac9a4c76cb3b28c016cb3ba0c060081";
		
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						   'Authorization:Bearer OGFjOWE0Yzc2Y2IzYjI4YzAxNmNiM2I5ZDE4NzAwNzl8alhocDJzczZtVw=='));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$responseData = curl_exec($ch);
			if(curl_errno($ch)) {
				return curl_error($ch);
			}
			curl_close($ch);
			return $responseData;
	}
}

if( ! function_exists('Hyper_payStatusmada')){
    function Hyper_payStatusmada($parameters)
    {
    	extract($parameters);
    	//echo $Pay_ID;

		    $url = "https://oppwa.com/v1/checkouts/".$Pay_ID."/payment";
			$url .= "?entityId=8ac9a4cc715e66ab01719243cd0244f0";
		
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						   'Authorization:Bearer OGFjOWE0Yzc2Y2IzYjI4YzAxNmNiM2I5ZDE4NzAwNzl8alhocDJzczZtVw=='));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$responseData = curl_exec($ch);
			if(curl_errno($ch)) {
				return curl_error($ch);
			}
			curl_close($ch);
			return $responseData;
	}
}


if( ! function_exists('Hyper_payRequest2')){
    function Hyper_payRequest2($parameters)
    {
    	extract($parameters);
		
		$type = $this->Common_model->get_one_row_data('users',"id=".$userID)->type;
		if($type=='member'){$type='memeber';}
		$user_details = $this->Common_model->get_one_row_data($type.'_details',"user_id=".$this->session->userdata('user_id'));
		if($user_details->street_name==''){$user_details->street_name='NA';}
		if($user_details->region==''){$user_details->region='NA';}
		if($user_details->state==''){$user_details->state='NA';}
		if($user_details->county_code==''){$user_details->county_code='NA';}
		if($user_details->zip_code==''){$user_details->zip_code='NA';}
		
    	$rand = mt_rand(100000, 999999);
		$url = "https://oppwa.com/v1/checkouts";
		$data = "entityId=8ac9a4c76cb3b28c016cb3ba0c060081" .
				"&amount=".$amount .
				"&currency=SAR" .
				"&merchantTransactionId=biladl.$rand".
				"&testMode=EXTERNAL".
				"&paymentType=DB".
				"&merchantTransactionId=biladl.$rand". // thissss is should be       unique with every transaction
                "&customer.email=".$this->session->userdata('user_email').
                "&billing.street1=".$user_details->region.         
                "&billing.city=".$user_details->region.      
                "&billing.state=".$user_details->state.           
                "&billing.country=".$user_details->county_code.
                "&billing.postcode=".$user_details->zip_code.
                "&customer.givenName=".$this->session->userdata('user_name').
                "&customer.surname=mr";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	                   'Authorization:Bearer OGFjOWE0Yzc2Y2IzYjI4YzAxNmNiM2I5ZDE4NzAwNzl8alhocDJzczZtVw=='));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$responseData = curl_exec($ch);
		if(curl_errno($ch)) {
			return curl_error($ch);
		}
		curl_close($ch);
		return $responseData;
	}
}

