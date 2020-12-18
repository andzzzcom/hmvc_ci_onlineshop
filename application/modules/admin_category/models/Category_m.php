<?php
class Category_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_kategori()
    {
		$this->db->select('*');
		$this->db->from('tb_kategori'); 
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_active_kategori()
    {
		$this->db->select('*');
		$this->db->where('status_kategori', 'aktif');
		$this->db->from('tb_kategori'); 
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
	
	public function insert_kategori($datakategori)
    {
        $this->db->insert('tb_kategori', $datakategori);
		
		return true;
	}
	
	public function get_kategori_by_id($id_kategori)
    {
		$this->db->select('*');
		$this->db->from('tb_kategori k'); 
		$this->db->where('k.id_kategori', $id_kategori);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function update_category($datakategori)
    {
		$this->db->where('id_kategori', $datakategori["id_kategori"]);
		$this->db->update('tb_kategori', $datakategori);
		return true;
    }
	
	public function get_subkategori_by_id_kategori($id_kategori)
    {
		$this->db->select('*');
		$this->db->from('tb_sub_kategori k'); 
		$this->db->where('k.id_kategori', $id_kategori);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_subkategori_by_id($id_subkategori)
    {
		$this->db->select('*');
		$this->db->from('tb_sub_kategori k'); 
		$this->db->where('k.id_sub_kategori', $id_subkategori);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function insert_subkategori($datasubkategori)
    {
        $this->db->insert('tb_sub_kategori', $datasubkategori);
		
		return true;
	}
	
	public function update_subcategory($datasubkategori)
    {
		$this->db->where('id_sub_kategori', $datasubkategori["id_sub_kategori"]);
		$this->db->where('id_kategori', $datasubkategori["id_kategori"]);
		$this->db->update('tb_sub_kategori', $datasubkategori);
		return true;
    }
	
	public function delete_subcategory($datasubkategori)
    {
		$this->db->where($datasubkategori);
		
		$this->db->delete('tb_sub_kategori');
		return true;
    }
	
	public function delete_category($datakategori)
    {
		$this->db->where($datakategori);
		$this->db->delete('tb_kategori');
		
		$this->db->where($datakategori);
		$this->db->delete('tb_sub_kategori');
		return true;
    }
}

?>