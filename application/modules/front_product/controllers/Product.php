<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_u_m');
		$this->load->model('Home_u_m');
	}

	public function product_list()
	{
		//load header and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		
		//get all product
		$list_produk = $this->Product_u_m->get_all_produk();
		$data["item"] = $list_produk;
		
		$header->header_view();
		$this->load->view("Product_v", $data);
		$footer->footer_view();
	}

	public function detail($id_produk)
	{
		//load header and footer module
		$header = $this->loaded_module(0);
		$footer = $this->loaded_module(1);
		
		$data = $this->settings();

		$id_user = $this->session->userdata("id_user");
		if($id_user !== null)
		{
			$data_wishlist = $this->Home_u_m->get_wishlist_by_idcustomer($id_user);
			$data["data_wishlist"] = $data_wishlist;

			$arrayproduk = array();
			foreach($data_wishlist as $data_wishlist)
			{
				array_push($arrayproduk, $data_wishlist->id_produk);
			}
			$data["data_produk_wishlist"] = $arrayproduk;

		}

		$data_produk = $this->Product_u_m->get_produk_by_id($id_produk);
		if($data_produk == null)
			redirect('not_found');

		//if($data_produk[0]->status_produk == "sold")
		//	redirect('not_found');


		$data["data_produk"] = $data_produk;

		$subkategori = $data_produk[0]->sub_kategori_produk;

		$data["kategori"] = $this->Product_u_m->get_kategori_by_id_subkategori($subkategori)[0]->name_kategori;

		$data_gambar_produk = $this->Product_u_m->get_gambar_produk_by_id($id_produk);
		$data["data_gambar_produk"] = $data_gambar_produk;

		$special_product = $this->special_product_list(3);
		$data["special_product"] = $special_product;

		$data_review = $this->Product_u_m->get_review_product($id_produk);
		$data["data_review"] = $data_review;

		$data_reply_review = $this->Product_u_m->get_all_reply_review();
		$data["data_reply_review"] = $data_reply_review;
		
		$d_prod = array("id_sub_kategori"=>$subkategori, "id_produk"=>$id_produk);
		$data_related_product = $this->related_product_list($d_prod);
		$data["related_product"] = $data_related_product;
		//print_r($data_related_product);

		$totalstar=0;
		$data_rating = $this->Product_u_m->count_rating_product($id_produk);
		if(!empty($data_rating))
		{
			$totalrating = $data_rating[0]->total_rating;
			$jumlahrating = $data_rating[0]->jumlah_rating;
			$totalstar = floor($totalrating/$jumlahrating);

		}
		$data["totalstar"] = $totalstar;

		

		$header->header_view();
		$this->load->view('Detail_product_v', $data);
		$footer->footer_view();
	}
	
	public function special_product_list($limit)
	{
		$product = $this->Product_u_m->get_recommended_produk($limit);
		return $product;
	}
	
	public function latest_product_list($limit)
	{
		$product = $this->Product_u_m->get_latest_product($limit);
		return $product;
	}
	
	public function related_product_list($data)
	{
		$product = $this->Product_u_m->get_related_produk($data);
		return $product;
	}
}
