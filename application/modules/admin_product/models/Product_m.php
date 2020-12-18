<?php
class Product_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_produk()
    {
		$this->db->select('*');
		$this->db->from('tb_produk p'); 
		$this->db->order_by('p.id_produk', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_active_produk()
    {
		$this->db->select('*');
		$this->db->where('p.status_produk', 'ready');
		$this->db->from('tb_produk p'); 
		$this->db->order_by('p.id_produk', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_notactive_produk()
    {
		$this->db->select('*');
		$this->db->where('p.status_produk !=', 'ready');
		$this->db->from('tb_produk p'); 
		$this->db->order_by('p.id_produk', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_produk_by_id($id_produk)
    {
		$this->db->select('*');
		$this->db->from('tb_produk p'); 
		$this->db->where('p.id_produk', $id_produk);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_image_produk_by_id($id_image_produk)
    {
		$this->db->select('*');
		$this->db->from('tb_image_produk i'); 
		$this->db->where('i.id_image_produk', $id_image_produk);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	
	public function check_exist_usage($data)
    {
		$this->db->select('*');
		$this->db->from('tb_detail_pesanan d'); 
		$this->db->where('d.id_produk', $data["id_produk"]);
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return $result;
    }
	
	public function get_recommended_produk()
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->where('status_rekomendasi', "yes");
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function insert_product($dataproduk)
    {
        $this->db->insert('tb_produk', $dataproduk);
		
		return true;
	}
	
	public function insert_image_product($dataimageproduk)
    {
        $this->db->insert('tb_image_produk', $dataimageproduk);
		
		return true;
	}
	
	public function get_all_kategori()
    {
		$this->db->select('*');
		$this->db->from('tb_kategori'); 
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_all_brand()
    {
		$this->db->select('*');
		$this->db->from('tb_brand'); 
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_all_subkategori()
    {
		$this->db->select('*');
		$this->db->from('tb_sub_kategori'); 
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function update_product($dataproduk)
    {
		$this->db->where('id_produk', $dataproduk["id_produk"]);
		$this->db->update('tb_produk', $dataproduk);
		return true;
    }
	
	public function delete_product($dataproduk)
    {
		$this->db->where($dataproduk);
		$this->db->delete('tb_produk');
		
		$this->db->where($dataproduk);
		$this->db->delete('tb_wishlist');
		
		return true;
    }
	
	public function get_images_produk_by_id($id_produk)
    {
		$this->db->select('*');
		$this->db->from('tb_image_produk p'); 
		$this->db->where('p.id_produk', $id_produk);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function update_image_product($dataproduk)
    {
		$this->db->where('id_image_produk', $dataproduk["id_image_produk"]);
		$this->db->where('id_produk', $dataproduk["id_produk"]);
		$this->db->update('tb_image_produk', $dataproduk);
		return true;
    }
	
	public function delete_image_product($dataproduk)
    {
		$this->db->where('id_image_produk', $dataproduk["id_image_produk"]);
		$this->db->where('id_produk', $dataproduk["id_produk"]);
		$this->db->delete('tb_image_produk');
		
		return true;
    }
}
?>