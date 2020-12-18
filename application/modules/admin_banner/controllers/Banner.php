<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Banner_m');		
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_banner = $this->Banner_m->get_all_banner();
		$data["list_all_banner"] = $list_all_banner;
		
		$header->header_view();
		$this->load->view('List_banner_v', $data);
		$footer->footer_view();
	}
	
	public function add_banner()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$header->header_view();
		$this->load->view('Add_banner_v', $data);
		$footer->footer_view();
	}
	
	public function add_banner_action()
	{
		$kode_banner = $this->input->post('kode_banner');
		$keterangan_banner = $this->input->post('keterangan_banner');
		$link_banner = $this->input->post('link_banner');
		$status_banner = $this->input->post('status_banner');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Banner');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/banner/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('gambar_banner'))
		{
			$this->session->set_flashdata("message", "Gagal Upload Images !");
			redirect('admin/banner/add_banner/');
		}
		
		$gambar_banner = array("upload_data" => $this->upload->data());
		if(!empty($gambar_banner["upload_data"]["file_name"]))
		{
			$data_banner = array(
							"kode_banner"=>$kode_banner,
							"keterangan_banner"=>$keterangan_banner,
							"link_banner"=>$link_banner,
							"status_banner"=>$status_banner,
							'date_banner' =>  date('d-m-Y H:i:s'),
							'gambar_banner' => $gambar_banner["upload_data"]["file_name"],
						);
					
			$insertbanner = $this->Banner_m->insert_banner($data_banner);
			if($insertbanner)
			{
				redirect('admin/banner/');
			}
		}
	}
	
	public function edit_banner($id_banner)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_banner = $this->Banner_m->get_banner_by_id($id_banner);
		if($data_banner == null)
			redirect("not found");
		
		$data["data_banner"] = $data_banner;
		
		$header->header_view();
		$this->load->view('Edit_banner_v', $data);
		$footer->footer_view();
	}
	
	public function edit_banner_action()
	{
		$id_banner = $this->input->post('id_banner');
		$kode_banner = $this->input->post('kode_banner');
		$keterangan_banner = $this->input->post('keterangan_banner');
		$link_banner = $this->input->post('link_banner');
		$status_banner = $this->input->post('status_banner');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Banner');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/banner/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!empty($_FILES["gambar_banner"]["name"]))
		{
			if(!$this->upload->do_upload('gambar_banner'))
			{
				$this->session->set_flashdata("message", "Gagal Upload Images !");
				redirect('admin/banner/edit_banner/'.$id_banner);
			}else
			{
				$this->upload->do_upload('gambar_banner');
			}
		}
		
		$gambar_banner = array("upload_data" => $this->upload->data());
		if(!empty($gambar_banner["upload_data"]["file_name"]))
		{
			$data_banner = array(
							"id_banner"=>$id_banner,
							"kode_banner"=>$kode_banner,
							"keterangan_banner"=>$keterangan_banner,
							"link_banner"=>$link_banner,
							"status_banner"=>$status_banner,
							'gambar_banner' => $gambar_banner["upload_data"]["file_name"]
						);
						
			$updatebanner = $this->Banner_m->update_banner($data_banner);
			if($updatebanner)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/banner/edit_banner/'.$id_banner);
			}
		}else
		{
			$data_banner = array(
							"id_banner"=>$id_banner,
							"kode_banner"=>$kode_banner,
							"keterangan_banner"=>$keterangan_banner,
							"link_banner"=>$link_banner,
							"status_banner"=>$status_banner,
						);
					
			$updatebanner = $this->Banner_m->update_banner($data_banner);
			if($updatebanner)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/banner/edit_banner/'.$id_banner);
			}
		}
	}
	
	public function delete_banner($id_banner)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_banner = $this->Banner_m->get_banner_by_id($id_banner);
		if($data_banner == null)
			redirect("not found");
		
		$data["data_banner"] = $data_banner;
		
		$header->header_view();
		$this->load->view('Delete_banner_v', $data);
		$footer->footer_view();
	}
	
	public function delete_banner_action()
	{
		$id_banner = $this->input->post('id_banner');
		
		$datas = array(
						'id_banner' => $id_banner,
					);
					
		$deletebanner = $this->Banner_m->delete_banner($datas);
		if($deletebanner)
		{
			redirect('admin/banner/');
		}
	}
	
	public function get_active_banner()
	{
		$list_active_banner = $this->Banner_m->get_active_banner();
		return $list_active_banner;
	}
}
