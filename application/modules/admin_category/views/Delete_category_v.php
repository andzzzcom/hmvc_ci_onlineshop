 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delete Category Form
        <small>Form Menghapus Kategori</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/Home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/Category/">Category</a></li>
        <li class="active">Delete Category</li>
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
						
						echo form_open("admin/category/delete_category_action/", "role='form' enctype='multipart/form-data'"); 
					?>
					<input type="hidden" name="category_id" value="<?php echo $data_kategori[0]->id_kategori; ?>">
					<div class="col-md-4">
						<div class="form-group">
						  <label>Nama Kategori</label>
						  <input disabled type="text" class="form-control" value="<?php echo $data_kategori[0]->name_kategori;?>" name="category_name">
						</div>
						<br>
						<div class="form-group">
						  <label>Icon Kategori</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/kategori/<?php echo $data_kategori[0]->icon_kategori;?>" width="30px" height="30px">
						</div>
						<br>
						<div class="form-group">
						  <label>Status Kategori</label>
						  <div class="form-group">
							  <input disabled type="text" class="form-control" value="<?php echo $data_kategori[0]->status_kategori;?>">
						  </div>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Delete</button>
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
 
