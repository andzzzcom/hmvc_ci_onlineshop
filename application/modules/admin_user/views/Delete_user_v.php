 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delete User Form
        <small>Form Menghapus User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/Home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/user/">User</a></li>
        <li class="active">Remove User</li>
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
						
						echo form_open("admin/user/delete_user_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
					<input type="hidden" name="user_id" value="<?php echo $data_user[0]->id_user; ?>">
						
					<div class="col-md-6">
						<div class="form-group">
						  <label>Nama User</label>
						  <input disabled type="text" class="form-control" name="user_name" value="<?php echo $data_user[0]->nama_user; ?>" placeholder="Masukkan Nama User">
						</div>
						
						<div class="form-group">
						  <label>Email User</label>
						  <input disabled type="text" class="form-control" name="user_email" value="<?php echo $data_user[0]->email_user; ?>" placeholder="Masukkan Email User">
						</div>
						
						<div class="form-group">
						  <label>Foto User</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/user/<?php echo $data_user[0]->foto_user;?>" width="100px" height="100px">
						</div>
						
						<div class="form-group">
						  <label>Gender User</label>
						  <br>
						  <select disabled class="form-control" name="user_gender">
							<option class="form-control" value="pria" <?php if($data_user[0]->gender_user =="pria") echo"selected"; ?>>pria</option>
							<option class="form-control" value="wanita" <?php if($data_user[0]->gender_user =="wanita") echo"selected"; ?>>wanita</option>
						  </select>
						</div>
						
						<div class="form-group">
						  <label>Phone User</label>
						  <br>
						  <input disabled type="text" class="form-control" name="user_phone" value="<?php echo $data_user[0]->phone_user; ?>" placeholder="Masukkan Phone User">
						</div>
						
						<div class="form-group">
						  <label>Register Date User</label>
						  <input disabled type="text" class="form-control" name="user_reg_date" value="<?php echo $data_user[0]->reg_date_user; ?>">
						</div>
						
						<div class="form-group">
						  <label>Status User</label>
						  <select disabled class="form-control" name="user_status">
							<option class="form-control" value="aktif" <?php if($data_user[0]->status_user =="aktif") echo"selected"; ?>>aktif</option>
							<option class="form-control" value="nonaktif" <?php if($data_user[0]->status_user =="nonaktif") echo"selected"; ?>>nonaktif</option>
						  </select>
						</div>
						
					</div>       
					<div class="col-md-6">
						
						<div class="form-group">
						  <label>Alamat User</label>
						  <input disabled type="text" class="form-control" name="user_address" value="<?php echo $data_user[0]->address_user; ?>">
						</div>

						<div class="form-group">
							<label>Provinsi User</label>
							<select disabled onchange="ubahprovinsi(this)" id="data_provinsi" required class="form-control" name="user_province">
							<?php
								foreach($data_provinsi as $province)
								{
							?>
								<option class="form-control" <?php if($data_user[0]->provinsi_user == $province->id_province) echo"selected"; ?> value="<?php echo $province->id_province; ?>"><?php echo $province->name_province;?></option>
							<?php
								}
							?>
							</select>
						</div>
						
						<div class="form-group">
						  <label>Kota Kabupaten User</label>
						  <select disabled onchange="ubahkotakabupaten(this)" id="data_city" required class="form-control" name="user_city">
							<?php
								foreach($data_city as $city)
								{
							?>
								<option class="form-control" <?php if($data_user[0]->kota_kabupaten_user == $city->id_city) echo"selected"; ?> value="<?php echo $city->id_city; ?>"><?php echo $city->name_city;?></option>
							<?php
								}
							?>
							</select>
						</div>
						
						<div class="form-group">
						  <label>Kecamatan User</label>
						  <select disabled id="data_district" required class="form-control" name="user_district">
							<?php
								foreach($data_district as $district)
								{
							?>
								<option class="form-control" value="<?php echo $district->id_district; ?>"><?php echo $district->name_district;?></option>
							<?php
								}
							?>
							</select>
						</div>
						
						<div class="form-group">
						  <label>Kode Pos User</label>
						  <input disabled type="text" class="form-control" name="user_postcode" value="<?php echo $data_user[0]->kode_pos_user; ?>">
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Delete</button>
						<a href="<?php echo site_url('admin/user/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 