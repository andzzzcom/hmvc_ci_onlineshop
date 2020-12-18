<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_u_m');
		$this->load->model("Home_u_m");
		$this->load->model("front_cart/Cart_u_m");
	}
	
	public function login()
	{
		//load header and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		
		$data = $this->settings();
		
		$header->header_view();
		$this->load->view("Login_v", $data);
		$footer->footer_view();
	}
	
	public function login_action()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		
		$checkemail = $this->Home_u_m->check_email_user($email);
		if($checkemail)
		{
			$datauser = $this->Home_u_m->get_data_user_by_email($email);
			
			$passworddb = $datauser[0]->password_user;
			if(password_verify($password, $passworddb))
			{
				$id_user = $datauser[0]->id_user;
				$nama_user = $datauser[0]->nama_user;
				
				$this->session->set_userdata("email_user", $email);
				$this->session->set_userdata("id_user", $id_user);
				$this->session->set_userdata("nama_user", $nama_user);
				
				
				$cart = $this->cart->contents();
				foreach($cart as $items)
				{
					$datanya = array(
									"id_user"=>$id_user,
									"id_produk"=>$items["id"],
								);
								
					$cek_cart = $this->Cart_u_m->cek_idcourse($datanya);
					
					if($cek_cart == null)
					{
						$data_db = array(
										"id_user"=>$id_user,
										"id_produk"=>$items["id"],
										"count"=>$items["qty"],
									);
								
						$this->Cart_u_m->insert_cartspec($data_db);
					}
					else
					{
						$data_db = array(
										"id_user"=>$id_user,
										"id_produk"=>$items["id"],
										"count"=>$items["qty"]+$cek_cart[0]->count,
									);
								
						$data_db_cond = array(
											"id_user"=>$id_user,
											"id_produk"=>$items["id"],
										);
						$this->Cart_u_m->update_cart($data_db, $data_db_cond);
					}
				}
				redirect('profile');
			}else	
			{
				$this->session->set_flashdata("message_login", "Password tidak benar !");
				redirect('login');
			}
		}else	
		{
			$this->session->set_flashdata("message_login", "Email tidak terdaftar !");
			redirect('login');
		}
	}
	
	public function login_checkout()
	{
		//load header and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		
		$data = $this->settings();
		
		$header->header_view();
		$this->load->view("Login_checkout_v", $data);
		$footer->footer_view();
	}
	
	public function login_checkout_action()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		
		$checkemail = $this->Home_u_m->check_email_user($email);
		if($checkemail)
		{
			$datauser = $this->Home_u_m->get_data_user_by_email($email);
			
			$passworddb = $datauser[0]->password_user;
			if(password_verify($password, $passworddb))
			{
				$id_user = $datauser[0]->id_user;
				$nama_user = $datauser[0]->nama_user;
				
				$this->session->set_userdata("email_user", $email);
				$this->session->set_userdata("id_user", $id_user);
				$this->session->set_userdata("nama_user", $nama_user);
				
				
				$cart = $this->cart->contents();
				foreach($cart as $items)
				{
					$datanya = array(
									"id_user"=>$id_user,
									"id_produk"=>$items["id"],
								);
								
					$cek_cart = $this->Cart_u_m->cek_idcourse($datanya);
					
					if($cek_cart == null)
					{
						$data_db = array(
										"id_user"=>$id_user,
										"id_produk"=>$items["id"],
										"count"=>$items["qty"],
									);
								
						$this->Cart_u_m->insert_cartspec($data_db);
					}
					else
					{
						$data_db = array(
										"id_user"=>$id_user,
										"id_produk"=>$items["id"],
										"count"=>$items["qty"]+$cek_cart[0]->count,
									);
								
						$data_db_cond = array(
											"id_user"=>$id_user,
											"id_produk"=>$items["id"],
										);
						$this->Cart_u_m->update_cart($data_db, $data_db_cond);
					}
				}
				redirect('checkout');
			}else	
			{
				$this->session->set_flashdata("message_login", "Password tidak benar !");
				redirect('login_checkout');
			}
		}else	
		{
			$this->session->set_flashdata("message_login", "Email tidak terdaftar !");
			redirect('login_checkout');
		}
	}
	
	public function signup_action()
	{
		$nama = $this->input->post("nama");
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$temp_password = $password;
		
		$password = password_hash($password, PASSWORD_BCRYPT);
		
		$checkemail = $this->Home_u_m->check_email_user($email);
		if($checkemail == false)
		{
			$datas = array(
						"nama_user"=>$nama,
						"email_user"=>$email,
						"foto_user"=>'person.png',
						"password_user"=>$password,
						"provinsi_user"=>1,
						"kota_kabupaten_user"=>17,
						"kecamatan_user"=>258,
						"reg_date_user"=>date("d-m-Y H:i:s"),
						"status_user"=>'aktif',
					);
			$insert_data = $this->Home_u_m->insert_data_user($datas);
			if($insert_data)
			{
				
				$data_register = array(
									"emailtujuan"=>$email,
									"customername"=>$nama,
									"emailcustomer"=>$email,
									"passwordcustomer"=>$temp_password,
								);
				
				//$this->mail_register($data_register);
		
				$this->session->set_flashdata("message_signup", "Berhasil Didaftarkan! Silahkan Login untuk melanjutkan transaksi.");
				redirect('login');
			}
		}else	
		{
			$this->session->set_flashdata("message_signup", "Email sudah terdaftar !");
			redirect('login');
		}
	}
	
	public function forgot_password()
	{
		//load header and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		
		$data = $this->settings();
		
		$header->header_view();
		$this->load->view("Forgot_password_v", $data);
		$footer->footer_view();
	}
	
	public function forgot_password_action()
	{
		$email = $this->input->post("email");
		
		$checkemail = $this->Home_u_m->check_email_user($email);
		if($checkemail)
		{
			$datauser = $this->Home_u_m->get_data_user_by_email($email);
			$nama_user = $datauser[0]->nama_user;
			$id_user = $datauser[0]->id_user;
			
			$unhash_password = $this->generateRandomString();
			$password = password_hash($unhash_password, PASSWORD_BCRYPT);
			
			$data_usernya = array(
								"id_user"=>$id_user,
								"password_user"=>$password
							);
			$this->Profile_u_m->update_data_user($data_usernya);
			
			$data_forgot_password = array(
										"emailtujuan"=>$email,
										"customername"=>$nama_user,
										"emailcustomer"=>$email,
										"passwordcustomer"=>$unhash_password,
									);
			$this->mail_forgot_password($data_forgot_password);
			
			$this->session->set_flashdata("message_forgot", "Password anda sudah di reset! Silahkan cek email anda!");
			redirect('forgot_password');
		}else
		{
			$this->session->set_flashdata("message_forgot", "Email tidak terdaftar!");
			redirect('forgot_password');
			
		}
	}
	
	private function generateRandomString($length = 10) 
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
