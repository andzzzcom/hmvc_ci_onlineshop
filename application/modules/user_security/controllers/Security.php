<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Security_u_m');
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
		
		$data_user = $this->Security_u_m->get_user_by_id($id_user);
		$data["data_user"] = $data_user;
		
		$header->header_view();
		$sidebar->sidebar_left_view('security');
		$this->load->view('Security_settings_v', $data);
		$sidebar->sidebar_right_view();
		$footer->footer_view();
	}
	
	public function security_settings_action()
	{
		$oldpassword = $this->input->post("oldpassword");
		$newpassword = $this->input->post("newpassword");
		
		$id_user = $this->session->userdata("id_user");
		$email = $this->session->userdata("email_user");
		$datauser = $this->Security_u_m->get_data_user_by_email($email);
			
		$passworddb = $datauser[0]->password_user;
		if(password_verify($oldpassword, $passworddb))
		{
			$newpassword = password_hash($newpassword, PASSWORD_BCRYPT);
			
			$data = array(
							"id_user"=>$id_user,
							"password_user"=>$newpassword,
						);
			$update = $this->Security_u_m->update_data_user($data);		
			if($update)
			{
				$this->session->set_flashdata("message_update", "Berhasil Update Password!");
				redirect('profile/security_settings');
			}
		}else	
		{
			$this->session->set_flashdata("message_update", "Password tidak benar !");
			redirect('profile/security_settings');
		}
		
	}
	
}
