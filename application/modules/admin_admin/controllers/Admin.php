<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_m');		
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_admin = $this->Admin_m->get_all_admin();
		$data["list_all_admin"] = $list_all_admin;
		
		$header->header_view();
		$this->load->view('List_admin_v', $data);
		$footer->footer_view();
	}
	
	public function edit_admin($idadmin)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
				
		$data_admin = $this->Admin_m->get_admin_by_id($idadmin);
		if($data_admin == null)
			redirect("not_found");
		
		if($data["id_admin"] !== $idadmin)
		{
			$this->session->set_flashdata("message", "Cannot edit other admin profile !");
			redirect('admin/home/');
		}
		
		$data["data_admin"] = $data_admin;
		
		$header->header_view();
		$this->load->view('Edit_admin_v', $data);
		$footer->footer_view();
	}
	
	public function edit_admin_action()
	{
		$admin_id = $this->input->post('admin_id');
		$admin_name = $this->input->post('admin_name');
		$admin_email = $this->input->post('admin_email');
		$admin_gender = $this->input->post('admin_gender');
		$admin_phone = $this->input->post('admin_phone');
		$admin_address = $this->input->post('admin_address');
		$admin_role = $this->input->post('admin_role');
		$admin_status = $this->input->post('admin_status');
		
		$data_admin = array(
						"id_admin"=>$admin_id,
						"email_admin"=>$admin_email
					);
					
		$check_email = $this->Admin_m->check_email_admin_edit($data_admin);
		if($check_email == true)
		{
			$this->session->set_flashdata("message", "Email Sudah Digunakan Admin Lain !");
			redirect('admin/admin/edit_admin/'.$admin_id);
		}
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Admin');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/admin/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!empty($_FILES["admin_foto"]["name"]))
		{
			if(!$this->upload->do_upload('admin_foto'))
			{
				$this->session->set_flashdata("message", "Gagal Upload Images !");
				redirect('admin/admin/edit_admin/'.$admin_id);
			}else
			{
				$this->upload->do_upload('admin_foto');
			}
		}
		
		$admin_foto = array("upload_data" => $this->upload->data());
		if(!empty($admin_foto["upload_data"]["file_name"]))
		{
			$datas = array(
						'id_admin' => $admin_id,
						'nama_admin' => $admin_name,
						'email_admin' => $admin_email,
						'address_admin' => $admin_address,
						'gender_admin' => $admin_gender,
						'phone_admin' => $admin_phone,
						'role_admin' => $admin_role,
						'status_admin' => $admin_status,
						'foto_admin' => $admin_foto["upload_data"]["file_name"]
					);
					
			$updateadmin = $this->Admin_m->update_admin($datas);
			if($updateadmin)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/admin/edit_admin/'.$admin_id);
			}
		}else
		{
			$datas = array(
						'id_admin' => $admin_id,
						'nama_admin' => $admin_name,
						'email_admin' => $admin_email,
						'address_admin' => $admin_address,
						'gender_admin' => $admin_gender,
						'phone_admin' => $admin_phone,
						'role_admin' => $admin_role,
						'status_admin' => $admin_status,
					);
					
			$updateadmin = $this->Admin_m->update_admin($datas);
			if($updateadmin)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/admin/edit_admin/'.$admin_id);
			}
		}
	}
	
	public function add_admin()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
				
		$header->header_view();
		$this->load->view('Add_admin_v', $data);
		$footer->footer_view();
	}
	
	public function add_admin_action()
	{
		$admin_name = $this->input->post('admin_name');
		$admin_email = $this->input->post('admin_email');
		$admin_gender = $this->input->post('admin_gender');
		$admin_phone = $this->input->post('admin_phone');
		$admin_address = $this->input->post('admin_address');
		$admin_role = $this->input->post('admin_role');
		$admin_status = $this->input->post('admin_status');
		
		
		$check_email = $this->Admin_m->check_email_admin($admin_email);
		if($check_email == true)
		{
			$this->session->set_flashdata("message", "Email Sudah Terdaftar !");
			redirect('admin/admin/add_admin/');
		}
		
		
		$admin_pass = $this->input->post('admin_pass');
		$admin_pass_confirm = $this->input->post('admin_pass_confirmation');
		
		$password = password_hash($admin_pass, PASSWORD_BCRYPT);
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Admin');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/admin/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('admin_foto'))
		{
			$this->session->set_flashdata("message", "Gagal Upload Images !");
			redirect('admin/admin/add_admin/');
		}
		
		$admin_foto = array("upload_data" => $this->upload->data());
		if(!empty($admin_foto["upload_data"]["file_name"]))
		{
			$datas = array(
						'nama_admin' => $admin_name,
						'email_admin' => $admin_email,
						'address_admin' => $admin_address,
						'gender_admin' => $admin_gender,
						'phone_admin' => $admin_phone,
						'role_admin' => $admin_role,
						'status_admin' => $admin_status,
						'password_admin' => $password,
						'reg_date_admin' =>  date('d-m-Y H:i:s'),
						'foto_admin' => $admin_foto["upload_data"]["file_name"]
					);
					
			$insertadmin = $this->Admin_m->insert_admin($datas);
			if($insertadmin)
			{
				redirect('admin/admin/');
			}
		}
	}
	
	public function delete_admin($id_admin)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_admin = $this->Admin_m->get_admin_by_id($id_admin);
		if($data_admin == null)
			redirect("not_found");
		
		if($data["id_admin"] !== $id_admin)
		{
			$this->session->set_flashdata("message", "Cannot edit other admin profile !");
			redirect('admin/home/');
		}
		
		$data["data_admin"] = $data_admin;
		
		$header->header_view();
		$this->load->view('Delete_admin_v', $data);
		$footer->footer_view();
	}
	
	public function delete_admin_action()
	{
		$admin_id = $this->input->post('admin_id');
		
		$datas = array(
						'id_admin' => $admin_id,
					);
					
		$deleteadmin = $this->Admin_m->delete_admin($datas);
		if($deleteadmin)
		{
			redirect('admin/admin/');
		}
	}
}
