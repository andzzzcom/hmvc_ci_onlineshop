<?php
class Mailbox_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_mailbox()
    {
		$this->db->select('*');
		$this->db->join('tb_user u', 'u.id_user = p.id_customer', 'left');
		$this->db->from('tb_inbox_customer p'); 
		$this->db->where('p.type_sender', 'customer');
		$this->db->order_by('p.id_message', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_all_sent_mailbox()
    {
		$this->db->select('*');
		$this->db->join('tb_user u', 'u.id_user = p.id_customer', 'left');
		$this->db->from('tb_inbox_customer p'); 
		$this->db->where('p.type_sender', 'admin');
		$this->db->order_by('p.id_message', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_message_by_id($id_message)
    {
		$this->db->select('*');
		$this->db->join('tb_user u', 'u.id_user = p.id_customer', 'left');
		$this->db->from('tb_inbox_customer p'); 
		$this->db->where('p.id_message', $id_message);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function delete_inbox_message($datapesan)
    {
		$this->db->where($datapesan);
		
		$this->db->delete('tb_inbox_customer');
		return true;
    }
	
	public function insert_message_mailbox($datapesan)
    {		
		$this->db->insert('tb_inbox_customer', $datapesan);
		return true;
    }
}
?>