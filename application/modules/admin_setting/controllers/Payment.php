<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Payment_m');
		$this->load->model('Settings_m');
	}
	
	public function payment_settings()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_payment = $this->Payment_m->get_payment();
		$data["list_payment"] = $list_payment;
		
		$header->header_view();
		$this->load->view('List_payment_v', $data);
		$footer->footer_view();
	}
	
	public function edit_payment($id_payment)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_payment = $this->Payment_m->get_payment();
		$data["list_payment"] = $list_payment;
		
		$data_payment = array("id_payment"=>$id_payment);
		$data_payment = $this->Payment_m->get_detail_payment($data_payment);
		$data["data_payment"] = $data_payment;
		
		$header->header_view();
		$this->load->view('Edit_payment_v', $data);
		$footer->footer_view();
	}
		
	public function edit_payment_action()
	{
		$id_payment = $this->input->post('id_payment');
		$name_payment = $this->input->post('name_payment');
		$status_payment = $this->input->post('status_payment');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Payment');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/payment/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('logo_payment'))
		{
			$data_payment = array(
							"id_payment"=>$id_payment,
							"name_payment"=>$name_payment,
							"status_payment"=>$status_payment,
						);
		}else
		{
			$logo_payment = array("upload_data" => $this->upload->data());
			if(!empty($logo_payment["upload_data"]["file_name"]))
			{
				$data_payment = array(
								"id_payment"=>$id_payment,
								"name_payment"=>$name_payment,
								"status_payment"=>$status_payment,
								'logo_payment' => $logo_payment["upload_data"]["file_name"],
							);
			}
		}
		$update_payment = $this->Payment_m->update_payment($data_payment);
		if($update_payment)
		{
			redirect('admin/settings/edit_payment/'.$id_payment);
		}
		
	}
}
