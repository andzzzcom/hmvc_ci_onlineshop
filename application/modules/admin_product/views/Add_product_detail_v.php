 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Images Product Form
        <small>Form Menambah Gambar Produk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/product/">Product</a></li>
        <li><a href="<?php echo base_url();?>admin/product/edit_product/<?php echo $id_produk; ?>">Edit Product</a></li>
        <li class="active">Add Image</li>
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
						
						echo form_open("admin/product/add_image_produk_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
					<input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
						
					<div class="col-md-4">
						<div class="form-group">
						  <label>Gambar Produk</label>
						  <br>
						  <label class="ea-file">Choose file
							<input required type="file" name="image_produk" id="uploaded1" class="upload" data-value="uploaded1">
						  </label>
						</div>
						
						<div class="form-group">
						  <label>Status Gambar</label>
						  <select required class="form-control" name="image_status">
							<option class="form-control" value="active">Active</option>
							<option class="form-control" value="nonactive">Non Active</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Add</button>
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
 
