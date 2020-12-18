<?php
class Ongkir_u_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_settings_shipping()
	{
		$this->db->select('*');
		$this->db->from('tb_shipping');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
}
?>