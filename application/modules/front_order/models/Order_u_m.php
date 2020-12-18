<?php
class Order_u_m extends CI_Model {

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
	
	public function get_settings_general()
	{
		$this->db->select('*');
		$this->db->from('tb_settings');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_settings_shipping()
	{
		$this->db->select('*');
		$this->db->from('tb_shipping');
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function insert_cart($data_cart)
    {
		$cond = array(
					"id_user" => $data_cart["id_user"],
					"id_produk" => $data_cart["id_produk"], 
				);
				
		$this->db->select('*');
		$this->db->from('tb_cart');
		$this->db->where($cond);
    
        $query = $this->db->get();
        $jumlah = $query->num_rows();
    
    
		//kalau id produk sudah ada di db
		if($jumlah > 0)
		{
			$this->db->select('count');
			$this->db->from('tb_cart');
			$this->db->where($cond);
			$query = $this->db->get();
		   
			$count = $query->result();
			$count = $count[0]->count;
		  
			$countnya = array("count" => ($data_cart["count"]+$count));
			
			$this->db->where($cond);
			$this->db->update('tb_cart', $countnya);
			
			return true;
		}else
		{
			$query = $this->db->insert('tb_cart', $data_cart);
			
			return true;
		}
    }
	
	public function select_content($id)
    {
		$this->db->select('*');
		$this->db->from('tb_produk'); 
		$this->db->where('id_produk',$id);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function cek_idcourse($data)
	{
		$this->db->select('*');
		$this->db->from('tb_cart');
		$this->db->where($data);
		
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
  
	public function select_cart($iduser)
    {
		$this->db->select('*');
		$this->db->from('tb_cart');
		$this->db->where("id_user" , $iduser);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    
    }
	
	public function insert_cartspec($datas)
    {
		$query = $this->db->insert('tb_cart', $datas);
		
		return true;
	}
    
	public function update_cart($data, $condition)
    {
		$this->db->where($condition);
		$this->db->update('tb_cart', $data);
        
		return true;
    }
	
	public function get_user_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('tb_user'); 
		$this->db->where('id_user', $id);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function insert_transaksi($data_order)
    {
		$this->db->insert('tb_pesanan', $data_order);
		
		return true;
    }
	
	public function insert_shipping_transaksi($data_shipping)
    {
		$this->db->insert('tb_shipping_pesanan', $data_shipping);
		
		return true;
    }
	
	public function insert_detail_transaksi($data_order)
    {
		$this->db->insert('tb_detail_pesanan', $data_order);
		
		return true;
    }
	
	public function insert_reports($data_reports)
    {
		$this->db->insert('tb_income_report', $data_reports);
		
		return true;
    }
	
	public function remove_cart($iduser)
    {
        $this->db->where('id_user', $iduser);
        $this->db->delete('tb_cart');
		
		return true;
    }
	
	public function deletecartnya($datanya)
    {
        $this->db->where($datanya);
        $this->db->delete('tb_cart');
		
        return true;
    }
}
?>