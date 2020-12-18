<?php
class Product_u_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_produk_by_id($id_produk)
	{
		$this->db->select('*');
		$this->db->join('tb_brand b', 'b.id_brand = p.brand_produk', 'left');
		$this->db->from('tb_produk p');
		$this->db->where('p.id_produk', $id_produk);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_all_produk()
    {
		$this->db->select('*');
		$this->db->from('tb_produk b'); 
		$this->db->order_by('b.id_produk', 'DESC');
		$query = $this->db->get();
		$result = $query->result_array();
		
		return $result;
    }
	
	public function get_gambar_produk_by_id($id_produk)
	{
		$this->db->select('*');
		$this->db->from('tb_image_produk');
		$this->db->where('id_produk', $id_produk);
		$this->db->where('status_image_produk', "active");
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_kategori_by_id_subkategori($id_subkategori)
	{
		$this->db->select('*');
		$this->db->join('tb_sub_kategori s', 's.id_kategori = k.id_kategori', 'left');
		$this->db->from('tb_kategori k');
		$this->db->where('s.id_sub_kategori', $id_subkategori);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_recommended_produk($id_sub_kategori, $idproduk)
	{
		$this->db->select('*');
		$this->db->join('tb_sub_kategori s', 'p.sub_kategori_produk = s.id_sub_kategori', 'left');
		$this->db->from('tb_produk p');
		$this->db->where('p.sub_kategori_produk', $id_sub_kategori);
		$this->db->where('p.id_produk !=', $idproduk);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_review_product($id_product)
	{
		$this->db->select('*');
		$this->db->join('tb_user u', 'u.id_user = r.id_customer', 'left');
		$this->db->join('tb_produk p', 'p.id_produk = r.id_produk', 'left');
		$this->db->from('tb_review r');
		$this->db->where('r.id_produk', $id_product);
		$this->db->where('r.status_review', 'active');
		$this->db->order_by('r.id_review', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_all_reply_review()
	{
		$this->db->select('*');
		$this->db->join('tb_review r', 'r.id_review = rr.id_review', 'left');
		$this->db->from('tb_review_reply rr');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function count_rating_product($id_product)
	{
		$this->db->select('sum(r.rating) total_rating, count(r.id_review) as jumlah_rating');
		$this->db->from('tb_review r');
		$this->db->where('r.id_produk', $id_product);
		$this->db->group_by('r.id_produk');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
}
?>