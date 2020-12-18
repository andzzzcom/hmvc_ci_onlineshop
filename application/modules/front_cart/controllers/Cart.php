<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("cart");
		$this->load->model('Cart_u_m');
		$this->load->model('admin_user/User_m');
		$this->load->model('admin_bank/Bank_m');
		$this->load->model('Profile_u_m');
		$this->load->model('front_voucher/Voucher_u_m');
	}

	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		
		$data = $this->settings();
		
		$content = $this->get_data_cart();
		$data["content"] = $content;
		
		$cart = $this->cart->contents();	
		if($cart == null)
		{
			$link = base_url();
			redirect($link);
		}
		$data["cart"] = $cart;
			
		$header->header_view();
		$this->load->view('Cart_v', $data);
		$footer->footer_view();
	}
	
	public function add_data_cart()
	{
		$id = $_POST["id_produk"];
		$name = $_POST["name"];
		$price = $_POST["price"];
		$count = $_POST["count"];
	 
		$data = array(
				'id' => $id,
				'name' => $name,
				'qty' => $count,
				'price' => $price
			  );
			  
		$this->cart->insert($data);
		
		$emailnya = $this->session->userdata("email_user");
		
		//sudah login
		if($emailnya != "")
		{
			$iduser = $this->session->userdata("id_user");
			
			$data_cart = array(
						"id_user" => $iduser,
						'id_produk'=> $id, 
						'count'=> $count
					);
			$this->Cart_u_m->insert_cart($data_cart);
		}
	}
	
	public function update_data_cart()
	{
		$id = $_POST["id"];
		$jumlah = $_POST["jumlah"];
	   
		$cart = $this->cart->contents();
	
		$total=0;
		foreach($cart as $items)
		{
			if($id == $items["id"])
			{
				$data = array(
					'rowid' => $items["rowid"],
					'qty' => $jumlah,
					'name' => $items["name"]
				);
				$this->cart->update($data);
			}
		}
		
		$emailnya = $this->session->userdata("email_user");
		
		//sudah login
		if($emailnya != "" )
		{
			$id_user = $this->session->userdata("id_user");
			$data_db = array(
							"id_user"=>$id_user,
							"id_produk"=>$id,
							"count"=>$jumlah,
						);
					
			$data_db_cond = array(
								"id_user"=>$id_user,
								"id_produk"=>$id,
							);
			$this->Cart_u_m->update_cart($data_db, $data_db_cond);
		}
	}
	
	public function delete_data_cart()
	{
		$this->load->library("cart");
		
		$idproduk = $_POST["idproduk"];
		
		$cart = $this->cart->contents();
		foreach($cart as $items)
		{
			if($idproduk == $items["id"])
			{
				$data = array(
							'rowid' => $items["rowid"],
							'qty' => 0,
						);
				$this->cart->update($data);
			}
		}
		
		$email_user = $this->session->userdata("email_user");
		$id_user = $this->session->userdata("id_user");
		
		//sudah login customer
		if($email_user != "" )
		{
			$datanya = array(
						"id_produk" => $idproduk,
						"id_user" => $id_user,
					);
			$this->Cart_u_m->deletecartnya($datanya);
		}
	}
	
	public function get_data_cart()
	{
		$content = array();
		$email = $this->session->userdata("email_user");
		$id_user = $this->session->userdata("id_user");
		
		//sudah login customer
		if($email !== null )
		{
			if(!empty($this->session->userdata("vouchercode")))
				$this->session->unset_userdata('vouchercode');
			if(!empty($this->session->userdata("vouchervalue")))
				$this->session->unset_userdata('vouchervalue');
			
			$this->cart->destroy();
			$resultnya = $this->Cart_u_m->select_cart($id_user);
		  
			foreach($resultnya as $result)
			{
				$datas = array(
							'id' => $result->id_produk,
							'name' => $this->Cart_u_m->select_content($result->id_produk)[0]->nama_produk,
							'qty' => $result->count,
							'price' => $this->Cart_u_m->select_content($result->id_produk)[0]->harga_produk
						);
				$this->cart->insert($datas);
			}
			
			$cart = $this->cart->contents();		
			foreach($cart as $items)
			{
				array_push($content, $this->Cart_u_m->select_content($items["id"]));
			}
		}else
		{
			$cart = $this->cart->contents();			
			foreach($cart as $items)
			{
				array_push($content, $this->Cart_u_m->select_content($items["id"]));
			}			
		}
		return $content;
	}
}
