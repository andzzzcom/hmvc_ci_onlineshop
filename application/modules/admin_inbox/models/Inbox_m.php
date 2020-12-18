<?php
class Inbox_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_inbox()
    {
		$this->db->select('*');
		$this->db->from('tb_inbox_message p'); 
		$this->db->order_by('p.id_inbox_message', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_message_by_id($id_message)
    {
		$this->db->select('*');
		$this->db->from('tb_inbox_message p'); 
		$this->db->where('p.id_inbox_message', $id_message);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function delete_inbox_message($datapesan)
    {
		$this->db->where($datapesan);
		
		$this->db->delete('tb_inbox_message');
		return true;
    }
}
?>