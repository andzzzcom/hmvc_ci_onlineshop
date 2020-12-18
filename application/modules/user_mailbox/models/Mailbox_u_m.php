<?php
class Mailbox_u_m extends CI_Model {

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
}
?>