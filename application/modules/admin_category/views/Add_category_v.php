 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Category Form
        <small>Form Menambahkan Kategori</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/category/">Category</a></li>
        <li class="active">Add Category</li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
		<div class="row">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<?php 
						echo validation_errors();
						
						if($this->session->flashdata('message')) 
						{
							echo $this->session->flashdata('message');
							$this->session->unset_userdata('message');
						}
						
						echo form_open("admin/category/add_category_action/", "role='form' enctype='multipart/form-data'"); 
					?>
					<div class="col-md-4">
						<div class="form-group">
						  <label>Nama Kategori</label>
						  <input required type="text" maxlength="30" class="form-control" name="category_name" placeholder="Masukkan Nama Kategori">
						</div>
						<br>
						<div class="form-group">
						  <label>Icon Kategori</label>
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" required name="category_icon" id="uploaded1" class="upload" data-value="uploaded1">
						  </label>
						</div>
						<br>
						<div class="form-group">
						  <label>Status Kategori</label>
						  <select required class="form-control" name="category_status">
							<option class="form-control" value="aktif">aktif</option>
							<option class="form-control" value="nonaktif">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Add</button>
						<a href="<?php echo site_url('admin/category/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
