<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_confirmation/Confirmation_m');
		$this->load->model('admin_bank/Bank_m');
		$this->load->model('Settings_m');
		$this->load->model('Order_m');
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_transaction = $this->Order_m->get_all_transaction();
		$data["list_all_transaction"] = $list_all_transaction;
		
		$data["stat"] = $this->get_statistic();
		
		$header->header_view();
		$this->load->view('List_order_v', $data);
		$footer->footer_view();
	}
	
	public function edit_transaction($id_invoice)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$id_invoice = base64_decode($id_invoice);
		
		$list_all_transaction = $this->Order_m->get_transaction_by_id($id_invoice);
		if($list_all_transaction == null)
			redirect("not_found");
		
		$data["list_all_transaction"] = $list_all_transaction;
		
		$data_web = $this->Settings_m->get_settings_general();
		$data["data_web"] = $data_web;
		
		$data_bank = $this->Bank_m->get_all_bank();
		$data["data_bank"] = $data_bank;
		
		$data_shipping = $this->Settings_m->get_shipping_settings();
		$data["data_shipping"] = $data_shipping;
		
		$link="";
		$check_link_confirmation = $this->Confirmation_m->check_link_confirmation($id_invoice);
		if(!empty($check_link_confirmation))
			$link = $check_link_confirmation[0]->id_konfirmasi_pembayaran;
		
		$data["check_link_confirmation"] = $link;
		
		$data_order = $this->Order_m->get_detail_transaction($id_invoice);
		$data["data_order"] = $data_order;
		$data["id_invoice"] = $id_invoice;
		
		$header->header_view();
		$this->load->view('Detail_order_v', $data);
		$footer->footer_view();
	}
	
	public function print_transaction($id_invoice)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$id_invoice = base64_decode($id_invoice);
		
		$list_all_transaction = $this->Order_m->get_transaction_by_id($id_invoice);
		if($list_all_transaction == null)
			redirect("not_found");
		
		$data["list_all_transaction"] = $list_all_transaction;
		
		$data_web = $this->Settings_m->get_settings_general();
		$data["data_web"] = $data_web;
		
		$data_bank = $this->Bank_m->get_all_bank();
		$data["data_bank"] = $data_bank;
		
		$data_shipping = $this->Settings_m->get_shipping_settings();
		$data["data_shipping"] = $data_shipping;
		
		$data_order = $this->Order_m->get_detail_transaction($id_invoice);
		$data["data_order"] = $data_order;
		$data["id_invoice"] = $id_invoice;
		
		$header->header_view();
		$this->load->view('Print_order_v', $data);
		$footer->footer_view();
	}
	
	public function edit_status_order_action()
	{
		$invoice_code = $this->input->post('invoice_code');
		$status_pesanan = $this->input->post('status_pesanan');
		
		$detail_transaksi = $this->Order_m->get_detail_transaction($invoice_code);
		$nama_user = $detail_transaksi[0]->nama_user;
		$email_user = $detail_transaksi[0]->email_user;
		
		$data_order = array(
						"invoice_code"=>$invoice_code,
						"status_pesanan"=>$status_pesanan
					);
					
		$update_status_order = $this->Order_m->update_status_transaksi($data_order);
		if($update_status_order == true)
		{
			$update_report = $this->Order_m->update_status_report($data_order);
		
			$data_update_status = array(
									"emailtujuan"=>$email_user,
									"customername"=>$nama_user,
									"invoicecode"=>$invoice_code,
									"statustransaksi"=>$status_pesanan,
								);
			//$this->mail_update_status($data_update_status);
			
			//if($status_pesanan == "paid")
				//$this->mail_paid_confirmation($data_update_status);
				
				
			$this->session->set_flashdata("message", "Berhasil diupdate !");
			redirect('admin/order/edit_transaction/'.base64_encode($invoice_code));
		}
	}
	
	public function get_statistic()
	{
		$data["norder"] = count($this->Order_m->get_all_transaction());
		$data["npaidorder"] = count($this->Order_m->get_paid_order());
		$data["nfinishorder"] = count($this->Order_m->get_finish_order());
		$data["nexpiredorder"] = count($this->Order_m->get_expired_order());
		$data["nconfirmorder"] = count($this->Order_m->get_confirmed_order());
		
		return $data;
	}
	
	public function get_n_total_order()
	{
		$total = sizeof($this->Order_m->get_all_transaction());
		return $total;
	}
	
}
