<?php
class Report_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_income_monthly()
    {
		$this->db->select('i.*, sum(total_price_bruto) as total_price_bruto, sum(voucher_diskon) as voucher_diskon, sum(ongkos_kirim) as ongkos_kirim , sum(total_price_netto) as total_price_netto');
		$this->db->from('tb_income_report i'); 
		$this->db->where('i.status_pesanan', 'paid');
		$this->db->group_by(array("i.bulan_pesanan", "i.tahun_pesanan"));
		$this->db->order_by("id_report", "desc");
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_detail_income_monthly($month, $year)
    {
		$this->db->select('*');
		$this->db->from('tb_income_report i'); 
		$this->db->where('i.status_pesanan', 'paid');
		$this->db->where('i.bulan_pesanan', $month);
		$this->db->where('i.tahun_pesanan', $year);
		$this->db->order_by("id_report", "desc");
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_income_yearly()
    {
		$this->db->select('i.*, sum(total_price_bruto) as total_price_bruto, sum(voucher_diskon) as voucher_diskon, sum(ongkos_kirim) as ongkos_kirim , sum(total_price_netto) as total_price_netto');
		$this->db->from('tb_income_report i'); 
		$this->db->where('i.status_pesanan', 'paid');
		$this->db->group_by(array("i.tahun_pesanan"));
		$this->db->order_by("id_report", "desc");
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
	
	public function get_detail_income_yearly($year)
    {
		$this->db->select('*');
		$this->db->from('tb_income_report i'); 
		$this->db->where('i.status_pesanan', 'paid');
		$this->db->where('i.tahun_pesanan', $year);
		$this->db->order_by("id_report", "desc");
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
    }
}
?>