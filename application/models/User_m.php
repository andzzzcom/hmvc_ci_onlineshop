<?php
class User_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_user()
    {
		$this->db->select('*');
		$this->db->from('tb_user p'); 
		$this->db->order_by('p.id_user', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
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
	
	public function update_user($datauser)
    {
		$this->db->where('id_user', $datauser["id_user"]);
		$this->db->update('tb_user', $datauser);
		return true;
    }
	
	public function get_all_province()
    {
		$this->db->select('*');
		$this->db->from('tb_provinsi_lists p'); 
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_all_city()
    {
		$this->db->select('*');
		$this->db->from('tb_kota_kabupaten_lists p'); 
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_all_district()
    {
		$this->db->select('*');
		$this->db->from('tb_kecamatan_lists p'); 
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_city_by_id_province($id_provinsi)
    {
		$this->db->select('*');
		$this->db->from('tb_kota_kabupaten_lists k'); 
		$this->db->where('k.id_province', $id_provinsi);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_district_by_id_province($id_provinsi)
    {
		$this->db->select('*');
		$this->db->from('tb_kecamatan_lists k'); 
		$this->db->where('k.id_province', $id_provinsi);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_district_by_id_city($id_kota_kabupaten)
    {
		$this->db->select('*');
		$this->db->from('tb_kecamatan_lists k'); 
		$this->db->where('k.id_city', $id_kota_kabupaten);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function insert_user($datauser)
    {
        $this->db->insert('tb_user', $datauser);
		
		return true;
	}
	
	public function delete_user($datauser)
    {
		$this->db->where($datauser);
		
		$this->db->delete('tb_user');
		return true;
    }
	
	public function check_email_user($email)
    {
		$this->db->select('*');
		$this->db->from('tb_user p'); 
		$this->db->where('p.email_user', $email);
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return ($result > 0) ? true:false;
    }
	
	public function check_email_user_edit($data)
    {
		$this->db->select('*');
		$this->db->from('tb_user p'); 
		$this->db->where('p.email_user', $data["email_user"]);
		$this->db->where('p.id_user !=', $data["id_user"]);
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return ($result > 0) ? true:false;
    }
}
?>