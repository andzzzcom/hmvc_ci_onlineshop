<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function header_view()
	{	
		$data = $this->settings();
		
		$category = $this->loaded_module_admin(5)->get_all_category();
		$data["category"] = $category;
		
		$total=0;
		$cart = $this->cart->contents();
		foreach($cart as $c)
		{
			$total += $c["subtotal"];
		}
		if($total=="")
			$total=0;
		
		$total = "".number_format($total);
		$total = str_replace(",", ".",$total);
		$data["total"] = $total;	
		
		$total_item = count($cart);
		$data["total_item"] = $total_item;	
		
		$data["cart"] = $cart;	
		$data["content"] = $this->get_cart_header();
		$this->load->view("Header_v", $data);
	}
	
	public function get_cart_header()
	{
		$cart_mod = $this->loaded_module(8);
		$content = $cart_mod->get_data_cart();
		return $content;
	}
}
