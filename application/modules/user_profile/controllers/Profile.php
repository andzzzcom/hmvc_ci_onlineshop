<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_u_m');
		$this->check_expired_invoice();
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
		
		$data_user = $this->Profile_u_m->get_user_by_id($id_user);
		$data["data_user"] = $data_user;
		
		$header->header_view();
		$sidebar->sidebar_left_view('profile');
		$this->load->view('Profile_v', $data);
		$sidebar->sidebar_right_view();
		$footer->footer_view();
	}
	
	public function edit_profile_action()
	{
		$id_user = $this->input->post("id_user");
		$nama_user = $this->input->post("nama_user");
		$email_user = $this->input->post("email_user");
		$phone_user = $this->input->post("phone_user");
		$gender_user = $this->input->post("gender_user");
		
		$data = array(
						"id_user"=>$id_user,
						"nama_user"=>$nama_user,
						"email_user"=>$email_user,
						"phone_user"=>$phone_user,
						"gender_user"=>$gender_user,
					);
					
		$checkemail = $this->Profile_u_m->check_email_user($data);
		if(!$checkemail)
		{
			$update = $this->Profile_u_m->update_data_user($data);		
			if($update)
			{
				//setting untuk upload image
				$upload_settings = $this->get_upload_settings('User');
				$file_size = $upload_settings[0]->file_size;
				$file_type = $upload_settings[0]->file_type;
				
				$theme = $this->settings()["theme"];
				$config['upload_path'] = 'assets/'.$theme.'/images/user/';
				$config['allowed_types'] = $file_type;
				$config['max_size'] = $file_size;
				$this->load->library('upload', $config);
				
				$this->upload->do_upload('foto_user');
				
				$foto_user = array("upload_data" => $this->upload->data());
				if(!empty($foto_user["upload_data"]["file_name"]))
				{
					$data = array(
						"id_user"=>$id_user,
						"foto_user"=>$foto_user["upload_data"]["file_name"],
					);
					$update = $this->Profile_u_m->update_data_user($data);
					if($update)
					{					
						$this->session->set_flashdata("message_update", "Berhasil Update !");
						redirect('profile');
					}
				}else
				{
					$this->session->set_flashdata("message_update", "Berhasil Update !");
					redirect('profile');
				}
			}
		}else	
		{
			$this->session->set_flashdata("message_update", "Email sudah terdaftar !");
			redirect('profile');
		}
	}
	
	public function get_city_district()
	{
		$id_provinsi = $_POST["id"];
    
		$data_city = $this->Profile_u_m->get_city_by_id_province($id_provinsi);
		
		$data_district = $this->Profile_u_m->get_district_by_id_province($id_provinsi);
		
		$temp="";
		foreach($data_city as $city)
		{
			$temp = $temp.",".$city->id_city."-".$city->name_city;
		}
		
		$temp2="";
		foreach($data_district as $district)
		{
			$temp2 = $temp2.",".$district->id_district."-".$district->name_district;
		}
		echo $temp."|".$temp2;
	}
	
	public function get_district()
	{
		$id_kota_kabupaten = $_POST["id"];
    
		$data_district = $this->Profile_u_m->get_district_by_id_city($id_kota_kabupaten);
		
		$temp="";
		foreach($data_district as $district)
		{
			$temp = $temp.",".$district->id_district."-".$district->name_district;
		}
		echo $temp;
	}
	
	private function check_expired_invoice()
	{
		$id_user = $this->session->userdata("id_user");
		if(!isset($id_user))
			redirect("login");
		
		$data_order = $this->Profile_u_m->get_all_transactions($id_user);
		foreach($data_order as $order)
		{
			if($data_order[0]->status_pesanan !== "paid")
			{
				$date_now = strtotime(date('d-m-Y H:i:s'));
				$date_expired = strtotime($order->date_expire_pesanan);
				$invoice_code = $order->invoice_code;
				$check_invoice = $this->Profile_u_m->check_invoice($invoice_code);
				
				if($date_now > $date_expired && $check_invoice==0)
				{
					$data_konfirmasi = array(
										"invoice_code"=>$invoice_code,
										"status_pesanan"=>'expired',
									);
					$this->Profile_u_m->update_status_transaksi($data_konfirmasi);
				}
			}
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
