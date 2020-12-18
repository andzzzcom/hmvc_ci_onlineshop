<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Shipping_u_m');
		$this->load->model('admin_setting/Courier_m');
	}
	
	public function index()
	{	
		//load header and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		$sidebar = $this->loaded_module_user(0);
		
		$data = $this->settings();
		
		$id_user = $this->session->userdata("id_user");
		if(!isset($id_user))
			redirect("login");
		
		$courier_list = $this->Courier_m->get_active_courier();
		$data["courier_list"] = $courier_list;
		
		$data_user = $this->Shipping_u_m->get_user_by_id($id_user);
		$data["data_user"] = $data_user;
		
		$id_provinsi = $data_user[0]->provinsi_user;
		$id_kota_kabupaten = $data_user[0]->kota_kabupaten_user;
		$id_kecamatan = $data_user[0]->kecamatan_user;
		
		$data_provinsi = $this->Shipping_u_m->get_all_province();
		$data["data_provinsi"] = $data_provinsi;
		
		$data_city = $this->Shipping_u_m->get_city_by_id_province($id_provinsi);
		$data["data_city"] = $data_city;
		
		$data_district = $this->Shipping_u_m->get_district_by_id_city($id_kota_kabupaten);
		$data["data_district"] = $data_district;
				
		$header->header_view();
		$sidebar->sidebar_left_view('shipping');
		$this->load->view('Shipping_settings_v', $data);
		$sidebar->sidebar_right_view();
		$footer->footer_view();
	}
	
	public function shipping_settings_action()
	{
		$user_id = $this->session->userdata("id_user");
		$id_kurir = $this->input->post('id_kurir');
		$user_address = $this->input->post('user_address');
		
		$user_province = $this->input->post('user_province');
		$user_city = $this->input->post('user_city');
		$user_district = $this->input->post('user_district');
		
		$user_postcode = $this->input->post('user_postcode');
		
		$datas = array(
						'id_user' => $user_id,
						'kurir_user' => $id_kurir,
						'address_user' => $user_address,
						'provinsi_user' => $user_province,
						'kota_kabupaten_user' => $user_city,
						'kecamatan_user' => $user_district,
						'kode_pos_user' => $user_postcode,
					);
					
		$updateuser = $this->Shipping_u_m->update_data_user($datas);
		if($updateuser)
		{
			$this->session->set_flashdata("message", "Berhasil Update Data Pengiriman!");
			redirect('profile/shipping_settings');
		}
	}
	
}
