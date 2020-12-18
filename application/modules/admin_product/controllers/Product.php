<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_m');		
	}
	
	public function index()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
				
		$list_all_produk = $this->Product_m->get_all_produk();
		$data["list_all_produk"] = $list_all_produk;
		
		$data["stat"] = $this->get_statistic();
		
		$header->header_view();
		$this->load->view('List_product_v', $data);
		$footer->footer_view();
	}
	
	public function list_recommended_product()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
				
		$list_recommended_produk = $this->Product_m->get_recommended_produk();
		$data["list_recommended_produk"] = $list_recommended_produk;
		
		$data["stat"] = $this->get_statistic();
		
		$header->header_view();
		$this->load->view('List_recommended_product_v', $data);
		$footer->footer_view();
	}
	
	public function add_product()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
					
		$list_all_kategori = $this->Product_m->get_all_kategori();
		$data["list_all_kategori"] = $list_all_kategori;
		
		$list_all_brand = $this->Product_m->get_all_brand();
		$data["list_all_brand"] = $list_all_brand;
		
		$list_all_subkategori = $this->Product_m->get_all_subkategori();
		$data["list_all_subkategori"] = $list_all_subkategori;
		
		$header->header_view();
		$this->load->view('Add_product_v', $data);
		$footer->footer_view();
	}
	
	public function add_product_action()
	{
		$produk_name = $this->input->post('produk_name');
		$produk_rekomendasi = $this->input->post('produk_rekomendasi');
		$produk_price = $this->input->post('produk_price');
		$produk_stok = $this->input->post('produk_stok');
		$produk_weight = $this->input->post('produk_weight');
		$produk_brand = $this->input->post('produk_brand');
		$produk_code = $this->input->post('produk_code');
		$produk_status = $this->input->post('produk_status');
		$produk_description = $this->input->post('produk_description');
		$produk_category = $this->input->post('produk_category');
		$product_tag = $this->input->post('produk_tag');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Product');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/produk/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('produk_thumbnail'))
		{
			$this->session->set_flashdata("message", "Gagal Upload Images !");
			redirect('admin/product/add_product');
		}
		
		$produk_thumbnail = array("upload_data" => $this->upload->data());
		if(!empty($produk_thumbnail["upload_data"]["file_name"]))
		{
			$datas = array(
						'nama_produk' => $produk_name,
						'harga_produk' => $produk_price,
						'stok_produk' => $produk_stok,
						'weight_produk' => $produk_weight,
						'brand_produk' => $produk_brand,
						'kode_produk' => $produk_code,
						'status_produk' => $produk_status,
						'status_rekomendasi' => $produk_rekomendasi,
						'deskripsi_produk' => $produk_description,
						'sub_kategori_produk' => $produk_category,
						'tag_produk' => $product_tag,
						'thumbnail_produk' => $produk_thumbnail["upload_data"]["file_name"]
					);
					
			
			$insertproduk = $this->Product_m->insert_product($datas);
			$id_produk = $this->db->insert_id();
			
			if($insertproduk)
			{
				$files = $_FILES;
				for($i=0; $i< count($_FILES['imageproduk']['name']); $i++)
				{           
					unset($config);
					$config = array();
					$config['upload_path'] = 'assets/images/produk/';
					$config['allowed_types'] = $file_type;
					$config['max_size'] = $file_size;
					$config['file_name'] = $_FILES['imageproduk']['name'][$i];

					$_FILES['f']['name'] =  $_FILES['imageproduk']['name'][$i];
					$_FILES['f']['type'] = $_FILES['imageproduk']['type'][$i];
					$_FILES['f']['tmp_name'] = $_FILES['imageproduk']['tmp_name'][$i];
					$_FILES['f']['error'] = $_FILES['imageproduk']['error'][$i];
					$_FILES['f']['size'] = $_FILES['imageproduk']['size'][$i];

					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);            
					if(!$this->upload->do_upload('f'))
					{
						$data['errors'] = $this->upload->display_errors();
					}
					else
					{
						$data['errors'] = "SUCCESS";
						
						$dataimage = array(
										"id_produk"=>$id_produk,
										"name_image_produk"=>$_FILES['f']['name'],
										"status_image_produk"=>"active",
									);
						
						$this->Product_m->insert_image_product($dataimage);
					}
				}
				
				redirect("admin/product/");
			}
		}
	}
	
	public function upload_files()
	{       
		$this->load->library('upload');

		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/produk/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
				
		$files = $_FILES;
		for($i=0; $i< count($_FILES['imageproduk']['name']); $i++)
		{           
			$_FILES['imageproduk']['name']= $files['imageproduk']['name'][$i];

			$this->upload->initialize($config);
			$this->upload->do_upload();
		}
	}

	public function edit_product($id_produk)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_produk = $this->Product_m->get_produk_by_id($id_produk);
		if($data_produk == null)
			redirect("not_found");
		
		$data["data_produk"] = $data_produk;
		
		$list_all_kategori = $this->Product_m->get_all_kategori();
		$data["list_all_kategori"] = $list_all_kategori;
		
		$list_all_subkategori = $this->Product_m->get_all_subkategori();
		$data["list_all_subkategori"] = $list_all_subkategori;
		
		$list_all_images = $this->Product_m->get_images_produk_by_id($id_produk);
		$data["list_all_images"] = $list_all_images;
		
		$list_all_brand = $this->Product_m->get_all_brand();
		$data["list_all_brand"] = $list_all_brand;
		
		$header->header_view();
		$this->load->view('Edit_product_v', $data);
		$footer->footer_view();
	}
	
	public function edit_product_action()
	{
		$produk_id = $this->input->post('produk_id');
		$produk_rekomendasi = $this->input->post('produk_rekomendasi');
		$produk_name = $this->input->post('produk_name');
		$produk_price = $this->input->post('produk_price');
		$produk_stok = $this->input->post('produk_stok');
		$produk_weight = $this->input->post('produk_weight');
		$produk_brand = $this->input->post('produk_brand');
		$produk_code = $this->input->post('produk_code');
		$produk_status = $this->input->post('produk_status');
		$produk_description = $this->input->post('produk_description');
		$produk_category = $this->input->post('produk_category');
		$product_tag = $this->input->post('produk_tag');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Product');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/produk/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!empty($_FILES["produk_thumbnail"]["name"]))
		{
			if(!$this->upload->do_upload('produk_thumbnail'))
			{
				$this->session->set_flashdata("message", "Gagal Upload Images !");
				redirect('admin/product/edit_product/'.$produk_id);
			}else
			{
				$this->upload->do_upload('produk_thumbnail');
			}
		}
		
		$produk_thumbnail = array("upload_data" => $this->upload->data());
		if(!empty($produk_thumbnail["upload_data"]["file_name"]))
		{
			$datas = array(
						'id_produk' => $produk_id,
						'nama_produk' => $produk_name,
						'harga_produk' => $produk_price,
						'stok_produk' => $produk_stok,
						'weight_produk' => $produk_weight,
						'kode_produk' => $produk_code,
						'brand_produk' => $produk_brand,
						'status_produk' => $produk_status,
						'status_rekomendasi' => $produk_rekomendasi,
						'deskripsi_produk' => $produk_description,
						'sub_kategori_produk' => $produk_category,
						'tag_produk' => $product_tag,
						'thumbnail_produk' => $produk_thumbnail["upload_data"]["file_name"]
					);
					
			$updateproduk = $this->Product_m->update_product($datas);
			if($updateproduk)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/product/edit_product/'.$produk_id);
			}
		}else
		{
			$datas = array(
						'id_produk' => $produk_id,
						'nama_produk' => $produk_name,
						'harga_produk' => $produk_price,
						'stok_produk' => $produk_stok,
						'weight_produk' => $produk_weight,
						'brand_produk' => $produk_brand,
						'kode_produk' => $produk_code,
						'status_produk' => $produk_status,
						'status_rekomendasi' => $produk_rekomendasi,
						'deskripsi_produk' => $produk_description,
						'tag_produk' => $product_tag,
						'sub_kategori_produk' => $produk_category,
					);
					
			$updateproduk = $this->Product_m->update_product($datas);
			if($updateproduk)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/product/edit_product/'.$produk_id);
			}
		}
	}
	
	public function delete_product($id_produk)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$data_produk = $this->Product_m->get_produk_by_id($id_produk);
		if($data_produk == null)
			redirect("not found");

		$data["data_produk"] = $data_produk;
		
		$header->header_view();
		$this->load->view('Delete_product_v', $data);
		$footer->footer_view();
	}
	
	public function delete_product_action()
	{
		$product_id = $this->input->post('produk_id');
		
		$datas = array(
						'id_produk' => $product_id,
					);
		$check_detail = $this->Product_m->check_exist_usage($datas);
		if($check_detail > 0)
		{
			$this->session->set_flashdata("message", "Produk ada di transaksi dan tidak bisa di delete !");
			redirect('admin/product/delete_product/'.$product_id);
		}else
		{
			$deleteproduk = $this->Product_m->delete_product($datas);
			if($deleteproduk)
			{
				$this->session->set_flashdata("message", "Produk berhasil di delete !");
				redirect('admin/product/');
			}
		}
	}
	
	public function edit_image_produk($id_produk, $id_image_produk)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();		
		
		$data_image_produk = $this->Product_m->get_image_produk_by_id($id_image_produk);
		if($data_image_produk == null)
			redirect("not_found");
		
		$data["data_image_produk"] = $data_image_produk;
		$data["id_produk"] = $id_produk;
		
		$header->header_view();
		$this->load->view('Edit_product_detail_v', $data);
		$footer->footer_view();
	}
	
	public function edit_image_produk_action()
	{
		$id_image_produk = $this->input->post('id_image_produk');
		$id_produk = $this->input->post('id_produk');
		$image_status = $this->input->post('image_status');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Product');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/produk/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!empty($_FILES["image_produk"]["name"]))
		{
			if(!$this->upload->do_upload('image_produk'))
			{
				$this->session->set_flashdata("message", "Gagal Upload Images !");
				redirect('admin/product/edit_image_produk/'.$id_produk.'/'.$id_image_produk);
			}else
			{
				$this->upload->do_upload('image_produk');
			}
		}
		
		$image_produk = array("upload_data" => $this->upload->data());
		if(!empty($image_produk["upload_data"]["file_name"]))
		{
			$datas = array(
						'id_image_produk' => $id_image_produk,
						'id_produk' => $id_produk,
						'status_image_produk' => $image_status,
						'name_image_produk' => $image_produk["upload_data"]["file_name"]
					);
					
			$updateimageproduk = $this->Product_m->update_image_product($datas);
			if($updateimageproduk)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/product/edit_image_produk/'.$id_produk.'/'.$id_image_produk);
			}
		}else
		{
			$datas = array(
						'id_image_produk' => $id_image_produk,
						'id_produk' => $id_produk,
						'status_image_produk' => $image_status,
					);
					
			$updateimageproduk = $this->Product_m->update_image_product($datas);
			if($updateimageproduk)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/product/edit_image_produk/'.$id_produk.'/'.$id_image_produk);
			}
		}
	}
	
	public function add_image_produk($id_produk)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();	
		
		$data["id_produk"] = $id_produk;
		
		$header->header_view();
		$this->load->view('Add_product_detail_v', $data);
		$footer->footer_view();
	}
	
	public function add_image_produk_action()
	{
		$id_produk = $this->input->post('id_produk');
		$image_status = $this->input->post('image_status');
		
		//setting untuk upload image
		$upload_settings = $this->get_upload_settings('Product');
		$file_size = $upload_settings[0]->file_size;
		$file_type = $upload_settings[0]->file_type;
		
		$theme = $this->settings()["theme"];
		$config['upload_path'] = 'assets/'.$theme.'/images/produk/';
		$config['allowed_types'] = $file_type;
		$config['max_size'] = $file_size;
		$this->load->library('upload', $config);
		
		if(!empty($_FILES["image_produk"]["name"]))
		{
			if(!$this->upload->do_upload('image_produk'))
			{
				$this->session->set_flashdata("message", "Gagal Upload Images !");
				redirect('admin/product/edit_product/'.$id_produk);
			}else
			{
				$this->upload->do_upload('image_produk');
			}
		}
		
		$image_produk = array("upload_data" => $this->upload->data());
		if(!empty($image_produk["upload_data"]["file_name"]))
		{
			$datas = array(
						'id_produk' => $id_produk,
						'status_image_produk' => $image_status,
						'name_image_produk' => $image_produk["upload_data"]["file_name"]
					);
					
			$insert_image_product = $this->Product_m->insert_image_product($datas);
			if($insert_image_product)
			{
				$this->session->set_flashdata("message", "Berhasil Update !");
				redirect('admin/product/edit_product/'.$id_produk);
			}else
			{
				$this->session->set_flashdata("message", "Gagal Update Images !");
				redirect('admin/product/edit_product/'.$id_produk);
			}
		}
	}
	
	public function delete_image_produk($id_produk, $id_image_produk)
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();	
				
		$data_image_produk = $this->Product_m->get_image_produk_by_id($id_image_produk);
		if($data_image_produk == null)
			redirect("not_found");
		
		$data["data_image_produk"] = $data_image_produk;
		$data["id_produk"] = $id_produk;
		
		$header->header_view();
		$this->load->view('Delete_product_detail_v', $data);
		$footer->footer_view();
	}
	
	public function delete_image_produk_action()
	{
		$id_image_produk = $this->input->post('id_image_produk');
		$id_produk = $this->input->post('id_produk');
		
		$datas = array(
						'id_image_produk' => $id_image_produk,
						'id_produk' => $id_produk,
					);
					
		$delete_image = $this->Product_m->delete_image_product($datas);
		if($delete_image)
		{
			$this->session->set_flashdata("message", "Gambar berhasil di delete !");
			redirect('admin/product/edit_product/'.$id_produk);
		}else
		{
			$this->session->set_flashdata("message", "Gambar gagal di delete !");
			redirect('admin/product/edit_product/'.$id_produk);		
		}
	}
	
	public function get_statistic()
	{
		$data["nproduct"] = count($this->Product_m->get_all_produk());
		$data["nactiveproduct"] = count($this->Product_m->get_active_produk());
		$data["nnonactiveproduct"] = count($this->Product_m->get_notactive_produk());
		$data["nrecommendedproduct"] = count($this->Product_m->get_recommended_produk());
		return $data;
	}
	
	public function get_n_total_product()
	{
		$total = sizeof($this->Product_m->get_all_produk());
		return $total;
	}
}
