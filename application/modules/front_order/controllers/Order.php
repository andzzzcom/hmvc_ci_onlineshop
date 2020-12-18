<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("cart");
		$this->load->model('front_cart/Cart_u_m');
		$this->load->model('admin_user/User_m');
		$this->load->model('admin_bank/Bank_m');
		$this->load->model('Profile_u_m');
	}

	//step1
	public function checkout()
	{
		$mod = $this->loaded_module(11);
		$mod->checkout();
	}
	
	//step2
	public function payment()
	{
		$mod = $this->loaded_module(14);
		$mod->choose_payment();
	}
	
	//step3
	public function confirmation()
	{
		$mod = $this->loaded_module(12);
		$mod->confirmation();
	}
	
	//step4
	public function finish()
	{
		$mod = $this->loaded_module(13);
		$mod->finish();
	}
}
