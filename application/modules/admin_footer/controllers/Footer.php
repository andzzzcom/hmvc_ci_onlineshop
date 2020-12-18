<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Footer extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function footer_view()
	{	
		$data = $this->settings_admin();
		$this->load->view("Footer_v", $data);
	}
	
	public function footer_login_view()
	{	
		$list_general_settings = $this->Helper_m->get_settings_general();
		$data["titleweb"] = $list_general_settings[0]->title_web;
		$data["titleadminpanel"] = $list_general_settings[0]->title_admin_panel;
		$data["titleadminpanelminimize"] = $list_general_settings[0]->title_admin_panel_minimize;
		$data["favicon"] = $list_general_settings[0]->fav_icon;
		
		$data["url"] = base_url()."assets_admin/";
		$this->load->view("Login_footer_v", $data);
	}
}
