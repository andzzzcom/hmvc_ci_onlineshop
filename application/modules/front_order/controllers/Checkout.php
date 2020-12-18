<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("cart");
		$this->load->model('front_cart/Cart_u_m');
		$this->load->model('front_order/Order_u_m');
		$this->load->model('admin_user/User_m');
		$this->load->model('admin_setting/Courier_m');
		$this->load->model('admin_bank/Bank_m');
		$this->load->model('Profile_u_m');
	}

	public function checkout()
	{
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
			$ongkir_mod = $this->loaded_module(9);
			
			$data = $this->settings();			
			
			$courier_list = $this->Courier_m->get_active_courier();
			$data["courier_list"] = $courier_list;
			
			$data_provinsi = $this->User_m->get_all_province();
			$data["data_provinsi"] = $data_provinsi;
			
			$data_city = $this->User_m->get_all_city();
			$data["data_city"] = $data_city;
			
			$data_district = $this->User_m->get_all_district();
			$data["data_district"] = $data_district;
			
			$email = $this->session->userdata("email_user");
			$id_user = $this->session->userdata("id_user");
			
			$data_user = $this->Order_u_m->get_user_by_id($id_user);
			$data["data_user"] = $data_user;
			
			$this->cart->destroy();
			$resultnya = $this->Order_u_m->select_cart($id_user);
		  
			foreach($resultnya as $result)
			{
				$datas = array(
							'id' => $result->id_produk,
							'name' => $this->Order_u_m->select_content($result->id_produk)[0]->nama_produk,
							'qty' => $result->count,
							'price' => $this->Order_u_m->select_content($result->id_produk)[0]->harga_produk
						);
				$this->cart->insert($datas);
			}
			
			$cart = $this->cart->contents();
			$data["cart"] = $cart;
			if($cart == null)
			{
				$link = base_url();
				redirect($link);
			}
			
			$content = array();
			foreach($cart as $items)
			{
				array_push($content, $this->Order_u_m->select_content($items["id"]));
			}
			$data["content"] = $content;
			
			$provinsi = $this->Profile_u_m->get_province_by_id_province($data_user[0]->provinsi_user)[0]->name_province;
			$kota_kabupaten = $this->Profile_u_m->get_city_by_id_city($data_user[0]->kota_kabupaten_user)[0]->name_city;
			$kecamatan = $this->Profile_u_m->get_district_by_id_district($data_user[0]->kecamatan_user)[0]->name_district;
			
			$shipping_kota_kabupaten = "";
			$shipping_courier_name = "";
			$shipping_info = $this->Order_u_m->get_settings_shipping();
			foreach($shipping_info as $shipping_info)
			{
				$shipping_kota_kabupaten = $shipping_info->id_kecamatan;
			}
			
			$cart2 = $cart;
			$total_weight = 0;
			foreach($cart2 as $items)
			{
				$total_weight += $this->Order_u_m->select_content($items["id"])[0]->weight_produk*$items["qty"];
			}
			
			$idkecamatan = $data_user[0]->kecamatan_user;
			$shipping_courier_name = $data_user[0]->kurir_user;
			
			$data_shipping = array(
								"origin_id" => $shipping_kota_kabupaten,
								"origin_type" => "subdistrict",
								"destination_id" => $idkecamatan,
								"destination_type" => "subdistrict",
								"weight" => $total_weight,
								"courier" => $shipping_courier_name,
							);
			$ongkir = $ongkir_mod->cek_ongkir($data_shipping);
			
			$data["provinsi"] = $provinsi;
			$data["kota_kabupaten"] = $kota_kabupaten;
			$data["kecamatan"] = $kecamatan;
			$data["ongkir"] = $ongkir;
			$data["totalweight"] = $total_weight;
			$data["couriername"] = $shipping_courier_name;
						
			$header->header_view();
			$this->load->view('Checkout_v', $data);
			$footer->footer_view();
		}		
	}
	
	public function set_checkout_data()
	{
		$emailnya = $this->session->userdata("email_user");
		if($emailnya == null)
		{
			$link = base_url()."login_checkout";
			redirect($link);

		//sudah login customer
		}else
		{
			$nama = trim($this->input->post("nama"));
			$email = trim($this->input->post("email"));
			$phone = trim($this->input->post("phone"));
			$alamat = trim($this->input->post("alamat"));
			$provinsi = trim($this->input->post("provinsi"));
			$kota = trim($this->input->post("kota"));
			$kecamatan = trim($this->input->post("kecamatan"));
			$kodepos = trim($this->input->post("kodepos"));
			$ongkir = trim($this->input->post("ongkir"));
			$berat = trim($this->input->post("berat"));
			$kurir = trim($this->input->post("kurir"));
			
			
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
			
			$this->session->set_userdata("data_checkout", $data_checkout);
	
			echo $data_checkout["kurir"];
		}
	}
}
