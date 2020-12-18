<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Settings_m');
	}
	
	public function upload_settings()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_settings = $this->Settings_m->get_settings_upload();
		$data["list_all_settings"] = $list_all_settings;
		
		$header->header_view();
		$this->load->view('Upload_settings_v', $data);
		$footer->footer_view();
	}
	
	public function upload_settings_action()
	{
		$idsettings = $this->input->post('id_settings_upload');
		$file_size = $this->input->post('file_size');
		$file_type = $this->input->post('file_type');
		
		$datas = array(
					'id_settings_upload' => $idsettings,
					'file_type' => $file_type,
					'file_size' => $file_size,
				);
				
		$updatesettings = $this->Settings_m->update_settings_upload($datas);
		if($updatesettings)
		{
			echo "true";
		}else
		{
			$settings = $this->Settings_m->get_settings_upload_by_id($idsettings);
			
			$file_size = $settings[0]->file_size;
			$file_type = $settings[0]->file_type;
			
			$result = array(
						array(
							"file_size" => $file_size,
							"file_type" => $file_type
						),
					);
			echo json_encode($result);
		}
	}
	
	public function general_settings()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_settings = $this->Settings_m->get_settings_general();
		$data["list_all_settings"] = $list_all_settings;
		
		$header->header_view();
		$this->load->view('General_settings_v', $data);
		$footer->footer_view();
	}
	
	public function general_settings_action()
	{
		$titleweb = $this->input->post('title_web');
		$subtitleweb = $this->input->post('subtitle_web');
		$titleadminpanel = $this->input->post('title_admin_panel');
		$titleadminpanelminimize = $this->input->post('title_admin_panel_minimize');
		$url_facebook = $this->input->post('url_facebook');
		$url_twitter = $this->input->post('url_twitter');
		$url_instagram = $this->input->post('url_instagram');
		$meta_title = $this->input->post('meta_title');
		$meta_description = $this->input->post('meta_description');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Settings');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/favicon/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		 
		
		if(!empty($_FILES["fav_icon"]["name"]))
		{
			if(!$this->upload->do_upload('fav_icon'))
			{
				$this->session->set_flashdata("message", "Gagal Upload Images !");
				redirect('admin/settings/general_settings/');
			}else
			{
				$this->upload->do_upload('fav_icon');
			}
		}
		
		$fav_icon = array("upload_data" => $this->upload->data());
		if(!empty($fav_icon["upload_data"]["file_name"]))
		{
			$datas = array(
						'fav_icon' => $fav_icon["upload_data"]["file_name"]
					);
					
			$updategeneralsettings = $this->Settings_m->update_general_settings($datas);
		}
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/logo/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if(!empty($_FILES["logo_web"]["name"]))
		{
			if(!$this->upload->do_upload('logo_web'))
			{
				$this->session->set_flashdata("message", "Gagal Upload Images !");
				redirect('admin/settings/general_settings/');
			}else
			{
				$this->upload->do_upload('logo_web');
			}
		}
		
		$logo_web = array("upload_data" => $this->upload->data());
		if(!empty($logo_web["upload_data"]["file_name"]))
		{
			$datas = array(
						'logo_web' => $logo_web["upload_data"]["file_name"]
					);
					
			$updategeneralsettings = $this->Settings_m->update_general_settings($datas);
		}
		
		$datas = array(
						'title_web' => $titleweb,
						'subtitle_web' => $subtitleweb,
						'title_admin_panel' => $titleadminpanel,
						'title_admin_panel_minimize' => $titleadminpanelminimize,
						'url_facebook' => $url_facebook,
						'url_twitter' => $url_twitter,
						'url_instagram' => $url_instagram,
						'meta_title' => $meta_title,
						'meta_description' => $meta_description,
					);
					
		$updategeneralsettings = $this->Settings_m->update_general_settings($datas);
		if($updategeneralsettings)
		{
			$this->session->set_flashdata("message", "Berhasil Update !");
			redirect('admin/settings/general_settings/');
		}
	}
	
	public function shipping_settings()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_shipping_settings = $this->Settings_m->get_shipping_settings();
		$data["list_shipping_settings"] = $list_shipping_settings;
		
		$id_provinsi = $list_shipping_settings[0]->id_provinsi;
		$id_kota_kabupaten = $list_shipping_settings[0]->id_kota_kabupaten;
		
		$data_provinsi = $this->Settings_m->get_all_province();
		$data["data_provinsi"] = $data_provinsi;
		
		$data_city = $this->Settings_m->get_city_by_id_province($id_provinsi);
		$data["data_city"] = $data_city;
		
		$data_district = $this->Settings_m->get_district_by_id_city($id_kota_kabupaten);
		$data["data_district"] = $data_district;
		
		$header->header_view();
		$this->load->view('Shipping_settings_v', $data);
		$footer->footer_view();
		
	}
	
	public function shipping_settings_action()
	{
		//$kurir = $this->input->post('kurir');
		$id_provinsi = $this->input->post('id_provinsi');
		$id_kota = $this->input->post('id_kota');
		$id_kecamatan = $this->input->post('id_kecamatan');
		$kodepos = $this->input->post('kodepos');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		
		$datas = array(
					//'courier_name' => $kurir,
					'id_provinsi' => $id_provinsi,
					'id_kota_kabupaten' => $id_kota,
					'id_kecamatan' => $id_kecamatan,
					'kode_pos' => $kodepos,
					'telepon' => $phone,
					'email' => $email,
				);
				
		$update_shipping_settings = $this->Settings_m->update_shipping_settings($datas);
		if($update_shipping_settings)
		{
			$this->session->set_flashdata("message", "Berhasil Update !");
			redirect('admin/settings/shipping_settings/');
		}
				
	}
}
