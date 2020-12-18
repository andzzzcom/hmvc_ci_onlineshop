<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailbox extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mailbox_u_m');
	}
	
	public function index()
	{	
		//load header, sidebar and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		$sidebar = $this->loaded_module_user(0);
		
		$data = $this->settings();
		
		$id_user = $this->session->userdata("id_user");
		if(!isset($id_user))
			redirect("login");
		
		$data_user = $this->Mailbox_u_m->get_user_by_id($id_user);
		$data["data_user"] = $data_user;
		
		$total_message = $this->Mailbox_u_m->get_n_all_message($id_user);
		$data["total_message"] = $total_message;
		
		$per_page = 10;
		$url_segment = 3;
		$datas = array(
					"total_data_order"=>$total_message,
					"base_url"=>base_url()."Profile/mailbox",
					"per_page"=>$per_page,
					"uri_segment"=>$url_segment,
				);
		$config = $this->pagination_settings($datas);
		$page = ($this->uri->segment($url_segment)) ? $this->uri->segment($url_segment) : 0;
		$data['pagination'] = $this->pagination->create_links();
		
		$data_message = $this->Mailbox_u_m->get_all_message($id_user, $config["per_page"], $page);
		$data["data_message"] = $data_message;
		
		$header->header_view();
		$sidebar->sidebar_left_view('inbox');
		$this->load->view('Mailbox_v', $data);
		$sidebar->sidebar_right_view();
		$footer->footer_view();
	}
	
	public function mailbox_sent()
	{
		//load header, sidebar and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		$sidebar = $this->loaded_module_user(0);
		
		$data = $this->settings();
		
		$id_user = $this->session->userdata("id_user");
		if(!isset($id_user))
			redirect("login");
		
		$data_user = $this->Mailbox_u_m->get_user_by_id($id_user);
		$data["data_user"] = $data_user;
		
		$total_message = $this->Mailbox_u_m->get_n_all_message_sent($id_user);
		$data["total_message"] = $total_message;
		
		$per_page = 10;
		$url_segment = 3;
		$datas = array(
					"total_data_order"=>$total_message,
					"base_url"=>base_url()."Profile/mailbox",
					"per_page"=>$per_page,
					"uri_segment"=>$url_segment,
				);
		$config = $this->pagination_settings($datas);
		$page = ($this->uri->segment($url_segment)) ? $this->uri->segment($url_segment) : 0;
		$data['pagination'] = $this->pagination->create_links();
				
		$data_message = $this->Mailbox_u_m->get_all_message_sent($id_user, $config["per_page"], $page);
		$data["data_message"] = $data_message;
		
		$header->header_view();
		$sidebar->sidebar_left_view('inboxsent');
		$this->load->view('Mailbox_sent_v', $data);
		$sidebar->sidebar_right_view();
		$footer->footer_view();
	}
	
	public function detail_message($id_message)
	{
		//load header, sidebar and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		$sidebar = $this->loaded_module_user(0);
		
		$data = $this->settings();
		
		$id_user = $this->session->userdata("id_user");
		if(!isset($id_user))
			redirect("login");
		
		$data_user = $this->Mailbox_u_m->get_user_by_id($id_user);
		$data["data_user"] = $data_user;
		
		$data_message = $this->Mailbox_u_m->get_detail_message($id_message);
		if($data_message == null)
			redirect(base_url());
		
		$data["data_message"] = $data_message;
		
		$header->header_view();
		$sidebar->sidebar_left_view('inbox');
		$this->load->view('Detail_message_v', $data);
		$sidebar->sidebar_right_view();
		$footer->footer_view();
	}
	
	public function detail_message_sent($id_message)
	{
		//load header, sidebar and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		$sidebar = $this->loaded_module_user(0);
		
		$data = $this->settings();
		
		$id_user = $this->session->userdata("id_user");
		if(!isset($id_user))
			redirect("login");
		
		$data_user = $this->Mailbox_u_m->get_user_by_id($id_user);
		$data["data_user"] = $data_user;
		
		$data_message = $this->Mailbox_u_m->get_detail_message($id_message);
		if($data_message == null)
			redirect(base_url());
		
		$data["data_message"] = $data_message;
		
		$header->header_view();
		$sidebar->sidebar_left_view('inboxsent');
		$this->load->view('Detail_message_sent_v', $data);
		$sidebar->sidebar_right_view();
		$footer->footer_view();
	}
	
	public function send_message()
	{
		//load header, sidebar and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		$sidebar = $this->loaded_module_user(0);
		
		$data = $this->settings();
		
		$id_user = $this->session->userdata("id_user");
		if(!isset($id_user))
			redirect("login");
		
		$data_user = $this->Mailbox_u_m->get_user_by_id($id_user);
		$data["data_user"] = $data_user;
		
		$header->header_view();
		$sidebar->sidebar_left_view('sendmessage');
		$this->load->view('Create_message_v', $data);
		$sidebar->sidebar_right_view();
		$footer->footer_view();
	}
	
	public function send_message_action()
	{
		$user_id = $this->session->userdata("id_user");
		if($user_id == null)
			redirect(base_url());
		
		$title_message = $this->input->post("title_message");
		$content_message = $this->input->post("content_message");
		$user_id = $user_id;
		
		$datas = array(
						'id_customer' => $user_id,
						'type_sender' => 'customer',
						'title_message' => $title_message,
						'content_message' => $content_message,
						'date_message' => date("d-m-Y H:i:s"),
						'status_message' => 'active',
					);
	
		$send_message = $this->Mailbox_u_m->insert_message($datas);
		if($send_message)
		{
			$this->session->set_flashdata("message_update", "Berhasil Mengirim Pesan Kepada Admin!");
			redirect('profile/send_message');
		}
	}
}
