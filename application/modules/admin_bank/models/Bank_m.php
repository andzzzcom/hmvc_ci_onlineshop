<?php
class Bank_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_bank()
    {
		$this->db->select('*');
		$this->db->from('tb_bank_list b'); 
		$this->db->order_by('b.id_bank', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function insert_bank($databank)
    {
        $this->db->insert('tb_bank_list', $databank);
		
		return true;
	}
	
	public function delete_bank($databank)
    {
		$this->db->where($databank);
		
		$this->db->delete('tb_bank_list');
		return true;
    }
	
	public function get_bank_by_id($id_bank)
    {
		$this->db->select('*');
		$this->db->from('tb_bank_list p'); 
		$this->db->where('p.id_bank', $id_bank);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function update_bank($databank)
    {
		$this->db->where('id_bank', $databank["id_bank"]);
		$this->db->update('tb_bank_list', $databank);
		return true;
    }
}
?>