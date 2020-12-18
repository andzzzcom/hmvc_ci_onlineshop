 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delete Brand Form
        <small>Form Menghapus Brand</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/brand/">Brand</a></li>
        <li class="active">Delete Brand</li>
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
						
						echo form_open("admin/brand/delete_brand_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<input type="hidden" name="id_brand" value="<?php echo $data_brand[0]->id_brand; ?>">
					<div class="col-md-6">
						<div class="form-group">
						  <label>Nama Brand</label>
						  <input disabled value="<?php echo $data_brand[0]->name_brand; ?>" required type="text" class="form-control" name="admin_name" placeholder="Masukkan Nama Brand">
						</div>
						
						<div class="form-group">
						  <label>Logo Brand</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/brand/<?php echo $data_brand[0]->logo_brand;?>" width="100px" height="100px">
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Delete</button>
						<a href="<?php echo site_url('admin/brand/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 