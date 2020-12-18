 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User Form
        <small>Form Mengubah User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/Home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/user/">User</a></li>
        <li class="active">Add User</li>
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
						
						echo form_open("admin/user/add_user_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<div class="col-md-6">
						<div class="form-group">
						  <label>Nama User</label>
						  <input data-validation="length" data-validation-length="min3" required maxlength="30" type="text" class="form-control" name="user_name" placeholder="Masukkan Nama User">
						</div>
						
						<div class="form-group">
						  <label>Email User</label>
						  <input required type="text" data-validation="email" class="form-control" name="user_email" placeholder="Masukkan Email User">
						</div>
						
						<div class="form-group">
						  <label>Foto User</label>
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" required name="user_foto" id="uploaded1" class="upload" data-value="uploaded1">
						  </label>
						</div>
						
						<div class="form-group">
						  <label>Gender User</label>
						  <br>
						  <select required class="form-control" name="user_gender">
							<option class="form-control" value="pria">pria</option>
							<option class="form-control" value="wanita">wanita</option>
						  </select>
						</div>
						
						<div class="form-group">
						  <label>Phone User</label>
						  <br>
						  <input required data-validation="length number" data-validation-length="min5" maxlength="20" type="text" class="form-control" name="user_phone" placeholder="Masukkan Phone User">
						</div>
						
						<div class="form-group">
						  <label>Password User</label>
						  <br>
						  <input required type="password" class="form-control" data-validation="length alphanumeric" data-validation-length="min6" name="user_pass_confirmation" placeholder="Masukkan Password User">
						</div>
						
						<div class="form-group">
						  <label>Password User (Confirm)</label>
						  <br>
						  <input required type="password" class="form-control" name="user_pass" data-validation="confirmation" placeholder="Masukkan Password User (Confirm)">
						</div>
						
					</div>       
					<div class="col-md-6">
						
						<div class="form-group">
						  <label>Alamat User</label>
						  <input required maxlength="200" type="text" class="form-control" name="user_address">
						</div>

						<div class="form-group">
							<label>Provinsi User</label>
							<select onchange="ubahprovinsi(this)" id="data_provinsi" required class="form-control" name="user_province">
								<option readonly class="form-control"></option>
							<?php
								foreach($data_provinsi as $province)
								{
							?>
								<option class="form-control" value="<?php echo $province->id_province; ?>"><?php echo $province->name_province;?></option>
							<?php
								}
							?>
							</select>
						</div>
						
						<div class="form-group">
						  <label>Kota Kabupaten User</label>
						  <select disabled onchange="ubahkotakabupaten(this)" id="data_city" required class="form-control" name="user_city">
								<option class="form-control"></option>
							<?php
								foreach($data_city as $city)
								{
							?>
								<option class="form-control" value="<?php echo $city->id_city; ?>"><?php echo $city->name_city;?></option>
							<?php
								}
							?>
							</select>
						</div>
						
						<div class="form-group">
						  <label>Kecamatan User</label>
						  <select disabled id="data_district" required class="form-control" name="user_district">
								<option class="form-control"></option>
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
						  <input required data-validation="length number" data-validation-length="min3" maxlength="10" type="text" class="form-control" name="user_postcode">
						</div>
						
						<div class="form-group">
						  <label>Status User</label>
						  <select required class="form-control" name="user_status">
							<option class="form-control" value="aktif">aktif</option>
							<option class="form-control" value="nonaktif">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Add</button>
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
 
<script>
  $.validate({
    modules : 'security',
  });
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

 <script>
	function ubahprovinsi(object)
	{
		var provinsi = object.value.split("-");
		var idprovinsi = provinsi[0];
		var namaprovinsi = provinsi[1];
		
		$.ajax({
			type: "POST",
			url: '<?php echo site_url("admin/user/get_city_district") ?>',
			cache: false,
			data: "id=" + idprovinsi, 
			success: function(data) 
			{
				var datanya = data.split("|");
				var city = datanya[0];
				var district = datanya[1];
				
				var listcity = city.split(",");
				var lengthnya = listcity.length;
			   
				var listdistrict = district.split(",");
				var lengthnya2 = listdistrict.length;
				
								
				//proses kota dan kabupaten
				$('#data_city').empty();
				for(var i=1;i<lengthnya;i++)
				{
					var datacity = listcity[i].split("-");
					var idcity = datacity[0];
					var namecity = datacity[1];
					
					$('#data_city').append('<option class="form-control" value="'+idcity+'">'+namecity+'</option>');
					
				}
				
				//proses kecamatan
				$('#data_district').empty();
				for(var i=1;i<lengthnya2;i++)
				{
					var datadistrict = listdistrict[i].split("-");
					var iddistrict = datadistrict[0];
					var namedistrict = datadistrict[1];
					
					$('#data_district').append('<option class="form-control" value="'+iddistrict+'">'+namedistrict+'</option>');
					
				}
			}

		});
		$("#data_city").prop('disabled', false);
		$("#data_district").prop('disabled', false);
	  
	}
	
	function ubahkotakabupaten(object)
	{
		var kotakabupaten = object.value.split("-");
		var idkotakabupaten = kotakabupaten[0];
		var namakotakabupaten = kotakabupaten[1];
		
		$.ajax({
			type: "POST",
			url: '<?php echo site_url("admin/user/get_district") ?>',
			cache: false,
			data: "id=" + idkotakabupaten, 
			success: function(data) 
			{
				var listdistrict = data.split(",");
				var lengthnya = listdistrict.length;
			   
				//proses kecamatan
				$('#data_district').empty();
				for(var i=1;i<lengthnya;i++)
				{
					var datadistrict = listdistrict[i].split("-");
					var iddistrict = datadistrict[0];
					var namedistrict = datadistrict[1];
					
					$('#data_district').append('<option class="form-control" value="'+iddistrict+'">'+namedistrict+'</option>');
					
				}
			}

		});
	  
		$("#data_district").prop('disabled', false);
	}
 </script>
 
