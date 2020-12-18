<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Search_u_m');
	}

	public function result($keyword = null)
	{
		//load header and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		
		if($keyword === null)
		{
			$data = $this->settings();
		
			$data["result"] = null;
			
			$header->header_view();
			$this->load->view('Search_result_v', $data);
			$footer->footer_view();
		
		}else
		{
			$data = $this->settings();
		
			$this->load->helper("url");
			$this->load->library("pagination");
		
			$data["keyword"] = $keyword;
			
			$total_produk = $this->Search_u_m->get_n_produk_search($keyword);;
			$data["total_produk"] = $total_produk;
			
			
			$per_page = 12;
			$url_segment = 3;
			$datas = array(
						"total_data_order"=>$total_produk,
						"base_url"=>base_url()."search/".$keyword,
						"per_page"=>$per_page,
						"uri_segment"=>$url_segment,
					);
			$config = $this->pagination_settings($datas);
			$page = ($this->uri->segment($url_segment)) ? $this->uri->segment($url_segment) : 0;
			$data['pagination'] = $this->pagination->create_links();
			
			
			$result = $this->Search_u_m->search_product_by_name($keyword, $config["per_page"], $page);
			$data["result"] = $result;
			
			$header->header_view();
			$this->load->view('Search_result_v', $data);
			$footer->footer_view();
		
		}
		
	}
}
