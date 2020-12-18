<?php
class Browse_u_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function get_settings_upload_by_menu($menu_name)
	{
		$this->db->select('*');
		$this->db->from('tb_settings_upload');
		$this->db->where('menu_name', $menu_name);
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
	
	public function get_produk_by_kategori($idkategori, $limit, $start)
	{
		$this->db->select('*');
		$this->db->join('tb_sub_kategori s', 's.id_sub_kategori = p.sub_kategori_produk', 'left');
		$this->db->join('tb_kategori k', 'k.id_kategori = s.id_kategori', 'left');
		$this->db->from('tb_produk p');
        $this->db->limit($limit, $start);
		$this->db->where('k.id_kategori', $idkategori);
		$this->db->where('p.status_produk', 'ready');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_n_produk_by_kategori($idkategori)
	{
		$this->db->select('*');
		$this->db->join('tb_sub_kategori s', 's.id_sub_kategori = p.sub_kategori_produk', 'left');
		$this->db->join('tb_kategori k', 'k.id_kategori = s.id_kategori', 'left');
		$this->db->from('tb_produk p');
		$this->db->where('k.id_kategori', $idkategori);
		$this->db->where('p.status_produk', 'ready');
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return $result;
	}
	
	public function get_produk_by_subkategori($idsubkategori, $limit, $start)
	{
		$this->db->select('*');
		$this->db->join('tb_sub_kategori s', 's.id_sub_kategori = p.sub_kategori_produk', 'left');
		$this->db->from('tb_produk p');
        $this->db->limit($limit, $start);
		$this->db->where('s.id_sub_kategori', $idsubkategori);
		$this->db->where('p.status_produk', 'ready');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_n_produk_by_subkategori($idsubkategori)
	{
		$this->db->select('*');
		$this->db->join('tb_sub_kategori s', 's.id_sub_kategori = p.sub_kategori_produk', 'left');
		$this->db->from('tb_produk p');
		$this->db->where('s.id_sub_kategori', $idsubkategori);
		$this->db->where('p.status_produk', 'ready');
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return $result;
	}
	
	public function get_produk_by_brand($idbrand, $limit, $start)
	{
		$this->db->select('*');
		$this->db->join('tb_brand b', 'b.id_brand = p.brand_produk', 'left');
		$this->db->from('tb_produk p');
        $this->db->limit($limit, $start);
		$this->db->where('b.id_brand', $idbrand);
		$this->db->where('p.status_produk', 'ready');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_n_produk_by_brand($idbrand)
	{
		$this->db->select('*');
		$this->db->join('tb_brand b', 'b.id_brand = p.brand_produk', 'left');
		$this->db->from('tb_produk p');
		$this->db->where('b.id_brand', $idbrand);
		$this->db->where('p.status_produk', 'ready');
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return $result;
	}
	
	public function get_detail_kategori($idkategori)
	{
		$this->db->select('*');
		$this->db->from('tb_kategori p');
		$this->db->where('p.id_kategori', $idkategori);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_detail_subkategori($idsubkategori)
	{
		$this->db->select('*');
		$this->db->from('tb_sub_kategori s');
		$this->db->where('s.id_sub_kategori', $idsubkategori);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_detail_brand($idbrand)
	{
		$this->db->select('*');
		$this->db->from('tb_brand b');
		$this->db->where('b.id_brand', $idbrand);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
}
?>