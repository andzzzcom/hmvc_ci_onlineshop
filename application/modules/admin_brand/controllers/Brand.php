<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Brand_m');
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_brand = $this->Brand_m->get_all_brand();
		$data["list_all_brand"] = $list_all_brand;
		
		$header->header_view();
		$this->load->view('List_brand_v', $data);
		$footer->footer_view();
	}
	
	public function edit_brand($idbrand)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_brand = $this->Brand_m->get_brand_by_id($idbrand);
		if($data_brand == null)
			redirect("not_found");
		
		$data["data_brand"] = $data_brand;
		
		$header->header_view();
		$this->load->view('Edit_brand_v', $data);
		$footer->footer_view();
	}
	
	public function edit_brand_action()
	{
		$id_brand = $this->input->post('id_brand');
		$brand_logo = $this->input->post('brand_logo');
		$brand_name = $this->input->post('brand_name');
		
		$data_brand = array(
						"id_brand"=>$id_brand,
						"name_brand"=>$brand_name
					);
					
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Brand');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/brand/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!empty($_FILES["brand_logo"]["name"]))
		{
			if(!$this->upload->do_upload('brand_logo'))
			{
				$this->session->set_flashdata("message", "Gagal Upload Images !");
				redirect('admin/brand/edit_brand/'.$id_brand);
			}else
			{
				$this->upload->do_upload('brand_logo');
			}
		}
		
		$brand_logo = array("upload_data" => $this->upload->data());
		if(!empty($brand_logo["upload_data"]["file_name"]))
		{
			$datas = array(
						'id_brand' => $id_brand,
						'name_brand' => $brand_name,
						'logo_brand' => $brand_logo["upload_data"]["file_name"]
					);
					
			$updatebrand = $this->Brand_m->update_brand($datas);
			if($updatebrand)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/brand/edit_brand/'.$id_brand);
			}
		}else
		{
			$datas = array(
						'id_brand' => $id_brand,
						'name_brand' => $brand_name,
					);
					
			$updatebrand = $this->Brand_m->update_brand($datas);
			if($updatebrand)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/brand/edit_brand/'.$id_brand);
			}
		}
	}
	
	public function add_brand()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$header->header_view();
		$this->load->view('Add_brand_v', $data);
		$footer->footer_view();
	}
	
	public function add_brand_action()
	{
		$brand_name = $this->input->post('brand_name');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Brand');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/brand/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('brand_logo'))
		{
			$this->session->set_flashdata("message", "Gagal Upload Images !");
			redirect('admin/brand/add_brand/');
		}
		
		$brand_logo = array("upload_data" => $this->upload->data());
		if(!empty($brand_logo["upload_data"]["file_name"]))
		{
			$datas = array(
						'logo_brand' => $brand_logo["upload_data"]["file_name"],
						'name_brand' => $brand_name,
					);
					
			$insertbrand = $this->Brand_m->insert_brand($datas);
			if($insertbrand)
			{
				redirect('admin/brand/');
			}
		}
	
	}
	
	public function delete_brand($id_brand)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_brand = $this->Brand_m->get_brand_by_id($id_brand);
		if($data_brand == null)
			redirect("not_found");
		
		$data["data_brand"] = $data_brand;
		
		$header->header_view();
		$this->load->view('Delete_brand_v', $data);
		$footer->footer_view();
	}
	
	public function delete_brand_action()
	{
		$id_brand = $this->input->post('id_brand');
		
		$datas = array(
						'id_brand' => $id_brand,
					);
					
		$deletebrand = $this->Brand_m->delete_brand($datas);
		if($deletebrand)
		{
			redirect('admin/brand/');
		}
	}
}
