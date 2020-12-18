<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_setting/Payment_m');
	}

	public function payment()
	{
		//load header and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		
		$data = $this->settings();
				
		$id_user = $this->session->userdata("id_user");
		
		$data_checkout = $this->session->userdata("data_checkout");
		if($data_checkout == null)
		{
			$link = base_url();
			redirect($link);
		}
		
		$list_payment = $this->Payment_m->get_active_payment();
		$data["list_payment"] = $list_payment;
		
		$header->header_view();
		$this->load->view('Payment_v', $data);
		$footer->footer_view();
	}
	
	public function set_payment()
	{
		$id_payment = $this->input->post("id_payment");
		$this->session->set_userdata("id_payment", $id_payment);
	}
}
