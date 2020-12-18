
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Admin Form
        <small>Form Menambahkan Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/admin/">Admin</a></li>
        <li class="active">Register Admin</li>
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
						
						echo form_open("admin/admin/add_admin_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<div class="col-md-6">
						<div class="form-group">
						  <label>Nama Admin</label>
						  <input required type="text" data-validation="length" data-validation-length="min3" maxlength="30" class="form-control" name="admin_name" placeholder="Masukkan Nama Admin">
						</div>
						
						<div class="form-group">
						  <label>Email Admin</label>
						  <input required data-validation="email" type="text" class="form-control" name="admin_email" placeholder="Masukkan Email Admin">
						</div>
						
						<div class="form-group">
						  <label>Foto Admin</label>
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" required name="admin_foto" id="uploaded1" data-placeholder="No file" class="upload filestyle" data-value="uploaded1">
						  </label>
						</div>
						
						<div class="form-group">
						  <label>Gender Admin</label>
						  <br>
						  <select required class="form-control" name="admin_gender">
							<option class="form-control" value="pria">pria</option>
							<option class="form-control" value="wanita">wanita</option>
						  </select>
						</div>
						
						<div class="form-group">
						  <label>Alamat Admin</label>
						  <br>
						  <input required type="text" maxlength="200" class="form-control" name="admin_address" placeholder="Masukkan Alamat Admin">
						</div>
						
						<div class="form-group">
						  <label>Phone Admin</label>
						  <br>
						  <input required data-validation="length number" data-validation-length="min5" maxlength="20" type="text" class="form-control" name="admin_phone" placeholder="Masukkan Phone Admin">
						</div>
						
						<div class="form-group">
						  <label>Role Admin</label>
						  <br>
						  <input required type="text" class="form-control" name="admin_role" placeholder="Masukkan Role Admin">
						</div>
						
						<div class="form-group">
						  <label>Password Admin</label>
						  <br>
						  <input required type="password" class="form-control" data-validation="length alphanumeric" data-validation-length="min6" name="admin_pass_confirmation" placeholder="Masukkan Password Admin">
						</div>
						
						<div class="form-group">
						  <label>Password Admin (Confirm)</label>
						  <br>
						  <input required type="password" class="form-control" name="admin_pass" data-validation="confirmation" placeholder="Masukkan Password Admin (Confirm)">
						</div>
						
						<div class="form-group">
						  <label>Status Admin</label>
						  <select required class="form-control" name="admin_status">
							<option class="form-control" value="aktif">aktif</option>
							<option class="form-control" value="nonaktif">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Add</button>
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
  
<script>
  $.validate({
    modules : 'security'
  });
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>