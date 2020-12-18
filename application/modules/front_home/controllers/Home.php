<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Home_u_m");
		$this->load->model("front_cart/Cart_u_m");
	}

	public function home()
	{
		//load header and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		
		$data = $this->settings();
		
		$product = $this->loaded_module(7);
		$data["product_special"] = $product->special_product_list(8);
		$data["latest_product"] = $product->latest_product_list(6);
		$data["latest_product2"] = $product->latest_product_list(6);
		$data["latest_product3"] = $product->latest_product_list(6);
		
		$banner = $this->loaded_module_admin(7)->get_active_banner();
		$data["banner"] = $banner;
		
		$header->header_view();
		$this->load->view("Home_v", $data);
		$footer->footer_view();
	}
	
	public function not_found()
	{
		//load header and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		
		$data = $this->settings();
		
		$header->header_view();
		$this->load->view("Not_found_v", $data);
		$footer->footer_view();
	}
	
	public function add_wishlist() 
	{
		$id_customer = $this->input->post("idcustomer");
		$id_produk = $this->input->post("idproduk");
		
		$data = array(
					"id_customer" => $id_customer,
					"id_produk" => $id_produk,
				);
		
		if($this->Home_u_m->get_wishlist_by_data($data) == null)
		{
			$this->Home_u_m->insert_data_wishlist($data);
			
			echo "true";
		}else
		{
			$this->Home_u_m->delete_data_wishlist($data);
			
			echo "false";
		}
	}

}
