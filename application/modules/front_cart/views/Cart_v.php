
  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          
          <div class="page-content page-order">
			<div class="page-title">
				<h2>Shopping Cart</h2>
			</div>
            
            <div class="order-detail-content">
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th class="cart_product text-center">Thumbnail</th>
                      <th class="text-center">Product Name</th>
                      <th class="text-center">Product Price</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-center">Total</th>
                      <th  class="action"><i class="fa fa-trash-o"></i></th>
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
							<td class="cart_product text-center" style="width:10%"><a href="#"><img src="<?php echo $url_theme;?>images/produk/<?php echo $thumbnailproduk;?>" alt="Product"></a></td>
							<td class="cart_description text-center"><p class="product-name"><a href="#"><?php echo $cart["name"];?> </a></p>
								<small><a href="#">Color : Red</a></small><br>
								<small><a href="#">Size : M</a></small><br>
								<span class="label label-success">In stock</span>
							</td>
							<td class="price text-center"><span><p>Rp <?php echo $harga_produk; ?>,00</p></span></td>
							<td class="qty text-center">
								<span class="input-group-btn">
									<button onclick="plus('minus', <?php echo $cart["id"];?>)" type="button" class="btn btn-default">
										<span class="glyphicon glyphicon-minus"></span>
									</button>
					
									<input type="hidden" id="eachprice<?php echo $cart["id"];?>" value="<?php echo $cart["price"];?>">
									<input class="form-control" style="display:inline;width:50px;height:45px;" type="text" name="quantity" id="qtynya<?php echo $cart["id"];?>" value="<?php echo $cart["qty"]; ?>" autocomplete="off">
								
									<button onclick="plus('plus', <?php echo $cart["id"];?>)" type="button" class="btn btn-default">
										<span class="glyphicon glyphicon-plus"></span>
									</button>
								</span>
							</td>
							<td class="price text-center">
								<span>
									<p id="subtotalnyacek<?php echo $cart["id"];?>" class="cart_total_price">Rp <?php echo $subtotal; ?>,00</p>
									<input type="hidden" id="subtotal<?php echo $cart["id"];?>" value="<?php echo $cart["subtotal"];?>">
								</span>
							</td>
							<td class="action"><a style="cursor:pointer" onclick="removecart(<?php echo $cart["id"];?>)"><i class="icon-close"></i></a></td>
						</tr>
						
						
					<?php
							
							$total += $cart["subtotal"];
						}
						$total_edit = "".number_format($total);
						$total_edit = str_replace(",", ".",$total_edit);
					?>
                  </tbody>
				  
				  
				  
                  <tfoot>
                    <!--<tr>
                      <td colspan="2" rowspan="2"></td>
                      <td colspan="2">Total products (tax incl.)</td>
                      <td colspan="2">Rp <?php echo $total_edit;?>,- </td>
                    </tr>-->
                    <tr>
						<td colspan="2" style="width:50%">
							<div class="form-inline" style="padding:10px;">
								<h4 class="form-inline">Have voucher code?</h4> 
								<button onclick="openclosebutton()" class="form-inline form-control btn btn-warning">Use Voucher</button>
								
								<div class="form-inline" style="display:none" id="openclosecode">
									<input type="text" id="codevoucher" class="form-inline form-control" placeholder="Input Voucher Code">
									<button onclick="submitvoucher()" class="form-inline form-control btn btn-danger">Use!</button>
								</div>
							</div>
						</td>
						<td colspan="2"><strong>Total</strong></td>
						<td colspan="2">
							<input type="hidden" id="total" value="<?php echo $total;?>">
							<strong>
								<?php 
									$totaledited = str_replace(",", ".",number_format($total));
									
									echo "<span id='totalnya'>Rp $totaledited,-</span>";
								?>
							</strong>
						</td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation"> <a class="continue-btn" href="<?php echo base_url();?>"><i class="fa fa-arrow-left"> </i>&nbsp; Continue shopping</a> <a class="checkout-btn" href="<?php echo base_url();?>checkout"><i class="fa fa-check"></i> Proceed to checkout</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
   <!-- service section -->

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
			url: '<?php echo site_url("cart/update_data_cart") ?>',
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
	
	
	function openclosebutton()
	{
		$("#openclosebutton").toggle();
		$("#openclosecode").toggle();
	}
	
	function submitvoucher()
	{
		var code = $("#codevoucher").val();
		if(code=="")
			return false;
		
		$.ajax({
			type: "POST",
			url: '<?php echo site_url("voucher/use_voucher_code") ?>',
			cache: false,
			data: {kode: code}, 
			success: function(data) {
				if(data == false)
					alert("Voucher Tidak Valid !");
				else
				{
					alert("Voucher Berhasil Digunakan ! Silahkan melanjutkan pembayaran !");
					$("#codevoucher").prop("readonly", true);
					$("#codevoucherbutton").prop('disabled', true);
				}
					
			}

		});
	}
	
</script>