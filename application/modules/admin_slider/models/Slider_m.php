<?php
class Slider_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_slider()
    {
		$this->db->select('*');
		$this->db->from('tb_slider s'); 
		$this->db->order_by('s.id_slider', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_slider_by_id($id_slider)
    {
		$this->db->select('*');
		$this->db->from('tb_slider s'); 
		$this->db->where('s.id_slider', $id_slider);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function insert_slider($datslider)
    {
        $this->db->insert('tb_slider', $datslider);
		
		return true;
	}
	
	public function update_slider($datslider)
    {
		$this->db->where('id_slider', $datslider["id_slider"]);
		$this->db->update('tb_slider', $datslider);
		return true;
    }
	
	public function delete_slider($dataslider)
    {
		$this->db->where($dataslider);
		
		$this->db->delete('tb_slider');
		return true;
    }
	
}
?>