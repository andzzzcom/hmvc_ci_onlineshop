<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function header_view()
	{	
		$data = $this->settings_admin();
		
		$this->load->view("Header_settings_v", $data);
		$this->load->view("Header_v", $data);
		$this->load->view("Sidebar_v", $data);
		$this->load->view("Other_v", $data);
	}
	
	public function header_login_view()
	{	
		$list_general_settings = $this->Helper_m->get_settings_general();
		$data["titleweb"] = $list_general_settings[0]->title_web;
		$data["titleadminpanel"] = $list_general_settings[0]->title_admin_panel;
		$data["titleadminpanelminimize"] = $list_general_settings[0]->title_admin_panel_minimize;
		$data["favicon"] = $list_general_settings[0]->fav_icon;
		$data["url_theme_admin"] = $this->get_theme_admin()["url_theme_admin"];
		
		$this->load->view("Login_header_v", $data);
	}
}
