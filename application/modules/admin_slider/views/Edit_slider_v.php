 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Slider Form
        <small>Form Mengubah Slider</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/slider/">Slider</a></li>
        <li class="active">Edit Slider</li>
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
						
						echo form_open("admin/slider/edit_slider_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<input type="hidden" name="id_slider" value="<?php echo $data_slider[0]->id_slider; ?>">
					<div class="col-md-6">
						<div class="form-group">
						  <label>Kode Slider</label>
						  <input value="<?php echo $data_slider[0]->kode_slider; ?>" required type="text" data-validation="length" data-validation-length="min2" maxlength="30" class="form-control" name="slider_kode" placeholder="Masukkan Kode Slider">
						</div>
						
						<div class="form-group">
						  <label>Gambar Slider</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/slider/<?php echo $data_slider[0]->gambar_slider;?>" width="100px" height="100px">
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" name="slider_image" id="uploaded1" data-placeholder="<?php echo $data_slider[0]->gambar_slider;?>" class="upload filestyle" data-value="uploaded1">
						  </label>
						</div>
						
						<div class="form-group">
						  <label>Title Slider</label>
						  <input value="<?php echo $data_slider[0]->title_slider; ?>" required type="text" data-validation="length" data-validation-length="min2" maxlength="30" class="form-control" name="slider_title" placeholder="Masukkan Title Slider">
						</div>
						
						<div class="form-group">
						  <label>Subtitle Slider</label>
						  <input value="<?php echo $data_slider[0]->subtitle_slider; ?>" required type="text" data-validation="length" data-validation-length="min2" maxlength="30" class="form-control" name="slider_subtitle" placeholder="Masukkan Subtitle Slider">
						</div>
						
						<div class="form-group">
						  <label>Keterangan Slider</label>
						  <input value="<?php echo $data_slider[0]->keterangan_slider; ?>" required type="text" data-validation="length" data-validation-length="min2" maxlength="30" class="form-control" name="slider_keterangan" placeholder="Masukkan Keterangan Slider">
						</div>
						
						<div class="form-group">
						  <label>Link Slider</label>
						  <input value="<?php echo $data_slider[0]->link_slider; ?>" required type="text" data-validation="length" data-validation-length="min2" maxlength="100" class="form-control" name="slider_link" placeholder="Masukkan Link Slider">
						</div>
						
						<div class="form-group">
						  <label>Status Slider</label>
						  <select required class="form-control" name="slider_status">
							<option class="form-control" <?php if($data_slider[0]->status_slider =="aktif") echo"selected"; ?> value="aktif">aktif</option>
							<option class="form-control" <?php if($data_slider[0]->status_slider =="nonaktif") echo"selected"; ?> value="nonaktif">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Edit</button>
						<a href="<?php echo site_url('admin/slider/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
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