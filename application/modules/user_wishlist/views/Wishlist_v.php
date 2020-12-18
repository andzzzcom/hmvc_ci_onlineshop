
	
	<div class="col-main col-sm-6 col-xs-12" style="background-color:white;">
		<div class="my-account">
			<div class="page-title">
				<h2>My Wishlist</h2>
			</div>
	
			<div class="wishlist-item table-responsive">
				<table class="col-md-12">
					<thead>
						<tr>
							<th class="th-product" style="width:10%">No</th>
							<th class="th-product" style="width:20%">Images</th>
							<th class="th-details" style="width:60%">Product Name</th>
							<th class="th-delate" style="width:10%">Remove</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$i = 1;
							foreach($data_wishlist as $produk)
							{
						?>
							<tr style="color:black;height:50px;">
								<td><?php echo $i; ?></td>
								<td><img width="80px" height="80px" src="<?php echo $url_theme;?>images/produk/<?php echo $produk->thumbnail_produk; ?>"></td>
								<td><a href="<?php echo base_url();?>product/detail/<?php echo $produk->id_produk; ?>" target="_blank"><?php echo $produk->nama_produk; ?></a></td>
								
								<?php
									if(in_array($produk->id_produk, $data_produk_wishlist))
									{
								?>
									<td><a onclick="update_wishlist('<?php echo $_SESSION["id_user"]; ?>','<?php echo $produk->id_produk; ?>')" class="btn btn-default">x</a></td>
								<?php
									}else
									{
								?>
									<td><a onclick="update_wishlist('<?php echo $_SESSION["id_user"]; ?>','<?php echo $produk->id_produk; ?>')" class="btn btn-default">Add to Wishlist</a></td>
								<?php
									}
								?>
							</tr>
						<?php
								$i++;
							}
						?>
					</tbody>
				</table>
			</div>
		</div>		
	</div>
	
	
<script>
	function update_wishlist(idcustomer, idproduk)
	{
		alert(idproduk);
		$.ajax({

			type: "POST",
			url: '<?php echo site_url("profile/update_wishlist") ?>',
			cache: false,
			data: {idcustomer: idcustomer, idproduk: idproduk}, // appears as $_GET['id'] @ your backend side
			success: function(data) {
				
				location.reload();
		
				/*
				if(data == "true")
					alert("Berhasil Menambahkan Produk ke Wishlist !");
				else
					alert("Berhasil Menghapus Produk dari Wishlist !");
				*/
			}

		});
	  
	}
  
</script>