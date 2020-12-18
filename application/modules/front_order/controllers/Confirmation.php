<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmation extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("cart");
		$this->load->model('front_cart/Cart_u_m');
		$this->load->model('admin_user/User_m');
		$this->load->model('admin_bank/Bank_m');
		$this->load->model('Profile_u_m');
	}

	public function confirmation()
	{
		$voucher_mod = $this->loaded_module(6);
		
		$emailnya = $this->session->userdata("email_user");
		if($emailnya == null)
		{
			$link = base_url()."login_checkout";
			redirect($link);

		//sudah login customer
		}else
		{
			//load header and footer module
			$header = $this->loaded_module(0);
			$footer = $this->loaded_module(1);
			
			$data = $this->settings();
					
			$id_user = $this->session->userdata("id_user");
			
			$data_checkout = $this->session->userdata("data_checkout");
			if($data_checkout == null)
			{
				$link = base_url();
				redirect($link);
			}
			
			$nama = $data_checkout["nama"];
			$email = $data_checkout["email"];
			$phone = $data_checkout["phone"];
			$alamat = $data_checkout["alamat"];
			$provinsi = $data_checkout["provinsi"];
			$kota = $data_checkout["kota"];
			$kecamatan = $data_checkout["kecamatan"];
			$kodepos = $data_checkout["kodepos"];
			$ongkir = $data_checkout["ongkir"];
			$berat = $data_checkout["berat"];
			$kurir = $data_checkout["kurir"];
			
			
			$data_checkout = array(
								"nama" => $nama,
								"email" => $email,
								"phone" => $phone,
								"alamat" => $alamat,
								"provinsi" => $provinsi,
								"kota" => $kota,
								"kecamatan" => $kecamatan,
								"kodepos" => $kodepos,
								"ongkir" => $ongkir,
								"berat" => $berat,
								"kurir" => $kurir,
							);
			$data["data_checkout"] = $data_checkout;
			
			//cart content
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
			$data["cart"] = $cart;
			
			$list_all_bank = $this->Bank_m->get_all_bank();
			$data["list_all_bank"] = $list_all_bank;
		
			$content = array();
			foreach($cart as $items)
			{
				array_push($content, $this->Cart_u_m->select_content($items["id"]));
			}
			$data["content"] = $content;
			
			$voucher_code = "";
			$voucher_value = 0;
			if(!empty($this->session->userdata("vouchercode")))
			{
				$voucher_code = $this->session->userdata("vouchercode");
				$voucher_value = $voucher_mod->check_voucher_value($this->session->userdata("vouchercode"));
				
				$this->session->set_userdata("vouchervalue", $voucher_value);
			}
			$data["voucher_code"] = $voucher_code;
			$data["voucher_value"] = $voucher_value;
			
			$header->header_view();
			$this->load->view('Confirmation_v', $data);
			$footer->footer_view();
		}
	}
}
