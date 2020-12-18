<?php
class Home_u_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function check_email_user($email)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('email_user', $email);
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return ($result>0) ? true:false;
	}
	
	public function get_data_user_by_email($email)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('email_user', $email);
		$query = $this->db->get();
		$result = $query->result();
		
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
	
	public function insert_data_user($datauser)
    {
        $this->db->insert('tb_user', $datauser);
		
		return true;
	}
	
	public function get_latest_produk()
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->limit(9);
		$this->db->where('status_produk', "ready");
		$this->db->order_by("id_produk", "desc");
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_all_produk()
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->where('status_produk', "ready");
		$this->db->order_by("id_produk", "desc");
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_all_kategori()
	{
		$this->db->select('*');
		$this->db->from('tb_kategori');
		$this->db->where('status_kategori', "aktif");
		$this->db->order_by("name_kategori", "asc");
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_kategori()
	{
		$this->db->select('*');
		$this->db->join('tb_sub_kategori s', 's.id_kategori = k.id_kategori', 'left');
		$this->db->from('tb_kategori k');
		$this->db->limit(7);
		$this->db->where('k.status_kategori', "aktif");
		$this->db->where('s.status_sub_kategori', "aktif");
		$this->db->order_by("k.id_kategori", "DESC");
		$this->db->group_by("k.id_kategori");
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_all_banner()
	{
		$this->db->select('*');
		$this->db->from('tb_banner');
		$this->db->where('status_banner', 'aktif');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	public function get_all_slider()
	{
		$this->db->select('*');
		$this->db->from('tb_slider');
		$this->db->where('status_slider', 'aktif');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_all_subkategori()
	{
		$this->db->select('*');
		$this->db->from('tb_sub_kategori');
		$this->db->where('status_sub_kategori', 'aktif');
		$this->db->order_by("id_kategori", "asc");
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_recommended_produk()
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->where('status_rekomendasi', "yes");
		$this->db->where('status_produk', "ready");
		$query = $this->db->get();
		$result = $query->result();
		
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
	
	public function get_wishlist_by_idcustomer($idcustomer)
	{
		$this->db->select('*');
		$this->db->join('tb_produk p', 'p.id_produk = w.id_produk', 'left');
		$this->db->from('tb_wishlist w');
		$this->db->where('w.id_customer', $idcustomer);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_all_brand()
    {
		$this->db->select('b.id_brand, b.name_brand, b.logo_brand, count(p.id_produk) as totalproduk');
		$this->db->join('tb_produk p', 'b.id_brand = p.brand_produk', 'left');
		$this->db->from('tb_brand b'); 
		$this->db->order_by('b.id_brand', 'DESC');
		$this->db->group_by('b.id_brand', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
}
?>