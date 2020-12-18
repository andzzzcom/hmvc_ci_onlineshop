	
	<div class="col-main col-sm-6 col-xs-12" style="background-color:white;">
		<div class="my-account">
			<div class="page-title">
				<h2>List Sent Message Mailbox</h2>
			</div>
			<div class="wishlist-item table-responsive">
				<div class="col-md-12">
					<?php
						if($this->session->flashdata('message_update')) 
						{
							echo $this->session->flashdata('message_update');
						}
					?>
					<div class="col-md-12 text-left table-responsive">
						<table class="table table-border text-center">
							<tr>
								<td>No</td>
								<td>Title</td>
								<td>Date</td>
								<td></td>
							</tr>
							<?php 
								$i = 1;
								foreach($data_message as $message)
								{
							?>
								<tr style="color:black;height:50px;">
									<td><?php echo $i; ?></td>
									<td><?php echo $message->title_message; ?></td>
									<td style="font-weight:normal"><?php echo $message->date_message; ?></td>
									<td><a class="btn btn-default" href="<?php echo base_url();?>profile/detail_message_sent/<?php echo $message->id_message; ?>" target="_blank">View</a></td>
								</tr>
							<?php
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