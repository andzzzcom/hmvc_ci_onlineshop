<?php
class Profile_u_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function check_email_user($data)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('email_user', $data["email_user"]);
		$query = $this->db->get();
		$result = $query->num_rows();
		$result2 = $query->result();
		
		return (($result>0)&&($result2[0]->id_user !== $data["id_user"])) ? true:false;
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
	
	public function update_data_user($data)
    {
		$this->db->where('id_user', $data["id_user"]);
		$this->db->update('tb_user', $data);
		
		return true;
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
	
	public function get_all_transactions($id_user)
	{
		$this->db->select('*');
		$this->db->from('tb_pesanan');
		$this->db->where('customer_id', $id_user);
		$this->db->order_by('id_pesanan', 'DESC');
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
}
?>