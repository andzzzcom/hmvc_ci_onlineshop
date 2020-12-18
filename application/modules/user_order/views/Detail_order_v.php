	
	<div class="col-main col-sm-6 col-xs-12" style="background-color:white;">
		<div class="my-account">
			<div class="page-title">
				<h2>Order Detail: <?php echo $invoice_code;?></h2>
			</div>
			<div class="wishlist-item table-responsive">
				<div class="col-md-12">
					<div class="col-md-12 text-left ">
					
						<h4>Detail Order</h4>
						<div class="col-md-12 col-xs-12 text-left ">
							<label style="font-weight:bold">
								Invoice ID: 
								<label style="font-weight:normal"><?php echo $data_order[0]->invoice_code; ?></label>
							</label><br>
							<label style="font-weight:bold">
								Order Date: 
								<label style="font-weight:normal"><?php echo $data_order[0]->date_order_pesanan; ?></label>
							</label><br>
							<label style="font-weight:bold">
								Expired Date: 
								<label style="font-weight:normal"><?php echo $data_order[0]->date_expire_pesanan; ?></label>
							</label><br>
							<label style="font-weight:bold">
								Status Order: 
								<?php if($data_order[0]->status_pesanan=="unpaid"){ ?>
									<label class="label label-danger"><?php echo $data_order[0]->status_pesanan; ?></label>
								<?php }else if($data_order[0]->status_pesanan=="confirmed"){ ?>
									<label class="label label-warning"><?php echo $data_order[0]->status_pesanan; ?></label>
								<?php }else if($data_order[0]->status_pesanan=="expired"){ ?>
									<label class="label label-default"><?php echo $data_order[0]->status_pesanan; ?></label>
								<?php }else{ ?>
									<label class="label label-success">paid</label>
								<?php } ?>
							</label><br><br><br>
						</div>
						
						<h4>Detail Produk</h4>
						<table border="1" class="table table-border table-hover text-center">
							<thead>
								<tr style="background-color:#AB9A9A">
									<td>No</td>
									<td>Nama Produk</td>
									<td>Harga Produk</td>
									<td>Jumlah</td>
									<td>Subtotal</td>
								</tr>
							</thead>
							<tbody>
							<?php 
								$i = 1;
								$total = 0;
								$ongkir = 0;
								foreach($data_order as $order)
								{
									$harga_satuan_produk = number_format($order->harga_satuan_produk);
									$harga_satuan_produk = str_replace(",", ".",$harga_satuan_produk);
									
									$subtotal = number_format($order->subtotal_produk);
									$subtotal = str_replace(",", ".",$subtotal);
									
									$total = number_format($order->total_price_pesanan);
									$total = str_replace(",", ".",$total);
									
									$ongkir = number_format($order->ongkir);
									$ongkir = str_replace(",", ".",$ongkir);
									
									if($order->voucher_discount == "")
										$order->voucher_discount=0;
									
									$vouchervalue = number_format($order->voucher_discount);
									$vouchervalue = str_replace(",", ".",$vouchervalue);
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><a href="<?php echo base_url();?>product/detail/<?php echo $order->id_produk; ?>" target="_blank"><?php echo $order->nama_produk; ?></a></td>
									<td>Rp <?php echo $harga_satuan_produk; ?>,-</td>
									<td><?php echo $order->jumlah_produk; ?></td>
									<td>Rp <?php echo $subtotal; ?>,-</td>
								</tr>
							<?php
									$i++;
								}
							?>
							</tbody>
							<tfoot>
								<tr style="background-color:#FEF5E8">
									<td colspan="3"></td>
									<td>Ongkir</td>
									<td>Rp <?php echo $ongkir;?>,-</td>
								</tr>
								<tr style="background-color:#FEF5E8">
									<td colspan="3"></td>
									<td>Voucher (<?php echo $order->voucher_code;?>)</td>
									<td>- Rp <?php echo $vouchervalue;?>,-</td>
								</tr>
								<tr style="background-color:#FEF5E8">
									<td colspan="3"></td>
									<td>Total</td>
									<td>Rp <?php echo $total;?>,-</td>
								</tr>
							</tfoot>
						</table>
						<br>
						
						
						
						<h4>Detail Pengiriman</h4>
						<div class="col-md-6 col-xs-6 text-left ">
							<label style="font-weight:bold">
								Nama : 
								<label style="font-weight:normal"><?php echo $order->nama; ?></label>
							</label><br>
							<label style="font-weight:bold">
								Email : 
								<label style="font-weight:normal"><?php echo $order->email; ?></label>
							</label><br>
							<label style="font-weight:bold">
								Telepon : 
								<label style="font-weight:normal"><?php echo $order->phone; ?></label>
							</label><br>
							<label style="font-weight:bold">
								Ongkos Kirim : 
								<label style="font-weight:normal">Rp <?php echo $ongkir; ?>,-</label>
							</label><br>
							<label style="font-weight:bold">
								Kurir : 
								<label style="font-weight:normal"><?php echo $order->kurir; ?></label>
							</label>
						</div>
						<div class="col-md-6 col-xs-6 text-left ">
						
							<label style="font-weight:bold">
								Alamat : 
								<label style="font-weight:normal"><?php echo $order->alamat; ?></label>
							</label><br>
							<label style="font-weight:bold">
								Provinsi : 
								<label style="font-weight:normal"><?php echo $order->provinsi; ?></label>
							</label><br>
							<label style="font-weight:bold">
								Kota : 
								<label style="font-weight:normal"><?php echo $order->kota; ?></label>
							</label><br>
							<label style="font-weight:bold">
								Kecamatan : 
								<label style="font-weight:normal"><?php echo $order->kecamatan; ?></label>
							</label><br>
							<label style="font-weight:bold">
								Kode pos : 
								<label style="font-weight:normal"><?php echo $order->kodepos; ?></label>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>