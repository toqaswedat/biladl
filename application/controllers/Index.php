<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Index extends CI_Controller {
			
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
		$data['title'] = "Biladil - Legal App Website";
		$start_from=0;
		$upto=10;
		$userID="tapas123";
		if($this->session->has_userdata('user_id'))
		{
			$userID=$this->session->userdata('user_id');
		}
		$condition2= array('status' => 1);
		$order_by= array('price' => 'ASC');
		$all_packages = $this->Common_model->get_tables_records('packages','',$condition2,$order_by);
		$data['all_packages'] = $all_packages;
		$data['paged_articles'] = $this->Web_modul->article_list('records',$start_from,$upto,$userID);
		$data['paged_news'] = $this->Web_modul->news_list('records',$start_from,$upto,$userID);
		$data['currnt_package'] = $this->Web_modul->user_currnt_running_package($userID);
		//print_r($data['currnt_package']);
		$this->load->view('website/index', $data);
	}
	
	public function Login_as_register_member()
	{
		$data['title'] = "Biladil - Legal App Website";
		$this->load->view('website/login_member.php', $data);
	}
	
	public function ContactUs()
	{
		$name = $this->input->post('name');
		$surname = $this->input->post('surname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$message = $this->input->post('message');
         $this->form_validation->set_rules('name', 'First Name', 'trim|required|min_length[1]|max_length[30]');
         $this->form_validation->set_rules('surname', 'Surname', 'trim|max_length[30]');
         $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
         $this->form_validation->set_rules('phone', 'phone', 'required|max_length[10] |min_length[10]|regex_match[/^[0-9]{10}$/]');
         $this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[1]|max_length[30]');
		if($this->form_validation->run() == false){			
			$this->index();
		
		}else{

			$data = array(				                     
				'fname' => $name,				
				'surname' => $surname,
				'email' => $email,
				'mobile' => $phone,
				'message' => $message,                     
				'created_at' => date('Y-m-d H:i:s')
				);
			$this->load->model('Common_model');
			if($this->Common_model->Contact_us($data))
			{
				$success="Enquiry Updated";
			}
			else
			{
				$success="Sorry We Unable to recive your message now";
			}

			$this->session->set_flashdata('success',$success);
        	redirect('Index', 'refresh');



		}
}




	
}
?>