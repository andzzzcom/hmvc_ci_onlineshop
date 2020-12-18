<?php
class Security_u_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_user_by_id($id_user)
    {
		$this->db->select('*');
		$this->db->from('tb_user p'); 
		$this->db->where('p.id_user', $id_user);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
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
	
	public function update_data_user($data)
    {
		$this->db->where('id_user', $data["id_user"]);
		$this->db->update('tb_user', $data);
		
		return true;
    }
}
?>