<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
			
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('admin/loginmodel');
		date_default_timezone_set("Asia/Kolkata");
	}
	
	public function index()
	{
		$data['title'] = "Biladl Panel";
		
		  $data['usersCount'] = $this->loginmodel->getUsersCount();
		  $data['expertsCount'] = $this->loginmodel->getExpertsCount();
		  $data['suggestionCount'] = $this->loginmodel->getSuggestionCount();
		  $data['getmemberCount'] = $this->loginmodel->getmemberCount();
		//  $data['ShareCount'] = $this->loginmodel->ShareCount();

		// $data['usersCount'] =0;
		 $data['PostCount'] = 0;
		 $data['LeadsCount'] =0;
		 $data['ShareCount'] = 0;
		
		$this->load->view('admin/includes/header', $data);
		$this->load->view('admin/homeview', $data);
		$this->load->view('admin/includes/footer', $data);
	}
	
	public function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');		
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect('admin/login', 'refresh');
		}
	}
	
	function is_logged_out()
    {
        $this->session->unset_userdata('is_logged_in');
        redirect('admin/login', 'refresh');
    }
	
}
?>