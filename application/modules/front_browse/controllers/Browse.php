<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Browse extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('Browse_u_m');
	}
	
	public function index()
	{
		$data = $this->settings();
		
		$this->header_settings();
		$this->load->view('User/Home/home_view');
		$this->footer_settings();
		
	}
	
	public function category($idcategory)
	{
		$data = $this->settings();
		
        $this->load->helper("url");
        $this->load->library("pagination");
		
		$detail_kategori = $this->Browse_u_m->get_detail_kategori($idcategory);
		if($detail_kategori == null)
			redirect('not_found');
		
		$data["name_kategori"] = $detail_kategori[0]->name_kategori;
		
		
		$total_produk = $this->Browse_u_m->get_n_produk_by_kategori($idcategory);;
		$data["total_produk"] = $total_produk;
		
		$per_page = 12;
		$url_segment = 4;
		$datas = array(
					"total_data_order"=>$total_produk,
					"base_url"=>base_url()."Browse/category/".$idcategory,
					"per_page"=>$per_page,
					"uri_segment"=>$url_segment,
				);
		$config = $this->pagination_settings($datas);
		$page = ($this->uri->segment($url_segment)) ? $this->uri->segment($url_segment) : 0;
		$data['pagination'] = $this->pagination->create_links();
		
		
		$data_produk = $this->Browse_u_m->get_produk_by_kategori($idcategory,  $config["per_page"], $page);
		$data["data_produk"] = $data_produk;
		
		
		$this->header_settings();
		$this->load->view('User/Browse/kategori_view', $data);
		$this->footer_settings();
		
	}
	
	public function subcategory($idsubcategory)
	{
		$data = $this->settings();
		
        $this->load->helper("url");
        $this->load->library("pagination");
		
		$detail_subkategori = $this->Browse_u_m->get_detail_subkategori($idsubcategory);
		if($detail_subkategori == null)
			redirect('not_found');
		
		$data["name_sub_kategori"] = $detail_subkategori[0]->name_sub_kategori;
		
		
		$total_produk = $this->Browse_u_m->get_n_produk_by_subkategori($idsubcategory);;
		$data["total_produk"] = $total_produk;
		
		$per_page = 12;
		$url_segment = 4;
		$datas = array(
					"total_data_order"=>$total_produk,
					"base_url"=>base_url()."Browse/subcategory/".$idsubcategory,
					"per_page"=>$per_page,
					"uri_segment"=>$url_segment,
				);
		$config = $this->pagination_settings($datas);
		$page = ($this->uri->segment($url_segment)) ? $this->uri->segment($url_segment) : 0;
		$data['pagination'] = $this->pagination->create_links();
		
		
		$data_produk = $this->Browse_u_m->get_produk_by_subkategori($idsubcategory,  $config["per_page"], $page);
		$data["data_produk"] = $data_produk;
		
		
		
		$this->header_settings();
		$this->load->view('User/Browse/subkategori_view', $data);
		$this->footer_settings();
		
	}
	
	public function brand($idbrand)
	{
		$data = $this->settings();
		
        $this->load->helper("url");
        $this->load->library("pagination");
		
		$detail_brand = $this->Browse_u_m->get_detail_brand($idbrand);
		if($detail_brand == null)
			redirect('not_found');
		
		$data["name_brand"] = $detail_brand[0]->name_brand;
		
		
		$total_produk = $this->Browse_u_m->get_n_produk_by_brand($idbrand);;
		$data["total_produk"] = $total_produk;
		
		$per_page = 12;
		$url_segment = 4;
		$datas = array(
					"total_data_order"=>$total_produk,
					"base_url"=>base_url()."Browse/brand/".$idbrand,
					"per_page"=>$per_page,
					"uri_segment"=>$url_segment,
				);
		$config = $this->pagination_settings($datas);
		$page = ($this->uri->segment($url_segment)) ? $this->uri->segment($url_segment) : 0;
		$data['pagination'] = $this->pagination->create_links();
		
		
		$data_produk = $this->Browse_u_m->get_produk_by_brand($idbrand,  $config["per_page"], $page);
		$data["data_produk"] = $data_produk;
		
		
		
		$this->header_settings();
		$this->load->view('User/Browse/brand_view', $data);
		$this->footer_settings();
		
	}
}
