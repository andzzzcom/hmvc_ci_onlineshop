<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidebar extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function sidebar_left_view($current)
	{	
		$data = $this->settings();
		$data["current"] = $current;
		$this->load->view("Sidebar_left_v", $data);
	}
	
	public function sidebar_right_view()
	{	
		$data = $this->settings();
		$this->load->view("Sidebar_right_v", $data);
	}
}
