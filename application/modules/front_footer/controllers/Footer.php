<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Footer extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function footer_view()
	{	
		$data = $this->settings();
		$this->load->view("Footer_v", $data);
	}
}
