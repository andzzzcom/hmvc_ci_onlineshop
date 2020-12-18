<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Slider_m');		
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_slider = $this->Slider_m->get_all_slider();
		$data["list_all_slider"] = $list_all_slider;
		
		$header->header_view();
		$this->load->view('List_slider_v', $data);
		$footer->footer_view();
	}
	
	public function add_slider()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$header->header_view();
		$this->load->view('Add_slider_v', $data);
		$footer->footer_view();
	}
	
	public function add_slider_action()
	{
		$slider_kode = $this->input->post('slider_kode');
		$slider_title = $this->input->post('slider_title');
		$slider_subtitle = $this->input->post('slider_subtitle');
		$slider_keterangan = $this->input->post('slider_keterangan');
		$slider_link = $this->input->post('slider_link');
		$slider_status = $this->input->post('slider_status');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Slider');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/slider/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('slider_image'))
		{
			$this->session->set_flashdata("message", "Gagal Upload Images !");
			redirect('admin/slider/add_slider/');
		}
		
		$slider_image = array("upload_data" => $this->upload->data());
		if(!empty($slider_image["upload_data"]["file_name"]))
		{
			$data_slider = array(
							"kode_slider"=>$slider_kode,
							"title_slider"=>$slider_title,
							"subtitle_slider"=>$slider_subtitle,
							"keterangan_slider"=>$slider_keterangan,
							"link_slider"=>$slider_link,
							"status_slider"=>$slider_status,
							'gambar_slider' => $slider_image["upload_data"]["file_name"],
							'date_slider' =>  date('d-m-Y H:i:s'),
						);
					
			$insertslider = $this->Slider_m->insert_slider($data_slider);
			if($insertslider)
			{
				redirect('admin/slider/');
			}
		}	
	}
	
	public function edit_slider($idslider)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_slider = $this->Slider_m->get_slider_by_id($idslider);
		if($data_slider == null)
			redirect("not found");
		
		$data["data_slider"] = $data_slider;
		
		$header->header_view();
		$this->load->view('Edit_slider_v', $data);
		$footer->footer_view();
	}
	
	public function edit_slider_action()
	{
		$id_slider = $this->input->post('id_slider');
		$slider_kode = $this->input->post('slider_kode');
		$slider_title = $this->input->post('slider_title');
		$slider_subtitle = $this->input->post('slider_subtitle');
		$slider_keterangan = $this->input->post('slider_keterangan');
		$slider_link = $this->input->post('slider_link');
		$slider_status = $this->input->post('slider_status');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Slider');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/slider/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!empty($_FILES["slider_image"]["name"]))
		{
			if(!$this->upload->do_upload('slider_image'))
			{
				$this->session->set_flashdata("message", "Gagal Upload Images !");
				redirect('admin/slider/edit_slider/'.$id_slider);
			}else
			{
				$this->upload->do_upload('slider_image');
			}
		}
		
		$slider_image = array("upload_data" => $this->upload->data());
		if(!empty($slider_image["upload_data"]["file_name"]))
		{
			$data_slider = array(
							"id_slider"=>$id_slider,
							"kode_slider"=>$slider_kode,
							"title_slider"=>$slider_title,
							"subtitle_slider"=>$slider_subtitle,
							"keterangan_slider"=>$slider_keterangan,
							"link_slider"=>$slider_link,
							"status_slider"=>$slider_status,
							'gambar_slider' => $slider_image["upload_data"]["file_name"]
						);
						
			$updateslider = $this->Slider_m->update_slider($data_slider);
			if($updateslider)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/slider/edit_slider/'.$id_slider);
			}
		}else
		{
			$data_slider = array(
							"id_slider"=>$id_slider,
							"kode_slider"=>$slider_kode,
							"title_slider"=>$slider_title,
							"subtitle_slider"=>$slider_subtitle,
							"keterangan_slider"=>$slider_keterangan,
							"link_slider"=>$slider_link,
							"status_slider"=>$slider_status,
						);
					
			$updateslider = $this->Slider_m->update_slider($data_slider);
			if($updateslider)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/slider/edit_slider/'.$id_slider);
			}
		}
	}
	
	public function delete_slider($id_slider)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_slider = $this->Slider_m->get_slider_by_id($id_slider);
		if($data_slider == null)
			redirect("not found");
		
		$data["data_slider"] = $data_slider;
		
		$header->header_view();
		$this->load->view('Delete_slider_v', $data);
		$footer->footer_view();
	}
	
	public function delete_slider_action()
	{
		$id_slider = $this->input->post('id_slider');
		
		$datas = array(
						'id_slider' => $id_slider,
					);
					
		$deleteslider = $this->Slider_m->delete_slider($datas);
		if($deleteslider)
		{
			redirect('admin/slider/');
		}
	}
}
