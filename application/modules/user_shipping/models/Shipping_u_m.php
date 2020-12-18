<?php
class Shipping_u_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_user_by_id($id_user)
    {
		$this->db->select('*');
		$this->db->from('tb_user p'); 
		$this->db->where('p.id_user', $id_user);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_all_province()
    {
		$this->db->select('*');
		$this->db->from('tb_provinsi_lists p'); 
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_city_by_id_province($id_provinsi)
    {
		$this->db->select('*');
		$this->db->from('tb_kota_kabupaten_lists k'); 
		$this->db->where('k.id_province', $id_provinsi);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_district_by_id_city($id_kota_kabupaten)
    {
		$this->db->select('*');
		$this->db->from('tb_kecamatan_lists k'); 
		$this->db->where('k.id_city', $id_kota_kabupaten);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function update_data_user($data)
    {
		$this->db->where('id_user', $data["id_user"]);
		$this->db->update('tb_user', $data);
		
		return true;
    }
}
?>