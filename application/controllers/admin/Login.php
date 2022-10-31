<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function index()
	{
		//echo CI_VERSION;
		$is_logged_in = $this->session->userdata('is_logged_in');		
		if(isset($is_logged_in) || $is_logged_in == true)
		{
			redirect('admin/home/index', 'refresh');
		}
		$data['title'] = "Biladl Panel";
		$this->load->model('admin/loginmodel');
		$this->load->view('admin/includes/headerlogin', $data);
		$this->load->view('admin/loginview', $data);
		$this->load->view('admin/includes/footerlogin', $data);
	}
	
	public function checklogin()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|callback_verifyuser');
		
		if($this->form_validation->run() == false){
			$data['title'] = "Biladl Panel";
			$this->load->view('admin/includes/headerlogin', $data);
			$this->load->view('admin/loginview', $data);
			$this->load->view('admin/includes/footerlogin', $data);
		}else{
			redirect('admin/home/index');
		}
	}
	
	public function verifyuser()
	{
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$this->load->model('admin/loginmodel');
		
		if($this->loginmodel->login($username, $password)){
			$this->session->set_userdata(array(
                            'username'       => $username,
                            'is_logged_in' => TRUE
                    ));
			return true;
		}else{
			$this->form_validation->set_message('verifyuser', 'Username or Password is Incorrect. Please try again');
			return false;
		}
	}
}
?>