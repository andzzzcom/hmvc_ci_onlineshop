<?php
class Voucher_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_voucher()
    {
		$this->db->select('*');
		$this->db->from('tb_voucher_code v'); 
		$this->db->order_by('v.id_voucher', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function insert_voucher($datavoucher)
    {
        $this->db->insert('tb_voucher_code', $datavoucher);
		
		return true;
	}
	
	public function delete_voucher($datavoucher)
    {
		$this->db->where($datavoucher);
		
		$this->db->delete('tb_voucher_code');
		return true;
    }
	
	public function get_voucher_by_id($id_voucher)
    {
		$this->db->select('*');
		$this->db->from('tb_voucher_code p'); 
		$this->db->where('p.id_voucher', $id_voucher);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function update_voucher($datavoucher)
    {
		$this->db->where('id_voucher', $datavoucher["id_voucher"]);
		$this->db->update('tb_voucher_code', $datavoucher);
		return true;
    }
}
?>