<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Inbox_m');
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_inbox = $this->Inbox_m->get_all_inbox();
		$data["list_all_inbox"] = $list_all_inbox;
		
		$header->header_view();
		$this->load->view('List_message_v', $data);
		$footer->footer_view();
		
	}
	
	public function detail_message($id_message)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_pesan = $this->Inbox_m->get_message_by_id($id_message);
		if($data_pesan == null)
			redirect("not_found");
		
		$data["data_pesan"] = $data_pesan;
		
		$header->header_view();
		$this->load->view('detail_message_v', $data);
		$footer->footer_view();
	}
	
	public function delete_message($id_message)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_pesan = $this->Inbox_m->get_message_by_id($id_message);
		if($data_pesan == null)
			redirect("not_found");
		
		$data["data_pesan"] = $data_pesan;
		
		$header->header_view();
		$this->load->view('delete_message_v', $data);
		$footer->footer_view();
	}
	
	public function delete_message_action()
	{
		$message_id = $this->input->post('message_id');
		
		$datas = array(
						'id_inbox_message' => $message_id,
					);
					
		$deletemessage = $this->Inbox_m->delete_inbox_message($datas);
		if($deletemessage)
		{
			redirect('admin/inbox/');
		}
	}
	
	public function create_message()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$header->header_view();
		$this->load->view('Send_message_v', $data);
		$footer->footer_view();
	}
	
	public function create_message_action()
	{
		$receiver_email = $this->input->post('receiver_email');
		$judul_message = $this->input->post('judul_message');
		$isi_message = $this->input->post('isi_message');
	
		$from_name = "Ask@onlineshop.com";
		$from_email = "Ask@onlineshop.com";
		
		$data_email = array(
						"from"=>$from_email,
						"name"=>$from_name,
						"to"=>$receiver_email,
						"subject"=>$judul_message,
						"message"=>$isi_message,
					);
	
		$this->send_email($data_email);
		
		$this->session->set_flashdata("message", "Berhasil Dikirim !");
		redirect('admin/inbox/create_message/');
		
	}
	
	public function tes()
	{
		$data_register = array(
							"emailtujuan"=>"andreashermawan1993@gmail.com",
							"customername"=>"joko",
							"emailcustomer"=>"email@cusomer.nettt",
							"passwordcustomer"=>"password",
						);
		
		$data_forgot_password = array(
									"emailtujuan"=>"andreashermawan1993@gmail.com",
									"customername"=>"joko",
									"emailcustomer"=>"email@cusomer.nettt",
									"passwordcustomer"=>"password",
								);
							
		
		$data_finish_transaksi = array(
									"emailtujuan"=>"andreashermawan1993@gmail.com",
									"customername"=>"joko",
									"invoicecode"=>"INV/2017/08/9/6481",
									"detailtransaksi"=>"detailnya",
									"linkkonfirmasi"=>"htp://link konfirmasi",
								);
							
		
		$data_finish_confirmation = array(
										"emailtujuan"=>"andreashermawan1993@gmail.com",
										"customername"=>"joko",
										"invoicecode"=>"inv-21312-asds-213213",
									);
							
		
		$data_update_status = array(
								"emailtujuan"=>"andreashermawan1993@gmail.com",
								"customername"=>"joko",
								"invoicecode"=>"inv-21312-asds-213213",
								"statustransaksi"=>"paid",
							);
				
		$this->mail_register($data_register);
		echo"<br>";
		echo"<br>";
		$this->mail_forgot_password($data_forgot_password);
		echo"<br>";
		echo"<br>";
		$this->mail_finish_transaksi($data_finish_transaksi);
		echo"<br>";
		echo"<br>";
		$this->mail_finish_konfirmasi($data_finish_confirmation);
		echo"<br>";
		echo"<br>";
		$this->mail_update_status($data_update_status);
	}
	
}
