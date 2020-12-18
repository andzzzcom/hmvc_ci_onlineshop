<?php
class Banner_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_banner()
    {
		$this->db->select('*');
		$this->db->from('tb_banner b'); 
		$this->db->order_by('b.id_banner', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_active_banner()
    {
		$this->db->select('*');
		$this->db->where('b.status_banner', 'aktif');
		$this->db->from('tb_banner b'); 
		$this->db->order_by('b.id_banner', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_banner_by_id($id_banner)
    {
		$this->db->select('*');
		$this->db->from('tb_banner b'); 
		$this->db->where('b.id_banner', $id_banner);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function insert_banner($databanner)
    {
        $this->db->insert('tb_banner', $databanner);
		
		return true;
	}
	
	public function update_banner($databanner)
    {
		$this->db->where('id_banner', $databanner["id_banner"]);
		$this->db->update('tb_banner', $databanner);
		return true;
    }
	
	public function delete_banner($databanner)
    {
		$this->db->where($databanner);
		
		$this->db->delete('tb_banner');
		return true;
    }
	
}
?>