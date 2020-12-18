<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmation extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Confirmation_m');
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$list_all_confirmation = $this->Confirmation_m->get_all_confirmation();
		$data["list_all_confirmation"] = $list_all_confirmation;
		
		$header->header_view();
		$this->load->view('List_confirmation_v', $data);
		$footer->footer_view();
	}
	
	public function edit_confirmation($id_confirmation)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$detail_confirmation = $this->Confirmation_m->get_detail_confirmation($id_confirmation);
		if($detail_confirmation == null)
			redirect("not_found");
		
		$data["detail_confirmation"] = $detail_confirmation;
		
		$id_invoice = $detail_confirmation[0]->invoice_code;
		$data["id_invoice"] = $id_invoice;
		
		$list_all_transaction = $this->Order_m->get_transaction_by_id($id_invoice);
		
		$data["list_all_transaction"] = $list_all_transaction;
		$data["id_confirmation"] = $id_confirmation;
		
		$header->header_view();
		$this->load->view('Detail_confirmation_v', $data);
		$footer->footer_view();
	}
	
	public function edit_status_order_action()
	{
		$id_confirmation = $this->input->post('id_confirmation');
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
			$data_confirm = array(
							"invoice_code"=>$invoice_code,
							"status_konfirmasi_pembayaran"=>$status_pesanan
						);
					
			$update_confirmation = $this->Order_m->update_status_konfirmasi($data_confirm);
			$update_report = $this->Order_m->update_status_report($data_order);
		
	
			$data_update_status = array(
									"emailtujuan"=>$email_user,
									"customername"=>$nama_user,
									"invoicecode"=>$invoice_code,
									"statustransaksi"=>$status_pesanan,
								);
			//$this->mail_update_status($data_update_status);
			
			if($status_pesanan == "paid")
				$this->mail_paid_confirmation($data_update_status);
				
				
			$this->session->set_flashdata("message", "Berhasil diupdate !");
			redirect('admin/confirmation/edit_confirmation/'.$id_confirmation);
		}
	}
}
