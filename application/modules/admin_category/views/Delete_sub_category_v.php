 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delete Subcategory Form
        <small>Form Menghapus Subkategori</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/category/">Category</a></li>
        <li><a href="<?php echo base_url();?>admin/category/list_subcategory/<?php echo $data_kategori[0]->id_kategori;?>">Subcategory</a></li>
        <li class="active">Delete Subcategory</li>
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
						echo form_open("admin/category/delete_subcategory_action/", "role='form' enctype='multipart/form-data'"); 
					?>
					<input type="hidden" name="category_id" value="<?php echo $data_kategori[0]->id_kategori; ?>">
					<input type="hidden" name="subcategory_id" value="<?php echo $data_subkategori[0]->id_sub_kategori; ?>">
					<div class="col-md-4">
						<div class="form-group">
						  <label>Nama Kategori</label>
						  <input disabled type="text" class="form-control" value="<?php echo $data_kategori[0]->name_kategori;?>">
						</div>
						<br>
						<div class="form-group">
						  <label>Nama Subkategori</label>
						  <input disabled type="text" class="form-control" value="<?php echo $data_subkategori[0]->name_sub_kategori;?>" name="subcategory_name" placeholder="Masukkan Nama Subkategori">
						</div>
						<br>
						<div class="form-group">
						  <label>Icon Subkategori</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/kategori/subkategori/<?php echo $data_subkategori[0]->icon_sub_kategori;?>" width="30px" height="30px">
						</div>
						<br>
						<div class="form-group">
						  <label>Status Subkategori</label>
						  <div class="form-group">
							  <input disabled type="text" class="form-control" value="<?php echo $data_subkategori[0]->status_sub_kategori;?>" name="subcategory_name" placeholder="Masukkan Nama Subkategori">
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
 
