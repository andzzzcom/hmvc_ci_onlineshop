 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Brand Form
        <small>Form Mengubah Brand</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/brand/">Brand</a></li>
        <li class="active">Edit Brand</li>
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
						
						echo form_open("admin/brand/edit_brand_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<input type="hidden" name="id_brand" value="<?php echo $data_brand[0]->id_brand; ?>">
					<div class="col-md-6">
						<div class="form-group">
						  <label>Nama Brand</label>
						  <input value="<?php echo $data_brand[0]->name_brand; ?>" required type="text" data-validation="length" data-validation-length="min2" maxlength="30" class="form-control" name="brand_name" placeholder="Masukkan Nama Brand">
						</div>
						
						<div class="form-group">
						  <label>Logo Brand</label>
						  <br>
						  <img src="<?php echo$url_theme;?>images/brand/<?php echo $data_brand[0]->logo_brand;?>" width="100px" height="100px">
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" name="brand_logo" id="uploaded1" data-placeholder="<?php echo $data_brand[0]->logo_brand;?>" class="upload filestyle" data-value="uploaded1">
						  </label>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Edit</button>
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
			lang: 'es'
		});
	</script>