<?php
class Settings_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_settings_upload()
	{
		$this->db->select('*');
		$this->db->from('tb_settings_upload');
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
	
	public function update_settings_upload($datasupload)
	{
		$this->db->where('id_settings_upload', $datasupload["id_settings_upload"]);
		$this->db->update('tb_settings_upload', $datasupload);
		return true;
	}
	
	public function update_general_settings($datasgeneral)
	{
		$this->db->update('tb_settings', $datasgeneral);
		return true;
	}
	
	public function update_shipping_settings($datashipping)
	{
		$this->db->update('tb_shipping', $datashipping);
		return true;
	}
	
	public function get_settings_upload_by_id($id_setting)
	{
		$this->db->select('*');
		$this->db->from('tb_settings_upload');
		$this->db->where('id_settings_upload', $id_setting);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function get_shipping_settings()
	{
		$this->db->select('*');
		$this->db->from('tb_shipping');
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
}
?>