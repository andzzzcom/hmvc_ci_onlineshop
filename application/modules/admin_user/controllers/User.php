<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_m');		
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_user = $this->User_m->get_all_user();
		$data["list_all_user"] = $list_all_user;
		
		$header->header_view();
		$this->load->view('List_user_v', $data);
		$footer->footer_view();
	}
	
	public function edit_user($id_user)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_user = $this->User_m->get_user_by_id($id_user);
		if($data_user == null)
			redirect("not found");

		$data["data_user"] = $data_user;
		
		$id_provinsi = $data_user[0]->provinsi_user;
		$id_kota_kabupaten = $data_user[0]->kota_kabupaten_user;
		$id_kecamatan = $data_user[0]->kecamatan_user;
		
		$data_provinsi = $this->User_m->get_all_province();
		$data["data_provinsi"] = $data_provinsi;
		
		$data_city = $this->User_m->get_city_by_id_province($id_provinsi);
		$data["data_city"] = $data_city;
		
		$data_district = $this->User_m->get_district_by_id_city($id_kota_kabupaten);
		$data["data_district"] = $data_district;
		
		$header->header_view();
		$this->load->view('Edit_user_v', $data);
		$footer->footer_view();
	}
	
	public function edit_user_action()
	{
		$user_id = $this->input->post('user_id');
		$user_name = $this->input->post('user_name');
		$user_email = $this->input->post('user_email');
		$user_gender = $this->input->post('user_gender');
		$user_status = $this->input->post('user_status');
		$user_phone = $this->input->post('user_phone');
		$user_address = $this->input->post('user_address');
		
		$user_province = $this->input->post('user_province');
		$user_city = $this->input->post('user_city');
		$user_district = $this->input->post('user_district');
		
		$user_postcode = $this->input->post('user_postcode');
		
		
		$data_user = array(
						"id_user"=>$user_id,
						"email_user"=>$user_email
					);
					
		$check_email = $this->User_m->check_email_user_edit($data_user);
		if($check_email == true)
		{
			$this->session->set_flashdata("message", "Email Sudah Digunakan User Lain !");
			redirect('admin/user/edit_user/'.$user_id);
		}
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('User');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/user/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!empty($_FILES["user_foto"]["name"]))
		{
			if(!$this->upload->do_upload('user_foto'))
			{
				$this->session->set_flashdata("message", "Gagal Upload Images !");
				redirect('admin/user/edit_user/'.$user_id);
			}else
			{
				$this->upload->do_upload('user_foto');
			}
		}
		
		$user_foto = array("upload_data" => $this->upload->data());
		if(!empty($user_foto["upload_data"]["file_name"]))
		{
			$datas = array(
						'id_user' => $user_id,
						'email_user' => $user_email,
						'nama_user' => $user_name,
						'phone_user' => $user_phone,
						'address_user' => $user_address,
						'provinsi_user' => $user_province,
						'kota_kabupaten_user' => $user_city,
						'kecamatan_user' => $user_district,
						'kode_pos_user' => $user_postcode,
						'gender_user' => $user_gender,
						'status_user' => $user_status,
						'foto_user' => $user_foto["upload_data"]["file_name"]
					);
					
			$updateuser = $this->User_m->update_user($datas);
			if($updateuser)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/user/edit_user/'.$user_id);
			}
		}else
		{
			$datas = array(
						'id_user' => $user_id,
						'email_user' => $user_email,
						'nama_user' => $user_name,
						'phone_user' => $user_phone,
						'address_user' => $user_address,
						'provinsi_user' => $user_province,
						'kota_kabupaten_user' => $user_city,
						'kecamatan_user' => $user_district,
						'kode_pos_user' => $user_postcode,
						'gender_user' => $user_gender,
						'status_user' => $user_status,
					);
					
			$updateuser = $this->User_m->update_user($datas);
			if($updateuser)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/user/edit_user/'.$user_id);
			}
		}
	}
	
	public function get_city_district()
	{
		$id_provinsi = $_POST["id"];
    
		$data_city = $this->User_m->get_city_by_id_province($id_provinsi);
		
		$data_district = $this->User_m->get_district_by_id_province($id_provinsi);
		
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
    
		$data_district = $this->User_m->get_district_by_id_city($id_kota_kabupaten);
		
		$temp="";
		foreach($data_district as $district)
		{
			$temp = $temp.",".$district->id_district."-".$district->name_district;
		}
		
		echo $temp;
	}
	
	public function add_user()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
				
		$data_provinsi = $this->User_m->get_all_province();
		$data["data_provinsi"] = $data_provinsi;
		
		$data_city = $this->User_m->get_all_city();
		$data["data_city"] = $data_city;
		
		$data_district = $this->User_m->get_all_district();
		$data["data_district"] = $data_district;
		
		$header->header_view();
		$this->load->view('Add_user_v', $data);
		$footer->footer_view();
	}
	
	public function add_user_action()
	{
		$user_name = $this->input->post('user_name');
		$user_email = $this->input->post('user_email');
		$user_gender = $this->input->post('user_gender');
		$user_status = $this->input->post('user_status');
		$user_phone = $this->input->post('user_phone');
		$user_address = $this->input->post('user_address');
		
		$user_province = $this->input->post('user_province');
		$user_city = $this->input->post('user_city');
		$user_district = $this->input->post('user_district');
		
		$user_postcode = $this->input->post('user_postcode');
		
		
		$check_email = $this->User_m->check_email_user($user_email);
		if($check_email == true)
		{
			$this->session->set_flashdata("message", "Email Sudah Terdaftar !");
			redirect('admin/user/add_user/');
		}
		
		$user_pass = $this->input->post('user_pass');
		$user_pass_confirm = $this->input->post('user_pass_confirmation');
		
		$temp_password = $user_pass;
		
		$password = password_hash($user_pass, PASSWORD_BCRYPT);
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('User');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/user/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('user_foto'))
		{
			$this->session->set_flashdata("message", "Gagal Upload Images !");
			redirect('admin/user/add_user/');
		}
		
		$user_foto = array("upload_data" => $this->upload->data());
		if(!empty($user_foto["upload_data"]["file_name"]))
		{
			$datas = array(
						'email_user' => $user_email,
						'nama_user' => $user_name,
						'phone_user' => $user_phone,
						'address_user' => $user_address,
						'provinsi_user' => $user_province,
						'kota_kabupaten_user' => $user_city,
						'kecamatan_user' => $user_district,
						'kode_pos_user' => $user_postcode,
						'gender_user' => $user_gender,
						'status_user' => $user_status,
						'password_user' => $password,
						'foto_user' => $user_foto["upload_data"]["file_name"],
						"provinsi_user"=>1,
						"kota_kabupaten_user"=>17,
						"kecamatan_user"=>258,
					);
					
			$insertuser = $this->User_m->insert_user($datas);
			if($insertuser)
			{
				$data_register = array(
									"emailtujuan"=>$user_email,
									"customername"=>$user_name,
									"emailcustomer"=>$user_email,
									"passwordcustomer"=>$temp_password,
								);
				
				$this->mail_register($data_register);
				
				redirect('admin/user/');
			}
		}		
	}
	
	public function delete_user($id_user)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
				
		$data_user = $this->User_m->get_user_by_id($id_user);
		if($data_user == null)
			redirect("not found");

		$data["data_user"] = $data_user;
		
		$id_provinsi = $data_user[0]->provinsi_user;
		$id_kota_kabupaten = $data_user[0]->kota_kabupaten_user;
		$id_kecamatan = $data_user[0]->kecamatan_user;
		
		$data_provinsi = $this->User_m->get_all_province();
		$data["data_provinsi"] = $data_provinsi;
		
		$data_city = $this->User_m->get_city_by_id_province($id_provinsi);
		$data["data_city"] = $data_city;
		
		$data_district = $this->User_m->get_district_by_id_city($id_kota_kabupaten);
		$data["data_district"] = $data_district;
		
		$header->header_view();
		$this->load->view('Delete_user_v', $data);
		$footer->footer_view();
	}
	
	public function delete_user_action()
	{
		$user_id = $this->input->post('user_id');
		
		$datas = array(
						'id_user' => $user_id,
					);
					
		$deleteuser = $this->User_m->delete_user($datas);
		if($deleteuser)
		{
			redirect('admin/user/');
		}
	}
	
	public function get_n_total_user()
	{
		$total = sizeof($this->User_m->get_all_user());
		return $total;
	}
}
