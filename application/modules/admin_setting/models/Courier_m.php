<?php
class Courier_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_courier()
	{
		$this->db->select('*');
		$this->db->from('tb_kurir');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_active_courier()
	{
		$this->db->select('*');
		$this->db->where('status_kurir', 1);
		$this->db->from('tb_kurir');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_detail_courier($data)
	{
		$this->db->select('*');
		$this->db->from('tb_kurir');
		$this->db->where('id_kurir', $data["id_kurir"]);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function update_kurir($data)
	{
		$this->db->where('id_kurir', $data["id_kurir"]);
		$query = $this->db->update("tb_kurir", $data);
		
		return $query;
	}
	
}
?>