<?php
class Search_u_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function search_product_by_name($product_name, $limit, $start)
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->like('nama_produk', $product_name);
        $this->db->limit($limit, $start);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_n_produk_search($product_name)
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->like('nama_produk', $product_name);
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return $result;
	}
	
	public function get_settings_general()
	{
		$this->db->select('*');
		$this->db->from('tb_settings');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
}
?>