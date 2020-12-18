	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>">Home</a></li>
				  <li><a href="<?php echo base_url();?>cart">Edit Cart</a></li>
				  <li><a href="<?php echo base_url();?>checkout">Checkout Cart</a></li>
				  <li class="active">Confirmation Cart</li>
				</ol>
			</div>
								
			<div class="cart_info">
				<div class="page-title">
					<h2>(2/4) Please confirm your information</h2>
				</div>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td colspan="2" class="image">
								<h4>
									<label>
										Shipping Information
									</label>
								</h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="2" class="image">
								<div class="col-sm-12 form-group">
									<div class="col-md-4 form-group">
										<div class="form-group">
											<label for="usr">
												Nama :
												<label class="fontweightnormal"><?php echo $data_checkout["nama"];?></label>
											</label>
										</div>
										<div class="form-group">
											<label for="usr">
												Email :
												<label class="fontweightnormal"><?php echo $data_checkout["email"];?></label>
											</label>
										</div>
										<div class="form-group">
											<label for="usr">
												Telepon :
												<label class="fontweightnormal"><?php echo $data_checkout["phone"];?></label>
											</label>
										</div>
										<div class="form-group">
											<label for="usr">
												Alamat :
												<label class="fontweightnormal"><?php echo $data_checkout["alamat"];?></label>
											</label>
										</div>
									</div>
									
									<div class="col-md-4 form-group">
										<div class="form-group">
											<label for="usr">
												Provinsi :
												<label class="fontweightnormal"><?php echo $data_checkout["provinsi"];?></label>
											</label>
										</div>
										<div class="form-group">
											<label for="usr">
												Kota/kabupaten :
												<label class="fontweightnormal"><?php echo $data_checkout["kota"];?></label>
											</label>
										</div>
										<div class="form-group">
											<label for="usr">
												Kecamatan :
												<label class="fontweightnormal"><?php echo $data_checkout["kecamatan"];?></label>
											</label>
										</div>
										<div class="form-group">
											<label for="usr">
												Kode Pos :
												<label class="fontweightnormal"><?php echo $data_checkout["kodepos"];?></label>
											</label>
										</div>
									</div>
									
									<div class="col-sm-4 form-group">
										<div class="form-group">
											<label for="ongkir">
												Berat Total (gram):
												<label id="total_berat" class="fontweightnormal">
												
												<?php 
													echo $data_checkout["berat"];
												?>
												
												</label>
											</label>
										</div>
										<div class="form-group">
											<label for="ongkir">
												Kurir :
												<label id="couriername_default" class="fontweightnormal">
												
												<?php 
													echo $data_checkout["kurir"];
												?>
												
												</label>
											</label>
										</div>
										<div class="form-group">
											<label for="usr">
												Ongkos Kirim :
												<label class="fontweightnormal">
												
												<?php 
													$ongkir = preg_replace('/\s+/', '', $data_checkout["ongkir"]);
													
													$ongkiredited = number_format($ongkir);
													$ongkiredited = str_replace(",", ".",$ongkiredited);
													
													echo "Rp ".$ongkiredited.", 00";
												?>
												
												</label>
											</label>
										</div>
									
									</div>
								</div>	
								
								
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<div class="cart">
				<div class="page-content page-order">
					<div class="order-detail-content">
						<div class="table-responsive">
							<table class="table table-bordered cart_summary">
								<thead>
									<tr class="cart_menu">
										<td colspan="2" class="image">
											<h4>
												<label>
													Cart Information
												</label>
											</h4>
										</td>
									</tr>
									<tr>
										<th class="cart_product text-center">Thumbnail</th>
										<th class="text-center">Product Name</th>
										<th class="text-center">Product Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$i=0;
									$totalnya=0;
									$total = 0;
									foreach($cart as $cart)
									{
										$harga_produk = "";
										$kodeproduk = "";
										$thumbnailproduk = "";
										
										$temp = $content;
										foreach($content as $content)
										{
											if($content[0]->id_produk == $cart["id"])
											{
												$harga_produk = "".number_format($content[0]->harga_produk);
												$harga_produk = str_replace(",", ".",$harga_produk);
												
												$subtotal = "".number_format($cart["subtotal"]);
												$subtotal = str_replace(",", ".",$subtotal);
												
												$kodeproduk = $content[0]->kode_produk;
												$thumbnailproduk = $content[0]->thumbnail_produk;
											}
										}
										$content = $temp;
										
								?>
									
									<tr>
										<td class="cart_product" style="width:10%">
											<a href="#">
												<img src="<?php echo $url_theme;?>images/produk/<?php echo $thumbnailproduk;?>" alt="Product">
											</a>
										</td>
										<td class="cart_description text-center" style="width:45%">
											<p class="product-name">
												<a href="#"><?php echo $cart["name"];?> </a>
											</p>
											<small><a href="#">Color : Red</a></small><br>
											<small><a href="#">Size : M</a></small><br>
											<span class="label label-success">In stock</span>
										</td>
										<td class="price" style="width:20%">
											<span><p>Rp <?php echo $harga_produk; ?>,00</p></span>
										</td>
										<td class="qty" style="width:5%">
											<span class="input-group-btn">
												<input type="hidden" id="eachprice<?php echo $cart["id"];?>" value="<?php echo $cart["price"];?>">
												<input disabled class="form-control" style="display:inline;width:50px;height:45px;" type="text" name="quantity" id="qtynya<?php echo $cart["id"];?>" value="<?php echo $cart["qty"]; ?>" autocomplete="off">
											</span>
										</td>
										<td class="price" style="width:20%">
											<span>
												<p id="subtotalnyacek<?php echo $cart["id"];?>" class="cart_total_price">Rp <?php echo $subtotal; ?>,00</p>
												<input type="hidden" id="subtotal<?php echo $cart["id"];?>" value="<?php echo $cart["subtotal"];?>">
											</span>
										</td>
									</tr>
									
								<?php
										$total += $cart["subtotal"];
									}
									$total_edit = "".number_format($total);
									$total_edit = str_replace(",", ".",$total_edit);
								?>
							  </tbody>
							  <tfoot>
									<tr>
										<td colspan="2" style="width:50%"></td>
										<td colspan="2" class="cart_price text-center">
											<strong>Subtotal:</strong>
										</td>
										<td class="cart_total_price text-center">
											<strong>
												<?php 
													$totaldefault = "".number_format($total);
													$totaldefault = str_replace(",", ".",$totaldefault);
													
													echo "<span id='totalnya'>Rp $totaldefault,00</span>";
												?>
											</strong>
										</td>
									</tr>
									<tr>
										<td colspan="2"></td>
										<td colspan="2" class="cart_price text-center">
											<strong>Ongkos Kirim:</strong>
										</td>
										<td class="cart_total_price text-center">
											<strong>
												<?php 
													echo "<span id='totalnya'>Rp $ongkiredited,00</span>";
												?>
											</strong>
										</td>
									</tr>
									<tr>
										<td colspan="2"></td>
										<td colspan="2" class="cart_price text-center">
											<strong>Voucher Code (<?php echo $voucher_code;?>):</strong>
										</td>
										<td class="cart_total_price text-center">
											<strong>
												<?php 
													$voucher_value_edited = "".number_format($voucher_value);
													$voucher_value_edited = str_replace(",", ".",$voucher_value_edited);
													
													
													echo "<span id='vouchercode'>- Rp $voucher_value_edited,00</span>";
												?>
											</strong>
										</td>
									</tr>
									<tr>
										<td colspan="2"></td>
										<td colspan="2" class="cart_price text-center">
											<strong>Total:</strong>
										</td>
										<td class="cart_total_price text-center">
											<strong>
												<?php 
												
													$totaledited = "".number_format($total+$ongkir-$voucher_value);
													$totaledited = str_replace(",", ".",$totaledited);
													
													
													echo "<span id='totalnya'>Rp $totaledited,00</span>";
												?>
											</strong>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="cart_navigation"> 
							<a class="continue-btn" href="<?php echo base_url();?>checkout"><i class="fa fa-arrow-left"> </i>&nbsp; Edit Shipping</a> 
							<a class="checkout-btn" href="<?php echo base_url();?>payment"><i class="fa fa-check"></i> Choose Payment</a> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> 
	<!--/#cart_items-->
<script>
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
		$("#data_district").prop('disabled', false);
	  
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
		
	}
 </script>