	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>">Home</a></li>
				  <li><a href="<?php echo base_url();?>cart">Edit Cart</a></li>
				  <li><a href="<?php echo base_url();?>checkout">Checkout Cart</a></li>
				  <li><a href="<?php echo base_url();?>confirmation">Confirmation Cart</a></li>
				  <li class="active">Choose Payment Method</li>
				</ol>
			</div>
			<div class="cart_info">
				<div class="page-title">
					<h2>(3/4) Choose Payment</h2>
				</div>
				<table class="table table-condensed">
					<tbody>
						<tr>
							<td>
								<div class="text-center col-sm-1 col-md-12">
									<h4>										
										<label>
											<p>Silahkan pilih metode pembayaran:</p>
										</label>
									</h4>
									
									<br>
									
									<?php
										$i=1;
										foreach($list_payment as $payment)
										{
									?>
											<div class="col-md-4" style="margin-bottom:30px">
												<div class="form-group">
													<label for="name">
														<input onclick="choose_payment()" type="radio" id="type_payment" name="type_payment" value="<?php echo $payment->id_payment;?>">
													</label>
													<br>
													<label for="name">
														<img style="height:200px;width:auto;margin-bottom:5px;" src="<?php echo $url_theme;?>images/payment/<?php echo $payment->logo_payment;?>">
													</label>
													<br>
													<label for="name">
														<?php echo $payment->name_payment;?>
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
									<a onclick="cekempty()" class="btn btn-success">Finish Transaction</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
<script>
	function cekempty()
	{
		var id_payment = $('#type_payment:checked').is(':checked');
		if(id_payment == false){
			alert("Please Choose Payment Method!");
			return false;
		}
		else{
			window.location = '<?php echo site_url("finish") ?>';
		}
	}
	
	function choose_payment()
	{
		var id_payment = document.querySelector('input[name="type_payment"]:checked').value;
		$.ajax({
			type: "POST",
			url: '<?php echo site_url("set_payment") ?>',
			cache: false,
			data: {id_payment: id_payment},
			success: function(data) {
										
			}
		});
	}
 </script>