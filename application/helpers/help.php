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
			$ci=& get_instance();
			$MessageAPI_URL 		= $ci->config->item('MessageAPI_URL');
			$MessageAPI_Configs 	= $ci->config->item('MessageAPI_Configs');
			
			$getData = 'mobileNos='.$phone.'&message='.urlencode($message).'&senderId='.$MessageAPI_Configs['senderId'].'&routeId='.$MessageAPI_Configs['routeId'];
		
			//API URL
			$url=$MessageAPI_URL."?AUTH_KEY=".$MessageAPI_Configs['AUTH_KEY']."&".$getData;
		
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
		}		
		return false;
	}
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

 /*
    *   Unused function are written below 
    */


if( ! function_exists('DateFormat')){
    function DateFormat($Date){
		return date('M d, Y', strtotime($Date));
	}
}

if( ! function_exists('DateTimeFormat')){
    function DateTimeFormat($Date = '', $Style = ''){
	
		if($Style == 'break')
			return date('d M Y', strtotime($Date)) . '<br />' . date('h:i A', strtotime($Date));
			
		return date('d M Y | h:i A', strtotime($Date));
	}
}

if( ! function_exists('TimeFormat')){
    function TimeFormat($Date = '', $Style = ''){
	
		if($Style == 'break')
			return date('d M Y', strtotime($Date)) . '<br />' . date('h:i A', strtotime($Date));
			
		return date('h:i A', strtotime($Date));
	}
}

if( ! function_exists('Ymd_to_dmY')){
    function Ymd_to_dmY($date = NULL){
		if($date) return date('d/m/Y', strtotime($date));
		return false;
	}
}

if( ! function_exists('Ymd_to_mdY')){
    function Ymd_to_mdY($date = NULL){
		if($date) return date('m/d/Y', strtotime($date));
		return false;
	}
}

if( ! function_exists('dmY_to_Ymd')){
    function dmY_to_Ymd($date = NULL){
		if($date){
			$dateInput = explode('/', $date);
			$date = $dateInput[2].'-'.$dateInput[1].'-'.$dateInput[0];
			return $date;
		}
		return false;
	}
}

if( ! function_exists('mdY_to_Ymd')){
    function mdY_to_Ymd($date = NULL){
		if($date){
			$dateInput = explode('/', $date);
			$date = $dateInput[2].'-'.$dateInput[0].'-'.$dateInput[1];
			return $date;
		}
		return false;
	}
}

if( ! function_exists('DeliveryTimeFormat')){
    function DeliveryTimeFormat($Time){
		$Minutes = round((strtotime($Time) - strtotime('TODAY')) / 60);
		return $Minutes < 60 ? $Minutes : date('h:i', strtotime($Time));
	}
}





if( ! function_exists('MoneyFormat')){
    function MoneyFormat($Price = NULL){
		return number_format((float)$Price, 2, '.', '');
	}
}



if( ! function_exists('DefaultImage')){
    function DefaultImage($Image = NULL){
		return $Image ? $Image : 'default.png';
	}
}



if( ! function_exists('GetOption')){
    function GetOption($option_name = NULL){
		$ci=& get_instance();
		
		if($option_name){
			$ci->db->where(array('OptionName' => $option_name));
			$Option = $ci->db->get('options');
			if($Option->num_rows() == 1)
				return $Option->row()->OptionValue;
		}
		return false;
	}
}

if( ! function_exists('SetOption')){
    function SetOption($option_name = NULL, $option_value = NULL){
		$ci=& get_instance();
		
		if($option_name){
			$ci->db->where(array('OptionName' => $option_name));
			$Option = $ci->db->get('options');
			if($Option->num_rows() == 1){
				$ci->db->where(array('OptionName' => $option_name));
				$status = $ci->db->update('options', array('OptionValue' => $option_value));
				if($status)
					return true;
			}
		}
		return false;
	}
}


if( ! function_exists('CheckLatLng')){
    function CheckLatLng($lat = NULL, $lng = NULL)
    {
		if($lat && $lng)
		{
			$ci=& get_instance();
			$Result = $ci->db->get_where('stops', array('lat' => $lat, 'lng' => $lng));
			if($Result->num_rows() > 0)
			{
				return $Result->row();
			}
			else
			{
				return false;
			}
		}
		return false;
	}
}



if( ! function_exists('PostReadMore')){
    function PostReadMore($Text = NULL, $Limit = 10){
		$ci=& get_instance();
		$ci->load->helper('text');
		return word_limiter($Text, $Limit);
		//return character_limiter($Text, $Limit);
	}
}


