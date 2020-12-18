<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('front_cart/Cart_u_m');
		$this->load->model('Voucher_u_m');
	}
	
	public function use_voucher_code()
	{
		$code = $this->input->post("kode");
		
		$check_voucher = $this->Voucher_u_m->check_voucher_code($code);
		
		if($check_voucher == null)
			return false;
		
		if($check_voucher[0]->voucher_status == "nonaktif")
			return false;
		
		$datenow = date('d-m-Y H:i:s');
		if(strtotime($check_voucher[0]->voucher_expire_date) < strtotime($datenow))
			return false;
		
		$this->session->set_userdata("vouchercode", $code);
		
		echo "true";
	}
	
	public function check_voucher_value($code)
	{
		$check_voucher = $this->Voucher_u_m->check_voucher_code($code);
		
		if($check_voucher == null)
			return 0;
		
		if($check_voucher[0]->voucher_status == "nonaktif")
			return 0;
		
		$datenow = date('d-m-Y H:i:s');
		if(strtotime($check_voucher[0]->voucher_expire_date) < strtotime($datenow))
			return 0;
		
		$iduser = $this->session->userdata("id_user");
		
		$voucher_value = 0;
		if($check_voucher[0]->voucher_type== "ongkir")
		{
			$data_checkout = $this->session->userdata("data_checkout");
			$voucher_value = $data_checkout["ongkir"];
		}
		if($check_voucher[0]->voucher_type== "free")
		{
			$total = 0;
			$resultnya = $this->Cart_u_m->select_cart($iduser);
			foreach($resultnya as $result)
			{
				$subtotal = ($result->count)*($this->Cart_u_m->select_content($result->id_produk)[0]->harga_produk);
				$total+=$subtotal;
			}
			$voucher_value = $total;
		}
		if($check_voucher[0]->voucher_type== "persen")
		{
			$value_percent = $check_voucher[0]->voucher_value;
			
			$total = 0;
			$resultnya = $this->Cart_u_m->select_cart($iduser);
			foreach($resultnya as $result)
			{
				$subtotal = ($result->count)*($this->Cart_u_m->select_content($result->id_produk)[0]->harga_produk);
				$total+=$subtotal;
			}
			
			$total = $total*$value_percent/100;
			
			$voucher_value = $total;
		}
		return $voucher_value;
	}
}
