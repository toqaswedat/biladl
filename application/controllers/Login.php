<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Login extends CI_Controller {
			
	function __construct()
	{
		parent::__construct();
		// $this->is_logged_in();
		//$this->load->model('homemodel');
		$this->load->model('Common_model');
		$this->load->model('Web_modul');
		date_default_timezone_set("Asia/Kolkata");
		$this->load->library('Ajax_pagination');
	}
	
	public function index()
	{
		self::Login_as_register_member();
	}

	public function Login_as_register_member($data=array())
	{
		if(self::is_logged_in_true()){self::call_router(); return true;}
		if(!is_array($data)){ $data=array(); }
		$condition1=array('is_deleted'=>1);
		$order_by=array('title'=>'ASC');
		$countries = $this->Common_model->get_tables_records('countries','',$condition1);
		$nationality = $this->Common_model->get_tables_records('nationality','','',$order_by);
		$data['nationality'] = $nationality;

		$data['countries']=$countries;
		 $data['title'] = "Biladil - Member login panel";
        $data['msg'] = $this->input->get('msg');
	
		 $this->load->view('website/include/header.php', $data);
		 $this->load->view('website/login_member.php', $data);
		 $this->load->view('website/include/footer.php', $data);
        

	}


	public function Login_as_register_lawyer($data=array())
	{
		if(self::is_logged_in_true()){self::call_router(); return true;}
		if(!is_array($data)){ $data=array(); }

		$condition1=array('is_deleted'=>1);
		$order_by=array('title'=>'ASC');
		$countries = $this->Common_model->get_tables_records('countries','',$condition1);
		$nationality = $this->Common_model->get_tables_records('nationality','','',$order_by);
		$data['nationality'] = $nationality;

		$data['countries']=$countries;

		 $data['title'] = "Biladil - lawyer login panel";
		 $this->load->view('website/include/header.php', $data);
		 $this->load->view('website/login-lawyer.php', $data);
		 $this->load->view('website/include/footer.php', $data);

	}

	 public function Login_as_register_trainee($data=array())
	{
		if(self::is_logged_in_true()){self::call_router(); return true;}
		if(!is_array($data)){ $data=array(); }

		$condition1=array('is_deleted'=>1);
		$order_by=array('title'=>'ASC');
		$countries = $this->Common_model->get_tables_records('countries','',$condition1);
		$nationality = $this->Common_model->get_tables_records('nationality','','',$order_by);
		$data['nationality'] = $nationality;
		$data['countries']=$countries;

		 $data['title'] = "Biladil - trainee login panel";
		 $this->load->view('website/include/header.php', $data);
		 $this->load->view('website/login-student.php', $data);
		 $this->load->view('website/include/footer.php', $data);

	}



	public function member_normal_login(){
		$email = trim(strtolower($this->input->post('Lemail',true)));
		$password = $this->input->post('LPassword',true);
		$this->form_validation
		->set_error_delimiters('<div class="form-error">', '</div>');
		$this->form_validation
		->set_rules('Lemail', 'email', 'required|trim|strtolower');
		$this->form_validation
		->set_rules('LPassword', 'password', 'required');

		$this->session->mark_as_temp('success',0);


		$data=array();
		if($this->form_validation->run() == false):			
		$this->Login_as_register_member($data);
		return true;
		else :
		$condition= array(
            'email' => $email,
            'type' => 'member',
            'password' => md5($password),
            );
      	$getData = $this->Common_model->get_one_row_data('users',$condition);
      	if(empty($getData))
      	{
      		
      		$message="<p class='form-error'>User name or password is incorrect!</p>";
      		$this->session->set_flashdata('success',$message,3);
      		$this->Login_as_register_member($data);return true;
      	}
      	elseif($getData->status==9)
      	{	
      		$message="<p class='form-error'>Your account is in hold please confirm your account!</p>";
      		$this->session->set_flashdata('success',$message,3);
      		$this->Login_as_register_member($data);return true;
      	}
      	elseif($getData->status==8)
      	{
      		$send_data= array(
            'keyword' =>  $getData->email
            );
             if(self::verify_otp($send_data)){
            	return true;
            }
      	}
      	else
      	{      		
      		if($getData->status==1)
  			{
  				$getData->type=strtolower($getData->type);
  				$newdata = array(
  					'user_id'  =>  $getData->id,
					'user_name'  => $getData->name,
					'user_type'  => $getData->type,
					'user_email'     => $getData->email,
					'user_logged_in' => TRUE
					);
  				$this->session->set_userdata($newdata);
  				$this->call_router($data);
  				return true;
  			}
  			else
  			{
				// $message="<p class='form-error'>Confirmation link sent to your email! OR</p><br>";
				// $message.='<p class="form-success">
				// <a href="'.base_url().'user/resend_otp_link/'.$getData->id.'/" >Click here</a>&nbsp; resend otp link</p>';
				$message="<p class='form-error'>Currently unable to proceed your Link!</p>";
				$this->session->set_flashdata('success',$message,3);	
				$this->Login_as_register_member($data);
				return true;
  			}
      	}
		endif;
	}


	public function lawyer_normal_login(){
		$email = trim(strtolower($this->input->post('Lemail',true)));
		$password = $this->input->post('LPassword',true);
		$this->form_validation
		->set_error_delimiters('<div class="form-error">', '</div>');
		$this->form_validation
		->set_rules('Lemail', 'email', 'required|trim|strtolower');
		$this->form_validation
		->set_rules('LPassword', 'password', 'required');
		$this->session->mark_as_temp('success',0);
		$data=array();
		if($this->form_validation->run() == false):			
		$this->Login_as_register_lawyer($data);
		else :
		$condition= array(
            'email' => $email,
            'type' => 'lawyer',
            'password' => md5($password),
            );
      	$getData = $this->Common_model->get_one_row_data('users',$condition);
      	if(empty($getData))
      	{
      		
      		$message="<p class='form-error'>User name or password is incorrect!</p>";
      		$this->session->set_flashdata('success',$message,3);
      		$this->Login_as_register_lawyer($data);
      	}
      	elseif($getData->status==9)
      	{

      		
      		$message="<p class='form-error'>Your account is in hold please confirm your account!</p>";
      		$this->session->set_flashdata('success',$message,3);
      		$this->Login_as_register_lawyer($data);
      	}
      	elseif($getData->status==8)
      	{
      		$send_data= array(
            'keyword' =>  $getData->mobile
            );
             if(self::verify_otp($send_data)){
            	return true;
            }
      	}
      	else
      	{      		
      		if($getData->status==1)
  			{
  				$getData->type=strtolower($getData->type);
  				$newdata = array(
  					'user_id'  =>  $getData->id,
					'user_name'  => $getData->name,
					'user_type'  => $getData->type,
					'user_email'     => $getData->email,
					'user_logged_in' => TRUE
					);
  				$this->session->set_userdata($newdata);
  				$this->call_router($data);
  				return true;

  			}
  			else
  			{

				
				// $message="<p class='form-error'>Confirmation link sent to your email! OR</p><br>";
				// $message.='<p class="form-success">
				// <a href="'.base_url().'user/resend_otp_link/'.$getData->id.'/" >Click here</a>&nbsp; resend otp link</p>';
				$message="<p class='form-error'>Currently unable to proceed your Link!</p>";
				$this->session->set_flashdata('success',$message,3);	
				$this->Login_as_register_lawyer($data);

  			}
  			


      	}

		endif;


	}


	public function trainee_normal_login(){
		$email = trim(strtolower($this->input->post('Lemail',true)));
		$password = $this->input->post('LPassword',true);
		$this->form_validation
		->set_error_delimiters('<div class="form-error">', '</div>');
		$this->form_validation
		->set_rules('Lemail', 'email', 'required|trim|strtolower');
		$this->form_validation
		->set_rules('LPassword', 'password', 'required');

		$this->session->mark_as_temp('success',0);


		$data=array();
		if($this->form_validation->run() == false):			
		$this->Login_as_register_trainee($data);
		else :
		$condition= array(
            'email' => $email,
            'type' => 'student',
            'password' => md5($password),
            );
      	$getData = $this->Common_model->get_one_row_data('users',$condition);
      	if(empty($getData))
      	{
      		
      		$message="<p class='form-error'>Email Id or password is incorrect!</p>";
      		$this->session->set_flashdata('success',$message,3);
      		$this->Login_as_register_trainee($data);
      	}
      	elseif($getData->status==9)
      	{
      		
      		$message="<p class='form-error'>Your account is in hold please confirm your account!</p>";
      		$this->session->set_flashdata('success',$message,3);
      		$this->Login_as_register_trainee($data);
      	}
      	elseif($getData->status==8)
      	{
      		$send_data= array(
            'keyword' =>  $getData->mobile
            );
             if(self::verify_otp($send_data)){
            	return true;
            }
      	}
      	else
      	{      		
      		if($getData->status==1)
  			{
  				$getData->type=strtolower($getData->type);
  				$newdata = array(
  					'user_id'  =>  $getData->id,
					'user_name'  => $getData->name,
					'user_type'  => $getData->type,
					'user_email'     => $getData->email,
					'user_logged_in' => TRUE
					);
  				$this->session->set_userdata($newdata);
  				$this->call_router($data);
  				return true;
  			}
  			else
  			{
				// $message="<p class='form-error'>Confirmation link sent to your email! OR</p><br>";
				// $message.='<p class="form-success">
				// <a href="'.base_url().'user/resend_otp_link/'.$getData->id.'/" >Click here</a>&nbsp; resend otp link</p>';
				$message="<p class='form-error'>Currently unable to proceed your Link!</p>";
				$this->session->set_flashdata('success',$message,3);	
				$this->Login_as_register_lawyer($data);

  			}
  			


      	}

		endif;


	}











	public function user_subscription($data=array())
	{
		if(!is_array($data)){ $data=array(); }

		 	self::is_logged_in();
			$user_id =$this->session->userdata('user_id');

			 $condition= array('id' => $user_id);
			 $condition2= array('status' => 1);
			 $order_by=array('price'=>'ASC');
		 		$main_details = $this->Common_model->get_one_row_data('users',$condition);		
		 		$current_details = $this->Web_modul->user_currnt_running_package($user_id);		 		
		 		$all_packages = $this->Common_model->get_tables_records('packages','',$condition2,$order_by);
			 $data['main_details'] = $main_details;
			 $data['current_details'] = $current_details;
			 $data['all_packages'] = $all_packages;		
		 	 $data['title'] = "Biladil - Packages panel";
		 	 
		 $this->load->view('website/include/header.php', $data);
		 $this->load->view('website/include/sidebar-dashbord.php', $data);
		 $this->load->view('website/user-suscritption.php', $data);
		 $this->load->view('website/include/footer.php', $data);

	}





/* START
 Member dashbord login logout */


	public function member_registration(){
        $country_code='';
       	$send_data= array('keyword' =>  $this->input->post('email',true));
        self::delete_register($send_data);
        $send_data= array('keyword' =>  $this->input->post('phone',true));
        self::delete_register($send_data);
        
		$this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');
		$this->form_validation->set_rules('Name', 'name', 'required|strtolower|trim');
		$this->form_validation->set_rules('email', 'Email',
										 'required|valid_email|strtolower|trim|callback_exit_email');
		$this->form_validation->set_rules('phone', 'Contact No.', 'required|min_length[8]|max_length[15]|callback_exit_phone');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');		
		$this->form_validation->set_rules('Cpassword', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('ID_no', 'ID No', 'required|trim');
 		$this->form_validation->set_rules('country_code', 'Reselect Country', 'trim');
		$this->form_validation->set_rules('Nationlity', 'Nationlity', 'required|strtolower|trim');
		$this->form_validation->set_rules('mob_code', 'countries', 'required|strtolower|trim');
		$this->form_validation->set_rules('country', 'country', 'required|strtolower|trim');
		$this->form_validation->set_rules('region', 'region', 'required|strtolower|trim');
		$this->form_validation->set_rules('gender', 'gender', 'required|strtolower|trim');
		//$this->form_validation->set_rules('Dob', 'date of birth', 'required|trim');
		//$this->form_validation->set_rules('region', 'region', 'required|trim');
		if($this->form_validation->run() == false):
		 //echo validation_errors();die();
		$data['reset'] = FALSE;		
		$data['error_model'] = "Registration_user";		
		self::Login_as_register_member($data);

		else :

			$data['reset'] = TRUE;
			$data['error_model'] = "login_user";
			$message="<p class='form-success'>Unable to register Try again</p>";
			

			$cdates=date('Y-m-d H:i:s');
			$pstal_keys=array();
			foreach ($_POST as $key => $value) {				
				$pstal_keys[$key]=$this->form_validation->set_value($key);
			}	extract($pstal_keys);
         $Dob=$_POST['dob_year']."-".$_POST['dob_month']."-".$_POST['dob_day'];
			 $data = array(
            'name' => $Name, 
            'email' => $email,
            'mobile' => $phone,                 
            'mob_code' => $mob_code,
            'type' => 'member',
            'password' => md5($password),
            'created_at' => $cdates,
            'status' => 8
            );

        	if($this->Common_model->inset_to_tbl('users',$data))
        	{
        		$user_id=$this->db->insert_id();

        		$adata = array(
		            'user_id' => $user_id, 
		            'identity_no' => $ID_no,                 
		            'county_code' => $country_code,
		            'nationality' => $Nationlity,
		            'country' => $country,
		            'region' => $region,
		            'state' => $state,
		            'street_name' => $street_name,
		            'zip_code' => $zip_code,
		            'dob' =>date('Y-m-d H:i:s',strtotime($Dob)),
		            'gender' =>$gender
		            );
        		$set_users = $this->Common_model->inset_to_tbl('memeber_details',$adata);

		 // If file upload form submitted
        		$uploadData=array();
       	 if(!empty($_FILES['documents']['name'])){        	
            $filesCount = count($_FILES['documents']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['document']['name']     = $_FILES['documents']['name'][$i];
                $_FILES['document']['type']     = $_FILES['documents']['type'][$i];
                $_FILES['document']['tmp_name'] = $_FILES['documents']['tmp_name'][$i];
                $_FILES['document']['error']    = $_FILES['documents']['error'][$i];
                $_FILES['document']['size']     = $_FILES['documents']['size'][$i];                
                // File upload configuration
                $randon_number = $user_id.mt_rand (10,500);
           		$file_name = time().'_'.$randon_number;
                $uploadPath = './storage/user_files/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']            = $file_name;
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('document')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['user_id'] = $user_id;
                    $uploadData[$i]['created_on'] = $cdates;
                    $uploadData[$i]['document_type'] = 'REGISTRATION';
                    $uploadData[$i]['document_path'] = 'storage/user_files/'.$fileData['file_name'];
                }
                else
                {
                	$statusMsg="Unable to upload files now please check whether you selected a image or not";

                }
            }
	            if(!empty($uploadData)){            	
	                $set_users = $this->Common_model->inset_to_batch('user_documents',$uploadData);
	            }
        	}

        	$message="<p class='form-success'>Registration done successfully</p>";
        	$this->session->set_flashdata('success',$message,3);
        	// redirect('Login/Login_as_register_member', 'refresh');
        	$data['keyword']=$phone;
        	self::verify_otp($data);
        	return true;

        }
        	$this->session->set_flashdata('success',$message,3);
			$this->Login_as_register_member($data);
			return true;

		endif;
	}

	public function trainee_registration(){
	    
        $country_code='';
       	$send_data= array('keyword' =>  $this->input->post('email',true));
        self::delete_register($send_data);
        $send_data= array('keyword' =>  $this->input->post('phone',true));
        self::delete_register($send_data);
		$this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');
		$this->form_validation->set_rules('Name', 'name', 'required|strtolower|trim');
		$this->form_validation->set_rules('email', 'Email',
										 'required|valid_email|strtolower|trim|callback_exit_email');
		$this->form_validation->set_rules('phone', 'Contact No.', 'required|min_length[8]|max_length[15]|callback_exit_phone');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');		
		$this->form_validation->set_rules('Cpassword', 'confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('ID_no', 'ID No', 'required|trim');
 		$this->form_validation->set_rules('country_code', 'Reselect country', 'trim');
		$this->form_validation->set_rules('Nationlity', 'Nationlity', 'required|strtolower|trim');
		$this->form_validation->set_rules('country', 'country', 'required|strtolower|trim');
		$this->form_validation->set_rules('mob_code', 'countries', 'required|strtolower|trim');
		$this->form_validation->set_rules('region', 'region', 'required|strtolower|trim');
		$this->form_validation->set_rules('gender', 'gender', 'required|strtolower|trim');
		//$this->form_validation->set_rules('Dob', 'date of birth', 'required|trim');
		$this->form_validation->set_rules('current_institute','Institute', 'required|trim');
		$this->form_validation->set_rules('course_name','Course name', 'required|trim');
		$this->form_validation->set_rules('spacialization','spacialization', 'required|trim');
		//$this->form_validation->set_rules('region', 'region', 'required|trim');
		if($this->form_validation->run() == false):
		//$message=validation_errors();
		$data['reset'] = FALSE;		
		$data['error_model'] = "Registration_user";		
		self::Login_as_register_trainee($data);
		else :
			$data['reset'] = TRUE;
			$data['error_model'] = "login_user";
			$message="<p class='form-success'>Unable to register Try again</p>";
			

			$cdates=date('Y-m-d H:i:s');
			$pstal_keys=array();
			foreach ($_POST as $key => $value) {				
				$pstal_keys[$key]=$this->form_validation->set_value($key);
			}	extract($pstal_keys);
         $Dob=$_POST['dob_year']."-".$_POST['dob_month']."-".$_POST['dob_day'];
			 $data = array(
            'name' => $Name, 
            'email' => $email,                 
            'mobile' => $phone,
            'mob_code' => $mob_code,
            'type' => 'student',
            'password' => md5($password),
            'created_at' => $cdates,
            'status' => 1
            );

        	if($this->Common_model->inset_to_tbl('users',$data))
        	{
        		$user_id=$this->db->insert_id();

        	// If file upload form submitted
        	$uploadData=array();
       	 	if(!empty($_FILES['documents']['name'])){        	
            $filesCount = count($_FILES['documents']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['document']['name']     = $_FILES['documents']['name'][$i];
                $_FILES['document']['type']     = $_FILES['documents']['type'][$i];
                $_FILES['document']['tmp_name'] = $_FILES['documents']['tmp_name'][$i];
                $_FILES['document']['error']    = $_FILES['documents']['error'][$i];
                $_FILES['document']['size']     = $_FILES['documents']['size'][$i];                
                // File upload configuration
                $randon_number = $user_id.mt_rand (10,500);
           		$file_name = time().'_'.$randon_number;
                $uploadPath = './storage/user_files/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']            = $file_name;
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('document')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['user_id'] = $user_id;
                    $uploadData[$i]['created_on'] = $cdates;
                    $uploadData[$i]['document_type'] = 'REGISTRATION';
                    $uploadData[$i]['document_path'] = 'storage/user_files/'.$fileData['file_name'];
                }
                else
                {
                	$statusMsg="Unable to upload files now please check whether you selected a image or not";

                }
            }
	            if(!empty($uploadData)){            	
	                $set_users = $this->Common_model->inset_to_batch('user_documents',$uploadData);
	            }
	            else
	            {
	            	$condition= array("id"=>$user_id);
	            	$this->Common_model->delete_by_condition('users',$condition);
	            	$data['reset'] = FALSE;		
					$data['error_model'] = "Registration_user";
					$message="<p class='form-error'>Unable to upload documents make sure these have to be in jpg,jpeg,png,gif</p>";
        			$this->session->set_flashdata('success',$message,3);
					self::Login_as_register_trainee($data);
					return TRUE;	
	            }
        	}
        		$adata = array(
		            'user_id' => $user_id, 
		            'identity_no' => $ID_no,                 
		            'county_code' => $country_code,
		            'nationality' => $Nationlity,
		            'country' => $country,		         
		            'region' => $region,
		            'dob' =>date('Y-m-d H:i:s',strtotime($Dob)),
		            'gender' =>$gender,
		            'instiutute_name' => $current_institute,
		            'course_name' => $course_name,
		            'state' => $state,
		            'street_name' => $street_name,
		            'zip_code' => $zip_code,
		            'specialzation' => $spacialization
		            );
        		$set_users = $this->Common_model->inset_to_tbl('students_details',$adata);
        	$message="<p class='form-success'>Registration done successfully</p>";
        	$this->session->set_flashdata('success',$message,3);

        	$data['keyword']=$phone;
        	self::verify_otp($data);
        	// redirect('Login/Login_as_register_trainee', 'refresh');

        }
        	$this->session->set_flashdata('success',$message,3);
			$this->Login_as_register_trainee($data);
			return true;
		endif;
	}

	public function lawyer_registration(){
	    $country_code='';
	    $send_data= array('keyword' =>  $this->input->post('email',true));
        self::delete_register($send_data);
        $send_data= array('keyword' =>  $this->input->post('phone',true));
        self::delete_register($send_data);
        
		$this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');
		$this->form_validation->set_rules('Name', 'name', 'required|strtolower|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|strtolower|trim|callback_exit_email');
		$this->form_validation->set_rules('phone', 'Contact No.', 'required|min_length[8]|max_length[15]|callback_exit_phone');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');		
		$this->form_validation->set_rules('Cpassword', 'confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('ID_no', 'ID No', 'required|trim');
 		$this->form_validation->set_rules('country_code', 'country code', 'trim');
		$this->form_validation->set_rules('Nationlity', 'Nationlity', 'required|strtolower|trim');
		$this->form_validation->set_rules('country', 'country', 'required|strtolower|trim');
		$this->form_validation->set_rules('mob_code', 'countries', 'required|strtolower|trim');
		$this->form_validation->set_rules('region', 'City name', 'required|strtolower|trim');
		$this->form_validation->set_rules('gender', 'gender', 'required|strtolower|trim');
		//$this->form_validation->set_rules('Dob', 'date of birth', 'required|trim');
		$this->form_validation->set_rules('Licence_no','Licence no', 'required|trim');
		$this->form_validation->set_rules('Language_known','language', 'required|trim');
		$this->form_validation->set_rules('specialization','spacialization', 'required|trim');
		$this->form_validation->set_rules('Building_no','Building no', 'required|trim');
		$this->form_validation->set_rules('street_name','Street name', 'required|trim');
		$this->form_validation->set_rules('district','District', 'required|trim');
		$this->form_validation->set_rules('zip_code','zip code', 'required|trim');
		$this->form_validation->set_rules('Additional_no','additional no', 'trim');
		//$this->form_validation->set_rules('region', 'region', 'required|trim');
		if($this->form_validation->run() == false):
		$data['reset'] = FALSE;		
		$data['error_model'] = "Registration_user";		
		self::Login_as_register_lawyer($data);
		else :

			$data['reset'] = TRUE;
			$data['error_model'] = "login_user";
			$message="<p class='form-success'>Unable to register Try again</p>";
			

			$cdates=date('Y-m-d H:i:s');
			$pstal_keys=array();
			foreach ($_POST as $key => $value) {				
				$pstal_keys[$key]=$this->form_validation->set_value($key);
			}	extract($pstal_keys);
           $Dob=$_POST['dob_year']."-".$_POST['dob_month']."-".$_POST['dob_day'];
			 $data = array(
            'name' => $Name, 
            'email' => $email,                 
            'mobile' => $phone,
            'mob_code' => $mob_code,
            'type' => 'lawyer',
            'password' => md5($password),
            'created_at' => $cdates,
            'status' => 8
            );

        	if($this->Common_model->inset_to_tbl('users',$data))
        	{
        		$user_id=$this->db->insert_id();

        	// If file upload form submitted
        	$uploadData=array();
       	 	if(!empty($_FILES['documents']['name'])){        	
            $filesCount = count($_FILES['documents']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['document']['name']     = $_FILES['documents']['name'][$i];
                $_FILES['document']['type']     = $_FILES['documents']['type'][$i];
                $_FILES['document']['tmp_name'] = $_FILES['documents']['tmp_name'][$i];
                $_FILES['document']['error']    = $_FILES['documents']['error'][$i];
                $_FILES['document']['size']     = $_FILES['documents']['size'][$i];                
                // File upload configuration
                $randon_number = $user_id.mt_rand (10,500);
           		$file_name = time().'_'.$randon_number;
                $uploadPath = './storage/user_files/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']            = $file_name;
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('document')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['user_id'] = $user_id;
                    $uploadData[$i]['created_on'] = $cdates;
                    $uploadData[$i]['document_type'] = 'REGISTRATION';
                    $uploadData[$i]['document_path'] = 'storage/user_files/'.$fileData['file_name'];
                }
                else
                {
                	$statusMsg="Unable to upload files now please check whether you selected a image or not";

                }
            }
	            if(!empty($uploadData)){            	
	                $set_users = $this->Common_model->inset_to_batch('user_documents',$uploadData);
	            }
	            else
	            {
	            	$condition= array("id"=>$user_id);
	            	$this->Common_model->delete_by_condition('users',$condition);
	            	$data['reset'] = FALSE;		
					$data['error_model'] = "Registration_user";
					$message="<p class='form-error'>Unable to upload documents make sure these have to be in jpg,jpeg,png,gif</p>";
        			$this->session->set_flashdata('success',$message,3);
					self::Login_as_register_lawyer($data);
					return TRUE;	
	            }
        	}
        		$adata = array(
		            'user_id' => $user_id, 
		            'identity_no' => $ID_no,                 
		            'county_code' => $country_code,
		            'nationality' => $Nationlity,
		            'country' => $country,		         
		            'region' => $region,
		            'dob' =>date('Y-m-d H:i:s',strtotime($Dob)),
		            'gender' =>$gender,
		            'licence_no' =>$Licence_no,
		            'languages' =>$Language_known,
		            'specialization' => $specialization,
		            'building_no' =>$Building_no,
		            'street_name' =>$street_name,
		            'district_name' =>$district,
		            'zip_code' =>$zip_code,
		            'state' =>$state,
		            'alternet_no' => $Additional_no
		            );
        		$set_users = $this->Common_model->inset_to_tbl('lawyer_details',$adata);
        	$message="<p class='form-success'>Registration done successfully.</p>";
        	$this->session->set_flashdata('success',$message,3);
        	//redirect('Login/Login_as_register_lawyer', 'refresh');
        	$data['keyword']=$phone;
        	self::verify_otp($data);

        }
        	$this->session->set_flashdata('success',$message,3);
			$this->Login_as_register_lawyer($data);
			return true;
		endif;
	}


function verify_otp($data=array())
{
	if(!is_array($data)){ $data=array(); }
	if(!isset($data['keyword']) || $data['keyword']=='')
	{
	    return false;
	}
	 $condition= array(
	    'mobile' => $data['keyword'],
	    'status !=' => 9
	    );
     $get_details = $this->Common_model->get_one_row_data('users',$condition);

	  	if(!empty($get_details))
	  	{
	  		self::generate_otp($get_details->mob_code,$get_details->mobile);
	  		 $data['details'] =$get_details;
			 $data['title'] = "Biladil - trainee login panel";
			 $this->load->view('website/include/header.php', $data);
			 $this->load->view('website/verify_otp.php', $data);
			 $this->load->view('website/include/footer.php', $data);
			 return true;
	  	}
	  	else{
    	  	$get_details = $this->Common_model->get_one_row_data('users',array(
            'email' => $data['keyword'],'status !=' => 9));
          	if(!empty($get_details))
          	{
          		self::generate_otp($get_details->mob_code,$get_details->mobile);
          		$data['details']=$get_details;
          		 $data['title'] = "Biladil - trainee login panel";
    			 $this->load->view('website/include/header.php', $data);
    			 $this->load->view('website/verify_otp.php', $data);
    			 $this->load->view('website/include/footer.php', $data);
    			 return true;
          	}
	  	}
      
      return false;
}


function delete_register($data=array())
{
    
  
	if(!is_array($data)){ $data=array(); }
	if(!isset($data['keyword']) || $data['keyword']=='')
	{
	    return false;
	}
	$keyword=$data['keyword'];
    $get_details = $this->Common_model->delete_unset_user(strtolower($keyword));
}
    
    function success_registration($data=array())
{
                $this->load->view('website/include/header.php', $data);
    			 $this->load->view('website/succss_register.php', $data);
    			 $this->load->view('website/include/footer.php', $data);
    			 return true;
}




function confirm_otp()
{
     
	$this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');
	$this->form_validation->set_rules('mobile','mobile', 'required|strtolower|trim');
	$this->form_validation->set_rules('OTP', 'otp','required|strtolower|trim');

	if($this->form_validation->run() == false){
		if($this->input->post('mobile',true))
		{
			$send_data= array(
            'keyword' =>  $this->input->post('mobile',true)
            );
		    if(self::verify_otp($send_data)){
		    	return true;
		    }

		}

	}

	else{

		if(!$this->session->tempdata('RegOtp'))
		{
		  $message="session expired";
      	  $this->session->set_flashdata('success',$message,3);
		  $send_data= array(
            'keyword' =>  $this->input->post('mobile',true)
            );
		  self::verify_otp($send_data);
		  return true;
		}
		elseif($this->session->tempdata('RegOtp')!=$this->input->post('OTP',true))
		{
			$message="Invalid OTP";
      		$this->session->set_flashdata('success',$message,3);
      		$send_data= array(
            'keyword' =>  $this->input->post('mobile',true)
            );        
		  self::verify_otp($send_data);
		  return true;
		}
		else{

		$edata = array(           
					'status' => 1
					);
		$condition= array(
					'mobile' => $this->input->post('mobile',true),
					'status !=' => 9
					);
			$message="Your application has been Received We will review and assess your application and revert to you soonest.";
      		$this->session->set_flashdata('success',$message,15);

    	$this->Common_model->update_to_tbl('users',$edata,$condition);

    	redirect('Login/success_registration/','refresh');	

		}
		
	}

   return true;
}


function generate_otp($mob_code,$mobile)
{

		$OTP=mt_rand(100000, 999999);
		//$OTP="1234";
		if(!$this->session->tempdata('RegOtp'))
		{
			$this->session->set_tempdata('RegOtp',$OTP,400);	
		}
		else
		{
			$OTP= $this->session->tempdata('RegOtp');
			//$OTP="1234";
			$this->session->set_tempdata('RegOtp',$OTP,400);
		}

		$mobile=$mob_code.$mobile;
		//echo $mobile;exit;
        $mobile=str_replace(' ','', $mobile);
        $Message = 'Dear User '.$OTP.' is your One Time Password for BILADL . Thank You.';
        SendSMS($mobile, $Message);

      return true;
}

function resend_otp()
{

		$OTP=mt_rand(100000, 999999);
		//$OTP="1234";
		$mobile=$this->input->post('mobile');
		$mob_code=$this->input->post('mob_code');
		
		$mobile=$mob_code.$mobile;
		//$mobile="918074796852";
        $mobile=str_replace(' ','', $mobile);
        $Message = 'Dear User '.$OTP.' is your One Time Password for BILADL . Thank You.';
        SendSMS($mobile, $Message);
      //print_r($mobile);
        if($Message){
        
      		$response = array('status' => true,'message'=>'otp send successfully!');
			 exit_with_json($response);

			}
			else{
				$response = array('status' => false,'message'=>'otp send Failed!');
			 exit_with_json($response);
			}
}






function exit_email()
{
	$email = $this->input->post('email',true);
	$condition= array(
            'email' => $email,
            'status!=' => 8
            );
      $getData = $this->Common_model->check_id_is_present('users',$condition);


      if($getData){
      	$this->form_validation->set_message('exit_email', 'The {field} id is already exist you can login');

       return false; } else { return true; }

}

function exit_phone()
{
	
	$phone = $this->input->post('phone',true);
	$condition= array(
            'mobile' => $phone,
            'status!=' => 8
            );
    $getData = $this->Common_model->check_id_is_present('users',$condition);
   if($getData){
  	$this->form_validation->set_message('exit_phone', 'The {field} is already exist you can login');

   return false; } else { return true; }


}

	public function Member_dashboard($data=array())
	{
		if(!is_array($data)){ $data=array(); }
		 	self::is_logged_in_member();
			$user_id =$this->session->userdata('user_id');
			$condition= array('id' => $user_id);
			$condition2= array('user_id' => $user_id);
		 	$main_details = $this->Common_model->get_one_row_data('users',$condition);		
		 	$extra_details = $this->Common_model->get_one_row_data('memeber_details',$condition2);
     if(empty($extra_details))
      {
       $extra_details = $this->Common_model->get_list_colomn_name('memeber_details');
      }

			 $data['main_details'] = $main_details;
			 $data['extra_details'] = $extra_details;		
		 	 $data['title'] = "Biladil - Member Dashbord panel";

		 $this->load->view('website/include/header.php', $data);
		 $this->load->view('website/include/sidebar-dashbord.php', $data);
		 $this->load->view('website/user-profile.php', $data);
		 $this->load->view('website/include/footer.php', $data);

	}



	public function lawyer_dashboard($data=array())
	{
		if(!is_array($data)){ $data=array(); }

		 self::is_logged_in_lawyer();
			$user_id =$this->session->userdata('user_id');

			 $condition= array('id' => $user_id);
			 $condition2= array('user_id' => $user_id);

		 		$main_details = $this->Common_model->get_one_row_data('users',$condition);		
		 		$extra_details = $this->Common_model->get_one_row_data('lawyer_details',$condition2);
        if(empty($extra_details))
        {
          $extra_details = $this->Common_model->get_list_colomn_name('memeber_details');
        }

			 $data['main_details'] = $main_details;
			 $data['extra_details'] = $extra_details;		
		 	 $data['title'] = "Biladil - Laywer Dashbord panel";

		 $this->load->view('website/include/header.php', $data);
		 $this->load->view('website/include/sidebar-dashbord.php', $data);		 
		 $this->load->view('website/lawyer-profile.php', $data);
		 $this->load->view('website/include/footer.php', $data);

	}

	public function trainee_dashboard($data=array())
	{
		if(!is_array($data)){ $data=array(); }

		 self::is_logged_in_tranee();
			$user_id =$this->session->userdata('user_id');

			 $condition= array('id' => $user_id);
			 $condition2= array('user_id' => $user_id);

		 		$main_details = $this->Common_model->get_one_row_data('users',$condition);		
		 		$extra_details = $this->Common_model->get_one_row_data('students_details',$condition2);
         if(empty($extra_details))
        {
          $extra_details = $this->Common_model->get_list_colomn_name('memeber_details');
        }

			 $data['main_details'] = $main_details;
			 $data['extra_details'] = $extra_details;		
		 	 $data['title'] = "Biladil - Trainee Dashbord panel";

		 $this->load->view('website/include/header.php', $data);
		 $this->load->view('website/include/sidebar-dashbord.php', $data);
		 $this->load->view('website/trainee-profile.php', $data);
		 $this->load->view('website/include/footer.php', $data);

	}


	public function is_logged_in_member()
	{
		$is_logged_in = $this->session->userdata('user_logged_in');		
		$user_type = strtolower($this->session->userdata('user_type'));		
		if(!isset($is_logged_in) || $is_logged_in != true || $user_type!="member")
		{
			self::is_logged_out_all();
		}
		
		return true;
	}

	public function is_logged_in_tranee()
	{
		$is_logged_in = $this->session->userdata('user_logged_in');		
		$user_type = strtolower($this->session->userdata('user_type'));		
		if(!isset($is_logged_in) || $is_logged_in != true || $user_type!="student")
		{
			self::is_logged_out_all();
		}
		
		return true;
	}

	public function is_logged_in_lawyer()
	{
		$is_logged_in = $this->session->userdata('user_logged_in');		
		$user_type = strtolower($this->session->userdata('user_type'));		
		if(!isset($is_logged_in) || $is_logged_in != true || $user_type!="lawyer")
		{
			self::is_logged_out_all();
		}
		
		return true;
	}

	public function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('user_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			self::is_logged_out_all();
		}
		
		return true;
	}

	public function call_router()
	{
		$user_type=$this->session->userdata('user_type');
		$condition1=array('is_deleted'=>1);
		$countries = $this->Common_model
		->get_tables_records_array('countries','',$condition1);
		$nationality = $this->Common_model
		->get_tables_records_array('nationality');

		$data['nationality'] = $nationality;
		$data['countries']=$countries;

			switch ($user_type) {
				case 'member':
					self::Member_dashboard($data);
					break;
				case 'lawyer':
					self::lawyer_dashboard($data);
					break;
				case 'student':
					self::trainee_dashboard($data);
					break;  					
				default:
					self::Login_as_register_lawyer();
					break;
			}
	}


	public function update_profile()
	{


		if(!$this->session->userdata('user_logged_in') || !$this->input->post())
		{
			self::call_router();
			return true;
		}
	

		$user_type=$this->session->userdata('user_type');
		$user_id=$this->session->userdata('user_id');
		$condition=array('type'=>$user_type ,'id'=>$user_id);
		$cdates=date('Y-m-d H:i:s');
		$edata = array(
            'name' => trim($this->input->post('name')), 
            // 'email' => $email,
            // 'mobile' => $phone,                 
            // 'mob_code' => $mob_code,
            // 'type' => 'member',
            // 'password' => md5($password),
            'modified_at' => $cdates
            );

    	$this->Common_model->update_to_tbl('users',$edata,$condition);


		$condition1=array('is_deleted'=>1);
		$countries = $this->Common_model
		->get_tables_records_array('countries','',$condition1);
		$nationality = $this->Common_model
		->get_tables_records_array('nationality');
		
		$data['nationality'] = $nationality;
		$data['countries']=$countries;

		$edata = array(
		        'identity_no' => trim($this->input->post('identity')), 
		        'nationality' => trim(strtolower($this->input->post('nationality'))),
		        'country' => trim(strtolower($this->input->post('country'))),       
		        'region' => trim(strtolower($this->input->post('city'))),
		        'dob' => date("Y-m-d",strtotime($this->input->post('Dob'))),
		        'gender' => trim(strtolower($this->input->post('gender')))
		        );
		$condition=array('user_id'=>$user_id);
			switch ($user_type) {
				case 'member':
			$edata = array_filter($edata);
			$this->Common_model->update_to_tbl('memeber_details',$edata,$condition);
					self::Member_dashboard($data);
					break;
				case 'lawyer':

		$edata['languages'] = trim(strtolower($this->input->post('languages')));
		$edata['building_no'] =	trim(strtolower($this->input->post('building_no')));
		$edata['district_name'] =	trim(strtolower($this->input->post('district')));
		$edata['street_name'] =	trim(strtolower($this->input->post('street')));
		$edata['zip_code'] =	trim(strtolower($this->input->post('zip_code')));
		$edata['alternet_no'] =	trim(strtolower($this->input->post('alternet_no')));
		$edata['licence_no'] =	trim(strtolower($this->input->post('licence_no')));
		$edata['specialization'] = trim(strtolower($this->input->post('special')));

		$edata = array_filter($edata);
		$this->Common_model->update_to_tbl('lawyer_details',$edata,$condition);
					self::lawyer_dashboard($data);
					break;
				case 'student':
		$edata['instiutute_name'] = trim(strtolower($this->input->post('institute')));
		$edata['course_name'] =	trim(strtolower($this->input->post('course')));
		$edata['specialzation'] = trim(strtolower($this->input->post('special')));
		$edata = array_filter($edata);
			$this->Common_model->update_to_tbl('students_details',$edata,$condition);
					self::trainee_dashboard($data);
					break;  					
				default:
					self::Login_as_register_lawyer();
					break;
			}
	}







	function is_logged_out_all()
    {
    	$userdata = array('user_id','user_name','user_email','user_type','user_logged_in');
        $this->session->unset_userdata($userdata);
        self::Login_as_register_member();
    }



/* END
 Member dashbord login logout */



    public function forget_password()
	{
		$data['title'] = "User forget password of Biladl";
		$this->load->view('website/include/header', $data);
		$this->load->view('website/forgot-password-user', $data);
		$this->load->view('website/include/footer.php', $data);
		
	}






/* START
 Passswrod recover methods of all type of user */



	public function password_mobile()
	{
		
		$this->form_validation
		->set_error_delimiters('<div class="form-error">', '</div>');
		$this->form_validation
		->set_rules('Femail', 'mobile', 'required|trim|strtolower');
		$this->session->mark_as_temp('success',0);

		if($this->form_validation->run() == false):
			$message=validation_errors();
      		$this->session->set_flashdata('success',$message,3);      		
      		self::forget_password();

		else :

		$pstal_keys=array();
			foreach ($_POST as $key => $value) {				
				$pstal_keys[$key]=$this->form_validation->set_value($key);
			}extract($pstal_keys);

		$condition= array(
        'mobile' => $Femail,
        );


      	$getData = $this->Common_model->get_one_row_data('users',$condition);
      	if(empty($getData))
      	{
      		$message="<p class='form-error'>This mobile is not register with us!</p>";
      		$this->session->set_flashdata('success',$message,3);   
      		self::forget_password();      		
      	}
      	else{

      		$OTP=rand(1000,9999);
      		//$OTP=1234;
			$edata = array(           
						'temp_pass' => $OTP
						);
			$condition= array(
						'mobile' => $Femail
						);

    		$update_data=$this->Common_model->update_to_tbl('users',$edata,$condition);

    		//$param=bin2hex($getData->id."(tapas)".$OTP);
			//$urls_link=base_url().'Login/password_reset_link/'.$param.'/';
      		//$UserDetail = (object) array('link'=>$urls_link);
      		//$data['UserDetail']=$UserDetail;

			//$contents = $this->load->view('email-temp/forget_password',$data, TRUE);


      		$Femail=$getData->mob_code.$Femail;
      		$message="Hi ".$getData->name;      		//print_r($Femail);exit;	
      		$message.=$OTP.' is your otp for biladl.com';
      		$this->session->set_tempdata('UReset_pass',$getData->id,5000);
      		SendSMS($Femail, $message);
      		//$replyTo=array('email' => 'info@biladl.com', 'name' => 'Biladl Support');
      		//$subject='Biladl.com confidential OTP';

    //   	$to=$Femail;
    //   	$this->load->model('Email_model');
  		// 	if($this->Email_model->SendEmail($to, $subject,$contents,NULL,$replyTo))
  		// 	{
				// $message="<p class='form-success'>Password reset link sent to your  email!</p><br>";
				// $this->session->set_flashdata('success',$message,3);   
  		// 	}


      		redirect('Login/password_reset', 'refresh');
      	}
      		
      	endif;


	}

	public function password_reset()
	{	
		if(!$this->session->tempdata('UReset_pass'))
		{
			redirect('Login/forget_password', 'refresh');
		}
				
		if($this->input->post())
		{
			$this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
			$this->form_validation->set_rules('Cpassword', 'confirm password', 'required|min_length[3]|matches[password]');
			$this->form_validation->set_rules('otp', 'confirm password', 'required|exact_length[4]');
			if($this->form_validation->run() == TRUE):

			$pstal_keys=array();
			foreach ($_POST as $key => $value) {				
				$pstal_keys[$key]=$this->form_validation->set_value($key);
			}	extract($pstal_keys);

			$cus_id = $this->session->tempdata('UReset_pass');	


			$condition= array(
	        'id' => $cus_id,
	        'temp_pass' => $otp,
	        );


	      	$getData = $this->Common_model->get_one_row_data('users',$condition);
	      	if(empty($getData))
	      	{
	      		$message="<p class='form-error'>Invalid OTP</p>";      		
	      		$this->session->set_flashdata('success',$message,3);
	      		redirect('Login/password_reset/', 'refresh');  		
	      	}


			$condition= array(
            'id' => $cus_id,          
            );
            $RecordData= array(
            'password' => md5($Cpassword),          
            'temp_pass' => ''          
            );
            $message="<p class='form-error'>There is some server issue please try latter!</p>";
      		$getData = $this->Common_model->update_to_tbl('users',$RecordData,$condition); 
      		if($getData)
      		{
      			$message="<span class='form-success'>password updated successfully!</span>";
      			$this->session->set_flashdata('success',$message,3);
      			self::Login_as_register_member();
      			return true;
      		}
      		else
      		{
      			$this->session->set_flashdata('success',$message,3);
      			redirect('Login/password_reset/', 'refresh');

      		}  

		    endif;

		}
			
			$data['title'] = "User forget password of biladil.com";	
			$this->load->view('website/include/header', $data);
			$this->load->view('website/reset-password-user', $data);
			$this->load->view('website/include/footer.php', $data);
	}











	public function password_email()
	{
		
		$this->form_validation
		->set_error_delimiters('<div class="form-error">', '</div>');
		$this->form_validation
		->set_rules('Femail', 'email', 'required|trim|valid_email|strtolower');
		$this->session->mark_as_temp('success',0);

		if($this->form_validation->run() == false):
			$message=validation_errors();
      		$this->session->set_flashdata('success',$message,3);      		
      		self::forget_password();
		else :

		$pstal_keys=array();
			foreach ($_POST as $key => $value) {				
				$pstal_keys[$key]=$this->form_validation->set_value($key);
			}extract($pstal_keys);

		$condition= array(
        'email' => $Femail,
        );


      	$getData = $this->Common_model->get_one_row_data('users',$condition);
      	if(empty($getData))
      	{
      		$message="<p class='form-error'>This email is not register with us!</p>";
      		$this->session->set_flashdata('success',$message,3);   
      		self::forget_password();      		
      	}
      	else{

      		$OTP=rand(1000,9999);
			$edata = array(           
						'temp_pass' => $OTP
						);
			$condition= array(
						'email' => $Femail
						);

    		$update_data=$this->Common_model->update_to_tbl('users',$edata,$condition);

    		$param=bin2hex($getData->id."(tapas)".$OTP);
			$urls_link=base_url().'Login/password_reset_link/'.$param.'/';
      		$UserDetail = (object) array('link'=>$urls_link);
      		$data['UserDetail']=$UserDetail;

			$contents = $this->load->view('email-temp/forget_password',$data, TRUE);


      		$message="Hi ".$getData->name;      			
      		$message.='This is your account login password'.$getData->password.'for biladl.com';

      		$replyTo=array('email' => 'info@biladl.com', 'name' => 'Biladl Support');
      		$subject='Biladl.com confidential OTP';
      		$to=$Femail;
      		$this->load->model('Email_model');
  			if($this->Email_model->SendEmail($to, $subject,$contents,NULL,$replyTo))
  			{
				$message="<p class='form-success'>Password reset link sent to your  email!</p><br>";
				$this->session->set_flashdata('success',$message,3);   
  			}


      	self::forget_password(); 
      	}
      		
      	endif;


	}


	public function password_reset_link()
	{
		 $params =  $this->uri->segment(3);
		 if(!isset($params))
		 {
		 	echo "sorry the link is currepted";
		 	exit();
		 }
			
		$user_thing= hex2bin(trim($params));
		$user_thing=explode('(tapas)', $user_thing);

		if(sizeof($user_thing)!=2)
		{
			exit();
		}
		$Lid=trim($user_thing[0]);
		$OTP=trim($user_thing[1]);
		$condition= array(
        'id' => $Lid,
        'temp_pass' => $OTP
        );

      	$getData = $this->Common_model->get_one_row_data('users',$condition);
      	if(empty($getData))
      	{
      		echo $message="<p class='form-error'><h2><b>Sorry,</b> The link is expired.. or</br> This is a deseart but Your looking for water!!</h2></p>";

      		exit();
      	}

      		$this->session->set_tempdata('UReset_pass',$Lid,500);
      		$data['title'] = "User forget password of biladil.com";
      		$data['params'] = $params;
			$this->load->view('website/include/header', $data);
			$this->load->view('website/reset-password-user', $data);
			$this->load->view('website/include/footer.php', $data);

	}

	public function reset_password()
	{	

		if(!$this->session->tempdata('UReset_pass'))
			{
				echo "sorry the link is expired";
		 		exit();
			}

		
		if($this->input->post())
		{
			$this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
			$this->form_validation->set_rules('Cpassword', 'confirm password', 'required|min_length[3]|matches[password]');
			$this->form_validation->set_rules('params', 'confirm password', 'required');
			if($this->form_validation->run() == TRUE):

				$pstal_keys=array();
				foreach ($_POST as $key => $value) {				
					$pstal_keys[$key]=$this->form_validation->set_value($key);
				}	extract($pstal_keys);

			$cus_id = $this->session->tempdata('UReset_pass');	
			$condition= array(
            'id' => $cus_id,          
            );
            $RecordData= array(
            'password' => md5($Cpassword),          
            'temp_pass' => ''          
            );
            $message="<p class='form-error'>There is some server issue please try latter!</p>";
      		$getData = $this->Common_model->update_to_tbl('users',$RecordData,$condition); 
      		if($getData)
      		{
      			$message="<span class='form-success'>password updated successfully!</span>";
      			$this->session->set_flashdata('success',$message,3);
      			self::Login_as_register_member();
      			return true;
      		}
      		else
      		{
      			$this->session->set_flashdata('success',$message,3);
      			redirect('Login/password_reset_link'.$params, 'refresh');

      		}

   
      		

      		else :
      		
			$data['title'] = "User forget password of biladil.com";
			$data['params'] = $params;
			$this->load->view('website/include/header', $data);
			$this->load->view('website/reset-password-user', $data);
			$this->load->view('website/include/footer.php', $data);


		endif;


		}
		else
		{
			self::Login_as_register_member();
			return true;

		}



	}

	public function user_contact_us($data=array())
	{
		if(!is_array($data)){ $data=array(); }
		 self::is_logged_in();
		 $data['title'] = "Biladl User contact Us";
		 $this->load->view('website/include/header.php', $data);
		 $this->load->view('website/include/sidebar-dashbord.php', $data);
		 $this->load->view('website/user-contact.php', $data);
		 $this->load->view('website/include/footer.php', $data);

	}

	public function user_about_us($data=array())
	{
		if(!is_array($data)){ $data=array(); }
		 self::is_logged_in();
		 $data['title'] = "about us Biladl";
		 $this->load->view('website/include/header.php', $data);
		 $this->load->view('website/include/sidebar-dashbord.php', $data);
		 $this->load->view('website/user-about.php', $data);
		 $this->load->view('website/include/footer.php', $data);

	}


	public function user_article_bookmarks($start_from=0)
	{		
	 self::is_logged_in();

	 if(!is_numeric($start_from) || !isset($start_from) || $start_from < 1)
	 {
		$start_from=0;
		}


		

		$userID="tapas123";
		if($this->session->has_userdata('user_id'))
		{
			$userID=$this->session->userdata('user_id');
		}

		 $totalDBrecords = $this->Web_modul->bookmarked_article_list('count',false,false,$userID);
		if($totalDBrecords<1)
		{
			$totalDBrecords=0;
		}
		$upto=2;
		$arrange_data=get_paging_info($totalDBrecords,$upto,$start_from);
		if(!empty($arrange_data))
		{
			$start_from=$arrange_data['si'];
		}	
		if($start_from<1){ $start_from=0; }


		$paged_articles = $this->Web_modul->bookmarked_article_list('records',$start_from,$upto,$userID);

		if(empty($paged_articles) || $arrange_data['curr_page']<1)
		{
			$arrange_data['curr_page']=1;
		}
		 $data['title'] = "Biladil - Articles";	
		 $data['paged_articles'] = $paged_articles;	

		 $data['total_pages'] = $arrange_data['pages'];

		$clsss=$this->router->fetch_class();
		$method=$this->router->fetch_method();

		$data['next_url']=base_url().$clsss."/".$method."/".($arrange_data['curr_page']+1)."/";
		$data['prev_url']=base_url().$clsss."/".$method."/".($arrange_data['curr_page']-1)."/";
		$data['uri_url']=base_url().$clsss."/".$method."/";
		$data['C_page']=$arrange_data['curr_page'];


		 $data['title'] = "Bookmarked article Biladl";
		 $this->load->view('website/include/header.php', $data);
		 $this->load->view('website/include/sidebar-dashbord.php', $data);
		 $this->load->view('website/article-bookmarks', $data);
		 $this->load->view('website/include/footer.php', $data);

	}


	public function user_news_bookmarks($start_from=0)
	{
		self::is_logged_in();

	 if(!is_numeric($start_from) || !isset($start_from) || $start_from < 1)
	 {
		$start_from=0;
		}

		$userID="tapas123";
		if($this->session->has_userdata('user_id'))
		{
			$userID=$this->session->userdata('user_id');
		}


		 $totalDBrecords = $this->Web_modul->bookmarked_news_list('count',false,false,$userID);
		if($totalDBrecords<1)
		{
			$totalDBrecords=0;
		}
		$upto=2;
		$arrange_data=get_paging_info($totalDBrecords,$upto,$start_from);
		if(!empty($arrange_data))
		{
			$start_from=$arrange_data['si'];
		}	
		if($start_from<1){ $start_from=0; }


		$paged_news = $this->Web_modul->bookmarked_news_list('records',$start_from,$upto,$userID);

		if(empty($paged_news) || $arrange_data['curr_page']<1)
		{
			$arrange_data['curr_page']=0;
		}
		 $data['title'] = "Biladil - legal news";	
		 $data['paged_news'] = $paged_news;	

		 $data['total_pages'] = $arrange_data['pages'];

		$clsss=$this->router->fetch_class();
		$method=$this->router->fetch_method();

		$data['next_url']=base_url().$clsss."/".$method."/".($arrange_data['curr_page']+1)."/";
		$data['prev_url']=base_url().$clsss."/".$method."/".($arrange_data['curr_page']-1)."/";
		$data['uri_url']=base_url().$clsss."/".$method."/";
		$data['C_page']=$arrange_data['curr_page'];

		 $data['title'] = "Bookmarked news Biladl";
		 $this->load->view('website/include/header.php', $data);
		 $this->load->view('website/include/sidebar-dashbord.php', $data);
		 $this->load->view('website/news-bookmarks', $data);
		 $this->load->view('website/include/footer.php', $data);

		 //self :: testfile222();
	}






/* END
		Bookmark article
*/


	public function AddBookmarks_article()
	{
		$response = array('status' => false,'message'=>'No data found','response'=>'');

		if(!self::is_logged_in_true())
		{
			$response = array('status' => false,'error_code'=>401,'message'=>'Plese login to the site','response'=>'');
			 exit_with_json($response);
		}
		if(!$this->input->post('artID'))
		{
			$response = array('status' => false,'error_code'=>400,'message'=>'No read-more selected','response'=>'');
			 exit_with_json($response);					
		}
		$postal_array=$this->input->post(array('artID','bookmarkType'), TRUE);
		extract($postal_array);
		$userID = $this->session->userdata('user_id');		
		 

		$condition = array('id' => $userID);
      	$getData = $this->Common_model->check_id_is_present('users',$condition);
		if(!empty($getData))
		{
			if($bookmarkType=="REMOVE")
		     {
		        $results = $this->Web_modul->remove_bookmark_article_table($artID,$userID);
		        if(!$results)
		       {
		            $response = array('status' => false, 'message' => 'Unable to Remove bookmark!', 'response' => '');
		       }
		       else
		       {
		          $response = array('status' => true,'error_code'=>201,'message' => 'Bookmark Removed', 'response' =>'');
		       }
		       exit_with_json($response);
		     }
			
			$condition = array(            
            'user_id' => $userID             
            );
			$records_in_bookmars_tbl=$this->Common_model->check_id_is_present('bookmarks',$condition);
         if(!$records_in_bookmars_tbl)
         { 
            $data = array(            
            'user_id' => $userID,
            'article_ids' => $artID  
            );

          $bookmark = $this->Common_model->inset_to_tbl('bookmarks',$data);
           $response = array('status' => true,'error_code'=>200, 'message' => 'bookmark Added', 'response' => array());
           exit_with_json($response);


         }
         else{
            $results = $this->Web_modul->update_bookmark_article_table($artID,$userID);
           if(!$results)
           {
               $response = array('status' => false, 'message' => 'Unable to bookmark!', 'response' => array());
           }
           else
           {
              $response = array('status' => true,'error_code'=>200, 'message' => 'Bookmark created', 'response' =>'');

           }
              exit_with_json($response);
         }

		}
		
		$response = array('status' => false,'error_code'=>204,'message'=>'No such record found','response'=>'');

		 exit_with_json($response);
	}


	public function AddBookmarks_news()
	{
		$response = array('status' => false,'message'=>'No data found','response'=>'');

		if(!self::is_logged_in_true())
		{
			$response = array('status' => false,'error_code'=>401,'message'=>'Plese login to the site','response'=>'');
			 exit_with_json($response);
		}
		if(!$this->input->post('newsID'))
		{
			$response = array('status' => false,'error_code'=>400,'message'=>'No read-more selected','response'=>'');
			 exit_with_json($response);					
		}
		$postal_array=$this->input->post(array('newsID','bookmarkType'), TRUE);
		extract($postal_array);
		$userID = $this->session->userdata('user_id');		
		 

		$condition = array('id' => $userID);
      	$getData = $this->Common_model->check_id_is_present('users',$condition);
		if(!empty($getData))
		{
		if($bookmarkType=="REMOVE")
		{
		$results = $this->Web_modul->remove_bookmark_news_table($newsID,$userID);
			if(!$results)
			{
			    $response = array('status' => false, 'message' => 'Unable to Remove bookmark!', 'response' => '');
			}
			else
			{
			  $response = array('status' => true,'error_code'=>201,'message' => 'Bookmark Removed', 'response' =>'');
			}
			exit_with_json($response);
		}
			
			$condition = array(            
            'user_id' => $userID             
            );
			$records_in_bookmars_tbl=$this->Common_model->check_id_is_present('bookmarks',$condition);
         if(!$records_in_bookmars_tbl)
         { 
            $data = array(            
            'user_id' => $userID,
            'news_ids' => $newsID  
            );

           $bookmark = $this->Common_model->inset_to_tbl('bookmarks',$data);
           $response = array('status' => true,'error_code'=>200, 'message' => 'bookmark Added', 'response' => array());
           exit_with_json($response);


         }
         else{
            $results = $this->Web_modul->update_bookmark_news_table($newsID,$userID);
           if(!$results)
           {
               $response = array('status' => false, 'message' => 'Unable to bookmark!', 'response' => array());
           }
           else
           {
              $response = array('status' => true,'error_code'=>200, 'message' => 'Bookmark created', 'response' =>'');

           }
              exit_with_json($response);
         }

		}
		
		$response = array('status' => false,'error_code'=>204,'message'=>'No such record found','response'=>'');

		 exit_with_json($response);
	}


	public function  SendMessage()
	{
		if(!self::is_logged_in_true())
		{
			$response = array('status' => false,'error_code'=>401,'message'=>'Plese login to the site','response'=>'');
			 exit_with_json($response);
		}

		$postal_array=$this->input->post(array('Mymsg'), TRUE);
		extract($postal_array);
		$userID = $this->session->userdata('user_id');	
		$error=0;

		
		if(!isset($Mymsg) || ($Mymsg=trim($Mymsg))==''){


			$response = array('status' => false,'error_code'=>400,'message'=>'Empty message','response'=>'');
			 exit_with_json($response);
			
		 }

		 $Reciver_ID='Admin';
         $data = array(            
            'sender_id' => $userID,
            'reciver_id' => $Reciver_ID,            
            'message' => $Mymsg,            
            'created_at' => date('Y-m-d H:i:s')            
            );
	
        $insert_chat = $this->Common_model->inset_to_tbl('chat_table',$data);
        if(!$insert_chat){
          $response = array('status' => false,'error_code'=>400,'message'=>'Unable to send message','response'=>'');
			 exit_with_json($response);	
        }
         $response = array('status' => true,'error_code'=>200,'message'=>'message sent successfully','response'=>'');
        exit_with_json($response);	

        return true;
	
	}

	public function GetFetureChat()
	{
		if(!self::is_logged_in_true())
		{
			$response = array('status' => false,'error_code'=>401,'message'=>'Plese login to the site','response'=>'');
			 exit_with_json($response);
		}

		$postal_array=$this->input->post(array('ENDChatID'), TRUE);
		extract($postal_array);
		$userID = $this->session->userdata('user_id');	

		
		if(!isset($ENDChatID)){
		$response = array('status' => false,'error_code'=>401,'message'=>'Not found','response'=>'');
			exit_with_json($response);
		 }

		 $history_convertion = $this->Web_modul->chat_Future($userID,$ENDChatID);
		if(empty($history_convertion)){
			$response = array('status' => false,'error_code'=>401,'message'=>'No feture message found','response'=>'');
			 exit_with_json($response);
			 return true;
		   }

		$response = array('status' => true,'error_code'=>200,'message'=>'message found','response'=>$history_convertion);
		 exit_with_json($response);

        	return true;
		
	}


	function GetMoreChat()
	{

		if(!self::is_logged_in_true())
		{
			$response = array('status' => false,'error_code'=>401,'message'=>'Plese login to the site','response'=>'');
			 exit_with_json($response);
		}

		$postal_array=$this->input->post(array('lastChatID'), TRUE);
		extract($postal_array);
		$userID = $this->session->userdata('user_id');

		
		if(!isset($lastChatID)){
		$response = array('status' => false,'error_code'=>401,'message'=>'Not found','response'=>'');
			exit_with_json($response);
		 }

		 $history_convertion = $this->Web_modul->chat_History($userID,$lastChatID);
		if(empty($history_convertion)){
		$response = array('status' => false,'error_code'=>401,'message'=>'No previous message found','response'=>'');
			 exit_with_json($response);
		  }

		$response = array('status' => true,'error_code'=>200,'message'=>'message found','response'=>$history_convertion);
		 exit_with_json($response);
		 exit();
	}


	public function get_city_list(){
			
			$this->form_validation->set_rules('countryID', 'country', 'required|trim');
			

			if($this->form_validation->run() == false){
				$responce = array('status' => false,'message'=>'select country');
				echo json_encode($responce);
				exit();
			}

			$countryID = $this->input->post('countryID',true);

			$condition1=array('is_deleted'=>1,'cid'=>$countryID);
			$order_by=array('name'=>'ASC');
			$Citys = $this->Common_model->get_tables_records('cities','',$condition1,$order_by);


			if(!empty($Citys))
			{
				$responce = array('status' => true,'message'=>'success','Citys'=>$Citys);
				echo json_encode($responce);
				exit();
			}
			else
			{
				$responce = array('status' => false,'message'=>'City not found','Citys'=>array());
				echo json_encode($responce);
				exit();
			}

		}














	public function is_logged_in_true()
	{
		$is_logged_in = $this->session->userdata('user_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			return false;
		}
		
		return true;
	}







/* END
Passswrod recover methods of all type of user 
*/


	public function testfile222()
	{

		// $data['title'] = "Biladil - Member login panel";
		 //$this->load->view('website/include/header.php', $data);
		 $this->load->view('website/user-suscritption.html');

		 echo 
				'<script type="text/javascript">
					var baseurl="http://localhost/tapas/dell/biladl/assets/website/";
					var replaced_with="assets/";
					window.addEventListener("load", function () {
					    let tagers = {img: "src",link:"href", script:"src"};
					    for (let [tagsName, source] of Object.entries(tagers)) {      
					        var elements = document.getElementsByTagName(tagsName);
					        for (var i = 0; i < elements.length; i++) {
					             var Athestring= elements[i].getAttribute(source);        
					           var Nthestring= Athestring.replace(replaced_with, baseurl);
					            elements[i].setAttribute(source, Nthestring);            
					        }
					    }
					})

				</script>
				';
		 //$this->load->view('website/include/footer.php', $data);
	}










	
}
?>