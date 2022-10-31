<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'libraries/RESTful/REST_Controller.php';
class User_controller extends REST_Controller {
	
	protected $client_request = NULL;
	
	function __construct()
	{
		parent::__construct();	
		error_reporting(0);
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		date_default_timezone_set("Asia/Kolkata");

		$this->load->model('Common_model');
		$this->load->model('User_model');
		
		$this->client_request = new stdClass();
		$this->client_request = json_decode(file_get_contents('php://input', true));
		$this->client_request = json_decode(json_encode($this->client_request), true);		
	}

      /*
    *     put a request for product advise to expert;
    */

     function put_request_post()
    {

	    $response = array('status' => false, 'message' => '', 'response' => array());
	    $user_input = $this->client_request;
	    extract($user_input);

	    if(!isset($cat_ID)){ 
	        $response = array('status' => false, 'message' => 'Please select a categories', 'response' => array());
	        $this->response($response);
	     }

	     if(!isset($sub_cat_ID) || $sub_cat_ID==''){ 
	        $response = array('status' => false, 'message' => 'Please select a sub-categories', 'response' => array());
	        $this->response($response);
	     }

	      if(!isset($UserID) || $UserID==''){ 
	        $response = array('status' => false, 'message' => 'Please login as a expart', 'response' => array());
	        $this->response($response);
	     }

	     if(!isset($Product_Name) || $Product_Name==''){ 
	        $response = array('status' => false, 'message' => 'Please Enter Product Name', 'response' => array());
	        $this->response($response);
	     }

	     if(!isset($Description) || $Description==''){ 
	        $response = array('status' => false, 'message' => 'Please Enter Description', 'response' => array());
	        $this->response($response);
	     }

	     if(!isset($Location)){ 
	        $response = array('status' => false, 'message' => 'Send loction', 'response' => array());
	        $this->response($response);
	     }

	     if(!isset($Image_base64) || $Image_base64==''){ 
	        $response = array('status' => false, 'message' => 'Send Image', 'response' => array());
	        $this->response($response);
	     }


         $image_path = "storage/default-no-image.png";
        // if($Image_base64!='')
        // {
        //     define('UPLOAD_DIR', "../storage/convertionimage/");
        //     $Image_base64 = str_replace('data:image/png;base64,', '', $Image_base64);
        //     $Image_base64 = str_replace(' ', '+', $Image_base64);
        //     $data = base64_decode($Image_base64);
        //     $path = $UserID."user".uniqid() . '.png';
        //     $file = UPLOAD_DIR . $path;
        //     $image_path = 'storage/convertionimage/'.$path;
        //     $success = file_put_contents($file, $data);
        // }

        if($Image_base64)
        {
            define('UPLOAD_DIR', "storage/convertionimage/");
            $img = str_replace('data:image/png;base64,', '', $Image_base64);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $path = uniqid() . '.png';
            $file = UPLOAD_DIR . $path;
            $image_path = 'storage/convertionimage/'.$path;
            $success = file_put_contents($file, $data);
        }








	     $data = array(
	        'avalible' => 1,
	        'subcategory_id' => $sub_cat_ID
	        );

	    $check_service_avalible =  $this->User_model->check_service_there_or_not($data);

	    if(empty($check_service_avalible)){

	    	$response = array('status' => false, 'message' => 'No expart found now', 'response' => array());
	        $this->response($response);

	    }


        
	     $data = array(
            'category_id' => $cat_ID,
            'subcategory_id' => $sub_cat_ID,
            'image' => $image_path,
            'product_name' => $Product_Name,
            'location' => $Location,
            'description' => $Description,
            'user_id' => $UserID,            
            'created_at' => date('Y-m-d H:i:s')            
            );

        $result = $this->Common_model->inset_to_tbl('request_responce',$data);
        if($result)
        {
        	$requested_data = $this->User_model->get_requested_data($UserID);
            $response = array('status' => true, 'message' => 'Request Placed Successfully waiting for Responce', 'response' => $requested_data);
        }
        else
        {           

            $response = array('status' => false, 'message' => 'User Registration Successful!', 'response' => array());
        }
       
	   $this->response($response);

	}


      /*
    *     all accepted request or conversion between user and expert;
    */

    function all_accepted_post()
    {
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);

         if(!isset($UserID) || $UserID==''){ 
            $response = array('status' => false, 'message' => 'Please login ', 'response' => array());
            $this->response($response);
         }

         $check_user = check_user_is_user($UserID);
        if(!$check_user)
        {
            $response = array('status' => false, 'message' => 'Login as a User', 'response' => array());
           // TrackResponse($user_input, $response);       
            $this->response($response);
        }


         $get_chats_history = $this->User_model->get_chats_services($UserID);         
         if(empty($get_chats_history))
         {
            $response = array('status' => false, 'message' => 'No Chats Found', 'response' => array());            
            $this->response($response);
         }
         else
         {            
            $response = array('status' => true, 'message' => 'Chats Found', 'response' => $get_chats_history);
            $this->response($response);

         }


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

         if(!isset($Conversion_ID) || $Conversion_ID==''){ 
            $response = array('status' => false, 'message' => 'Please select chat', 'response' => array());
            $this->response($response);
         }
         if(!isset($Reciver_ID) || $Reciver_ID==''){ 
            $response = array('status' => false, 'message' => 'Unable to fetch reciver', 'response' => array());
            $this->response($response);
         }
         if(!isset($Message) || $Message==''){ 
            $response = array('status' => false, 'message' => 'No message is there', 'response' => array());
            $this->response($response);
         }

         $data = array(
            'convertion_id' => $Conversion_ID,
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

            $chat_array = $this->Common_model->get_message_convertion($Conversion_ID);

            if(empty($chat_array))
            {
                $response = array('status' => false, 'message' => 'Unable retraive message', 'response' => array());
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


        /*
    *     user Set Rating
    */

    function user_set_rating_post()
    {   
        $RateComment='';
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);

        if(!$Expert_ID || $Expert_ID=='')
        {
            $response = array('status' => false, 'message' => 'Please select a offer !', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }

        if(!$userID || $userID=='')
        {
            $response = array('status' => false, 'message' => 'Please Login!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }

        if(!$rating || $rating=='')
        {
            $response = array('status' => false, 'message' => 'Please give rating!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }

        if(!$Conversion_ID || $Conversion_ID=='')
        {
            $response = array('status' => false, 'message' => 'Select a conversion', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        if(!$RateComment || $RateComment=='')
        {
            $response = array('status' => false, 'message' => 'Select a conversion', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }

        $checkRating = $this->User_model->check_rating($userID,$Conversion_ID);

        if($checkRating)
        {
             $response = array('status' => false, 'message' => 'Already rating given By user!', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }
        
        

        $data = array(           
            'user_id' => $userID,
            'convertion_id' => $Conversion_ID,            
            'expert_id' => $Expert_ID,
            'rating' => $rating,
            'comment' => $RateComment,            
            'created_on' => date('Y-m-d H:i:s')
            );

        $SetRating = $this->User_model->set_rating($data);

        if(!$SetRating)
        {
            $response = array('status' => false, 'message' => 'Failed to rate this!', 'response' => array());
        }
        else
        {           
           
            $response = array('status' => true, 'message' => 'Rated Successfully', 'response' => array());
        }               

        //TrackResponse($user_input, $response);       
        $this->response($response);
    }



        /*
    *     To get the rating of a expert;
    */


    function rating_and_comments_expert_post()
    {
        $response = array('status' => false, 'message' => '', 'response' => array());
        $user_input = $this->client_request;
        extract($user_input);
        
        if(!$Expert_ID || $Expert_ID=='')
        {
            $response = array('status' => false, 'message' => 'Please select expert !', 'response' => array());
            //TrackResponse($user_input, $response);       
            $this->response($response);
        }

         $get_comments =  $this->User_model->get_comment_details($Expert_ID,$statPoint);
         $Details=array('more_coment' => $get_comments);
        if(empty($get_comments))
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

	





}
?>