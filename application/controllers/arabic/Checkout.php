<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Checkout extends CI_Controller {
			
	function __construct()
	{
		parent::__construct();
		// $this->is_logged_in();
		//$this->load->model('homemodel');
		//error_reporting(0);
		$this->load->model('Common_model');
		$this->load->model('Web_modul_arbic');
		date_default_timezone_set("Asia/Kolkata");
		$this->load->library('Ajax_pagination');
		if(!$this->session->has_userdata('user_id')){
			redirect('login','refresh');	
		}
	}	

	public function index()
	{
		 $data['title'] = "Biladl - Checkout";
		 if(!$this->input->get('id'))
		{
			redirect(base_url(),'refresh');
		}
		$packageID= $this->input->get('id');
		$condition = array(
		'id' => $packageID,
		'status' => 1                        
		);
		$package_details=$this->Common_model->get_one_row_data('packages', $condition);
		
		if(empty($package_details))
		{
		   die("packages Not found");
		}
		$data['package_details'] = $package_details;
		$this->session->set_userdata('packageID', $packageID);
		
		 $this->load->view('website/arabic/include/header.php', $data);
		 $this->load->view('website/arabic/checkout.php', $data);
		 $this->load->view('website/arabic/include/footer.php', $data);
	}
	
	public function submit()
	{
		 $payment = $this->security->xss_clean($this->input->post('payment'));
		 $this->session->set_userdata('paymentMethod', $payment);
		 if($payment=='Sadad'){
			 redirect('pages/arabic/get_hyperPay/','refresh');
		 }else{
			redirect('pages/arabic/get_hyperPay/','refresh'); 
		 }
	}
}
?>