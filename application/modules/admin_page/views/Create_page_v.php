 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create page
        <small>Membuat Page baru</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/page/">Page</a></li>
        <li class="active">Create Page</li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
		<div class="row">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-10">
					<?php 
						if($this->session->flashdata('message')) 
						{
							echo $this->session->flashdata('message');
							$this->session->unset_userdata('message');
						}
						
						echo form_open("admin/page/create_page_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						<div class="form-group">
						  <label>Kode Page</label>
						  <input type="text" required class="form-control" maxlength="100" name="kode_page" placeholder="Masukkan kode page">
						</div>
						
						<div class="form-group">
						  <label>Title Page</label>
						  <br>
						  <input type="text" required data-validation="length" data-validation-length="min3" maxlength="50" name="title_page" class="form-control" placeholder="Masukkan Title Page">
						</div>
						
						<div class="form-group">
						  <label>Sub Title Page</label>
						  <br>
						  <input type="text" required data-validation="length" data-validation-length="min3" maxlength="50" name="subtitle_page" class="form-control" placeholder="Masukkan Subtitle Page">
						</div>
						
						<div class="form-group">
						  <label>Isi Page</label>
						  <br>
						  <textarea id="deskripsi" name="content_page" cols="100" rows="10" placeholder="Masukkan Isi Page"></textarea>
						</div>
						
						<div class="form-group">
						  <label>Status Page</label>
						  <select required class="form-control" name="status_page">
							<option class="form-control" value="active">aktif</option>
							<option class="form-control" value="not active">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Create</button>
						<a href="<?php echo site_url('admin/page/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
						<?php echo form_close(); ?>
					</div>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>