<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_m');
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_kategori = $this->Category_m->get_all_kategori();
		$data["list_all_kategori"] = $list_all_kategori;
		
		$header->header_view();
		$this->load->view('List_category_v', $data);
		$footer->footer_view();
	}
	
	public function add_category()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$header->header_view();
		$this->load->view('Add_category_v', $data);
		$footer->footer_view();
	}
	
	public function add_category_action()
	{
		$category_name = $this->input->post('category_name');
		$category_status = $this->input->post('category_status');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Category');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/kategori/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('category_icon'))
		{
			$this->session->set_flashdata("message", "Gagal Upload Images !");
			redirect('admin/category/add_category/');
		}
		
		$category_icon = array("upload_data" => $this->upload->data());
		if(!empty($category_icon["upload_data"]["file_name"]))
		{
			$datas = array(
						'name_kategori' => $category_name,
						'status_kategori' => $category_status,
						'icon_kategori' => $category_icon["upload_data"]["file_name"]
					);
					
			
			$insertkategori = $this->Category_m->insert_kategori($datas);
			if($insertkategori)
			{
				redirect('admin/category/');
			}
		}
	}
	
	public function edit_category($id_kategori)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_kategori = $this->Category_m->get_kategori_by_id($id_kategori);
		if($data_kategori == null)
			redirect("not_found");
		
		$data["data_kategori"] = $data_kategori;
		
		$header->header_view();
		$this->load->view('Edit_category_v', $data);
		$footer->footer_view();
	}
	
	public function edit_category_action()
	{
		$category_id = $this->input->post('category_id');
		$category_name = $this->input->post('category_name');
		$category_status = $this->input->post('category_status');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Category');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/kategori/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!empty($_FILES["category_icon"]["name"]))
		{
			if(!$this->upload->do_upload('category_icon'))
			{
				$this->session->set_flashdata("message", "Gagal Upload Images !");
				redirect('admin/category/edit_category/'.$category_id);
			}else
			{
				$this->upload->do_upload('category_icon');
			}
		}
		
		$category_icon = array("upload_data" => $this->upload->data());
		if(!empty($category_icon["upload_data"]["file_name"]))
		{
			$datas = array(
						'id_kategori' => $category_id,
						'name_kategori' => $category_name,
						'status_kategori' => $category_status,
						'icon_kategori' => $category_icon["upload_data"]["file_name"]
					);
					
			
			$updatecategory = $this->Category_m->update_category($datas);
			if($updatecategory)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/category/edit_category/'.$category_id);
			}
		}else
		{
			$datas = array(
						'id_kategori' => $category_id,
						'name_kategori' => $category_name,
						'status_kategori' => $category_status,
					);
					
			
			$updatecategory = $this->Category_m->update_category($datas);
			if($updatecategory)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/category/edit_category/'.$category_id);
			}
		}
	}
	
	public function delete_category($id_kategori)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_kategori = $this->Category_m->get_kategori_by_id($id_kategori);
		if($data_kategori == null)
			redirect("not_found");
		
		$data["data_kategori"] = $data_kategori;
		
		$header->header_view();
		$this->load->view('Delete_category_v', $data);
		$footer->footer_view();
	}
	
	public function delete_category_action()
	{
		$category_id = $this->input->post('category_id');
		
		$datas = array(
						'id_kategori' => $category_id,
					);
					
		$deletesubcategory = $this->Category_m->delete_category($datas);
		if($deletesubcategory)
		{
			redirect('admin/category/');
		}
	}
	
	public function list_subcategory($id_kategori)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_subkategori = $this->Category_m->get_subkategori_by_id_kategori($id_kategori);
		$data["list_all_subkategori"] = $list_all_subkategori;
		
		$kategori = $this->Category_m->get_kategori_by_id($id_kategori);
		$data["kategori"] = $kategori;
		
		$header->header_view();
		$this->load->view('List_sub_category_v', $data);
		$footer->footer_view();
	}
	
	public function add_subcategory($id_category)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$kategori = $this->Category_m->get_kategori_by_id($id_category);
		$data["kategori"] = $kategori;
		
		$header->header_view();
		$this->load->view('Add_sub_category_v', $data);
		$footer->footer_view();
	}
	
	public function add_subcategory_action()
	{
		$category_id = $this->input->post('category_id');
		
		$subcategory_name = $this->input->post('subcategory_name');
		$subcategory_status = $this->input->post('subcategory_status');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Subcategory');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/kategori/subkategori/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('subcategory_icon'))
		{
			$this->session->set_flashdata("message", "Gagal Upload Images !");
			redirect('admin/category/add_subcategory/'.$category_id);
		}
		
		$subcategory_icon = array("upload_data" => $this->upload->data());
		if(!empty($subcategory_icon["upload_data"]["file_name"]))
		{
			$datas = array(
						'id_kategori' => $category_id,
						'name_sub_kategori' => $subcategory_name,
						'status_sub_kategori' => $subcategory_status,
						'icon_sub_kategori' => $subcategory_icon["upload_data"]["file_name"]
					);
					
			
			$insertsubkategori = $this->Category_m->insert_subkategori($datas);
			if($insertsubkategori)
			{
				redirect('admin/category/list_subcategory/'.$category_id);
			}
		}
	}
	
	public function edit_subcategory($id_kategori, $id_subkategori)
	{		
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_kategori = $this->Category_m->get_kategori_by_id($id_kategori);		
		$data["data_kategori"] = $data_kategori;
		
		$data_subkategori = $this->Category_m->get_subkategori_by_id($id_subkategori);
		$data["data_subkategori"] = $data_subkategori;
		
		if($data_kategori == null || $data_subkategori == null)
			redirect("not_found");
		
		$header->header_view();
		$this->load->view('Edit_sub_category_v', $data);
		$footer->footer_view();
	}
	
	public function edit_subcategory_action()
	{
		$category_id = $this->input->post('category_id');
		$subcategory_id = $this->input->post('subcategory_id');
		
		$subcategory_name = $this->input->post('subcategory_name');
		$subcategory_status = $this->input->post('subcategory_status');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Subcategory');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/kategori/subkategori/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!empty($_FILES["subcategory_icon"]["name"]))
		{
			if(!$this->upload->do_upload('subcategory_icon'))
			{
				$this->session->set_flashdata("message", "Gagal Upload Images !");
				redirect('admin/category/edit_subcategory/'.$category_id.'/'.$subcategory_id);
			}else
			{
				$this->upload->do_upload('subcategory_icon');
			}
		}
		
		$subcategory_icon = array("upload_data" => $this->upload->data());
		if(!empty($subcategory_icon["upload_data"]["file_name"]))
		{
			$datas = array(
						'id_kategori' => $category_id,
						'id_sub_kategori' => $subcategory_id,
						'name_sub_kategori' => $subcategory_name,
						'status_sub_kategori' => $subcategory_status,
						'icon_sub_kategori' => $subcategory_icon["upload_data"]["file_name"]
					);
					
			
			$updatesubcategory = $this->Category_m->update_subcategory($datas);
			if($updatesubcategory)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/category/edit_subcategory/'.$category_id.'/'.$subcategory_id);
			}
		}else
		{
			$datas = array(
						'id_kategori' => $category_id,
						'id_sub_kategori' => $subcategory_id,
						'name_sub_kategori' => $subcategory_name,
						'status_sub_kategori' => $subcategory_status,
					);
			$updatesubcategory = $this->Category_m->update_subcategory($datas);
			if($updatesubcategory)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/category/edit_subcategory/'.$category_id.'/'.$subcategory_id);
			}
		}
	}
	
	public function delete_subcategory($id_kategori, $id_subkategori)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_kategori = $this->Category_m->get_kategori_by_id($id_kategori);
		$data["data_kategori"] = $data_kategori;
		
		$data_subkategori = $this->Category_m->get_subkategori_by_id($id_subkategori);
		$data["data_subkategori"] = $data_subkategori;
		
		if($data_kategori == null || $data_subkategori == null)
			redirect("not_found");
		
		$header->header_view();
		$this->load->view('Delete_sub_category_v', $data);
		$footer->footer_view();
	}
	
	public function delete_subcategory_action()
	{
		$category_id = $this->input->post('category_id');
		$subcategory_id = $this->input->post('subcategory_id');
		
		$datas = array(
						'id_kategori' => $category_id,
						'id_sub_kategori' => $subcategory_id,
					);
					
		$deletesubcategory = $this->Category_m->delete_subcategory($datas);
		if($deletesubcategory)
		{
			redirect('admin/category/list_subcategory/'.$category_id);
		}
	}
	
	public function get_n_total_category()
	{
		$total = sizeof($this->Category_m->get_all_kategori());
		return $total;
	}
	
	public function get_all_category()
	{
		$list_all_kategori = $this->Category_m->get_active_kategori();
		return $list_all_kategori;
	}
}
