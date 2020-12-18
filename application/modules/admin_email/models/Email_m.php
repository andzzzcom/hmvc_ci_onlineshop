<?php
class Email_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_email()
    {
		$this->db->select('*');
		$this->db->from('tb_email_notification p'); 
		$this->db->order_by('p.id_email', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_email_by_id($id_email)
    {
		$this->db->select('*');
		$this->db->from('tb_email_notification p'); 
		$this->db->where('p.id_email', $id_email);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
}
?>