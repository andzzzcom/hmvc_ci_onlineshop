	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>">Home</a></li>
				  <li><a href="<?php echo base_url();?>cart">Edit Cart</a></li>
				  <li><a href="<?php echo base_url();?>checkout">Checkout Cart</a></li>
				  <li><a href="<?php echo base_url();?>confirmation">Confirmation</a></li>
				  <li><a href="<?php echo base_url();?>payment">Choose Payment Method</a></li>
				  <li class="active">Finish Bank Transaction</li>
				</ol>
			</div>
			<div class="cart_info">
				<div class="page-title">
					<h2>(4/4) Finish Transaction</h2>
				</div>
				<table class="table table-condensed">
					<tbody>
						<tr>
							<td>
								<div class="text-center col-sm-1 col-md-12">
									<h4>
										<label>
											<p>Terima kasih sudah berbelanja di toko kami, </p>
											
											<p>setelah melakukan pembayaran harap segera melakukan konfirmasi pembayaran kepada kami.</p>
											
											<p>Anda dapat mengecek status transaksi melalui <a href="<?php echo base_url();?>Profile/list_transaction" target="_blank">Profile Panel</a> anda.</p>
										</label>
										
										<label>
											<p>Silahkan transfer ke salah satu rekening di bawah ini dan konfirmasi ke kami.</p>
										</label>
									</h4>
									
									<br>
									
									<?php
										$i=1;
										foreach($list_all_bank as $bank)
										{
									?>
											<div class="col-md-3" style="margin-bottom:30px">
												<div class="form-group">
													<label for="name">
														<img style="margin-bottom:5px;" src="<?php echo $url_theme;?>images/bank/<?php echo $bank->logo_bank;?>">
													</label>
													<br>
													<label for="name">
														<?php echo $bank->name_bank;?> (a.n. <?php echo $bank->owner_bank;?>)
													</label>
													<br>
													<label for="name">
														<?php echo $bank->number_bank;?>
													</label>
													<br>
													<label for="name">
														Cabang <?php echo $bank->place_bank;?>
													</label>
												</div>
											</div>
									<?php 
											if($i%4 == 0)
												echo"<div class='clearfix'></div>";
												
											$i++;
										}
									?>

								</div>
							</td>
						</tr>
						<tr>
							<td align="right">
								<div style="text-align:right">
									<a href="<?php echo base_url();?>" class="btn btn-success">Finish</a>
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
		
		var type = document.querySelector('input[name="typedata"]:checked').value;
		if(type == "default")
		{
			nama = $('#name_default').html();
			email = $('#email_default').html();
			phone = $('#phone_default').html();
			alamat = $('#alamat_default').html();
			provinsi = $('#provinsi_default').html();
			kota = $('#kota_default').val();
			kecamatan = $('#kecamatan_default').html();
			kodepos = $('#kodepos_default').html();
			ongkir = $('#ongkir_default').html();
		}else
		{
			nama = $('#name_custom').val();
			email = $('#email_custom').val();
			phone = $('#phone_custom').val();
			alamat = $('#alamat_custom').val();
			provinsi = $('#data_provinsi').val();
			kota = $('#data_city').val();
			kecamatan = $('#data_district').val();
			kodepos = $('#data_kodepos').val();
			ongkir = $('#ongkir_custom').val();
		}
		
		//alert(type+" "+nama+" "+email+" "+phone+" "+alamat+" "+provinsi+" "+kota+" "+kecamatan+" "+kodepos+" "+ongkir);
		
		$.ajax({
			type: "POST",
			url: '<?php echo site_url("Cart/set_checkout_data") ?>',
			cache: false,
			data: {nama: nama, email: email, phone: phone, alamat: alamat, provinsi: provinsi, kota: kota, kecamatan: kecamatan, kodepos: kodepos, ongkir: ongkir},
			success: function(data) {
										
			}
		});
		
		window.location = '<?php echo site_url("Cart/confirmation") ?>';
	}
	
	
	
	function plus(cek, temp)
	{
        var jumlah = parseInt(document.getElementById("qtynya"+temp).value);
		
		var jumlah2 = jumlah;
		
        if(cek == "plus")
		{
			jumlah = jumlah+1;
		}
        else
		{
			jumlah = jumlah-1;
		}
		
		if(jumlah == 0)
		{
			alert("Minimal 1 produk !");
			return false;
		}
		
		document.getElementById("qtynya"+temp).value = jumlah;
			
		$.ajax({

			type: "POST",
			url: '<?php echo site_url("Cart/update_data_cart") ?>',
			cache: false,
			data: {id: temp, jumlah: jumlah}, // appears as $_GET['id'] @ your backend side
			success: function(data) {
					
				var eachprice = parseInt(document.getElementById("eachprice"+temp).value);
				var total_before = parseInt(document.getElementById("total").value);
					  
				var subtotal = eachprice * jumlah;
				var subtotal2 = subtotal.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1.');
			  
				document.getElementById("subtotalnyacek"+temp).innerHTML = "Rp "+subtotal2;
				
				var total = 0;
				if(cek == "plus")
				{
					total = total_before + eachprice;
				}else
				{
					total = total_before - eachprice;
				}
				
				document.getElementById("total").value = total;
				document.getElementById("totalnya").innerHTML = "Rp "+total.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1.');
									
			}
			 

		});
       
		 
	}
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
		$("#data_city").prop('disabled', false);
		$("#ongkir_custom").prop('disabled', false);
	  
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
	  
		$("#data_district").prop('disabled', false);
		$("#ongkir_custom").prop('disabled', false);
	}
	
	function ubahkecamatan(object)
	{	  
		$("#ongkir_custom").prop('disabled', false);
	}
	
	function cekongkir()
	{
		var kecamatan = $('#data_district').val();
		
		$.ajax({

			type: "POST",
			url: '<?php echo site_url("Cart/cek_ongkir_helper") ?>',
			cache: false,
			data: {id: kecamatan}, // appears as $_GET['id'] @ your backend side
			success: function(data) {
				
				$('#ongkir_custom').val(data);
			}
			 

		});
		$("#ongkir_custom").prop('disabled', true);
		
	}
 </script>