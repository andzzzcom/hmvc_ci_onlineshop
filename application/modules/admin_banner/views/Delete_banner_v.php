 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delete Banner Form
        <small>Form Menghapus Banner</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/banner/">Banner</a></li>
        <li class="active">Delete Banner</li>
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
						
						echo form_open("admin/banner/delete_banner_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<input type="hidden" name="id_banner" value="<?php echo $data_banner[0]->id_banner; ?>">
					<div class="col-md-6">
						<div class="form-group">
						  <label>Kode Banner</label>
						  <input readonly value="<?php echo $data_banner[0]->kode_banner; ?>" required type="text" data-validation="length" data-validation-length="min2" maxlength="30" class="form-control" name="kode_banner" placeholder="Masukkan Kode Banner">
						</div>
						
						<div class="form-group">
						  <label>Gambar Banner</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/banner/<?php echo $data_banner[0]->gambar_banner;?>" width="100px" height="100px">
						  <br>
						  <label class="ea-file">Choose file
							<input readonly type="file" name="gambar_banner" id="uploaded1" data-placeholder="<?php echo $data_banner[0]->gambar_banner;?>" class="upload filestyle" data-value="uploaded1">
						  </label>
						</div>
						
						<div class="form-group">
						  <label>Keterangan Banner</label>
						  <input readonly value="<?php echo $data_banner[0]->keterangan_banner; ?>" required type="text" data-validation="length" data-validation-length="min2" maxlength="30" class="form-control" name="keterangan_banner" placeholder="Masukkan Keterangan Banner">
						</div>
						
						<div class="form-group">
						  <label>Link Banner</label>
						  <input readonly value="<?php echo $data_banner[0]->link_banner; ?>" required type="text" data-validation="length" data-validation-length="min2" maxlength="100" class="form-control" name="link_banner" placeholder="Masukkan Link Banner">
						</div>
						
						<div class="form-group">
						  <label>Status Banner</label>
						  <select readonly required class="form-control" name="status_banner">
							<option class="form-control" <?php if($data_banner[0]->status_banner =="aktif") echo"selected"; ?> value="aktif">aktif</option>
							<option class="form-control" <?php if($data_banner[0]->status_banner =="nonaktif") echo"selected"; ?> value="nonaktif">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Delete</button>
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