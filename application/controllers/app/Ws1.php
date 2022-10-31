<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'libraries/RESTful/REST_Controller.php';
class Ws extends REST_Controller {
	
	protected $client_request = NULL;
	
	function __construct()
	{
		parent::__construct();	
		error_reporting(0);
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		date_default_timezone_set("Asia/Kolkata");
		
		$this->load->helper('app/ws_helper');
		$this->load->model('app/ws_model');
        $this->load->model('Common_model');        
		//$this->load->model('email_model');
		
		$this->client_request = new stdClass();
		$this->client_request = json_decode(file_get_contents('php://input', true));
		$this->client_request = json_decode(json_encode($this->client_request), true);		
	}
	/*
    *    Register user 
    */
            /*
    *   cityes and countries
    */
    function countrylist_post()
    {   
       
        $response = array('status' => false, 'message' => '', 'response' => '');
        $user_input = $this->client_request;
        extract($user_input);
         $condition = array('is_deleted' => 1);
         $order_by = array('country_name' => 'ASC');
        $all_country=$this->Common_model->get_tables_records('countries','',$condition,$order_by); 
       // echo $this->db->last_query();exit;
        if($all_country)
        {
            $response = array('status' => true, 'message' => 'All countries!', 'response' => $all_country);
        }
        else
        {           
           
            $response = array('status' => false, 'message' => 'Please Try again!', 'response' => '');
        }
          
        $this->response($response);
    }
    
     function nationality_post()
    {   
       
        $response = array('status' => false, 'message' => '', 'response' => '');
        $user_input = $this->client_request;
        extract($user_input);
         $order_by = array('title' => 'ASC');
        $all_country=$this->Common_model->get_tables_records('nationality',null,null,$order_by); 
        if($all_country)
        {
            $response = array('status' => true, 'message' => 'All nationality!', 'response' => $all_country);
        }
        else
        {           
           
            $response = array('status' => false, 'message' => 'Please Try again!', 'response' => '');
        }
          
        $this->response($response);
    }
    function citylist_post()
    {   
        
        $response = array('status' => false, 'message' => '', 'response' => '');
        $user_input = $this->client_request;
        extract($user_input);
      if(!$CountryID)
        {
            $response = array('status' => false, 'message' => 'Please select a city!');
            $this->response($response);
        }
        $condition = array('cid' => $CountryID);
        $order_by = array('name' => 'ASC');
        $all_citys=$this->Common_model->get_tables_records('cities',array(),$condition,$order_by); 
        if($all_citys)
        {
            $response = array('status' => true, 'message' => 'All countries!', 'response' => $all_citys);
        }
        else
        { 
            $response = array('status' => false, 'message' => 'No City found for this country Now!', 'response' => '');
        }
          
        $this->response($response);
    }
    
	function member_register_post()
    {   
        
        $response = array('status' => false, 'message' => '', 'response' => array(), 'otp' => array());
        $user_input = $this->client_request;
        extract($user_input);
        if(!$mobile)
        {
            $response = array('status' => false, 'message' => 'Enter Phone Number!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$email_ID)
        {
            $response = array('status' => false, 'message' => 'Enter Email ID!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$name)
        {
            $response = array('status' => false, 'message' => 'Enter Name!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        // if(!$quama_no)
        // {
        //     $response = array('status' => false, 'message' => 'Enter Quama_no!', 'response' => array());
        //     //TrackResponse($user_input, $response);       
        //     $this->response($response);
        // }
        if(!$password || $password=='')
        {
            $response = array('status' => false, 'message' => 'Please Enter Password!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$Cpassword || $Cpassword=='')
        {
            $response = array('status' => false, 'message' => 'Please Enter Confirm Password!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if($Cpassword != $password)
        {
            $response = array('status' => false, 'message' => 'Confirm password mis-match', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        $require_fields = array(
            //'identity_no' => 'Enter Idendtity ',
            'county_code' => 'Enter country code ',
            'mob_code' => 'Enter ISD Code',
            //'nationality' => 'Enter nationality ',
            'country' => 'Enter Country',
            //'region' => 'Enter region',
            //'dob' => 'Enter date of birth',
            //'gender' => 'Enter gender'
        );
        foreach ($require_fields as $key => $value) {
            if(!$$key)
            {
                $response = array('status' => false, 'message' => $value, 'response' => array());
                //TrackResponse($user_input, $response);       
                $this->response($response);
            }
          
        }
        $check_phone = check_user_phone_exists($mobile);
        if(!empty($check_phone))
        {
            $response = array('status' => false, 'message' => 'Phone Number Already Exists!', 'response' => array(), 'otp' => array());
           // TrackResponse($user_input, $response);       
            $this->response($response);
        }
        $email_ID=strtolower($email_ID);
       
        $check_emailid = check_user_emailID_exists($email_ID);
        if(!empty($check_emailid))
        {
            $response = array('status' => false, 'message' => 'Email ID Already Exists!', 'response' => array(), 'otp' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
             $DocumentPath=array();
             define('UPLOAD_DIR', "storage/user_files/");
        if(isset($userDocuments) && is_array($userDocuments))
        {
           
            foreach ($userDocuments as $base64codes) {
                
                $image_data= array(
                'image'=>$base64codes,
                'upload_path'=>'./'.UPLOAD_DIR,
                'file_path' => UPLOAD_DIR
                );
                $image_result = upload_image($image_data);           
                if($image_result['status'])
                {
                     $DocumentPath[]=$image_result['result'];
                }
            }
            if(empty($DocumentPath)){
                    $response = array('status' => false, 'message' => 'Please upload related documents');
                    $this->response($response);
             }
        }
        
        
        if(isset($userDocuments1) && $userDocuments1!='')
        {
               
                $image_data= array(
                'image'=>$userDocuments1,
                'upload_path'=>'./'.UPLOAD_DIR,
                'file_path' => UPLOAD_DIR
                );
                $image_result = upload_image($image_data);           
                if($image_result['status'])
                {
                     $DocumentPath[]=$image_result['result'];
                }
        }
        if(isset($userDocuments2) && $userDocuments2!='')
        {
              
                $image_data= array(
                'image'=>$userDocuments2,
                'upload_path'=>'./'.UPLOAD_DIR,
                'file_path' => UPLOAD_DIR
                );
                $image_result = upload_image($image_data);           
                if($image_result['status'])
                {
                     $DocumentPath[]=$image_result['result'];
                }
        }
        if(isset($userDocuments3) && $userDocuments3!='')
        {   
                $image_data= array(
                'image'=>$userDocuments3,
                'upload_path'=>'./'.UPLOAD_DIR,
                'file_path' => UPLOAD_DIR
                );
                $image_result = upload_image($image_data);           
                if($image_result['status'])
                {
                     $DocumentPath[]=$image_result['result'];
                }
        }
        
        
        
        
        
        
    
        $data = array(
            'name' => $name,
            'mob_code' => $mob_code,
            'mobile' => $mobile,
            'email' => $email_ID,
            'password' => md5($Cpassword),
            'type' => 'member',
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 1
            );
        
        $set_users = $this->ws_model->set_users($data);
        if(empty($set_users))
        {
            $response = array('status' => false, 'message' => 'User Registration Failed!', 'response' => array());
        }
        else
        { 
             $condition = array(          
            'mobile' => $mobile,         
            );
            $user_data = $this->Common_model->get_one_row_data('users',$condition);
            if(!empty($user_data))
            {
                 $userID=$user_data->id;
                   $data = array(
                'user_id' => $userID,
                'identity_no' => $identity_no,
                'county_code' => $county_code,
                'country' => $country,
                'nationality' => $nationality,
                'region' => $region,
                'state' => $state,
                'street_name' => $street_name,
                'zip_code' => $zip_code,
                'dob' =>  date("Y-m-d", strtotime($dob)),
                'gender' => $gender
                );
                $set_data = $this->Common_model->inset_to_tbl('memeber_details',$data);
                 $cdate=date('Y-m-d H:i:s');
            
                foreach ($DocumentPath as $path) {
                    
                    $dataImage[] = array(
                'user_id' => $userID,
                'document_type' => 'REGISTRATION',
                'document_path' => $path,         
                'created_on' =>  $cdate
                );
                }
                if(!empty($DocumentPath))
                {
                    $set_data = $this->Common_model->inset_to_batch('user_documents',$dataImage);
                }
                
            }
            
            $response = array('status' => true, 'message' => 'User Registration Successful!', 'response' => $users);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
        /*
    *    Register student 
    */
    function student_register_post()
    {   
        
        $response = array('status' => false, 'message' => '', 'response' => array(), 'otp' => array());
        $user_input = $this->client_request;
        extract($user_input);
        if(!$mobile)
        {
            $response = array('status' => false, 'message' => 'Enter Phone Number!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$email_ID)
        {
            $response = array('status' => false, 'message' => 'Enter Email ID!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$name)
        {
            $response = array('status' => false, 'message' => 'Enter Name!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        // if(!$quama_no)
        // {
        //     $response = array('status' => false, 'message' => 'Enter Quama_no!', 'response' => array());
        //     //TrackResponse($user_input, $response);       
        //     $this->response($response);
        // }
        if(!$password || $password=='')
        {
            $response = array('status' => false, 'message' => 'Please Enter Password!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$Cpassword || $Cpassword=='')
        {
            $response = array('status' => false, 'message' => 'Please Enter Confirm Password!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if($Cpassword != $password)
        {
            $response = array('status' => false, 'message' => 'Confirm password mis-match', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        $require_fields = array(
            //'identity_no' => 'Enter Idendtity ',
            'county_code' => 'Enter country code ',
            'country' => 'Enter Country',
            'mob_code' => 'Enter ISD Code',
            //'nationality' => 'Enter nationality ',
            //'dob' => 'Enter date of birth',
            //'gender' => 'Enter gender',
            //'current_city' => 'Enter Current city',
            'instiutute_name' => 'Enter institute name',
            'course_name' => 'Enter course name',
            'specialzation' => 'Enter specialzation'
        );
        foreach ($require_fields as $key => $value) {
            if(!$$key)
            {
                $response = array('status' => false, 'message' => $value, 'response' => array());      
                $this->response($response);
            }
          
        }
        $check_phone = check_user_phone_exists($mobile);
        if(!empty($check_phone))
        {
            $response = array('status' => false, 'message' => 'Phone Number Already Exists!', 'response' => array(), 'otp' => array());          
            $this->response($response);
        }
        $email_ID=strtolower($email_ID);       
        $check_emailid = check_user_emailID_exists($email_ID);
        if(!empty($check_emailid))
        {
            $response = array('status' => false, 'message' => 'Email ID Already Exists!', 'response' => array(), 'otp' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
         $DocumentPath=array();
        define('UPLOAD_DIR', "storage/user_files/");
        if(isset($userDocuments) && is_array($userDocuments))
        {
            
            foreach ($userDocuments as $base64codes) {
                
                $image_data= array(
                'image'=>$base64codes,
                'upload_path'=>'./'.UPLOAD_DIR,
                'file_path' => UPLOAD_DIR
                );
                $image_result = upload_image($image_data);           
                if($image_result['status'])
                {
                     $DocumentPath[]=$image_result['result'];
                }
                               
            }
            
        }
        else
        {
            if(isset($userDocuments1) && $userDocuments1!='')
            {
                   
                    $image_data= array(
                    'image'=>$userDocuments1,
                    'upload_path'=>'./'.UPLOAD_DIR,
                    'file_path' => UPLOAD_DIR
                    );
                    $image_result = upload_image($image_data);           
                    if($image_result['status'])
                    {
                         $DocumentPath[]=$image_result['result'];
                    }
            }
            if(isset($userDocuments2) && $userDocuments2!='')
            {
                  
                    $image_data= array(
                    'image'=>$userDocuments2,
                    'upload_path'=>'./'.UPLOAD_DIR,
                    'file_path' => UPLOAD_DIR
                    );
                    $image_result = upload_image($image_data);           
                    if($image_result['status'])
                    {
                         $DocumentPath[]=$image_result['result'];
                    }
            }
            if(isset($userDocuments3) && $userDocuments3!='')
            {   
                    $image_data= array(
                    'image'=>$userDocuments3,
                    'upload_path'=>'./'.UPLOAD_DIR,
                    'file_path' => UPLOAD_DIR
                    );
                    $image_result = upload_image($image_data);           
                    if($image_result['status'])
                    {
                         $DocumentPath[]=$image_result['result'];
                    }
            }
        }
        if(empty($DocumentPath)){
                    $response = array('status' => false, 'message' => 'Please upload related documents');
                    $this->response($response);
             }
       
        
        $data = array(
            'name' => $name,
            'mob_code' => $mob_code,
            'mobile' => $mobile,
            'email' => $email_ID,
            'password' => md5($Cpassword),
            'type' => 'student',
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 1
            );
        
        $set_users = $this->ws_model->set_users($data);
        if(empty($set_users))
        {
            $response = array('status' => false, 'message' => 'User Registration Failed!', 'response' => array());
        }
        else
        { 
             $condition = array(          
            'mobile' => $mobile,         
            );
            $user_data = $this->Common_model->get_one_row_data('users',$condition);
            if(!empty($user_data))
            {
                 $userID=$user_data->id;
                   $data = array(
                'user_id' => $userID,
                'identity_no' => $identity_no,
                'county_code' => $county_code,
                'country' => $country,
                'nationality' => $nationality,
                'region' => $current_city,
                'state' => $state,
                'street_name' => $street_name,
                'zip_code' => $zip_code,
                'instiutute_name' => $instiutute_name,
                'course_name' => $course_name,
                'specialzation' => $specialzation,
                'dob' =>  date("Y-m-d", strtotime($dob)),
                'gender' => $gender
                );
                $set_data = $this->Common_model->inset_to_tbl('students_details',$data);
                 $cdate=date('Y-m-d H:i:s');
                foreach ($DocumentPath as $path) {
                    
                    $dataImage[] = array(
                'user_id' => $userID,
                'document_type' => 'REGISTRATION',
                'document_path' => $path,         
                'created_on' =>  $cdate
                );
                }
                $set_data = $this->Common_model->inset_to_batch('user_documents',$dataImage);
            }
            
            $response = array('status' => true, 'message' => 'User Registration Successful!', 'response' => $users);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
    
        /***Update Device Token**/
    function updateUserDeviceToken_post()
    {
        $device_os="Android";
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);
         if(!$userID || $userID=='')
        {
            $response = array('status' => false, 'message' => 'User Id or Password not found!', 'response' => array());
           // TrackResponse($user_input, $response);       
            $this->response($response);
        }
        
        
        if(!$device_token || $device_token=='')
        {
            $response = array('status' => false, 'message' => 'Need device token', 'response' => array(), 'OTP' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        
       $data = array(
            'os_type' => $device_os,           
            'token_no' => $device_token
            );
         $condition = array(
            'id' => $userID                                    
            );
         $UpdateUser=$this->Common_model->update_to_tbl('users',$data,$condition);
        if(!$UpdateUser)
        {
            $response = array('status' => false, 'message' => 'Device Token Updation Failed!', 'response' => array());
        }
        else
        {
            $response = array('status' => true, 'message' => 'Device Token Updated Successfully!');
        }   
        
        $this->response($response); 
    }
   /*
    *    Register student 
    */
    function lawyer_register_post()
    {   
        
        $response = array('status' => false, 'message' => '', 'response' => array(), 'otp' => array());
        $user_input = $this->client_request;
        extract($user_input);
        if(!$mobile)
        {
            $response = array('status' => false, 'message' => 'Enter Phone Number!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$email_ID)
        {
            $response = array('status' => false, 'message' => 'Enter Email ID!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$name)
        {
            $response = array('status' => false, 'message' => 'Enter Name!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$password || $password=='')
        {
            $response = array('status' => false, 'message' => 'Please Enter Password!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$Cpassword || $Cpassword=='')
        {
            $response = array('status' => false, 'message' => 'Please Enter Confirm Password!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if($Cpassword != $password)
        {
            $response = array('status' => false, 'message' => 'Confirm password mis-match', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        $require_fields = array(
            //'identity_no' => 'Enter Idendtity ',
            'county_code' => 'Enter country code ',
            'mob_code' => 'Enter ISD Code',
            'country' => 'Enter country  ',
            //'nationality' => 'Enter nationality ',
            //'dob' => 'Enter date of birth',
            //'gender' => 'Enter gender',
            'licence_no' => 'Enter licence no',
            'languages' => 'Enter languages',
            'building_no' => 'Enter building no',
            'district_name' => 'Enter district Name',
            //'city_name' => 'Enter City Name',
            'street_name' => 'Enter Street name',
            'zip_code' => 'Enter Zip code',
            'specialzation' => 'Enter specialzation'
        );
        foreach ($require_fields as $key => $value) {
            if(!$$key)
            {
                $response = array('status' => false, 'message' => $value, 'response' => array());      
                $this->response($response);
            }
          
        }
        $check_phone = check_user_phone_exists($mobile);
        if(!empty($check_phone))
        {
            $response = array('status' => false, 'message' => 'Phone Number Already Exists!', 'response' => array(), 'otp' => array());          
            $this->response($response);
        }
        $email_ID=strtolower($email_ID);       
        $check_emailid = check_user_emailID_exists($email_ID);
        if(!empty($check_emailid))
        {
            $response = array('status' => false, 'message' => 'Email ID Already Exists!', 'response' => array(), 'otp' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
               $DocumentPath=array();
        define('UPLOAD_DIR', "storage/user_files/");
        if(isset($userDocuments) && is_array($userDocuments))
        {
            
            foreach ($userDocuments as $base64codes) {
                
                $image_data= array(
                'image'=>$base64codes,
                'upload_path'=>'./'.UPLOAD_DIR,
                'file_path' => UPLOAD_DIR
                );
                $image_result = upload_image($image_data);           
                if($image_result['status'])
                {
                     $DocumentPath[]=$image_result['result'];
                }
                               
            }
            
        }
        else
        {
            if(isset($userDocuments1) && $userDocuments1!='')
            {
                   
                    $image_data= array(
                    'image'=>$userDocuments1,
                    'upload_path'=>'./'.UPLOAD_DIR,
                    'file_path' => UPLOAD_DIR
                    );
                    $image_result = upload_image($image_data);           
                    if($image_result['status'])
                    {
                         $DocumentPath[]=$image_result['result'];
                    }
            }
            if(isset($userDocuments2) && $userDocuments2!='')
            {
                  
                    $image_data= array(
                    'image'=>$userDocuments2,
                    'upload_path'=>'./'.UPLOAD_DIR,
                    'file_path' => UPLOAD_DIR
                    );
                    $image_result = upload_image($image_data);           
                    if($image_result['status'])
                    {
                         $DocumentPath[]=$image_result['result'];
                    }
            }
            if(isset($userDocuments3) && $userDocuments3!='')
            {   
                    $image_data= array(
                    'image'=>$userDocuments3,
                    'upload_path'=>'./'.UPLOAD_DIR,
                    'file_path' => UPLOAD_DIR
                    );
                    $image_result = upload_image($image_data);           
                    if($image_result['status'])
                    {
                         $DocumentPath[]=$image_result['result'];
                    }
            }
        }
        if(empty($DocumentPath)){
                    $response = array('status' => false, 'message' => 'Please upload related documents');
                    $this->response($response);
             }
       
        $data = array(
            'name' => $name,
            'mobile' => $mobile,
            'mob_code' => $mob_code,
            'email' => $email_ID,
            'password' => md5($Cpassword),
            'type' => 'lawyer',
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 1
            );
        
        $set_users = $this->ws_model->set_users($data);
        if(empty($set_users))
        {
            $response = array('status' => false, 'message' => 'User Registration Failed!', 'response' => array());
        }
        else
        { 
             $condition = array(          
            'mobile' => $mobile,         
            );
            $user_data = $this->Common_model->get_one_row_data('users',$condition);
            if(!empty($user_data))
            {
                 $userID=$user_data->id;
                   $data = array(
                'user_id' => $userID,
                'identity_no' => $identity_no,
                'county_code' => $county_code,
                'nationality' => $nationality,
                'country' => $country,
                'licence_no' => $licence_no,
                'languages' => $languages,
                'building_no' => $building_no,
                'district_name' => $district_name,
                'region' => $city_name,
                'street_name' => $street_name,
                'zip_code' => $zip_code,
                'state' => $state,
                'alternet_no' => $alternet_no,
                'specialization' => $specialzation,
                'dob' =>  date("Y-m-d", strtotime($dob)),
                'gender' => $gender
                );
                $set_data = $this->Common_model->inset_to_tbl('lawyer_details',$data);
                 $cdate=date('Y-m-d H:i:s');
                foreach ($DocumentPath as $path) {
                    
                    $dataImage[] = array(
                'user_id' => $userID,
                'document_type' => 'REGISTRATION',
                'document_path' => $path,         
                'created_on' =>  $cdate
                );
                }
                $set_data = $this->Common_model->inset_to_batch('user_documents',$dataImage);
            }
            
            $response = array('status' => true, 'message' => 'User Registration Successful!', 'response' => $users);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
	/*
		*	otp sent function
	*/
    function resend_otp_post()
    {
        $response = array('status' => false, 'message' => '', 'OTP' => array());
        $user_input = $this->client_request;
        extract($user_input);
        if(!$mobile)
        {
            $response = array('status' => false, 'message' => 'Enter Phone Number!', 'response' => array(), 'OTP' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        
        if(!$mob_code)
        {
            $response = array('status' => false, 'message' => 'Country code not found!', 'response' => array(), 'OTP' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(isset($type))
        if($type=='first_time'){
            $check_emailid = check_user_emailID_exists($email_ID);
            if(!empty($check_emailid))
            {
                $response = array('status' => false, 'message' => 'Email ID Already Exists!', 'response' => array(), 'otp' => array());
                //TrackResponse($user_input, $response);       
                $this->response($response);
            }
                $check_phone = check_user_phone_exists($mobile);
                if(!empty($check_phone))
                {
                   $response = array('status' => false, 'message' => 'Phone Number Already Exists!', 'response' => array(), 'otp' => array());
                    // TrackResponse($user_input, $response);       
                    $this->response($response);
                }
        }
        
        $mobile=$mob_code.$mobile;
        $mobile=str_replace(' ','', $mobile);
        $rand = mt_rand(100000, 999999);
        $otp = array('otp' => $rand);
        $Message = 'Dear User '.$rand.' is your One Time Password for BILADL APP. Thank You.';
        SendSMS($mobile, $Message);
        $response = array('status' => true, 'message' => 'Otp generation successful!', 'OTP' => $otp);
        //TrackResponse($user_input, $response);
        $this->response($response);
    }
	/*
	    *	   user Login
	*/
	 function user_login_post()
    {
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);
         if(!$email || $email=='')
        {
            $response = array('status' => false, 'message' => 'Enter Email Id!', 'response' => array(), 'OTP' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
 		if(!$password || $password=='')
        {
            $response = array('status' => false, 'message' => 'Enter Password!', 'response' => array(), 'OTP' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        $UserLoginStatus = $this->ws_model->user_login_status($email);
        if(!empty($UserLoginStatus))
        {
            $response = array('status' => false, 'message' => 'Your account is in hold. Please Contact Administrator!', 'response' => array());
           // TrackResponse($user_input, $response);       
            $this->response($response);
        }
        $Userlogin = $this->ws_model->user_login($email,$password);
        //echo $this->db->last_query();exit;
        if(empty($Userlogin))
        {
            $response = array('status' => false, 'message' => 'Login Failed. Please try again!', 'response' => array());
        }
        else
        {
            $check_email = check_user_emailID_exists($email);
            $response = array('status' => true, 'message' => 'Login Successful!', 'response' => $check_email);
        }
       
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
     /*
    *   User Forgot Password 
    */
    function user_forgot_password_post()
    {
        $response = array('status' => false, 'message' => '', 'response' => array(), 'OTP' => array());
        $user_input = $this->client_request;
        extract($user_input);
        if(!$mobile)
        {
            $response = array('status' => false, 'message' => 'Enter Mobile no!', 'response' => array(), 'OTP' => array());
           // TrackResponse($user_input, $response);       
            $this->response($response);
        }
        
         $condition= array('mobile' => $mobile);
        $get_data = $this->Common_model->get_one_row_data('users',$condition);
     
        //echo $this->db->last_query();
        $rand = mt_rand(100000, 999999);
        $otp = array('otp' => $rand);
        if(empty($get_data))
        {
            $response = array('status' => false, 'message' => 'Phone Number not registered!', 'response' => array(), 'OTP' => array());           
        }
        else
        {
            
            if($get_data->status!=1)
            {
                $response = array('status' => false, 'message' => 'User Login Suspended!', 'response' => array(), 'OTP' => array());
                $this->response($response);
            }
            
          $mobile=$get_data->mob_code.$get_data->mobile;
            $mobile=str_replace(' ','', $mobile);
            $Message = 'Dear user '.$rand.' is your One Time Password for BILADL APP. Thank You.';
            SendSMS($mobile, $Message);
            $response = array('status' => true, 'message' => 'Data Fetched Successfully!', 'response' => $get_data, 'OTP' => $otp);
        }   
       
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
       /*
    *    Change Password
    */
    function user_change_password_post()
    {
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);
        if(!$userID || !$password || !$Cpassword)
        {
            $response = array('status' => false, 'message' => 'User Id or Password not found!', 'response' => array());
           // TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if($password != $Cpassword || (strlen($password)<1))
        {
            $response = array('status' => false, 'message' => 'Password mis-match', 'response' => array());
           // TrackResponse($user_input, $response);       
            $this->response($response);
        }
        $data = array(
            'password' => md5($password),           
            'modified_at' => date('Y-m-d H:i:s')
            );
        $UpdateUser = $this->ws_model->update_user($data, $userID);
        //echo $this->db->last_query();exit;
        if($UpdateUser === FALSE)
        {
            $response = array('status' => false, 'message' => 'Password Updation Failed!', 'response' => array());
        }
        else
        {
            //SendSMS($phone, 'Dear Customer '.$rand.' is your One Time Password for Poprebates. Thank You.');
            $UserDetails = $this->ws_model->get_users($userID);
            $response = array('status' => true, 'message' => 'Password Updation Successful!', 'response' => $UserDetails);
        }   
       
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
           /*
    *    Get user_profile_details
    */
    function user_profile_details_post()
    {
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);
        if(!isset($userID) || $userID=='')
        {
            $response = array('status' => false, 'message' => 'User Id or Password not found!', 'response' => array());
      
            $this->response($response);
        }
        $condition = array('id' =>$userID );
        
        $get_data = $this->Common_model->get_one_row_data('users',$condition);
        if(!empty($get_data))
        {
            $condition2 = array('user_id' =>$userID );
            $types=$get_data->type;
            switch ($types) {
                case 'member':
                    
                    $get_profile_data = $this->Common_model->get_one_row_data('memeber_details',$condition2);
                    break;
                case 'student':
                    
                    $get_profile_data = $this->Common_model->get_one_row_data('students_details',$condition2);
                    break;
                case 'lawyer':
                    
                    $get_profile_data = $this->Common_model->get_one_row_data('lawyer_details',$condition2);
                    break;
                
                default:
                    $response = array('status' => false, 'message' => 'Unspecified user type please contact to admin!', 'response' => array());      
                    $this->response($response);
                    break;
            }
        }
        if(empty($get_profile_data))
        {
           $response = array('status' => false, 'message' => 'Unable to retrieve records', 'response' => array());
        }
        else
        {
            $UserDetails = array('get_profile_data' => $get_profile_data,'main_profile' =>  $get_data);
            $response = array('status' => true, 'message' => 'Record found', 'response' => $UserDetails);
        }
      
        $this->response($response);
    }
   /*
    *    Change Update Profile
    */
    function user_change_profile_post()
    {
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);
        if(!$userID || $userID=='')
        {
            $response = array('status' => false, 'message' => 'User ID not found!', 'response' => array());
           // TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$name || (strlen($name)<1))
        {
            $response = array('status' => false, 'message' => 'Please Enter Name !', 'response' => array());
           // TrackResponse($user_input, $response);       
            $this->response($response);
        }
         if(!$Email_ID || (strlen($Email_ID)<4))
        {
            $response = array('status' => false, 'message' => 'Please Enter Valid Email ID', 'response' => array());
           // TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$mobile || (strlen($mobile)<4))
        {
            $response = array('status' => false, 'message' => 'Please Enter mobile no', 'response' => array());
           // TrackResponse($user_input, $response);       
            $this->response($response);
        }
        $check_emailid = check_other_emailID_exists($Email_ID,$userID);
        if(!empty($check_emailid))
        {
            $response = array('status' => false, 'message' => 'Email ID Using by other user!', 'response' => array(), 'otp' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        $check_mobile = check_other_phone_exists($mobile,$userID);
        if(!empty($check_mobile))
        {
            $response = array('status' => false, 'message' => 'Mobile no is Using by other user!', 'response' => array(), 'otp' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
         if($Profile_pic && $Profile_pic=='')
        {
            $response = array('status' => false, 'message' => 'please select you profile pic', 'response' => array());
           // TrackResponse($user_input, $response);       
            $this->response($response);
        }
         $data = array(
            'name' => $name,
            'email' => $Email_ID,                    
            'mobile' => $mobile,                    
            'modified_at' => date('Y-m-d H:i:s')
            );
         if($Profile_pic)
        { 
                define('UPLOAD_DIR', "storage/user_files/");
                $image_data= array(
                'image'=>$Profile_pic,
                'upload_path'=>'./'.UPLOAD_DIR,
                'file_path' => UPLOAD_DIR
                );
                $image_result = upload_image($image_data);           
                if($image_result['status'])
                {
                     $PicPath=$image_result['result'];
                }
                  
                if(!isset($PicPath)){
                    $response = array('status' => false, 'message' => 'Upload pic is not in correct format!!');
                    $this->response($response);
                }
                else
                {                    
                    $data['profile_pic']=$PicPath;
                }
        }
    
        $condition = array('id' => $userID);
        $UpdateUser=$this->Common_model->update_to_tbl('users',$data,$condition);
        if($UpdateUser === FALSE)
        {
            $response = array('status' => false, 'message' => 'Profile Updation Failed!', 'response' => array());
        }
        else
        {
            //SendSMS($phone, 'Dear Customer '.$rand.' is your One Time Password for Poprebates. Thank You.');
            $UserDetails = $this->ws_model->get_users($userID);
            $response = array('status' => true, 'message' => 'Profile Updation Successful!', 'response' => $UserDetails);
        }   
       
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
    
    /*
       *    get More Comment current limit 1
    */
    function get_more_notification_post()
    {
    	$statPoint=NULL;
    	$get_notify = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);
        if(!$userID || $userID=='')
        {
            $response = array('status' => false, 'message' => 'User ID not found!', 'response' => '');          
            $this->response($response);
        }
         $data = array(
            'id' => $userID,
            'status' => 1                        
            );
         $user_details=$this->Common_model->get_one_row_data('users',$data);
         if(empty($user_details))
         {
             $response = array('status' => false, 'message' => 'You are suspended!', 'response' => '');          
            $this->response($response);
         } 
         $user_type=$user_details->type;
         $get_notify =  $this->ws_model->get_nofication_details($statPoint,$user_type,$userID);
         $Details=array('more_notify' => $get_notify);
        if(empty($get_notify))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
    /*
       *    get More faqs current limit 1
    */
    function get_more_faq_post()
    {
        $statPoint=NULL;
        $get_faqs = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
         extract($user_input); 
         $get_faqs =  $this->ws_model->get_faq_details($statPoint);
         $Details=array('more_faqs' => $get_faqs);
        if(empty($get_faqs))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
    /*
       *    get More legal news current limit 3
    */
    function get_more_legal_news_post()
    {
        $statPoint=NULL;
        $get_legal_news = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
         extract($user_input);
         if(!$userID || $userID=='')
        {
            $response = array('status' => false, 'message' => 'User ID not found!', 'response' => '');          
            $this->response($response);
        }
 
         $get_legal_news =  $this->ws_model->get_legal_news_details($userID,$statPoint);
         $Details=array('more_news' => $get_legal_news);
        if(empty($get_legal_news))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
     /*
       *    get More legal news current limit 3
    */
    function get_full_legal_news_post()
    {
        $newsID=null;
        $get_legal_news = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
         extract($user_input); 
         $get_legal_news =  $this->ws_model->get_news_details($newsID);
         $Details=array('news_details' => $get_legal_news);
        if(empty($get_legal_news))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
     /*
       *    get More legal news current limit 3
    */
    function get_all_package_post()
    {
        $get_packages = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
         extract($user_input); 
         $get_packages =  $this->ws_model->get_all_package();
         $Details=array('packages' => $get_packages);
        if(empty($get_packages))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
/*
       *    get More details for package    */
    function get_full_package_post()
    {
        $packageID=null;
        $get_package_datail = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
         extract($user_input); 
         $get_package_datail =  $this->ws_model->get_package_details($packageID);
         $Details=array('package_details' => $get_package_datail);
        if(empty($get_package_datail))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
/*
       *    get More useful links
    */
    function get_useful_link_post()
    {
        $statPoint=NULL;
        $get_links = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input); 
         $get_links =  $this->ws_model->get_ulseFul_links($statPoint);
         $Details=array('Useful_links' => $get_links);
        if(empty($get_links))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
     /*
       *    get More articles
    */
    function get_all_articles_post()
    {
        $get_articles = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);
         if(!$userID || $userID=='')
        {
            $response = array('status' => false, 'message' => 'Login to the app!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        } 
         $get_articles =  $this->ws_model->get_all_article($userID);
         $Details=array('article_details' => $get_articles);
        if(empty($get_articles))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
    /*
       *    get More details for articles    */
    function get_full_article_post()
    {
        $articleID=null;
        $get_full_article = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
         extract($user_input); 
         $get_full_article =  $this->ws_model->get_article_details($articleID);
         $Details=array('article_details' => $get_full_article);
        if(empty($get_full_article))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
/*
       *    get More download links
    */
    function get_legal_document_post()
    {
        $statPoint=NULL;
        $get_articles = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
         extract($user_input); 
         $get_articles =  $this->ws_model->get_legal_documents($statPoint);
         $Details=array('legal_document' => $get_articles);
        if(empty($get_articles))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
    function get_all_topic_post()
    {
        
        $get_topics = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
         extract($user_input); 
         $get_topics =  $this->ws_model->get_all_topic();
         $Details=array('get_topics' => $get_topics);
        if(empty($get_topics))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
    
     /*
    *    Add advice
    */
    function ask_advice_post()
    {   
        
        $response = array('status' => false, 'message' => '', 'response' => array(), 'otp' => array());
        $user_input = $this->client_request;
        extract($user_input);
	
         if(!$mobile || $mobile=='')
        {
            $response = array('status' => false, 'message' => 'Enter Phone Number!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$email_ID || $email_ID=='')
        {
            $response = array('status' => false, 'message' => 'Enter Email ID!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$userID || $userID=='')
        {
            $response = array('status' => false, 'message' => 'Login to the app!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$topicID || $topicID=='')
        {
            $response = array('status' => false, 'message' => 'Select Your topic!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        
        if(!$topic || $topic=='')
        {
            $response = array('status' => false, 'message' => 'Enter Topic!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$questionHEAD || $questionHEAD=='')
        {
            $response = array('status' => false, 'message' => 'Enter question Heading!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        
        if(!$city || $city=='')
        {
            $response = array('status' => false, 'message' => 'Enter City!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$Description || $Description=='')
        {
            $response = array('status' => false, 'message' => 'Please Enter Description!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
           $DocumentPath=array();
        define('UPLOAD_DIR', "storage/user_advice/");
        if(isset($userDocuments) && is_array($userDocuments))
        {
            
            foreach ($userDocuments as $base64codes) {
                
                $image_data= array(
                'image'=>$base64codes,
                'upload_path'=>'./'.UPLOAD_DIR,
                'file_path' => UPLOAD_DIR
                );
                $image_result = upload_image($image_data);           
                if($image_result['status'])
                {
                     $DocumentPath[]=$image_result['result'];
                }
                               
            }
            
        }
        else
        {
            if(isset($userDocuments1) && $userDocuments1!='')
            {
                   
                    $image_data= array(
                    'image'=>$userDocuments1,
                    'upload_path'=>'./'.UPLOAD_DIR,
                    'file_path' => UPLOAD_DIR
                    );
                    $image_result = upload_image($image_data);           
                    if($image_result['status'])
                    {
                         $DocumentPath[]=$image_result['result'];
                    }
            }
            if(isset($userDocuments2) && $userDocuments2!='')
            {
                  
                    $image_data= array(
                    'image'=>$userDocuments2,
                    'upload_path'=>'./'.UPLOAD_DIR,
                    'file_path' => UPLOAD_DIR
                    );
                    $image_result = upload_image($image_data);           
                    if($image_result['status'])
                    {
                         $DocumentPath[]=$image_result['result'];
                    }
            }
            if(isset($userDocuments3) && $userDocuments3!='')
            {   
                    $image_data= array(
                    'image'=>$userDocuments3,
                    'upload_path'=>'./'.UPLOAD_DIR,
                    'file_path' => UPLOAD_DIR
                    );
                    $image_result = upload_image($image_data);           
                    if($image_result['status'])
                    {
                         $DocumentPath[]=$image_result['result'];
                    }
            }
        }
        if(empty($DocumentPath)){
                    $response = array('status' => false, 'message' => 'Please upload related documents');
                    $this->response($response);
             }
        $data = array(
            'email_id' => strtolower($email_ID),            
            'mobile' => $mobile,
            'topic_id' => $topicID,
            'topic' => $topic,
            'question_heading' => $questionHEAD,
            'description' => $Description,
            'city' => $city,
            'created_on' => date('Y-m-d H:i:s')            
            );
        $set_data = $this->Common_model->inset_to_tbl('advices',$data);
        if(!$set_data)
        {
            $response = array('status' => false, 'message' => 'We are unable to take your request now!', 'response' => array());
        }
        else
        {  
                $cdate=date('Y-m-d H:i:s');
                foreach ($DocumentPath as $path) {
                    
                    $dataImage[] = array(
                'user_id' => $userID,
                'document_type' => 'ONLINE_ADVICES',
                'document_path' => $path,         
                'created_on' =>  $cdate
                );
                }
            $set_data = $this->Common_model->inset_to_batch('user_documents',$dataImage);
            
            $response = array('status' => true, 'message' => 'Query Submitted Successfuly', 'response' => '');
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
    function user_package_subscription_post()
    {
        
        
         $response = array('status' => false, 'message' => '', 'response' => array());
         $user_input = $this->client_request;
         extract($user_input); 
         if(!$packageID || $packageID=='')
         {
           $response = array('status' => false, 'message' => 'Please select a package', 'response' => array());
            $this->response($response);
         }
         if(!$userID || $userID=='')
         {
           $response = array('status' => false, 'message' => 'Please login as user', 'response' => array());
            $this->response($response);
         }
         $data = array(
            'id' => $packageID,
            'status' => 1                        
            );
         $package_details=$this->Common_model->get_one_row_data('packages',$data);  
         if(empty($package_details))
         {           
           $response = array('status' => false, 'message' => 'This package is expired!', 'response' => array());
            $this->response($response);
         }
         $total_no_days=$package_details->total_days;
         
         $created_date_time= date('Y-m-d H:i:s');
         $expire_date_time= date('Y-m-d H:i:s',strtotime('+'.$total_no_days.' days',strtotime($created_date_time)));
         $data = array(
            'status' => 0                                    
            );
         $condition = array(
            'user_id' => $userID                                    
            );
         $update_details=$this->Common_model->update_to_tbl('user_subscription',$data,$condition);
         if(!$update_details)
         {
            $response = array('status' => false, 'message' => 'Sorry to say that... Unable to subscribe now! please contact to admin', 'response' => array());
            $this->response($response);
         }  
         $data = array(
            'package_id' => $packageID,
            'user_id' => $userID,
            'created_on' => $created_date_time,
            'expires_on' => $expire_date_time                        
            );
         $subscribe_package = $this->Common_model->inset_to_tbl('user_subscription',$data);
        if(!$subscribe_package)
        {
            $response = array('status' => false, 'message' => 'Package subscription  Failed!', 'response' => array());
        }
        else
        {   
            $response = array('status' => true, 'message' => 'Package subscribed Successfully!', 'response' => $subscribe_package);
        }  
                 
        $this->response($response);
    }
    function get_current_package_post()
    {   
         $response = array('status' => false, 'message' => '', 'response' => array());
         $user_input = $this->client_request;
         extract($user_input);
         if(!$userID || $userID=='')
         {
           $response = array('status' => false, 'message' => 'Please login as user', 'response' => array());
            $this->response($response);
         }
          //$get_packages =  $this->ws_model->get_all_package();
         $package_details=$this->ws_model->get_subscribed_package_details($userID);
       
         if(empty($package_details))
         {           
           $response = array('status' => false, 'message' => 'your package is expired or you are not subscribed to any package yet!', 'response' => array());
            $this->response($response);
         }
        else
         {
           $response = array('status' => true, 'message' => 'Result Found', 'response' => $package_details);
         }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
    function bookmark_news_post()
    {   
         $response = array('status' => false, 'message' => '', 'response' => array());
         $user_input = $this->client_request;
         extract($user_input);
         if(!$userID || $userID=='')
         {
           $response = array('status' => false, 'message' => 'Please login as user', 'response' => array());
            $this->response($response);
         }
         if(!$newsID || $newsID=='')
         {
           $response = array('status' => false, 'message' => 'Please select a news', 'response' => array());
            $this->response($response);
         }
         
           if(!$bookmarkType || $bookmarkType=='')
         {
           $response = array('status' => false, 'message' => 'Undefind add or remove item', 'response' => array());
            $this->response($response);
         }
        if(strtoupper(trim($bookmarkType))=="REMOVE")
         {
            $results = $this->ws_model->remove_bookmark_news_table($newsID,$userID);
            if(!$results)
           {
               $response = array('status' => false, 'message' => 'Unable to Remove bookmark!', 'response' => array());
           }
           else
           {
              $response = array('status' => true, 'message' => 'Bookmark Removed', 'response' => $results);
           }
            $this->response($response);
         }
         $data = array(            
            'user_id' => $userID             
            );
         $records_in_bookmars_tbl=$this->Common_model->check_id_is_present('bookmarks',$data);
         if(!$records_in_bookmars_tbl)
         { 
            $data = array(            
            'user_id' => $userID,
            'news_ids' => $newsID  
            );
           $bookmark = $this->Common_model->inset_to_tbl('bookmarks',$data);
           $response = array('status' => true, 'message' => 'bookmark Added', 'response' => array());
           $this->response($response);
         }
         else{
            
            $results = $this->ws_model->update_bookmark_news_table($newsID,$userID);
           if(!$results)
           {
               $response = array('status' => false, 'message' => 'Unable to bookmark!', 'response' => array());
            
           }
           else
           {
              $response = array('status' => true, 'message' => 'Bookmark created', 'response' => $results);
           }
        }
        $this->response($response);
    }
    function bookmark_article_post()
    {   
         $response = array('status' => false, 'message' => '', 'response' => array());
         $user_input = $this->client_request;
         extract($user_input);
         if(!$userID || $userID=='')
         {
           $response = array('status' => false, 'message' => 'Please login as user', 'response' => array());
            $this->response($response);
         }
         if(!$articleID || $articleID=='')
         {
           $response = array('status' => false, 'message' => 'Please select a article', 'response' => array());
            $this->response($response);
         }
         
        if(!$bookmarkType || $bookmarkType=='')
         {
           $response = array('status' => false, 'message' => 'Undefind add or remove item', 'response' => array());
            $this->response($response);
         }        
        if($bookmarkType=="REMOVE")
         {
            $results = $this->ws_model->remove_bookmark_article_table($articleID,$userID);
            if(!$results)
           {
                $response = array('status' => false, 'message' => 'Unable to Remove bookmark!', 'response' => '');
           }
           else
           {
              $response = array('status' => true, 'message' => 'Bookmark Removed', 'response' => $results);
           }
            $this->response($response);
         }
         $data = array(            
            'user_id' => $userID             
            );
         $records_in_bookmars_tbl=$this->Common_model->check_id_is_present('bookmarks',$data);
         if(!$records_in_bookmars_tbl)
         { 
            $data = array(            
            'user_id' => $userID,
            'article_ids' => $articleID  
            );
           $bookmark = $this->Common_model->inset_to_tbl('bookmarks',$data);
           $response = array('status' => true, 'message' => 'bookmark Added', 'response' => array());
           $this->response($response);
         }
         else{
            
            $results = $this->ws_model->update_bookmark_article_table($articleID,$userID);
           if(!$results)
           {
               $response = array('status' => false, 'message' => 'Unable to bookmark!', 'response' => array());
            
           }
           else
           {
               $response = array('status' => true, 'message' => 'Bookmark created', 'response' => $results);
           }
         }
            $this->response($response);
    }
    function all_article_bookmarks_post()
    {
        
        $get_articles = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);
        if(!$userID || $userID=='')
         {
           $response = array('status' => false, 'message' => 'Please login as user', 'response' => array());
            $this->response($response);
         } 
         $get_articles =  $this->ws_model->bookmark_articles($userID);
         $Details=array('get_article' => $get_articles);
        if(empty($get_articles))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
    function all_news_bookmarks_post()
    {
        
        $get_news = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);
        if(!$userID || $userID=='')
         {
           $response = array('status' => false, 'message' => 'Please login as user', 'response' => array());
            $this->response($response);
         } 
         $get_news =  $this->ws_model->bookmark_news($userID);
         $Details=array('get_news' => $get_news);
        if(empty($get_news))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
    //         /*
    // *     all lawyear of the  the biladil app;
    // */
    function all_lawyers_for_user_post()
    {
        
        $get_articles = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);
        if(!isset($userID) || $userID=='')
         {
           $response = array('status' => false, 'message' => 'Please login as user', 'response' => array());
            $this->response($response);
         }
        $all_lawyers = $this->Common_model->get_tables_records('app_own_lawyers'); 
        $Details=array('get_lawyes' => $all_lawyers);
        if(empty($all_lawyers))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
    function all_serarch_post()
    {
        
        $get_articles = array();
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);
        // if(!isset($userID) || $userID=='')
        //  {
        //   $response = array('status' => false, 'message' => 'Please login as user', 'response' => array());
        //     $this->response($response);
        //  }
         
        if(!$searchTYPE || $searchTYPE=='')
         {
           $response = array('status' => false, 'message' => 'Search type not found', 'response' => array());
            $this->response($response);
         }
         if(!$keywords || $keywords=='')
         {
           $response = array('status' => false, 'message' => 'Search key words not found', 'response' => array());
            $this->response($response);
         }
        $searched_result = $this->ws_model->search_content_by_keyworkds($searchTYPE,$keywords); 
        $Details=array('searched_result' => $searched_result);
        if(empty($searched_result))
        {
           $response = array('status' => false, 'message' => 'No Result found', 'response' => array());
        }
        else
        {
         $response = array('status' => true, 'message' => 'Result Found', 'response' => $Details);
        }               
        //TrackResponse($user_input, $response);       
        $this->response($response);
    }
            /*
    *     make chat converstion between user an expert;
    */
     function chat_message_post()
    {
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);
         if(!isset($Sender_ID) || $Sender_ID==''){ 
            $response = array('status' => false, 'message' => 'Please login as a user', 'response' => array());
            $this->response($response);
         }
         
         if(!isset($Message) || $Message==''){ 
            $response = array('status' => false, 'message' => 'No message is there', 'response' => array());
            $this->response($response);
         }
         $Reciver_ID='Admin';
         $data = array(            
            'sender_id' => $Sender_ID,
            'reciver_id' => $Reciver_ID,            
            'message' => $Message,            
            'created_at' => date('Y-m-d H:i:s')            
            );
        $insert_chat = $this->Common_model->inset_to_tbl('chat_table',$data);
        if(!$insert_chat){
            $response = array('status' => false, 'message' => 'Unable to send message', 'response' => array());
            $this->response($response);
        }
        else
        {   
            $chat_array = $this->ws_model->get_message_convertion($Sender_ID);
            if(empty($chat_array))
            {
                $response = array('status' => false, 'message' => 'Unable retrieve message', 'response' => array());
            }
            else
            {
                $Ordered_msg = meaasge_separator_user_expart($chat_array,$Sender_ID);
                $response = array('status' => true, 'message' => 'meaasge found', 'response' => $Ordered_msg);
            }
            $this->response($response);
        }
            $this->response($response);
    }
     function my_current_chat_post()
    {
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);
         if(!isset($Sender_ID) || $Sender_ID==''){ 
            $response = array('status' => false, 'message' => 'Please login as a user', 'response' => array());
            $this->response($response);
         }
       
            $Reciver_ID='Admin';
            $chat_array = $this->ws_model->get_message_convertion($Sender_ID);
            if(empty($chat_array))
            {
                $response = array('status' => false, 'message' => 'Unable retrieve message', 'response' => array());
            }
            else
            {
                $Ordered_msg = meaasge_separator_user_expart($chat_array,$Sender_ID);
                $response = array('status' => true, 'message' => 'meaasge found', 'response' => $Ordered_msg);
            }
            $this->response($response);
    }
    function user_package_checkout_post()
    {
         $response = array('status' => false, 'message' => '', 'response' => array());
         $user_input = $this->client_request;
         extract($user_input); 
         if(!$packageID || $packageID=='')
         {
           $response = array('status' => false, 'message' => 'Please select a package', 'response' => array());
            $this->response($response);
         }
         if(!$userID || $userID=='')
         {
           $response = array('status' => false, 'message' => 'Please login as user', 'response' => array());
            $this->response($response);
         }
         if((!$amount || $amount=='') || !is_numeric($amount))
         {
           $response = array('status' => false, 'message' => 'amount Not defined', 'response' => array());
            $this->response($response);
         }
         
         if(!$currency || $currency=='')
         {
           $response = array('status' => false, 'message' => 'Currency type not defined', 'response' => array());
            $this->response($response);
         }
          if(!$payment_type || $payment_type=='')
         {
           $response = array('status' => false, 'message' => 'payment type not defined', 'response' => array());
            $this->response($response);
         }
         $parameters =  array(
             'amount' => $amount,
              'currency' => $currency,
              'payment_type' => $payment_type,
              'Notification_url' => base_url('app/Rouhf/Hyper_notification/'));
         $data = array(
            'id' => $packageID,
            'status' => 1                        
            );
         $package_details=$this->Common_model->get_one_row_data('packages', $data);  
         if(empty($package_details))
         {           
           $response = array('status' => false, 'message' => 'This package is expired!', 'response' => array());
            $this->response($response);
         }
          // $this->load->library('Payment/Hyper_pay');
          // $this->Hyper_pay->TEST('sdfdsf');
            $response_hyper= json_decode(Hyper_payRequest2($parameters),true);
         $response = array('status' => true, 'message' => 'Key generation Successful!', 'response' => $response_hyper);
         $this->response($response);
          
    }
    function Hyper_Status_post()
    {
        $response = array('status' => false, 'message' => '', 'response' => array());
         $user_input = $this->client_request;
         extract($user_input);  
         
        if(!$packageID || $packageID=='')
         {
           $response = array('status' => false, 'message' => 'Please select a package', 'response' => array());
            $this->response($response);
         }
         if(!$userID || $userID=='')
         {
           $response = array('status' => false, 'message' => 'Please login as user', 'response' => array());
            $this->response($response);
         }
         if(!$transID || $transID=='')
         {
           $response = array('status' => false, 'message' => 'Tranction ID not found', 'response' => array());
            $this->response($response);
         }
         $parameters = array('Pay_ID' => $transID, 'merchantTransactionId' => $merchantTransactionId);
         
        
        $response_hyper = json_decode(Hyper_payStatus($parameters),true);
         $response = array('status' => true, 'message' => 'Key generation Successful!', 'response' => $response_hyper);
       
         $this->response($response);
    }
    
    
    function Hyper_notification_post()
    {
        $response = array('status' => false, 'message' => '', 'response' => array());
         $user_input = $this->client_request;
        extract($user_input);
       $get_responce= serialize($_POST); 
        $data = array('responce' => $get_responce);
        $notifications = $this->Common_model->inset_to_tbl('roughf',$data);
        if(!$notifications)
        {
            $response = array('status' => false, 'message' => 'Package subscription  Failed!', 'response' => array());
        }
        else
        {   
            $response = array('status' => true, 'message' => 'Package subscribed Successfuly!', 'response' => unserialize($get_responce));
        }  
         $this->response($response);
    }
    function Hyper_notification_get()
    {
        $response = array('status' => false, 'message' => '', 'response' => array());
         $user_input = $this->client_request;
         extract($user_input);
        $get_responce= serialize($_GET); 
        $data = array('responce' => $get_responce);
        $notifications = $this->Common_model->inset_to_tbl('roughf',$data);
        if(!$notifications)
        {
            $response = array('status' => false, 'message' => 'Package subscription  Failed!', 'response' => array());
        }
        else
        {   
            $response = array('status' => true, 'message' => 'Package subscribed Successfuly!', 'response' =>  unserialize($get_responce));
        }  
         $this->response($response);
    }
   
    function concatct_us_post()
    {
        $response = array('status' => false, 'message' => '', 'response' => array(), 'otp' => array());
        $user_input = $this->client_request;
        extract($user_input);
        
        if(!$name || $name=='')
        {
            $response = array('status' => false, 'message' => 'Enter your name!', 'response' => array());
                
            $this->response($response);
        }
        
        if(!$mobile || $mobile=='')
        {
            $response = array('status' => false, 'message' => 'Enter Phone Number!', 'response' => array());
                 
            $this->response($response);
        }
        
        if(!$emailID || $emailID=='')
        {
            $response = array('status' => false, 'message' => 'Enter Email ID!', 'response' => array());
                 
            $this->response($response);
        }
        
        if(!$message || $message=='')
        {
            $response = array('status' => false, 'message' => 'Enter your message!', 'response' => array());
                 
            $this->response($response);
        }
  
        $data = array('topic' => $name,'mobile' => $mobile,'email_id' => $emailID,'description' => $message);
        $advices = $this->Common_model->inset_to_tbl('advices',$data);
        if(!$advices)
        {
            $response = array('status' => false, 'message' => 'Unable to sent Message!', 'response' => array());
        }
        else
        {   
            $response = array('status' => true, 'message' => 'Message sent Successfuly!', 'response' => '');
        }  
         $this->response($response);
    }
}
?>