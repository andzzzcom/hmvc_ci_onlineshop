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
	
	public function get_settings_upload_by_menu($menu_name)
	{
		$this->db->select('*');
		$this->db->from('tb_settings_upload');
		$this->db->where('menu_name', $menu_name);
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
	
	public function get_user_by_id($id_user)
    {
		$this->db->select('*');
		$this->db->from('tb_user p'); 
		$this->db->where('p.id_user', $id_user);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_data_user_by_email($email)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('email_user', $email);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
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
	
	public function get_city_by_id_city($id_city)
    {
		$this->db->select('*');
		$this->db->from('tb_kota_kabupaten_lists k'); 
		$this->db->where('k.id_city', $id_city);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_province_by_id_province($id_provinsi)
    {
		$this->db->select('*');
		$this->db->from('tb_provinsi_lists k'); 
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
	
	public function get_district_by_id_district($id_district)
    {
		$this->db->select('*');
		$this->db->from('tb_kecamatan_lists k'); 
		$this->db->where('k.id_district', $id_district);
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
	
	public function get_wishlist_by_idcustomer($idcustomer, $limit, $start)
	{
		$this->db->select('*');
		$this->db->join('tb_produk p', 'p.id_produk = w.id_produk', 'left');
		$this->db->from('tb_wishlist w');
        $this->db->limit($limit, $start);
		$this->db->where('w.id_customer', $idcustomer);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_n_wishlist_by_idcustomer($idcustomer)
	{
		$this->db->select('*');
		$this->db->join('tb_produk p', 'p.id_produk = w.id_produk', 'left');
		$this->db->from('tb_wishlist w');
		$this->db->where('w.id_customer', $idcustomer);
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return $result;
	}
	
	public function get_n_all_message($id_user)
	{
		$this->db->select('*');
		$this->db->from('tb_inbox_customer');
		$this->db->where('id_customer', $id_user);
		$this->db->where('type_sender', 'admin');
		$this->db->order_by('id_message', 'DESC');
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return $result;
	}
	
	public function get_all_message($id_user, $limit, $start)
	{
		$this->db->select('*');
		$this->db->from('tb_inbox_customer');
        $this->db->limit($limit, $start);
		$this->db->where('id_customer', $id_user);
		$this->db->where('type_sender', 'admin');
		$this->db->order_by('id_message', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_n_all_message_sent($id_user)
	{
		$this->db->select('*');
		$this->db->from('tb_inbox_customer');
		$this->db->where('id_customer', $id_user);
		$this->db->where('type_sender', 'customer');
		$this->db->order_by('id_message', 'DESC');
		$query = $this->db->get();
		$result = $query->num_rows();
		
		return $result;
	}
	
	public function get_all_message_sent($id_user, $limit, $start)
	{
		$this->db->select('*');
		$this->db->from('tb_inbox_customer');
        $this->db->limit($limit, $start);
		$this->db->where('id_customer', $id_user);
		$this->db->where('type_sender', 'customer');
		$this->db->order_by('id_message', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_detail_message($id_message)
	{
		$this->db->select('*');
		$this->db->join('tb_user u', 'u.id_user = p.id_customer', 'left');
		$this->db->from('tb_inbox_customer p');
		$this->db->where('p.id_message', $id_message);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function insert_message($datas)
    {
		$this->db->insert('tb_inbox_customer', $datas);
		
		return true;
    }
	
	public function insert_review($datas)
    {
		$this->db->insert('tb_review', $datas);
		
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