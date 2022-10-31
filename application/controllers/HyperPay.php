<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class HyperPay extends CI_Controller {
			
	function __construct()
	{
		parent::__construct();
		// $this->is_logged_in();
		//$this->load->model('homemodel');
		$this->load->model('Common_model');
		//$this->load->model('Web_modul');
		date_default_timezone_set("Asia/Kolkata");
		$this->load->library('Ajax_pagination');
	}
	





	
}
?>