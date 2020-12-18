<?php
class Page_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_page()
    {
		$this->db->select('*');
		$this->db->from('tb_page p'); 
		$this->db->order_by('p.id_page', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_page_by_id($id_page)
    {
		$this->db->select('*');
		$this->db->from('tb_page p'); 
		$this->db->where('p.id_page', $id_page);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function insert_page($datapage)
    {
        $this->db->insert('tb_page', $datapage);
		
		return true;
	}
	
	public function update_page($datapage)
    {
		$this->db->where('id_page', $datapage["id_page"]);
		$this->db->update('tb_page', $datapage);
		return true;
    }
	
	public function delete_page($datapage)
    {
		$this->db->where($datapage);
		
		$this->db->delete('tb_page');
		return true;
    }
	
}
?>