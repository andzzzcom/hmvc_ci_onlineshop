<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Page_m');
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
				
		$list_all_page = $this->Page_m->get_all_page();
		$data["list_all_page"] = $list_all_page;
		
		$header->header_view();
		$this->load->view('List_page_v', $data);
		$footer->footer_view();
	}
	
	public function create_page()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$header->header_view();
		$this->load->view('Create_page_v', $data);
		$footer->footer_view();
	}
	
	public function create_page_action()
	{
		$kode_page = $this->input->post('kode_page');
		$title_page = $this->input->post('title_page');
		$subtitle_page = $this->input->post('subtitle_page');
		$content_page = $this->input->post('content_page');
		$status_page = $this->input->post('status_page');
	
		$data_page = array(
						"kode_page"=>$kode_page,
						"title_page"=>$title_page,
						"sub_title_page"=>$subtitle_page,
						"content_page"=>$content_page,
						"status_page"=>$status_page,
					);
	
		$this->Page_m->insert_page($data_page);
		
		$this->session->set_flashdata("message", "Page Berhasil Dibuat !");
		redirect('admin/page/');
		
	}
	
	public function edit_page($id_page)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_page = $this->Page_m->get_page_by_id($id_page);
		if($data_page == null)
			redirect("not_found");
		
		$data["data_page"] = $data_page;
		
		$header->header_view();
		$this->load->view('Edit_page_v', $data);
		$footer->footer_view();
	}
	
	public function edit_page_action()
	{
		$id_page = $this->input->post('id_page');
		$kode_page = $this->input->post('kode_page');
		$title_page = $this->input->post('title_page');
		$subtitle_page = $this->input->post('subtitle_page');
		$content_page = $this->input->post('content_page');
		$status_page = $this->input->post('status_page');
	
		$data_page = array(
						"id_page"=>$id_page,
						"kode_page"=>$kode_page,
						"title_page"=>$title_page,
						"sub_title_page"=>$subtitle_page,
						"content_page"=>$content_page,
						"status_page"=>$status_page,
					);
	
		$this->Page_m->update_page($data_page);
		
		$this->session->set_flashdata("message", "Page Berhasil Diupdate !");
		redirect('admin/page/edit_page/'.$id_page);
	}
	
	public function delete_page($id_page)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
				
		$data_page = $this->Page_m->get_page_by_id($id_page);
		if($data_page == null)
			redirect("not_found");
		
		$data["data_page"] = $data_page;
		
		$header->header_view();
		$this->load->view('Delete_page_v', $data);
		$footer->footer_view();
	}
	
	public function delete_page_action()
	{
		$id_page = $this->input->post('id_page');
		
		$datas = array(
						'id_page' => $id_page,
					);
					
		$delete_page = $this->Page_m->delete_page($datas);
		if($delete_page)
		{
			redirect('admin/page/');
		}
	}
}
