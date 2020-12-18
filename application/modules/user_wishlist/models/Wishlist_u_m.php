<?php
class Wishlist_u_m extends CI_Model {

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
	
	public function get_wishlist_by_idcustomer($idcustomer, $limit, $start)
	{
		$this->db->select('*');
		$this->db->join('tb_produk p', 'p.id_produk = w.id_produk', 'left');
		$this->db->from('tb_wishlist w');
        $this->db->limit($limit, $start);
		$this->db->where('w.id_customer', $idcustomer);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_n_wishlist_by_idcustomer($idcustomer)
	{
		$this->db->select('*');
		$this->db->join('tb_produk p', 'p.id_produk = w.id_produk', 'left');
		$this->db->from('tb_wishlist w');
		$this->db->where('w.id_customer', $idcustomer);
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return $result;
	}
	
	public function get_wishlist_by_data($data)
	{
		$this->db->select('*');
		$this->db->from('tb_wishlist');
		$this->db->where('id_customer', $data["id_customer"]);
		$this->db->where('id_produk', $data["id_produk"]);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function insert_data_wishlist($data)
    {
        $this->db->insert('tb_wishlist', $data);
		
		return true;
	}
	
	public function delete_data_wishlist($data)
    {
        $this->db->where('id_customer', $data["id_customer"]);
        $this->db->where('id_produk', $data["id_produk"]);
        $this->db->delete('tb_wishlist');
		
		return true;
    }
	
	public function get_wishlist_by_data_complete($idcustomer)
	{
		$this->db->select('*');
		$this->db->join('tb_produk p', 'p.id_produk = w.id_produk', 'left');
		$this->db->from('tb_wishlist w');
		$this->db->where('w.id_customer', $idcustomer);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
}
?>