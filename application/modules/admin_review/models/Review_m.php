<?php
class Review_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_review()
    {
		$this->db->select('*');
		$this->db->join('tb_produk p', 'p.id_produk = r.id_produk', 'left');
		$this->db->from('tb_review r'); 
		$this->db->order_by('r.id_review', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function update_status_review($datareview)
    {
		$this->db->where('id_review', $datareview["id_review"]);
		$this->db->update('tb_review', $datareview);
		return true;
    }
	
	public function get_review_by_id($id_review)
	{
		$this->db->select('*');
		$this->db->join('tb_user u', 'u.id_user = r.id_customer', 'left');
		$this->db->join('tb_produk p', 'p.id_produk = r.id_produk', 'left');
		$this->db->from('tb_review r');
		$this->db->where('r.id_review', $id_review);
		$this->db->order_by('r.id_review', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function check_reply_review($datas)
	{
		$this->db->select('*');
		$this->db->from('tb_review_reply r');
		$this->db->where('r.id_review', $datas["id_review"]);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function insert_reply_review($datareview_reply)
    {
        $this->db->insert('tb_review_reply', $datareview_reply);
		
		return true;
	}
	
	public function update_reply_review($datareview_reply)
    {
		$this->db->where('id_reply_review', $datareview_reply["id_reply_review"]);
		$this->db->update('tb_review_reply', $datareview_reply);
		return true;
	}
	
	public function get_reply_review_by_id($id_review)
	{
		$this->db->select('*');
		$this->db->from('tb_review_reply r');
		$this->db->where('r.id_review', $id_review);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
}
?>