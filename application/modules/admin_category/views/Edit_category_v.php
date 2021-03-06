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
        <li class="active">Edit Category</li>
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
						
						echo form_open("admin/category/edit_category_action/", "role='form' enctype='multipart/form-data'"); 
					?>
					<input type="hidden" name="category_id" value="<?php echo $data_kategori[0]->id_kategori; ?>">
					<div class="col-md-4">
						<div class="form-group">
						  <label>Nama Kategori</label>
						  <input required maxlength="30" type="text" class="form-control" value="<?php echo $data_kategori[0]->name_kategori;?>" name="category_name" placeholder="Masukkan Nama Kategori">
						</div>
						<br>
						<div class="form-group">
						  <label>Icon Kategori</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/kategori/<?php echo $data_kategori[0]->icon_kategori;?>" width="30px" height="30px">
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" name="category_icon" id="uploaded1" class="upload" data-value="uploaded1">
						  </label>
						</div>
						<br>
						<div class="form-group">
						  <label>Status Kategori</label>
						  <select required class="form-control" name="category_status">
							<option class="form-control" <?php if($data_kategori[0]->status_kategori =="aktif") echo"selected"; ?> value="aktif">aktif</option>
							<option class="form-control" <?php if($data_kategori[0]->status_kategori =="nonaktif") echo"selected"; ?> value="nonaktif">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Edit</button>
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
 
