<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
			
	function __construct()
	{
		parent::__construct();
		// $this->is_logged_in();
		$this->load->model('homemodel');
		date_default_timezone_set("Asia/Kolkata");
		$this->load->library('Ajax_pagination');
	}
	
	public function index()
	{
		$data['title'] = "Bilal";		
		$this->load->view('website/includes/header', $data);
		$this->load->view('website/index', $data);
		$this->load->view('website/includes/footer', $data);
	}

	public function Login()
	{
		$data['title'] = "Cook Fresh";		
		$this->load->view('website/includes/header', $data);
		$this->load->view('website/login', $data);
		$this->load->view('website/includes/footer', $data);
	}

	public function InsertSignup()
	{
		$data['title'] = "Biladil";
		$data = $this->input->post();
		$data['Password'] = md5($this->input->post('Password'));
		$query = $this->homemodel->InsertSignup($data);

		if($query == true)
		{
			$this->session->set_flashdata('success', 'Registration Successfull.');
			redirect('home/login', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('failure', 'Registration Failed.');
			redirect('home/login', 'refresh');
		}
	}

	public function checkLogin()
	{
		$this->form_validation->set_rules('EmailID', 'Email Id', 'required');
		$this->form_validation->set_rules('Password', 'Password', 'required|callback_verifyuser');
		
		if($this->form_validation->run() == false){
			$data['title'] = "Cook Fresh";
			$this->load->view('website/includes/header');
			$this->load->view('website/login', $data);
			$this->load->view('website/includes/footer');
		}else{
			redirect('home/index');
		}
	}

	public function verifyuser()
	{
		$EmailID = $this->security->xss_clean($this->input->post('EmailID'));
		$Password = $this->security->xss_clean($this->input->post('Password'));
		
		//var_dump($result);exit;
		if($row = $this->homemodel->login($EmailID, $Password)){
        $this->session->set_userdata(array(
                           'EmailID'       => $EmailID,
                          // 'Name'       => $row->Name,
                           'UserID'       => $row->UserID,
                           'user_logged_in' => TRUE
                   ));
         return true;
         }
         else
         {
			$this->form_validation->set_message('verifyuser', 'Email Id or Password is Incorrect. Please try again.');
			return false;
		}
	}

	public function CheckEmailID()
		{
			$data['title'] = "Cook Fresh";
			$EmailID = $this->input->post('EmailID');
			$this->db->where('EmailID', $EmailID);
			$query = $this->db->get('users');
			if($query->num_rows() > 0)
			{
			echo 1;
			}
			else
			{
			echo 0;
			}
			}



	public function About()
	{
		$data['title'] = "Cook Fresh";		
		$this->load->view('website/includes/header', $data);
		$this->load->view('website/about', $data);
		$this->load->view('website/includes/footer', $data);
	}

	public function Contact()
	{
		$data['title'] = "Cook Fresh";		
		$this->load->view('website/includes/header', $data);
		$this->load->view('website/contact', $data);
		$this->load->view('website/includes/footer', $data);
	}

	public function VideonRecipes()
	{
		$data['title'] = "Cook Fresh";
		if($query = $this->homemodel->VideonRecipes())
		{
			$data['video_recipes'] = $query;
		}
		$this->load->view('website/includes/header', $data);
		$this->load->view('website/videos_recipes', $data);
		$this->load->view('website/includes/footer', $data);
	}

	public function Butchery()
	{
		$data['title'] = "Cook Fresh";
		if($query = $this->homemodel->Butchery())
		{
			$data['butchery'] = $query;
		}	
		$this->load->view('website/includes/header', $data);
		$this->load->view('website/butchery', $data);
		$this->load->view('website/includes/footer', $data);
	}

	public function HeatnEat()
	{
		$data['title'] = "Cook Fresh";
		if($query = $this->homemodel->HeatnEat())
		{
			$data['heatneat'] = $query;
		}		
		$this->load->view('website/includes/header', $data);
		$this->load->view('website/heatneat', $data);
		$this->load->view('website/includes/footer', $data);
	}

	public function JustBraai()
	{
		$data['title'] = "Cook Fresh";	
		if($query = $this->homemodel->JustBraai())
		{
			$data['justbraai'] = $query;
		}		
		$this->load->view('website/includes/header', $data);
		$this->load->view('website/just_braai', $data);
		$this->load->view('website/includes/footer', $data);
	}

	public function QuicknEasy()
	{
		$data['title'] = "Cook Fresh";
		if($query = $this->homemodel->QuicknEasy())
		{
			$data['quickneasy'] = $query;
		}	
		$this->load->view('website/includes/header', $data);
		$this->load->view('website/quickneasy', $data);
		$this->load->view('website/includes/footer', $data);
	}

	public function Spices()
	{
		$data['title'] = "Cook Fresh";
		if($query = $this->homemodel->Spices())
		{
			$data['spices'] = $query;
		}		
		$this->load->view('website/includes/header', $data);
		$this->load->view('website/spices', $data);
		$this->load->view('website/includes/footer', $data);
	}

	public function ViewMenu()
	{
		$data['title'] = "Cook Fresh";
		if($query = $this->homemodel->ViewMenu())
		{
			$data['view_menu'] = $query;
		}		
		$this->load->view('website/includes/header', $data);
		$this->load->view('website/food_details', $data);
		$this->load->view('website/includes/footer', $data);
	}
	
}
?>