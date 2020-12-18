 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delete page
        <small>Menghapus Page </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/page/">Page</a></li>
        <li class="active">Delete Page</li>
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
						
						echo form_open("admin/page/delete_page_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						<input type="hidden" name="id_page" value="<?php echo $data_page[0]->id_page; ?>">
						<div class="form-group">
						  <label>Kode Page</label>
						  <input readonly value="<?php echo $data_page[0]->kode_page;?>" type="text" required class="form-control" maxlength="100" name="kode_page" placeholder="Masukkan kode page">
						</div>
						
						<div class="form-group">
						  <label>Title Page</label>
						  <br>
						  <input readonly value="<?php echo $data_page[0]->title_page;?>" type="text" required data-validation="length" data-validation-length="min3" maxlength="50" name="title_page" class="form-control" placeholder="Masukkan Title Page">
						</div>
						
						<div class="form-group">
						  <label>Sub Title Page</label>
						  <br>
						  <input readonly value="<?php echo $data_page[0]->sub_title_page;?>" type="text" required data-validation="length" data-validation-length="min3" maxlength="50" name="subtitle_page" class="form-control" placeholder="Masukkan Subtitle Page">
						</div>
						
						<div class="form-group">
						  <label>Isi Page</label>
						  <br>
						  <textarea disabled readonly id="deskripsi" name="content_page" cols="100" rows="10" placeholder="Masukkan Isi Page"><?php echo $data_page[0]->content_page;?></textarea>
						</div>
						
						<div class="form-group">
						  <label>Status Page</label>
						  <select disabled required class="form-control" name="status_page">
							<option class="form-control" <?php if($data_page[0]->status_page =="active") echo"selected"; ?> value="active">aktif</option>
							<option class="form-control" <?php if($data_page[0]->status_page =="not active") echo"selected"; ?> value="not active">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Delete</button>
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