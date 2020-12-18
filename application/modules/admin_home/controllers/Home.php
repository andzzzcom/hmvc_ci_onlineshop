<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_m');		
	}

	public function home()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$total_order = $this->get_n_order();
		$total_user = $this->get_n_order();
		$total_product = $this->get_n_product();
		$total_category = $this->get_n_category();
		
		$data["total_order"] = $total_order;
		$data["total_user"] = $total_user;
		$data["total_product"] = $total_product;
		$data["total_category"] = $total_category;
		
		$list_all_transaction = $this->Order_m->get_all_transaction();
		$data["list_all_transaction"] = $list_all_transaction;
		
		$header->header_view();
		$this->load->view("Home_v", $data);
		$footer->footer_view();
	}

	public function login()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$header->header_login_view();
		$this->load->view("Login_v");
		$footer->footer_login_view();
	}
	
	public function login_action()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		
		//$this->update_password($email, $password);
		
		
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
	
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_userdata("message", "Please correct your email or password!");
			
			redirect('admin/login');
		}else
		{
			$datas = array(
						'email_admin'=>$email
					);
					
			$checkemail = $this->Home_m->get_data_by_email($datas);
			if(count($checkemail) > 0)
			{
				$datauser = $this->Home_m->get_data_by_email($datas);
				
				$passworduser = $datauser[0]->password_admin;
				$id_admin = $datauser[0]->id_admin;
				$regdateadmin = $datauser[0]->reg_date_admin;
				$namaadmin = $datauser[0]->nama_admin;
				$roleadmin = $datauser[0]->role_admin;
				$fotoadmin = $datauser[0]->foto_admin;
				
				if(password_verify($password, $passworduser))
				{
					$this->session->set_userdata("admin_email", $email);
					$this->session->set_userdata("id_admin", $id_admin);
					$this->session->set_userdata("reg_date_admin", $regdateadmin);
					$this->session->set_userdata("nama_admin", $namaadmin);
					$this->session->set_userdata("role_admin", $roleadmin);
					$this->session->set_userdata("foto_admin", $fotoadmin);
					
					redirect('admin');
				}else
				{
					$this->session->set_userdata("message", "Wrong Password !");
					
					redirect('admin/login');
				}
			}else
			{
				$this->session->set_userdata("message", "Wrong Email / Email Not Activated !");
				
				redirect('admin/login');
			}
		}
	}
	
	private function get_n_order()
	{
		$mod = $this->loaded_module_admin(2);
		$total = $mod->get_n_total_order();
		return $total;
	}
	
	private function get_n_user()
	{
		$mod = $this->loaded_module_admin(3);
		$total = $mod->get_n_total_user();
		return $total;
	}
	
	private function get_n_product()
	{
		$mod = $this->loaded_module_admin(4);
		$total = $mod->get_n_total_product();
		return $total;
	}
	
	private function get_n_category()
	{
		$mod = $this->loaded_module_admin(5);
		$total = $mod->get_n_total_category();
		return $total;
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}
