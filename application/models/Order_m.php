<?php
class Order_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all_transaction()
	{
		$this->db->select('*');
		$this->db->join('tb_user u', 'u.id_user = k.customer_id', 'left');
		$this->db->from('tb_pesanan k');
		$this->db->order_by('id_pesanan', 'DESC');
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
	
	public function get_transaction_by_id($id_invoice)
	{
		$this->db->select('*');
		$this->db->from('tb_pesanan p');
		$this->db->where('p.invoice_code', $id_invoice);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function update_status_transaksi($data)
    {
		$this->db->where("invoice_code", $data["invoice_code"]);
		$this->db->update('tb_pesanan', $data);
        
		return true;
    }
	
	public function update_status_konfirmasi($data)
    {
		$this->db->where("invoice_code", $data["invoice_code"]);
		$this->db->update('tb_konfirmasi_pembayaran', $data);
        
		return true;
    }
	
	public function update_status_report($data)
    {
		$this->db->where("invoice_code", $data["invoice_code"]);
		$this->db->update('tb_income_report', $data);
        
		return true;
    }
}
?>