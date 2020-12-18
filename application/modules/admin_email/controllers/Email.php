<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Email_m');		
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_email = $this->Email_m->get_all_email();
		$data["list_all_email"] = $list_all_email;
		
		$header->header_view();
		$this->load->view('List_email_v', $data);
		$footer->footer_view();
	}
	
	public function detail_email($id_email)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_email = $this->Email_m->get_email_by_id($id_email);
		if($data_email == null)
			redirect("not_found");
		
		$data["data_email"] = $data_email;
		
		$header->header_view();
		$this->load->view('Detail_email_v', $data);
		$footer->footer_view();
	}
	
}
