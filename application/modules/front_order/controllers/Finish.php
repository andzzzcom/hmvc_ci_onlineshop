<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finish extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("cart");
		$this->load->model('front_cart/Cart_u_m');
		$this->load->model('front_order/Order_u_m');
		$this->load->model('admin_user/User_m');
		$this->load->model('admin_bank/Bank_m');
		$this->load->model('admin_setting/Payment_m');
		$this->load->model('Profile_u_m');
	}
	
	public function finish()
	{
		$id_payment = $this->session->userdata("id_payment");
		
		$data_payment = array("id_payment"=>$id_payment);
		$data_payment = $this->Payment_m->get_detail_payment($data_payment);
		
		$name_payment = $data_payment[0]->name_payment;
		if($name_payment == "Bank")
			$this->finish_bank();
		if($name_payment == "Paypal")
			$this->finish_paypal();
			
	}

	private function finish_paypal()
	{
		echo"payment method not available";
	}
	
	private function finish_bank()
	{
		$emailnya = $this->session->userdata("email_user");
		if($emailnya == null)
		{
			$link = base_url()."Home/login_checkout";
			redirect($link);

		//sudah login customer
		}else
		{
			//load header and footer module
			$header = $this->loaded_module(0);
			$footer = $this->loaded_module(1);
			
			$data = $this->settings();
			
			$id_payment = $this->session->userdata("id_payment");
			$iduser = $this->session->userdata("id_user");
			
			$data_checkout = $this->session->userdata("data_checkout");
			$ongkir = $data_checkout["ongkir"];
			
			if($data_checkout == null)
			{
				$link = base_url();
				redirect($link);
			}
			
			$idtransaksi = $this->generate_id_transaksi();
			
			$voucher_code = $this->session->userdata("vouchercode")==""?0:$this->session->userdata("vouchercode");
			$voucher_value = $this->session->userdata("vouchervalue")==""?0:$this->session->userdata("vouchervalue");
			
			$total = 0;
			$resultnya = $this->Order_u_m->select_cart($iduser);
			foreach($resultnya as $result)
			{
				$subtotal = ($result->count)*($this->Order_u_m->select_content($result->id_produk)[0]->harga_produk);
				$data_detail_pesanan = array(
									"invoice_code"=> $idtransaksi,
									"id_produk"=> $result->id_produk,
									"nama_produk"=> $this->Order_u_m->select_content($result->id_produk)[0]->nama_produk,
									"gambar_produk"=> $this->Order_u_m->select_content($result->id_produk)[0]->thumbnail_produk,
									"harga_satuan_produk"=> $this->Order_u_m->select_content($result->id_produk)[0]->harga_produk,
									"jumlah_produk"=> $result->count,
									"subtotal_produk"=> $subtotal,
								);
							
				$this->Order_u_m->insert_detail_transaksi($data_detail_pesanan);
				
				$total+=$subtotal;
			}
			
			$date_now = date('d-m-Y H:i:s');
			$date_expired = date('d-m-Y H:i:s',strtotime('+2 days',strtotime($date_now)));
			
			$data_transaksi = array(
								"invoice_code"=> $idtransaksi,
								"customer_id"=> $iduser,
								"voucher_code"=> $voucher_code,
								"voucher_discount"=> $voucher_value,
								"total_price_pesanan"=> $total+$ongkir-$voucher_value,
								"id_payment_method"=> $id_payment,
								"date_order_pesanan"=> $date_now,
								"date_expire_pesanan"=> $date_expired,
								"status_pesanan"=> "unpaid",
							);
			$this->Order_u_m->insert_transaksi($data_transaksi);
			
			$ongkir = preg_replace('/\s+/', '', $data_checkout["ongkir"]);
			$berat = preg_replace('/\s+/', '', $data_checkout["berat"]);
			$kurir = preg_replace('/\s+/', '', $data_checkout["kurir"]);
			$data_shipping = array(
								"invoice_code" => $idtransaksi,
								"nama" => $data_checkout["nama"],
								"email" => $data_checkout["email"],
								"phone" => $data_checkout["phone"],
								"alamat" => $data_checkout["alamat"],
								"provinsi" => $data_checkout["provinsi"],
								"kota" => $data_checkout["kota"],
								"kecamatan" => $data_checkout["kecamatan"],
								"kodepos" => $data_checkout["kodepos"],
								"ongkir" => $ongkir,
								"berat" => $berat,
								"kurir" => $kurir,
							);
			$this->Order_u_m->insert_shipping_transaksi($data_shipping);
			
			$data_reports = array(
								"invoice_code" => $idtransaksi,
								"voucher_diskon" => $voucher_value,
								"ongkos_kirim" => $ongkir,
								"total_price_bruto" => $total+$ongkir-$voucher_value,
								"total_price_netto" => $total-$voucher_value,
								"tanggal_pesanan" => date("d"),
								"bulan_pesanan" => date("F"),
								"tahun_pesanan" => date("Y"),
								"status_pesanan" => "unpaid",
							);
			$this->Order_u_m->insert_reports($data_reports);
						
			$data_finish_transaksi = array(
										"emailtujuan"=>$data_checkout["email"],
										"customername"=>$data_checkout["nama"],
										"invoicecode"=>$idtransaksi,
									);
			//$this->mail_finish_transaksi($data_finish_transaksi);
			
			//remove all data
			$this->Order_u_m->remove_cart($iduser);
			$this->session->unset_userdata("data_checkout");
			
			if(!empty($this->session->userdata("vouchercode")))
				$this->session->unset_userdata('vouchercode');
			if(!empty($this->session->userdata("vouchervalue")))
				$this->session->unset_userdata('vouchervalue');
			if(!empty($this->session->userdata("id_payment")))
				$this->session->unset_userdata('id_payment');
			
			$this->cart->destroy();
			
			$list_all_bank = $this->Bank_m->get_all_bank();
			$data["list_all_bank"] = $list_all_bank;
		
			$header->header_view();
			$this->load->view('Finish_v', $data);
			$footer->footer_view();
		}
	}
	
	private function generate_id_transaksi()
	{
		$iduser = $this->session->userdata("id_user");
		$intrandom = rand(0,100000);
		
		$format = "INV/";
	 
		$year = date('Y');
		$month = date('m');
	 
		$completeformat = $format.$year."/".$month."/".$iduser."/".$intrandom;
		
		return $completeformat;
	}
}
