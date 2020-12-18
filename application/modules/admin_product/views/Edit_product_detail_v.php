 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Images Product Form
        <small>Form Mengubah Gambar Produk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/product/">Product</a></li>
        <li><a href="<?php echo base_url();?>admin/product/edit_product/<?php echo $data_image_produk[0]->id_produk; ?>">Edit Product</a></li>
        <li class="active">Edit Image</li>
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
						
						echo form_open("admin/product/edit_image_produk_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
					<input type="hidden" name="id_image_produk" value="<?php echo $data_image_produk[0]->id_image_produk; ?>">
					<input type="hidden" name="id_produk" value="<?php echo $data_image_produk[0]->id_produk; ?>">
						
					<div class="col-md-4">
						<div class="form-group">
						  <label>Gambar Produk</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/produk/<?php echo $data_image_produk[0]->name_image_produk;?>" width="100px" height="100px">
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" name="image_produk" id="uploaded1" class="upload" data-value="uploaded1">
						  </label>
						</div>
						
						<div class="form-group">
						  <label>Status Gambar</label>
						  <select required class="form-control" name="image_status">
							<option class="form-control" value="active" <?php if($data_image_produk[0]->status_image_produk =="active") echo"selected"; ?>>Active</option>
							<option class="form-control" value="nonactive" <?php if($data_image_produk[0]->status_image_produk =="nonactive") echo"selected"; ?>>Non Active</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Edit</button>
						<a href="<?php echo site_url('admin/product/edit_product/'.$id_produk);?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
