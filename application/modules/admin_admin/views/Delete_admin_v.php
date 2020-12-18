 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delete Admin Form
        <small>Form Menghapus Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/admin/">Admin</a></li>
        <li class="active">Remove Admin</li>
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
						
						echo form_open("admin/admin/delete_admin_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<input type="hidden" name="admin_id" value="<?php echo $data_admin[0]->id_admin; ?>">
					<div class="col-md-6">
						<div class="form-group">
						  <label>Nama Admin</label>
						  <input disabled value="<?php echo $data_admin[0]->nama_admin; ?>" required type="text" class="form-control" name="admin_name" placeholder="Masukkan Nama Admin">
						</div>
						
						<div class="form-group">
						  <label>Email Admin</label>
						  <input disabled value="<?php echo $data_admin[0]->email_admin; ?>" required type="text" class="form-control" name="admin_email" placeholder="Masukkan Email Admin">
						</div>
						
						<div class="form-group">
						  <label>Foto Admin</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/admin/<?php echo $data_admin[0]->foto_admin;?>" width="100px" height="100px">
						</div>
						
						<div class="form-group">
						  <label>Gender Admin</label>
						  <br>
						  <select disabled required class="form-control" name="admin_gender">
							<option class="form-control" <?php if($data_admin[0]->gender_admin =="pria") echo"selected"; ?> value="pria">pria</option>
							<option class="form-control" <?php if($data_admin[0]->gender_admin =="wanita") echo"selected"; ?> value="wanita">wanita</option>
						  </select>
						</div>
						
						<div class="form-group">
						  <label>Alamat Admin</label>
						  <br>
						  <input disabled value="<?php echo $data_admin[0]->address_admin; ?>" required type="text" class="form-control" name="admin_address" placeholder="Masukkan Alamat Admin">
						</div>
						
						<div class="form-group">
						  <label>Phone Admin</label>
						  <br>
						  <input disabled value="<?php echo $data_admin[0]->phone_admin; ?>" required type="text" class="form-control" name="admin_phone" placeholder="Masukkan Phone Admin">
						</div>
						
						<div class="form-group">
						  <label>Role Admin</label>
						  <br>
						  <input disabled value="<?php echo $data_admin[0]->role_admin; ?>" required type="text" class="form-control" name="admin_role" placeholder="Masukkan Role Admin">
						</div>
						
						<div class="form-group">
						  <label>Status Admin</label>
						  <select disabled required class="form-control" name="admin_status">
							<option class="form-control" <?php if($data_admin[0]->status_admin =="aktif") echo"selected"; ?> value="aktif">aktif</option>
							<option class="form-control" <?php if($data_admin[0]->status_admin =="nonaktif") echo"selected"; ?> value="nonaktif">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Delete</button>
						<a href="<?php echo site_url('admin/admin/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 