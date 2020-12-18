<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Order_u_m');
		$this->load->model('admin_confirmation/Confirmation_m');
	}
	
	public function index()
	{	
		//load header, sidebar and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		$sidebar = $this->loaded_module_user(0);
		
		$data = $this->settings();
		
		$id_user = $this->session->userdata("id_user");
		if(!isset($id_user))
			redirect("login");
		
		$data_user = $this->Order_u_m->get_user_by_id($id_user);
		$data["data_user"] = $data_user;
		
		$total_data_order = $this->Order_u_m->get_n_all_transaction($id_user);
		$data["total_data_order"] = $total_data_order;
		
		$per_page = 10;
		$url_segment = 3;
		$datas = array(
					"total_data_order"=>$total_data_order,
					"base_url"=>base_url()."profile/orders",
					"per_page"=>$per_page,
					"uri_segment"=>$url_segment,
				);
		$config = $this->pagination_settings($datas);
		$page = ($this->uri->segment($url_segment)) ? $this->uri->segment($url_segment) : 0;
		$data['pagination'] = $this->pagination->create_links();
		
		$data_order = $this->Order_u_m->get_all_transaction($id_user, $config["per_page"], $page);
		$data["data_order"] = $data_order;
				
		$header->header_view();
		$sidebar->sidebar_left_view('orders');
		$this->load->view('List_order_v', $data);
		$sidebar->sidebar_right_view();
		$footer->footer_view();
	}
	
	public function order_detail($invoice_code)
	{
		//load header, sidebar and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		$sidebar = $this->loaded_module_user(0);
		
		$data = $this->settings();
		
		$invoice_code = base64_decode($invoice_code);

		$id_user = $this->session->userdata("id_user");
		if(!isset($id_user))
			redirect("login");
		
		$data_user = $this->Order_u_m->get_user_by_id($id_user);
		$data["data_user"] = $data_user;
		$data["invoice_code"] = $invoice_code;
		
		
		$data_order = $this->Order_u_m->get_detail_transaction($invoice_code);
		if($data_order == null)
			redirect(base_url());
		
		$data["data_order"] = $data_order;
		
		$header->header_view();
		$sidebar->sidebar_left_view('orders');
		$this->load->view('Detail_order_v', $data);
		$sidebar->sidebar_right_view();
		$footer->footer_view();
	}
	
	public function confirmation($invoice_code)
	{
		//load header, sidebar and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		$sidebar = $this->loaded_module_user(0);
		
		$data = $this->settings();
		
		$id_user = $this->session->userdata("id_user");
		if(!isset($id_user))
			redirect("login");
		
		$data_user = $this->Order_u_m->get_user_by_id($id_user);
		$data["data_user"] = $data_user;
		
		$data_bank = $this->Order_u_m->get_all_bank();
		$data["data_bank"] = $data_bank;
		
		$data["invoice_code"] = base64_decode($invoice_code);
		$data_order = $this->Order_u_m->get_detail_transaction(base64_decode($invoice_code));
		if($data_order == null)
			redirect(base_url());
		
		$data_confirm = $this->Confirmation_m->check_link_confirmation(base64_decode($invoice_code));
		
		$check_link_confirmation = $this->Confirmation_m->check_link_confirmation(base64_decode($invoice_code));
		$data["check_link_confirmation"] = $check_link_confirmation;
		
		$header->header_view();
		$sidebar->sidebar_left_view('orders');
		$this->load->view('Payment_confirmation_v', $data);
		$sidebar->sidebar_right_view();
		$footer->footer_view();
	}
	
	public function confirmation_action()
	{
		$user_id = $this->session->userdata("id_user");
		if($user_id == null)
			redirect(base_url());
		
		$email_user = $this->session->userdata("email_user");
		$nama_user = $this->session->userdata("nama_user");
		$id_user = $this->input->post('id_user');
		$invoice_code = $this->input->post('invoice_code');
		$bank_shop = $this->input->post('bank_shop');
		$bank_name = $this->input->post('bank_name');
		$bank_owner_name = $this->input->post('bank_owner_name');
		$bank_number = $this->input->post('bank_number');
		$keterangan = $this->input->post('keterangan');
		
		$date_now = strtotime(date('d-m-Y H:i:s'));
		$date_expired = strtotime($this->Order_u_m->get_detail_transaction($invoice_code)[0]->date_expire_pesanan);
		if($date_now > $date_expired)
		{
			$this->session->set_flashdata("message_update", "Invoice Sudah Expired!");
			redirect('profile/orders');
		}
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('User');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/user/confirm/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		$this->upload->do_upload('bukti_transfer');
		
		$datas = "";
		$bukti_transfer = array("upload_data" => $this->upload->data());
		if(!empty($bukti_transfer["upload_data"]["file_name"]))
		{
			$datas = array(
							'id_user' => $user_id,
							'invoice_code' => $invoice_code,
							'bank_name' => $bank_shop,
							'bank_name_sender' => $bank_name,
							'bank_owner_name_sender' => $bank_owner_name,
							'bank_number_sender' => $bank_number,
							'bill_file' => $bukti_transfer["upload_data"]["file_name"],
							'keterangan' => $keterangan,
							'tanggal_konfirmasi_pembayaran' => date('d-m-Y H:i:s'),
							'status_konfirmasi_pembayaran' => "confirmed",
					);
		}else
		{
			$datas = array(
							'id_user' => $id_user,
							'invoice_code' => $invoice_code,
							'bank_name' => $bank_shop,
							'bank_name_sender' => $bank_name,
							'bank_owner_name_sender' => $bank_owner_name,
							'bank_number_sender' => $bank_number,
							'keterangan' => $keterangan,
							'tanggal_konfirmasi_pembayaran' => date('d-m-Y H:i:s'),
							'status_konfirmasi_pembayaran' => "confirmed",
					);
		}
		
		$checkinvoice = $this->Order_u_m->check_invoice($invoice_code);
		if($checkinvoice)
		{
			$insert_confirmation = $this->Order_u_m->insert_confirmation_repeat($datas);
			if($insert_confirmation)
			{
				$this->session->set_flashdata("message_update", "Berhasil Konfirmasi Pembayaran!");
				
				$data_transaksi = array(
										'invoice_code' => $invoice_code,
										'status_pesanan' => "confirmed",
								);
				$this->Order_u_m->update_status_transaksi($data_transaksi);
				
				$data_finish_confirmation = array(
												"emailtujuan"=>$email_user,
												"customername"=>$nama_user,
												"invoicecode"=>$invoice_code,
											);
				//$this->mail_finish_konfirmasi($data_finish_confirmation);
			
				redirect('profile/confirmation/'.base64_encode($invoice_code));
			}
			
		}else
		{
			$insert_confirmation = $this->Order_u_m->insert_confirmation($datas);
			if($insert_confirmation)
			{
				$this->session->set_flashdata("message_update", "Berhasil Konfirmasi Pembayaran!");
				
				$data_transaksi = array(
										'invoice_code' => $invoice_code,
										'status_pesanan' => "confirmed",
								);
				$this->Order_u_m->update_status_transaksi($data_transaksi);
				$this->Order_u_m->update_reports($data_transaksi);
				
				
				$data_finish_confirmation = array(
												"emailtujuan"=>$email_user,
												"customername"=>$nama_user,
												"invoicecode"=>$invoice_code,
											);
				//$this->mail_finish_konfirmasi($data_finish_confirmation);
				
				redirect('profile/confirmation/'.base64_encode($invoice_code));
			}
		}
	}
	
	public function give_review($invoice_code)
	{
		//load header, sidebar and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		$sidebar = $this->loaded_module_user(0);
		
		$data = $this->settings();
		
		$invoice_code = base64_decode($invoice_code);
		
		$id_user = $this->session->userdata("id_user");
		if(!isset($id_user))
			redirect("login");
		
		$data_user = $this->Order_u_m->get_user_by_id($id_user);
		$data["data_user"] = $data_user;
		
		$data_order = $this->Order_u_m->get_detail_transaction_review($invoice_code);
		$data["data_order"] = $data_order;
		
		$data_review = $this->Order_u_m->get_review_by_invoice($invoice_code);
		$data["data_review"] = $data_review;
		
		$header->header_view();
		$sidebar->sidebar_left_view('orders');
		$this->load->view('Give_review_v', $data);
		$sidebar->sidebar_right_view();
		$footer->footer_view();
	}
	
	public function give_review_action()
	{
		$id_user = $this->session->userdata("id_user");
		if(!isset($id_user))
			redirect("login");
		
		$id_produk = $this->input->post("id_produk");
		$invoice_code = $this->input->post("invoice_code");
		$rating = $this->input->post("rating_produk");
		$review = $this->input->post("review_produk");
		
		$datas = array(
						'id_customer' => $id_user,
						'id_invoice' => $invoice_code,
						'id_produk' => $id_produk,
						'rating' => $rating,
						'review' => $review,
						'date_review' => date("d-m-Y H:i:s"),
						'status_review' => 'active',
					);
					
		$check_review = $this->Order_u_m->check_review($datas);
		if($check_review == null)
		{
			$insert_review = $this->Order_u_m->insert_review($datas);
			if($insert_review)
			{
				echo "true";
			}else
			{
				echo "false";
			}
		}
	}
}
