<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

/**
 * Description of my_controller
 *
 * @author http://roytuts.com
 */
class MY_Controller extends MX_Controller {

    function __construct() {
        parent::__construct();
        if (version_compare(CI_VERSION, '2.1.0', '<')) {
            $this->load->library('security');
        }
		date_default_timezone_set("Asia/Bangkok");
		
		$this->load->library(array('form_validation', 'cart'));
		$this->load->helper(array('url', 'form'));
	 
		$this->load->model('Helper_u_m');	
		$this->load->model('Helper_m');		
		$this->load->model('admin_inbox/Inbox_m');		
		$this->load->model('admin_order/Order_m');		
    }

	public function settings()
	{
		$data = $this->get_theme();
		
		$list_general_settings = $this->Helper_u_m->get_settings_general();
		$data["titleweb"] = $list_general_settings[0]->title_web;
		$data["subtitleweb"] = $list_general_settings[0]->subtitle_web;
		$data["titleadminpanel"] = $list_general_settings[0]->title_admin_panel;
		$data["titleadminpanelminimize"] = $list_general_settings[0]->title_admin_panel_minimize;
		$data["favicon"] = $list_general_settings[0]->fav_icon;
		$data["logo_web"] = $list_general_settings[0]->logo_web;
		
		$data["url_fb"] = $list_general_settings[0]->url_facebook;
		$data["url_twitter"] = $list_general_settings[0]->url_twitter;
		$data["url_instagram"] = $list_general_settings[0]->url_instagram;
	
		$data["meta_title"] = $list_general_settings[0]->meta_title;
		$data["meta_description"] = $list_general_settings[0]->meta_description;
		
		$list_all_category = $this->Helper_u_m->get_all_category();
		$data["list_all_category"] = $list_all_category;
		
		$list_all_brand = $this->Helper_u_m->get_all_brand();
		$data["list_all_brand"] = $list_all_brand;
		
		$list_produk = $this->Helper_u_m->get_all_produk();
		$data["list_produk"] = $list_produk;
		
		return $data;
	}
	
	public function get_theme()
	{
		$theme = "theme1";
		$data["theme"] = $theme;
		$data["url"] = base_url()."assets/";
		$data["url_theme"] = base_url()."assets/".$theme."/";;
		
		return $data;
	}
	
	public function settings_admin()
	{
		$email = $this->session->userdata("admin_email");
		if($email == null)
		{
			$this->session->set_userdata("message", "Please Login First !");
			redirect('admin/login');
		}
		
		$data = $this->get_theme_admin();
		
		$list_general_settings = $this->Helper_m->get_settings_general();
		$data["titleweb"] = $list_general_settings[0]->title_web;
		$data["titleadminpanel"] = $list_general_settings[0]->title_admin_panel;
		$data["titleadminpanelminimize"] = $list_general_settings[0]->title_admin_panel_minimize;
		$data["favicon"] = $list_general_settings[0]->fav_icon;
		
		$data["meta_title"] = $list_general_settings[0]->meta_title;
		$data["meta_description"] = $list_general_settings[0]->meta_description;
		
		$list_inbox = $this->Inbox_m->get_all_inbox();
		$data["list_inbox"] = $list_inbox;
		
		$list_order= $this->Order_m->get_all_transaction();
		$data["list_order"] = $list_order;
		
		$data["admin_email"] = $this->session->userdata("admin_email");
		$data["id_admin"] = $this->session->userdata("id_admin");
		$data["reg_date_admin"] = $this->session->userdata("reg_date_admin");
		$data["namaadmin"] = $this->session->userdata("nama_admin");
		$data["roleadmin"] = $this->session->userdata("role_admin");
		$data["fotoadmin"] = $this->session->userdata("foto_admin");
		
		$mod_product = $this->loaded_module_admin(15);
		$data["total_product"] = $mod_product->get_statistic()["nproduct"];
		$data["total_recommended_product"] = $mod_product->get_statistic()["nrecommendedproduct"];
		
		$mod_order = $this->loaded_module_admin(2);
		$data["norder"] = $mod_order->get_statistic()["norder"];
		
		return $data;
	}
	
	public function get_theme_admin()
	{
		$theme = "theme1";
		$data["theme"] = $theme;
		$data["url_theme"] = base_url()."assets/".$theme."/";
		$data["url_admin"] = base_url()."assets_admin/";
		$data["url_theme_admin"] = base_url()."assets_admin/".$theme."/";
		
		return $data;
	}
	
	public function get_upload_settings($menu_name)
	{
		$upload_settings = $this->Helper_u_m->get_settings_upload_by_menu($menu_name);	
		return $upload_settings;
	}
	
	//load module
	public function modul($folder, $name)
	{
		$module = modules::load($folder.'/'.$name);
		return $module;
	}
	
	//loaded module
	public function loaded_module($int)
	{
		$data = array(
						//module 0
						"folder0"=>"front_header",
						"name0"=>"Header",
						
						//module 1
						"folder1"=>"front_footer",
						"name1"=>"Footer",
						
						//module 2
						"folder2"=>"front_product",
						"name2"=>"Product",
						
						//module 3
						"folder3"=>"front_home",
						"name3"=>"Home",
						
						//module 4
						"folder4"=>"front_search",
						"name4"=>"Search",
						
						//module 5
						"folder5"=>"front_browse",
						"name5"=>"Browse",
						
						//module 6
						"folder6"=>"front_voucher",
						"name6"=>"Voucher",
						
						//module 7
						"folder7"=>"front_product",
						"name7"=>"Product",
						
						//module 8
						"folder8"=>"front_cart",
						"name8"=>"Cart",
						
						//module 9
						"folder9"=>"front_ongkir",
						"name9"=>"Ongkir",
						
						//module 10
						"folder10"=>"front_order",
						"name10"=>"Order",
						
						//module 11
						"folder11"=>"front_order",
						"name11"=>"Checkout",
						
						//module 12
						"folder12"=>"front_order",
						"name12"=>"Confirmation",
						
						//module 13
						"folder13"=>"front_order",
						"name13"=>"Finish",
						
						//module 14
						"folder14"=>"front_order",
						"name14"=>"Payment",
						
					);
					
		$module = $this->modul($data["folder".$int], $data["name".$int]);	
		return $module;
	}
	
	//loaded module admin
	public function loaded_module_admin($int)
	{
		$data = array(
						//module 0
						"folder0"=>"admin_header",
						"name0"=>"Header",
						
						//module 1
						"folder1"=>"admin_footer",
						"name1"=>"Footer",
						
						//module 2
						"folder2"=>"admin_order",
						"name2"=>"Order",
						
						//module 3
						"folder3"=>"admin_user",
						"name3"=>"User",
						
						//module 4
						"folder4"=>"admin_product",
						"name4"=>"Product",
						
						//module 5
						"folder5"=>"admin_category",
						"name5"=>"Category",
						
						//module 6
						"folder6"=>"admin_admin",
						"name6"=>"Admin",
						
						//module 7
						"folder7"=>"admin_banner",
						"name7"=>"Banner",
						
						//module 8
						"folder8"=>"admin_brand",
						"name8"=>"Brand",
						
						//module 9
						"folder9"=>"admin_confirmation",
						"name9"=>"Confirmation",
						
						//module 10
						"folder10"=>"admin_email",
						"name10"=>"Email",
						
						//module 11
						"folder11"=>"admin_home",
						"name11"=>"Home",
						
						//module 12
						"folder12"=>"admin_inbox",
						"name12"=>"Inbox",
						
						//module 13
						"folder13"=>"admin_mailbox",
						"name13"=>"Mailbox",
						
						//module 14
						"folder14"=>"admin_page",
						"name14"=>"Page",
						
						//module 15
						"folder15"=>"admin_product",
						"name15"=>"Product",
						
						//module 16
						"folder16"=>"admin_report",
						"name16"=>"Report",
						
						//module 17
						"folder17"=>"admin_review",
						"name17"=>"review",
						
						//module 18
						"folder18"=>"admin_setting",
						"name18"=>"Settings",
						
						//module 19
						"folder19"=>"admin_slider",
						"name19"=>"Slider",
						
						//module 20
						"folder20"=>"admin_voucher",
						"name20"=>"Voucher",
						
					);
					
		$module = $this->modul($data["folder".$int], $data["name".$int]);	
		return $module;
	}
	
	//loaded module user
	public function loaded_module_user($int)
	{
		$data = array(
						//module 0
						"folder0"=>"user_sidebar",
						"name0"=>"Sidebar",
						
						//module 1
						"folder1"=>"user_mailbox",
						"name1"=>"Mailbox",
						
						//module 2
						"folder2"=>"user_order",
						"name2"=>"Order",
						
						//module 3
						"folder3"=>"user_profile",
						"name3"=>"Profile",
						
						//module 4
						"folder4"=>"user_profile",
						"name4"=>"Account",
						
						//module 5
						"folder5"=>"user_security",
						"name5"=>"Security",
						
						//module 6
						"folder6"=>"user_shipping",
						"name6"=>"Shipping",
						
						//module 7
						"folder7"=>"user_wishlist",
						"name7"=>"Wishlist",
					);
					
		$module = $this->modul($data["folder".$int], $data["name".$int]);	
		return $module;
	}
	
	public function pagination_settings($datas)
	{
		$total_data_order = $datas["total_data_order"];
		$base_url = $datas["base_url"];
		$per_page = $datas["per_page"];
		$uri_segment = $datas["uri_segment"];
		
		$this->load->helper("url");
		$this->load->library("pagination");
		
		$config["base_url"] = $base_url;
		$config["total_rows"] = $total_data_order;
		$config["per_page"] = $per_page;
		$config["uri_segment"] = $uri_segment;

		$config['full_tag_open'] = '<ul>';        
		$config['full_tag_close'] = '</ul>';        
		$config['first_link'] = 'First';        
		$config['last_link'] = 'Last';        
		$config['first_tag_open'] = '<li>';        
		$config['first_tag_close'] = '</li>';        
		$config['prev_link'] = '&laquo';        
		$config['prev_tag_open'] = '<li>';        
		$config['prev_tag_close'] = '</li>';        
		$config['next_link'] = '&raquo';        
		$config['next_tag_open'] = '<li>';        
		$config['next_tag_close'] = '</li>';        
		$config['last_tag_open'] = '<li>';        
		$config['last_tag_close'] = '</li>';        
		$config['cur_tag_open'] = '<li><a class="active" href="#">';        
		$config['cur_tag_close'] = '</a></li>';        
		$config['num_tag_open'] = '<li>';        
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		return $config;
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
