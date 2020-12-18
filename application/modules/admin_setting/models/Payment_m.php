<?php
class Payment_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_payment()
	{
		$this->db->select('*');
		$this->db->from('tb_settings_payment');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_active_payment()
	{
		$this->db->select('*');
		$this->db->where('status_payment', 1);
		$this->db->from('tb_settings_payment');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_detail_payment($data)
	{
		$this->db->select('*');
		$this->db->from('tb_settings_payment');
		$this->db->where('id_payment', $data["id_payment"]);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function update_payment($data)
	{
		$this->db->where('id_payment', $data["id_payment"]);
		$query = $this->db->update("tb_settings_payment", $data);
		
		return $query;
	}
	
}
?>