 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delete Product Form
        <small>Form Menghapus Produk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/product/">Product</a></li>
        <li class="active">Delete Product</li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
		<div class="row">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<?php 
						if($this->session->flashdata('message')) 
						{
							echo $this->session->flashdata('message');
							$this->session->unset_userdata('message');
						}
						
						echo form_open("admin/product/delete_product_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
					<input type="hidden" name="produk_id" value="<?php echo $data_produk[0]->id_produk; ?>">
						
					<div class="col-md-8">
						<div class="form-group">
						  <label>Nama Produk</label>
						  <input disabled type="text" class="form-control" name="produk_name" value="<?php echo $data_produk[0]->nama_produk; ?>" placeholder="Masukkan Nama Produk">
						</div>
						
						<div class="form-group">
						  <label>Kode Produk</label>
						  <input disabled type="text" class="form-control" name="produk_code" value="<?php echo $data_produk[0]->kode_produk; ?>" placeholder="Masukkan Kode Produk">
						</div>
						
						<div class="form-group">
						  <label>Thumbnail Produk</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/produk/<?php echo $data_produk[0]->thumbnail_produk;?>" width="100px" height="100px">
						  <br>
						</div>
						
						<div class="form-group">
						  <label>Deskripsi Produk</label>
						  <br>
						  <textarea disabled id="deskripsi" rows="15" cols="10" name="produk_description"><?php echo $data_produk[0]->deskripsi_produk; ?></textarea>
						</div>
						
					</div>       
					<div class="col-md-4">
						<div class="form-group">
						  <label>Brand Produk</label>
						  <br>
							<?php
								echo $data_produk[0]->brand_produk;
							?> 
						</div>
						
						<div class="form-group">
						  <label>Kategori Produk</label>
						  <br>
							<?php
								echo $data_produk[0]->sub_kategori_produk;
							?> 
						</div>
						
						<div class="form-group">
						  <label>Stok Produk</label>
						  <input disabled type="number" step="1" min="1" class="form-control" name="produk_stok" value="<?php echo $data_produk[0]->stok_produk; ?>" placeholder="1">
						</div>
												
						<div class="form-group">
						  <label>Harga Produk</label>
						  <input disabled type="number" step="1000" min="0" placeholder="0" class="form-control" name="produk_price" value="<?php echo $data_produk[0]->harga_produk; ?>">
						</div>
						
						<div class="form-group">
						  <label>Status Rekomendasi</label>
						  <br>
							<?php
								echo $data_produk[0]->status_rekomendasi;
							?> 
						</div>
							
						<div class="form-group">
							<label>Tag Produk (Pisahkan dengan tanda koma)</label>
							<br>
							<?php
								echo $data_produk[0]->tag_produk;
							?> 
						</div>
						
						<div class="form-group">
						  <label>Status Produk</label>
						  <br>
							<?php
								echo $data_produk[0]->status_produk;
							?> 
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Delete</button>
						<a href="<?php echo site_url('admin/product/Product/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
