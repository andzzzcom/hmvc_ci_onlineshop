<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Bank_m');		
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_bank = $this->Bank_m->get_all_bank();
		$data["list_all_bank"] = $list_all_bank;
		
		$header->header_view();
		$this->load->view('List_bank_v', $data);
		$footer->footer_view();
	}
	
	public function add_bank()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$header->header_view();
		$this->load->view('Add_bank_v', $data);
		$footer->footer_view();
	}
	
	public function add_bank_action()
	{
		$bank_name = $this->input->post('bank_name');
		$bank_place = $this->input->post('bank_place');
		$bank_owner_name = $this->input->post('bank_owner_name');
		$bank_number = $this->input->post('bank_number');
		$bank_status = $this->input->post('bank_status');
		
		$datas = array(
					'name_bank' => $bank_name,
					'place_bank' => $bank_place,
					'owner_bank' => $bank_owner_name,
					'status_bank' => $bank_status,
					'number_bank' => $bank_number,
					'logo_bank' => $bank_name.".jpg"
				);
				
		$insertbank = $this->Bank_m->insert_bank($datas);
		if($insertbank)
		{
			redirect('admin/bank/');
		}
	}
	
	public function edit_bank($id_bank)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_bank = $this->Bank_m->get_bank_by_id($id_bank);
		if($data_bank == null)
			redirect("not_found");
		
		$data["data_bank"] = $data_bank;
		
		$header->header_view();
		$this->load->view('Edit_bank_v', $data);
		$footer->footer_view();
	}
	
	public function edit_bank_action()
	{
		$bank_id = $this->input->post('bank_id');
		$bank_name = $this->input->post('bank_name');
		$bank_place = $this->input->post('bank_place');
		$bank_owner_name = $this->input->post('bank_owner_name');
		$bank_number = $this->input->post('bank_number');
		$bank_status = $this->input->post('bank_status');
		
		$datas = array(
					'id_bank' => $bank_id,
					'name_bank' => $bank_name,
					'place_bank' => $bank_place,
					'owner_bank' => $bank_owner_name,
					'status_bank' => $bank_status,
					'number_bank' => $bank_number,
					'logo_bank' => $bank_name.".jpg"
				);
				
		$updatebank = $this->Bank_m->update_bank($datas);
		if($updatebank)
		{
			$this->session->set_flashdata("message", "Berhasil Update !");
			redirect('admin/bank/edit_bank/'.$bank_id);
		}
	
	}
	
	public function delete_bank($id_bank)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_bank = $this->Bank_m->get_bank_by_id($id_bank);
		if($data_bank == null)
			redirect("not_found");
		
		$data["data_bank"] = $data_bank;
		
		$header->header_view();
		$this->load->view('Delete_bank_v', $data);
		$footer->footer_view();
	}
	
	
	public function delete_bank_action()
	{
		$bank_id = $this->input->post('bank_id');
		
		$datas = array(
						'id_bank' => $bank_id,
					);
					
		$deletebank = $this->Bank_m->delete_bank($datas);
		if($deletebank)
		{
			redirect('admin/bank/');
		}
	}
	
}
