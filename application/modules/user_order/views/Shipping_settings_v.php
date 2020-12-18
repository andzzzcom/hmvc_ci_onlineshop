	<div class="col-main col-sm-6 col-xs-12" style="background-color:white;">
		<div class="my-account">
			<div class="page-title">
				<h2>Shipping Settings</h2>
			</div>
			<div class="wishlist-item table-responsive">
				<div class="col-md-12">
					<form method="post" onsubmit="return validasi();" enctype="multipart/form-data" action="<?php echo base_url();?>profile/shipping_settings_action">
						<div class="col-md-12 text-left">
							<?php
								if($this->session->flashdata('message_update')) 
								{
									echo $this->session->flashdata('message_update');
									$this->session->unset_userdata('message_update');
								}
							?>
							<div class="form-group">
								  <label>Alamat User</label>
							  <input required type="text" maxlength="200" id="alamat" class="form-control" name="user_address" value="<?php echo $data_user[0]->address_user; ?>">
							</div>

							<div class="form-group">
								<label>Provinsi User</label>
								<select onchange="ubahprovinsi(this)" id="data_provinsi" required class="form-control" name="user_province">
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
							  <select onchange="ubahkotakabupaten(this)" id="data_city" required class="form-control" name="user_city">
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
							  <select id="data_district" required class="form-control" name="user_district">
								<?php
									foreach($data_district as $district)
									{
								?>
									<option class="form-control" <?php if($data_user[0]->kecamatan_user == $district->id_district) echo"selected"; ?> value="<?php echo $district->id_district; ?>"><?php echo $district->name_district;?></option>
								<?php
									}
								?>
								</select>
							</div>
							
							<div class="form-group">
							  <label>Kode Pos User</label>
							  <input required id="kodepos" maxlength="10" type="text" class="form-control" name="user_postcode" value="<?php echo $data_user[0]->kode_pos_user; ?>">
							</div>
							
							<div class="form-group" style="margin-top:20px;">
								<input type="submit" value="Save Changes" class="btn btn-success">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>		
	</div>
	
<script>
		
	function validasi()
	{
		var alamat = $('#alamat').val();
		var kodepos = $('#kodepos').val();
		
		if(alamat=="" || kodepos=="")
		{
			alert("Semua field harus di isi !");
			
			return false;
		}
		
		if(validasi_alamat(alamat) == false || validasi_postcode(kodepos) == false)
			return false;
	}
	
	function ubahprovinsi(object)
	{
		var provinsi = object.value.split("-");
		var idprovinsi = provinsi[0];
		var namaprovinsi = provinsi[1];
		$.ajax({
			type: "POST",
			url: '<?php echo site_url("profile/get_city_district") ?>',
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
			url: '<?php echo site_url("profile/get_district") ?>',
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