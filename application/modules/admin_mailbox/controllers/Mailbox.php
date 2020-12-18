<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailbox extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_m');
		$this->load->model('Mailbox_m');
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_mailbox = $this->Mailbox_m->get_all_mailbox();
		$data["list_all_mailbox"] = $list_all_mailbox;
		
		$header->header_view();
		$this->load->view('List_message_v', $data);
		$footer->footer_view();
	}
	
	public function list_sent_message()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_mailbox = $this->Mailbox_m->get_all_sent_mailbox();
		$data["list_all_mailbox"] = $list_all_mailbox;
		
		$header->header_view();
		$this->load->view('List_sent_message_v', $data);
		$footer->footer_view();
	}
	
	public function detail_message($id_message)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_pesan = $this->Mailbox_m->get_message_by_id($id_message);
		if($data_pesan == null)
			redirect("not_found");
		
		$data["data_pesan"] = $data_pesan;
		
		$header->header_view();
		$this->load->view('Detail_message_v', $data);
		$footer->footer_view();
	}
	
	public function delete_message($id_message)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_pesan = $this->Mailbox_m->get_message_by_id($id_message);
		if($data_pesan == null)
			redirect("not_found");
		
		$data["data_pesan"] = $data_pesan;
		
		$header->header_view();
		$this->load->view('Delete_message_v', $data);
		$footer->footer_view();
	}
	
	public function delete_message_action()
	{
		$message_id = $this->input->post('message_id');
		
		$datas = array(
						'id_message' => $message_id,
					);
					
		$deletemessage = $this->Mailbox_m->delete_inbox_message($datas);
		if($deletemessage)
		{
			redirect('admin/mailbox/list_sent_message');
		}
	}
	
	public function create_message()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_email = $this->User_m->get_all_user();
		$data["list_email"] = $list_email;
		
		$header->header_view();
		$this->load->view('Send_message_v', $data);
		$footer->footer_view();
	}
	
	public function create_message_action()
	{
		$id_customer = explode("-", $this->input->post('receiver_email'))[0];
		$receiver_email = explode("-", $this->input->post('receiver_email'))[1];
		$judul_message = $this->input->post('judul_message');
		$isi_message = $this->input->post('isi_message');
	
		$datapesan = array(
							"id_customer"=>$id_customer,
							"type_sender"=>'admin',
							"title_message"=>$judul_message,
							"content_message"=>$isi_message,
							"date_message"=>date("d-m-Y H:i:s"),
							"status_message"=>'active',
						);
		$this->Mailbox_m->insert_message_mailbox($datapesan);
		
		$from_name = "Ask@onlineshop.com";
		$from_email = "Ask@onlineshop.com";
		
		$data_email = array(
						"from"=>$from_email,
						"name"=>$from_name,
						"to"=>$receiver_email,
						"subject"=>$judul_message,
						"message"=>$isi_message,
					);
	
		
		//$this->send_email($data_email);
		
		$this->session->set_flashdata("message", "Berhasil Dikirim !");
		redirect('admin/mailbox/create_message/');
		
	}
}
