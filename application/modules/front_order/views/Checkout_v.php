	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>">Home</a></li>
				  <li><a href="<?php echo base_url();?>cart">Edit Cart</a></li>
				  <li class="active">Checkout Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<div class="page-title">
					<h2>(1/4) Please fill your shipping information</h2>
				</div>
				<table class="table table-condensed">
					<tbody>
						<tr>
							<td colspan="2">
								<div class="col-sm-12 form-group">
									<h4>
										<label class="radio-inline"><input checked type="radio" value="default" name="typedata" onclick="changeData('default')">
											Use Data in Profile
										</label>
									</h4>
									<br>
									
									<div id="defaultdata">
										<div class="col-md-4 form-group">
											<div class="form-group">
												<label for="nama">
													Nama :
													<label id="name_default" class="fontweightnormal"><?php echo $data_user[0]->nama_user;?></label>
												</label>
											</div>
											<div class="form-group">
												<label for="email">
													Email :
													<label id="email_default" class="fontweightnormal"><?php echo $data_user[0]->email_user;?></label>
												</label>
											</div>
											<div class="form-group">
												<label for="telepon">
													Telepon :
													<label id="phone_default" class="fontweightnormal"><?php echo $data_user[0]->phone_user;?></label>
												</label>
											</div>
											<div class="form-group">
												<label for="alamat">
													Alamat :
													<label id="alamat_default" class="fontweightnormal"><?php echo $data_user[0]->address_user;?></label>
												</label>
											</div>
										</div>
										
										<div class="col-md-4 form-group">
											<div class="form-group">
												<label for="provinsi">
													Provinsi :
													<label id="provinsi_default" class="fontweightnormal"><?php echo $provinsi;?></label>
												</label>
											</div>
											<div class="form-group">
												<label for="kota">
													Kota/kabupaten :
													<label id="kota_default" class="fontweightnormal"><?php echo $kota_kabupaten;?></label>
												</label>
											</div>
											<div class="form-group">
												<label for="kecamatan">
													Kecamatan :
													<label id="kecamatan_default" class="fontweightnormal"><?php echo $kecamatan;?></label>
												</label>
											</div>
											<div class="form-group">
												<label for="kodepos">
													Kode Pos :
													<label id="kodepos_default" class="fontweightnormal"><?php echo $data_user[0]->kode_pos_user;?></label>
												</label>
											</div>
										</div>
										
										<div class="col-sm-4 form-group">
											<div class="form-group">
												<label for="ongkir">
													Berat Total (gram):
													<label id="total_berat" class="fontweightnormal">
													
													<?php 
														echo $totalweight;
													?>
													
													</label>
												</label>
											</div>
											<div class="form-group">
												<label for="ongkir">
													Kurir :
													<label id="couriername_default" class="fontweightnormal">
													
													<?php 
														echo $couriername;
													?>
													
													</label>
												</label>
											</div>
											<div class="form-group">
												<label for="ongkir">
													Ongkos Kirim :
													<label id="ongkir_default" class="fontweightnormal">
													
													<?php 
														echo $ongkir;
													?>
													
													</label>
												</label>
											</div>
										</div>
									</div>
								</div>	
								
								<div class="col-sm-12 form-group">	
									<br>
									<h4>
										<label class="radio-inline"><input type="radio" value="custom" name="typedata" onclick="changeData('custom')">
											Use Custom Data
										</label>
									</h4>
									
									<br>
									
									<div id="customdata" style="display:none">
										<div class="col-md-4 form-group">
											<div class="form-group">
												<label for="name">
													Nama :
												</label>
												<input type="text" class="form-control form-inline" placeholder="enter your name" id="name_custom">
											</div>
											<div class="form-group">
												<label for="email">
													Email :
												</label>
												<input type="email" class="form-control" placeholder="enter your email" id="email_custom">											
											</div>
											<div class="form-group">
												<label for="telepon">
													Telepon :
												</label>
												<input type="text" class="form-control" placeholder="enter your phone" id="phone_custom">
											</div>
											<div class="form-group">
												<label for="usr">
													Alamat :
												</label>
												<input type="text" class="form-control" placeholder="masukkan alamat" id="alamat_custom">
											</div>
										</div>
										
										<div class="col-md-4 form-group">
											
											<div class="form-group">
												<label>Provinsi User :</label>
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
											  <label>Kota Kabupaten User :</label>
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
											  <label>Kecamatan User :</label>
											  <select disabled onchange="ubahkecamatan(this)" id="data_district" required class="form-control" name="user_district">
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
											  <label>Kode Pos User :</label>
											  <input id="data_kodepos" placeholder="masukkan kode pos" required data-validation="length number" data-validation-length="min3" maxlength="10" type="text" class="form-control" name="user_postcode">
											</div>
							
										</div>
										<div class="col-md-4 form-group">
											<div class="form-group">
												<label for="weighttotal">
													Berat Total (gram) :
												</label>
												<input type="text" class="form-control" value="<?php echo $totalweight; ?>" readonly id="total_berat_custom">
											</div>
											<div class="form-group">
												<label for="kurir">
													Kurir :
												</label>
												
												<select id="couriername_custom" onchange="ubahongkirstatus(this)" required class="form-control" name="couriername_custom">
													<?php
														foreach($courier_list as $cour)
														{
													?>
														<option class="form-control" value="<?php echo $cour->code_kurir; ?>"><?php echo $cour->name_kurir;?></option>
													<?php
														}
													?>
												</select>
											</div>
											<div class="form-group">
												<label for="ongkir">
													Ongkos Kirim :
												</label>
												<input type="text" class="form-control" value="0" id="ongkir_custom">
											</div>
											<div class="form-group">
												<button onclick="cekongkir()" disabled id="btncekongkir"  class="btn btn-danger">Cek Ongkos Kirim</button>
											</div>
										</div>
									</div>

								</div>
							</td>
						</tr>
						<tr>
							<td align="right" colspan="2">
								<div style="text-align:right">
									<a href="<?php echo base_url();?>cart" class="btn btn-info">Edit Cart</a>
									<a onclick="cekredirect()" class="btn btn-success">Confirmation</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
<script>
	
	
	function changeData(type)
	{
		if(type=="default")
		{
			$('#defaultdata').show(300);
			$('#customdata').hide();
			
		}
		
		if(type=="custom")
		{
			$('#customdata').show(300);
			$('#defaultdata').hide();
		}
	}
	
	function cekredirect()
	{
		var nama = "";
		var email = "";
		var phone = "";
		var alamat = "";
		var provinsi = "";
		var kota = "";
		var kecamatan = "";
		var kodepos = "";
		var ongkir = "";
		var berat = "";
		var kurir = "";
		
		var type = document.querySelector('input[name="typedata"]:checked').value;
		if(type == "default")
		{
			nama = $('#name_default').html();
			email = $('#email_default').html();
			phone = $('#phone_default').html();
			alamat = $('#alamat_default').html();
			provinsi = $('#provinsi_default').html();
			kota = $('#kota_default').html();
			kecamatan = $('#kecamatan_default').html();
			kodepos = $('#kodepos_default').html();
			ongkir = $('#ongkir_default').html();
			berat = $('#total_berat').html();
			kurir = $('#couriername_default').html();
			
			if(type=="" || nama=="" || email=="" || phone=="" || alamat=="" || provinsi=="" || kota=="" || kecamatan=="" || kodepos=="" || ongkir=="" || berat=="" || kurir=="")
			{
				alert("Semua field harus di isi ! Silahkan ubah di profile panel anda !");
				
				return false;
			}
		}else
		{
			nama = $('#name_custom').val();
			email = $('#email_custom').val();
			phone = $('#phone_custom').val();
			alamat = $('#alamat_custom').val();
			provinsi = $('#data_provinsi option:selected').text();
			kota = $('#data_city option:selected').text();
			kecamatan = $('#data_district option:selected').text();
			kodepos = $('#data_kodepos').val();
			ongkir = $('#ongkir_custom').val();
			berat = $('#total_berat_custom').val();
			kurir = $('#couriername_custom').val();
			
			if(type=="" || nama=="" || email=="" || phone=="" || alamat=="" || provinsi=="" || kota=="" || kecamatan=="" || kodepos=="" || ongkir=="" || berat=="" || kurir =="")
			{
				alert("Semua field harus di isi !");
				
				return false;
			}
			
			if($("#ongkir_custom").prop('disabled') == false)
			{
				alert("Ongkos kirim harus dicek dahulu !");
				
				return false;
				
			}
			
			if(validasi_ongkir(ongkir) == false || validasi_nama(nama) == false || validasi_alamat(alamat) == false || validasi_email(email) == false || validasi_phone(phone) == false  || validasi_postcode(kodepos) == false)
				return false;
		}
		
		//alert(type+" "+nama+" "+email+" "+phone+" "+alamat+" "+provinsi+" "+kota+" "+kecamatan+" "+kodepos+" "+ongkir);
		
		$.ajax({
			type: "POST",
			url: '<?php echo site_url("checkout/set_checkout_data") ?>',
			cache: false,
			data: {nama: nama, email: email, phone: phone, alamat: alamat, provinsi: provinsi, kota: kota, kecamatan: kecamatan, kodepos: kodepos, ongkir: ongkir, berat: berat, kurir: kurir},
			success: function(data) {
				
			}
		});
		
		setTimeout(function(){ 
			window.location = '<?php echo site_url("confirmation") ?>';
		}, 100);
		
	}
</script>

<script>
	function ubahongkirstatus(object)
	{
		$("#btncekongkir").prop('disabled', false);
		$("#ongkir_custom").prop('disabled', false);
	}
	
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
		$("#ongkir_custom").prop('disabled', false);
		$("#btncekongkir").prop('disabled', false);
	  
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
		$("#ongkir_custom").prop('disabled', false);
		$("#btncekongkir").prop('disabled', false);
	}
	
	function ubahkecamatan(object)
	{	  
		$("#ongkir_custom").prop('disabled', false);
		$("#btncekongkir").prop('disabled', false);
	}
	
	function cekongkir()
	{
		var kecamatan = $('#data_district').val();
		var weight = $('#total_berat_custom').val();
		var courier = $('#couriername_custom').val();
		
		$.ajax({

			type: "POST",
			url: '<?php echo site_url("ongkir/cek_ongkir_helper") ?>',
			cache: false,
			data: {id: kecamatan, berat: weight, courier:courier}, // appears as $_GET['id'] @ your backend side
			success: function(data) {
				
				$('#ongkir_custom').val(data);
			}
			 

		});
		$("#ongkir_custom").prop('disabled', true);
		$("#btncekongkir").prop('disabled', true);
		
	}
 </script>