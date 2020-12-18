<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courier extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Courier_m');
		$this->load->model('Settings_m');
	}
	
	public function courier_settings()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_courier = $this->Courier_m->get_courier();
		$data["list_courier"] = $list_courier;
		
		$header->header_view();
		$this->load->view('List_courier_v', $data);
		$footer->footer_view();
	}
	
	public function edit_courier($id_courier)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_courier = $this->Courier_m->get_courier();
		$data["list_courier"] = $list_courier;
		
		$data_courier = array("id_kurir"=>$id_courier);
		$data_kurir = $this->Courier_m->get_detail_courier($data_courier);
		$data["data_kurir"] = $data_kurir;
		
		$header->header_view();
		$this->load->view('Edit_courier_v', $data);
		$footer->footer_view();
	}
		
	public function edit_courier_action()
	{
		$id_kurir = $this->input->post('id_kurir');
		$name_kurir = $this->input->post('name_kurir');
		$code_kurir = $this->input->post('code_kurir');
		$status_kurir = $this->input->post('status_kurir');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Courier');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/courier/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('logo_kurir'))
		{
			$data_kurir = array(
							"id_kurir"=>$id_kurir,
							"name_kurir"=>$name_kurir,
							"code_kurir"=>$code_kurir,
							"status_kurir"=>$status_kurir,
						);
		}else
		{
			$logo_kurir = array("upload_data" => $this->upload->data());
			if(!empty($logo_kurir["upload_data"]["file_name"]))
			{
				$data_kurir = array(
								"id_kurir"=>$id_kurir,
								"name_kurir"=>$name_kurir,
								"code_kurir"=>$code_kurir,
								'logo_kurir' => $logo_kurir["upload_data"]["file_name"],
								"status_kurir"=>$status_kurir,
							);
			}
		}
		$update_kurir = $this->Courier_m->update_kurir($data_kurir);
		if($update_kurir)
		{
			redirect('admin/settings/edit_courier/'.$id_kurir);
		}
		
	}
}
