	
	<div class="col-main col-sm-6 col-xs-12" style="background-color:white;">
		<div class="my-account">
			<div class="page-title">
				<h2>Order Lists</h2>
			</div>
			<div class="wishlist-item table-responsive">
				<div class="col-md-12">
					<?php
						if($this->session->flashdata('message_update')) 
						{
							echo $this->session->flashdata('message_update');
							$this->session->unset_userdata('message_update');
						}
					?>
					<div class="col-md-12 text-left table-responsive">
						<table class="table table-border text-center">
							<tr>
								<td>No</td>
								<td>Invoice ID</td>
								<!--<<td>Order Date</td>-->
								<!--<td>Expired Date</td>-->
								<td>Konfirmasi</td>
								<td>Status</td>
								<td>Review</td>
							</tr>
							<?php 
								$i = 1;
								$review = false;
								foreach($data_order as $order)
								{
							?>
								<tr style="color:black;height:50px;">
									<td><?php echo $i; ?></td>
									<td><a href="<?php echo base_url();?>profile/order_detail/<?php echo base64_encode($order->invoice_code); ?>" target="_blank"><?php echo $order->invoice_code; ?></a></td>
									<!--<<td><?php echo $order->date_order_pesanan; ?></td>-->
									<!--<td><?php echo $order->date_expire_pesanan; ?></td>-->
									<td>
										<?php if($order->status_pesanan!=="expired"){ ?>
											<a href="<?php echo base_url();?>profile/confirmation/<?php echo base64_encode($order->invoice_code); ?>" target="_blank" class="btn btn-default">Confirm</a>
										<?php } ?>
									</td>
									<td>
										<?php if($order->status_pesanan=="unpaid"){ ?>
											<label class="label label-danger"><?php echo $order->status_pesanan; ?></label>
										<?php }else if($order->status_pesanan=="confirmed"){ ?>
											<label class="label label-warning"><?php echo $order->status_pesanan; ?></label>
										<?php }else if($order->status_pesanan=="expired"){ ?>
											<label class="label label-default"><?php echo $order->status_pesanan; ?></label>
										<?php }else{ 
												$review = true;
										?>
											<label class="label label-success">paid</label>
										<?php } ?>
									</td>
									<td> 
										<?php if($review == true){ ?>
												<a href="<?php echo base_url();?>profile/give_review/<?php echo base64_encode($order->invoice_code); ?>" target="_blank" class="btn btn-info">Review</a>
										<?php } ?>
									</td>
								</tr>
							<?php
									$review = false;
									$i++;
								}
							?>
						</table>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<?php echo $pagination; ?>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>