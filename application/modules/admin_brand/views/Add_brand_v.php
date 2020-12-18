
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Brand Form
        <small>Form Menambahkan Brand</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/brand/">Brand</a></li>
        <li class="active">Add Brand</li>
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
						
						echo form_open("admin/brand/add_brand_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<div class="col-md-6">
						<div class="form-group">
						  <label>Nama Brand</label>
						  <input required type="text" data-validation="length" data-validation-length="min2" maxlength="30" class="form-control" name="brand_name" placeholder="Masukkan Nama Brand">
						</div>
						
						<div class="form-group">
						  <label>Logo Brand</label>
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" required name="brand_logo" id="uploaded1" data-placeholder="No file" class="upload filestyle" data-value="uploaded1">
						  </label>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Add</button>
						<a href="<?php echo site_url('admin/brand/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<script>
  $.validate({
    modules : 'security'
  });
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>