<?php
class Confirmation_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_confirmation()
	{
		$this->db->select('*');
		$this->db->join('tb_user u', 'u.id_user = k.id_user', 'left');
		$this->db->from('tb_konfirmasi_pembayaran k');
		$this->db->order_by('id_konfirmasi_pembayaran', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_detail_confirmation($id_confirmation)
	{
		$this->db->select('*');
		$this->db->join('tb_user u', 'u.id_user = k.id_user', 'left');
		$this->db->from('tb_konfirmasi_pembayaran k');
		$this->db->where('k.id_konfirmasi_pembayaran', $id_confirmation);
		$this->db->order_by('id_konfirmasi_pembayaran', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function check_link_confirmation($id_invoice)
	{
		$this->db->select('*');
		$this->db->join('tb_user u', 'u.id_user = k.id_user', 'left');
		$this->db->from('tb_konfirmasi_pembayaran k');
		$this->db->where('k.invoice_code', $id_invoice);
		$this->db->order_by('id_konfirmasi_pembayaran', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
}
?>