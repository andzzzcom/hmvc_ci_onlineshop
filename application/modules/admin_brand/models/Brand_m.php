<?php
class Brand_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_brand()
    {
		$this->db->select('*');
		$this->db->from('tb_brand b'); 
		$this->db->order_by('b.id_brand', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_brand_by_id($id_brand)
    {
		$this->db->select('*');
		$this->db->from('tb_brand p'); 
		$this->db->where('p.id_brand', $id_brand);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function insert_brand($databrand)
    {
        $this->db->insert('tb_brand', $databrand);
		
		return true;
	}
	
	public function update_brand($databrand)
    {
		$this->db->where('id_brand', $databrand["id_brand"]);
		$this->db->update('tb_brand', $databrand);
		return true;
    }
	
	public function delete_brand($databrand)
    {
		$this->db->where($databrand);
		
		$this->db->delete('tb_brand');
		return true;
    }
	
}
?>