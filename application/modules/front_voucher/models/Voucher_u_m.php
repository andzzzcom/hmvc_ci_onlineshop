<?php
class Voucher_u_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function check_voucher_code($voucher_code)
	{
		$this->db->select('*');
		$this->db->from('tb_voucher_code');
		$this->db->where('voucher_code', $voucher_code);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	
}
?>