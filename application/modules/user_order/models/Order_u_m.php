<?php
class Order_u_m extends CI_Model {

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
	
	public function get_all_transaction($id_user, $limit, $start)
	{
		$this->db->select('*');
		$this->db->from('tb_pesanan');
        $this->db->limit($limit, $start);
		$this->db->where('customer_id', $id_user);
		$this->db->order_by('id_pesanan', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_n_all_transaction($id_user)
	{
		$this->db->select('*');
		$this->db->from('tb_pesanan');
		$this->db->where('customer_id', $id_user);
		$this->db->order_by('id_pesanan', 'DESC');
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return $result;
	}
	
	public function get_all_bank()
    {
		$this->db->select('*');
		$this->db->from('tb_bank_list b'); 
		$this->db->order_by('b.id_bank', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function check_invoice($invoice_code)
	{
		$this->db->select('*');
		$this->db->from('tb_konfirmasi_pembayaran');
		$this->db->where('invoice_code', $invoice_code);
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return ($result>0) ? true:false;
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
	
	public function get_detail_transaction_review($invoice_code)
	{
		$this->db->select('*');
		$this->db->join('tb_produk p', 'p.id_produk = d.id_produk', 'left');
		$this->db->from('tb_detail_pesanan d');
		$this->db->where('d.invoice_code', $invoice_code);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function insert_confirmation($datas)
    {
		$this->db->insert('tb_konfirmasi_pembayaran', $datas);
		
		return true;
    }
	
	public function insert_confirmation_repeat($datas)
    {
		$this->db->where('invoice_code', $datas["invoice_code"]);
		$this->db->delete('tb_konfirmasi_pembayaran');
		
		$this->db->insert('tb_konfirmasi_pembayaran', $datas);
		
		return true;
    }
	
	public function update_status_transaksi($data)
    {
		$this->db->where('invoice_code', $data["invoice_code"]);
		$this->db->update('tb_pesanan', $data);
		
		return true;
    }
	
	public function update_reports($data)
    {
		$this->db->where('invoice_code', $data["invoice_code"]);
		$this->db->update('tb_income_report', $data);
		
		return true;
    }
	
	public function check_review($datas)
    {
		$this->db->select('*');
		$this->db->from('tb_review p');
		$this->db->where('p.id_invoice', $datas["id_invoice"]);
		$this->db->where('p.id_produk', $datas["id_produk"]);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_review_by_invoice($invoice_code)
    {
		$this->db->select('*');
		$this->db->from('tb_review p');
		$this->db->where('p.id_invoice', $invoice_code);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }

}
?>