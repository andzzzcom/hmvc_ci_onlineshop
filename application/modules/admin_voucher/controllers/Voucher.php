<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Voucher_m');
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_voucher = $this->Voucher_m->get_all_voucher();
		$data["list_all_voucher"] = $list_all_voucher;
		
		$header->header_view();
		$this->load->view('List_voucher_v', $data);
		$footer->footer_view();
	}
	
	public function add_voucher()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$header->header_view();
		$this->load->view('Add_voucher_v', $data);
		$footer->footer_view();
	}
	
	public function add_voucher_action()
	{
		$timeedit="";
		$datenya = $this->input->post('datenya');
		$timenya = $this->input->post('timenya');
		if(explode(" ", $timenya)[1] == "PM") 
			$timeedit = (explode(":", explode(" ", $timenya)[0])[0]+12).":".explode(":", explode(" ", $timenya)[0])[1];
		else 
			$timeedit = (explode(":", explode(" ", $timenya)[0])[0]).":".explode(":", explode(" ", $timenya)[0])[1];
		
		$voucher_expire_date = $datenya." ".$timeedit.":00";
		
		$voucher_code = $this->input->post('voucher_code');
		$voucher_type = $this->input->post('voucher_type');
		$voucher_description = $this->input->post('voucher_description');
		$voucher_value = $this->input->post('voucher_value');
		$voucher_status = $this->input->post('voucher_status');
		
		$datas = array(
					'voucher_code' => $voucher_code,
					'voucher_type' => $voucher_type,
					'voucher_description' => $voucher_description,
					'voucher_expire_date' => $voucher_expire_date,
					'voucher_value' => $voucher_value,
					'voucher_status' => $voucher_status,
				);
				
		$insertvoucher = $this->Voucher_m->insert_voucher($datas);
		if($insertvoucher)
		{
			redirect('admin/voucher/');
		}
	}
	
	public function edit_voucher($id_voucher)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_voucher = $this->Voucher_m->get_voucher_by_id($id_voucher);
		if($data_voucher == null)
			redirect("not_found");
		
		$data["data_voucher"] = $data_voucher;
		
		$header->header_view();
		$this->load->view('Edit_voucher_v', $data);
		$footer->footer_view();
	}
	
	public function edit_voucher_action()
	{
		$timeedit="";
		$datenya = $this->input->post('datenya');
		$timenya = $this->input->post('timenya');
		if(explode(" ", $timenya)[1] == "PM") 
			$timeedit = (explode(":", explode(" ", $timenya)[0])[0]+12).":".explode(":", explode(" ", $timenya)[0])[1];
		else 
			$timeedit = (explode(":", explode(" ", $timenya)[0])[0]).":".explode(":", explode(" ", $timenya)[0])[1];
		
		$voucher_expire_date = $datenya." ".$timeedit.":00";
		
		$id_voucher = $this->input->post('id_voucher');
		$voucher_code = $this->input->post('voucher_code');
		$voucher_type = $this->input->post('voucher_type');
		$voucher_description = $this->input->post('voucher_description');
		$voucher_value = $this->input->post('voucher_value');
		$voucher_status = $this->input->post('voucher_status');
		
		$datas = array(
					'id_voucher' => $id_voucher,
					'voucher_code' => $voucher_code,
					'voucher_type' => $voucher_type,
					'voucher_description' => $voucher_description,
					'voucher_expire_date' => $voucher_expire_date,
					'voucher_status' => $voucher_status,
					'voucher_value' => $voucher_value,
				);
				
		$updatevoucher = $this->Voucher_m->update_voucher($datas);
		if($updatevoucher)
		{
			$this->session->set_flashdata("message", "Berhasil Update !");
			redirect('admin/voucher/edit_voucher/'.$id_voucher);
		}
	}
	
	public function delete_voucher($id_voucher)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
				
		$data_voucher = $this->Voucher_m->get_voucher_by_id($id_voucher);
		if($data_voucher == null)
			redirect("not_found");
		
		$data["data_voucher"] = $data_voucher;
		
		$header->header_view();
		$this->load->view('Delete_voucher_v', $data);
		$footer->footer_view();
	}
	
	
	public function delete_voucher_action($id_voucher)
	{
		$id_voucher = $this->input->post('id_voucher');
		
		$datas = array(
						'id_voucher' => $id_voucher,
					);
					
		$deletevoucher = $this->Voucher_m->delete_voucher($datas);
		if($deletevoucher)
		{
			redirect('admin/voucher/');
		}
	}
}
