 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Slider Form
        <small>Form Menambah Slider</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/slider/">Slider</a></li>
        <li class="active">Add Slider</li>
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
						
						echo form_open("admin/banner/add_banner_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<div class="col-md-6">
						<div class="form-group">
						  <label>Kode Banner</label>
						  <input required type="text" data-validation="length" data-validation-length="min2" maxlength="30" class="form-control" name="kode_banner" placeholder="Masukkan Kode Banner">
						</div>
						
						<div class="form-group">
						  <label>Gambar Banner</label>
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" name="gambar_banner" id="uploaded1" data-placeholder="No File" class="upload filestyle" data-value="uploaded1">
						  </label>
						</div>
						
						<div class="form-group">
						  <label>Keterangan Banner</label>
						  <input required type="text" data-validation="length" data-validation-length="min2" maxlength="30" class="form-control" name="keterangan_banner" placeholder="Masukkan Keterangan Banner">
						</div>
						
						<div class="form-group">
						  <label>Link Banner</label>
						  <input required type="text" data-validation="length" data-validation-length="min2" maxlength="100" class="form-control" name="link_banner" placeholder="Masukkan Link Banner">
						</div>
						
						<div class="form-group">
						  <label>Status Banner</label>
						  <select required class="form-control" name="status_banner">
							<option class="form-control" value="aktif">aktif</option>
							<option class="form-control" value="nonaktif">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Add</button>
						<a href="<?php echo site_url('admin/banner/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
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