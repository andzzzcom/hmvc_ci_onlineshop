 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Shipping Settings
        <small>Form Mengubah Settings</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/settings/shipping_settings/">Shipping Settings</a></li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
		<div class="row">
			<div class="table-responsive box">
				<!-- /.box-header -->
				<div class="box-body">
					<?php 
						if($this->session->flashdata('message')) 
						{
							echo $this->session->flashdata('message');
							$this->session->unset_userdata('message');
						}
						
						echo form_open("admin/settings/shipping_settings_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<div class="col-md-6">
						<!--<div class="form-group">
							<label>Nama Kurir</label>
							<select id="kurir" required class="form-control" name="kurir">
								<option class="form-control" <?php if($list_shipping_settings[0]->courier_name == "jne") echo"selected"; ?> value="jne">JNE</option>
							</select>
						</div>-->
						<div class="form-group">
							<label>Provinsi Toko</label>
							<select onchange="ubahprovinsi(this)" id="data_provinsi" required class="form-control" name="id_provinsi">
							<?php
								foreach($data_provinsi as $province)
								{
							?>
								<option class="form-control" <?php if($list_shipping_settings[0]->id_provinsi == $province->id_province) echo"selected"; ?> value="<?php echo $province->id_province; ?>"><?php echo $province->name_province;?></option>
							<?php
								}
							?>
							</select>
						</div>
						
						<div class="form-group">
						  <label>Kota Kabupaten Toko</label>
						  <select onchange="ubahkotakabupaten(this)" id="data_city" required class="form-control" name="id_kota">
							<?php
								foreach($data_city as $city)
								{
							?>
								<option class="form-control" <?php if($list_shipping_settings[0]->id_kota_kabupaten == $city->id_city) echo"selected"; ?> value="<?php echo $city->id_city; ?>"><?php echo $city->name_city;?></option>
							<?php
								}
							?>
							</select>
						</div>
						
						<div class="form-group">
						  <label>Kecamatan Toko</label>
						  <select id="data_district" required class="form-control" name="id_kecamatan">
							<?php
								foreach($data_district as $district)
								{
							?>
								<option class="form-control" <?php if($list_shipping_settings[0]->id_kecamatan == $district->id_district) echo"selected"; ?> value="<?php echo $district->id_district; ?>"><?php echo $district->name_district;?></option>
							<?php
								}
							?>
							</select>
						</div>
						
						<div class="form-group">
						  <label>Kode Pos Toko</label>
						  <input required data-validation="length number" data-validation-length="min3" maxlength="10" type="text" class="form-control" name="kodepos" value="<?php echo $list_shipping_settings[0]->kode_pos; ?>">
						</div>
						
						<div class="form-group">
						  <label>Telepon Toko</label>
						  <input required data-validation="length number" data-validation-length="min3" maxlength="15" type="text" class="form-control" name="phone" value="<?php echo $list_shipping_settings[0]->telepon; ?>">
						</div>
						
						<div class="form-group">
						  <label>Email Toko</label>
						  <input required data-validation="length" data-validation-length="min3" maxlength="100" type="email" class="form-control" name="email" value="<?php echo $list_shipping_settings[0]->email; ?>">
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Edit</button>
						<a href="<?php echo site_url('admin/settings/shipping_settings/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
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
			lang: 'es'
		});
	</script>
 <script>
	function ubahprovinsi(object)
	{
		var provinsi = object.value.split("-");
		var idprovinsi = provinsi[0];
		var namaprovinsi = provinsi[1];
		
		$.ajax({
			type: "POST",
			url: '<?php echo site_url("Admin/User/get_city_district") ?>',
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
	  
	}
	
	function ubahkotakabupaten(object)
	{
		var kotakabupaten = object.value.split("-");
		var idkotakabupaten = kotakabupaten[0];
		var namakotakabupaten = kotakabupaten[1];
		
		$.ajax({
			type: "POST",
			url: '<?php echo site_url("Admin/User/get_district") ?>',
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
	  
	}
 </script>