<?php
class Admin_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_admin()
    {
		$this->db->select('*');
		$this->db->from('tb_admin p'); 
		$this->db->order_by('p.id_admin', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_admin_by_id($id_admin)
    {
		$this->db->select('*');
		$this->db->from('tb_admin p'); 
		$this->db->where('p.id_admin', $id_admin);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function insert_admin($dataadmin)
    {
        $this->db->insert('tb_admin', $dataadmin);
		
		return true;
	}
	
	public function update_admin($dataadmin)
    {
		$this->db->where('id_admin', $dataadmin["id_admin"]);
		$this->db->update('tb_admin', $dataadmin);
		return true;
    }
	
	public function delete_admin($dataadmin)
    {
		$this->db->where($dataadmin);
		
		$this->db->delete('tb_admin');
		return true;
    }
	
	public function check_email_admin($email)
    {
		$this->db->select('*');
		$this->db->from('tb_admin p'); 
		$this->db->where('p.email_admin', $email);
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return ($result > 0) ? true:false;
    }
	
	public function check_email_admin_edit($data)
    {
		$this->db->select('*');
		$this->db->from('tb_admin p'); 
		$this->db->where('p.email_admin', $data["email_admin"]);
		$this->db->where('p.id_admin !=', $data["id_admin"]);
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return ($result > 0) ? true:false;
    }
}
?>