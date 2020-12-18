 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Subcategory Form
        <small>Form Menambahkan Subkategori</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/category/">Category</a></li>
        <li><a href="<?php echo base_url();?>admin/category/list_subcategory/<?php echo $kategori[0]->id_kategori;?>">Subcategory</a></li>
        <li class="active">Add Subcategory</li>
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
						
						echo form_open("admin/category/add_subcategory_action/", "role='form' enctype='multipart/form-data'"); 
					?>
					<input type="hidden" name="category_id" value="<?php echo $kategori[0]->id_kategori; ?>">
					<div class="col-md-4">
						<div class="form-group">
						  <label>Nama Kategori</label>
						  <input disabled type="text" class="form-control" value="<?php echo $kategori[0]->name_kategori;?>">
						</div>
						<br>
						<div class="form-group">
						  <label>Nama Subkategori</label>
						  <input required maxlength="30" type="text" class="form-control" name="subcategory_name" placeholder="Masukkan Nama Subkategori">
						</div>
						<br>
						<div class="form-group">
						  <label>Icon Subkategori</label>
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" required name="subcategory_icon" id="uploaded1" class="upload" data-value="uploaded1">
						  </label>
						</div>
						<br>
						<div class="form-group">
						  <label>Status Subkategori</label>
						  <select required class="form-control" name="subcategory_status">
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
 
