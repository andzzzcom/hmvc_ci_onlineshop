<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Wishlist_u_m');
	}
	
	public function index()
	{	
		//load header, sidebar and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		$sidebar = $this->loaded_module_user(0);
		
		$data = $this->settings();
		
		$this->load->helper("url");
		$this->load->library("pagination");
		
		$id_user = $this->session->userdata("id_user");
		if(!isset($id_user))
			redirect("login");
		
		$data_user = $this->Wishlist_u_m->get_user_by_id($id_user);
		$data["data_user"] = $data_user;
		
		$total_data_wishlist = $this->Wishlist_u_m->get_n_wishlist_by_idcustomer($id_user);
		$data["total_data_wishlist"] = $total_data_wishlist;
		
		$per_page = 5;
		$url_segment = 3;
		$datas = array(
					"total_data_order"=>$total_data_wishlist,
					"base_url"=>base_url()."Profile/wishlist",
					"per_page"=>$per_page,
					"uri_segment"=>$url_segment,
				);
		$config = $this->pagination_settings($datas);
		$page = ($this->uri->segment($url_segment)) ? $this->uri->segment($url_segment) : 0;
		$data['pagination'] = $this->pagination->create_links();
		
		
		$data_wishlist = $this->Wishlist_u_m->get_wishlist_by_idcustomer($id_user, $config["per_page"], $page);
		$data["data_wishlist"] = $data_wishlist;
		
			
		$arrayproduk = array();
		foreach($data_wishlist as $data_wishlist)
		{
			array_push($arrayproduk, $data_wishlist->id_produk);
		}
		$data["data_produk_wishlist"] = $arrayproduk;
		
		$header->header_view();
		$sidebar->sidebar_left_view('wishlist');
		$this->load->view('Wishlist_v', $data);
		$sidebar->sidebar_right_view();
		$footer->footer_view();
	}
	
	public function update_wishlist() 
	{
		$id_customer = $this->input->post("idcustomer");
		$id_produk = $this->input->post("idproduk");
		
		$data = array(
					"id_customer" => $id_customer,
					"id_produk" => $id_produk,
				);
		
		if($this->Wishlist_u_m->get_wishlist_by_data_complete($data) == null)
		{
			$this->Wishlist_u_m->insert_data_wishlist($data);
			
			echo "true";
		}else
		{
			$this->Wishlist_u_m->delete_data_wishlist($data);
			
			echo "false";
		}
	}
}
