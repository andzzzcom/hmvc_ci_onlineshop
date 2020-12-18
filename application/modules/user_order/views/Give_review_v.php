	
	<div class="col-main col-sm-6 col-xs-12" style="background-color:white;">
		<div class="my-account">
			<div class="page-title">
				<h2>Give Review</h2>
			</div>
			<div class="wishlist-item table-responsive">
				<div class="col-md-12">
					<?php 
						foreach($data_order as $order)
						{  	
							$rating = "";
							$review = "";
							$buttonstatus = true;
							$temp_data_review = $data_review;
							foreach($data_review as $reviews)
							{ 
								if($reviews->id_produk == $order->id_produk)
								{
									$rating = $reviews->rating;
									$review = $reviews->review;
									$buttonstatus = false;
								}
							} 
							$data_review = $temp_data_review;
					?>
					<div class="col-md-12" style="margin-bottom:20px">
						<input type="hidden" id="invoice_code" value="<?php echo $order->invoice_code; ?>">
						<?php if($buttonstatus == false) echo"<label style='font-size:10px;' class='label label-danger'>( Anda sudah memberikan rating dan review ke produk ini )</label><br><br>";?> 
						
						<a target="_blank" href="<?php echo base_url();?>product/detail/<?php echo $order->id_produk; ?>">
							<div class="imghover col-md-4 text-center">
								<div class="form-group">
								  <label><img style="cursor:pointer" width="100px" height="100px" src="<?php echo $url_theme;?>images/produk/<?php echo $order->thumbnail_produk; ?>"></label>
								</div>
								
								<div class="input-lg form-group">
								  <label style="font-size:12px;"><?php echo $order->nama_produk; ?></label>
								</div>
							</div>
						</a>
						
						<div class="col-md-8 text-left">
							<div class="form-group">
								<label>Rating Produk</label>
								<select <?php if($buttonstatus == false) echo"disabled";?> id="rating_produk-<?php echo $order->id_produk; ?>" required class="input-lg form-control">
									<option <?php if($rating == "1") echo "selected"; ?> class="form-control" value="1">1 of 5</option>
									<option <?php if($rating == "2") echo "selected"; ?> class="form-control" value="3">2 of 5</option>
									<option <?php if($rating == "3") echo "selected"; ?> class="form-control" value="3">3 of 5</option>
									<option <?php if($rating == "4") echo "selected"; ?> class="form-control" value="4">4 of 5</option>
									<option <?php if($rating == "5") echo "selected"; ?> class="form-control" value="5">5 of 5</option>
								</select>
							</div>
							
							<div class="form-group">
							  <label>Review Produk</label>
							  <input <?php if($buttonstatus == false) echo"disabled";?> value="<?php echo $review;?>" required type="text" maxlength="200" id="review_produk-<?php echo $order->id_produk; ?>" class="input-lg form-control" placeholder="insert your review..">
							</div>
							
							<?php
								if($buttonstatus !== false)
								{
							?>
									<div class="form-group" style="margin-top:20px;">
										<input id="button-<?php echo $order->id_produk; ?>" onclick="send_review(<?php echo $order->id_produk; ?>)" type="button" value="Send Review" class="btn btn-success">
									</div>
							<?php 
								}
							?>
						</div>
					</div>
					<?php 
						}
					?>
				</div>
			</div>
		</div>		
	</div>
	
	
<script>
		
	function send_review(id_produk)
	{
		var invoice_code = $("#invoice_code").val();
		var rating_produk = $("#rating_produk-"+id_produk+" option:selected").val();
		var review_produk = $("#review_produk-"+id_produk).val();
		
		$.ajax({
			type: "POST",
			url: '<?php echo site_url("profile/give_review_action") ?>',
			cache: false,
			data: "id_produk=" + id_produk + '&&invoice_code=' + invoice_code + '&&rating_produk=' + rating_produk + '&&review_produk=' + review_produk, 
			success: function(data) 
			{
				if(data == "true")
				{
					alert("Berhasil Memberikan Rating & Review !");
					$("#rating_produk-"+id_produk).prop('disabled', 'disabled');
					$("#review_produk-"+id_produk).prop("disabled", "true");
					$("#button-"+id_produk).remove();
				}
			}

		});
	  
	}
</script>