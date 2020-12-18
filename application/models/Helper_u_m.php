<?php
class Helper_u_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_settings_upload_by_menu($menu_name)
	{
		$this->db->select('*');
		$this->db->from('tb_settings_upload');
		$this->db->where('menu_name', $menu_name);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_all_produk()
    {
		$this->db->select('*');
		$this->db->from('tb_produk b'); 
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_settings_general()
	{
		$this->db->select('*');
		$this->db->from('tb_settings');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_all_bank()
    {
		$this->db->select('*');
		$this->db->from('tb_bank_list b'); 
		$this->db->where('b.status_bank', 'aktif');
		$this->db->order_by('b.id_bank', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	
	public function get_email_by_kode($kode)
    {
		$this->db->select('*');
		$this->db->from('tb_email_notification e'); 
		$this->db->where('e.kode_email', $kode);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_detail_transaction($invoice_code)
	{
		$this->db->select('*');
		$this->db->join('tb_detail_pesanan d', 'd.invoice_code = p.invoice_code', 'left');
		$this->db->join('tb_user u', 'u.id_user = p.customer_id', 'left');
		$this->db->join('tb_shipping_pesanan s', 's.invoice_code = p.invoice_code', 'left');
		$this->db->from('tb_pesanan p');
		$this->db->where('p.invoice_code', $invoice_code);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_all_category()
    {
		$this->db->select('*');
		$this->db->from('tb_kategori'); ;
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_all_brand()
    {
		$this->db->select('*');
		$this->db->from('tb_brand'); ;
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
}
?>