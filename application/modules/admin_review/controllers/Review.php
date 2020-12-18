<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Review_m');		
	}

	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_review = $this->Review_m->get_all_review();
		$data["list_all_review"] = $list_all_review;
		
		$header->header_view();
		$this->load->view('List_review_v', $data);
		$footer->footer_view();
	}
	
	public function update_status_review()
	{
		$id_review = $this->input->post('id_review');
		$status_review = $this->input->post('status_review');
		$status="";
		
		if($status_review == "active")
			$status="not active";
		if($status_review == "not active")
			$status="active";
		
		$datas = array(
					'id_review' => $id_review,
					'status_review' => $status,
				);
				
		$updatestatus = $this->Review_m->update_status_review($datas);
		if($updatestatus)
		{
			echo"true";
		}
	}
	
	public function reply_review($id_review)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_review = $this->Review_m->get_review_by_id($id_review);
		if($data_review == null)
			redirect("not_found");
		
		$data["data_review"] = $data_review;
		
		$data_reply_review = $this->Review_m->get_reply_review_by_id($id_review);
		$data["data_reply_review"] = $data_reply_review;
		
		$header->header_view();
		$this->load->view('Reply_review_v', $data);
		$footer->footer_view();
	}
	
	public function reply_review_action()
	{
		$id_review = $this->input->post('id_review');
		
		$data_review = $this->Review_m->get_review_by_id($id_review);
		if($data_review == null)
			redirect("not_found");
		
		$reply_message = $this->input->post('reply_message');
		
		$data_id = array(
					'id_review' => $id_review,
				);
				
		$check_reply = $this->Review_m->check_reply_review($data_id);
		if($check_reply == null)
		{
			$datas = array(
					'id_review' => $id_review,
					'reply_message' => $reply_message,
					'date_reply_review' => date("d-m-Y H:i:s"),
				);
				
			$reply_review = $this->Review_m->insert_reply_review($datas);
			if($reply_review)
			{
				$this->session->set_flashdata("message", "Berhasil Menulis Reply Review !");
				redirect('admin/review/reply_review/'.$id_review);
			}
		}else
		{
			$datas = array(
					'id_reply_review' => $check_reply[0]->id_reply_review,
					'reply_message' => $reply_message,
					'date_reply_review' => date("d-m-Y H:i:s"),
				);
				
			$reply_review = $this->Review_m->update_reply_review($datas);
			if($reply_review)
			{
				$this->session->set_flashdata("message", "Berhasil Update Reply Review !");
				redirect('admin/review/reply_review/'.$id_review);
			}
		}
		
	}
}
