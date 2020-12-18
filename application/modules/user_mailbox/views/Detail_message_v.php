		
	<div class="col-main col-sm-6 col-xs-12" style="background-color:white;">
		<div class="my-account">
			<div class="page-title">
				<h2>Detail Message</h2>
			</div>
			<div class="wishlist-item table-responsive">
				<div class="col-md-12">
					<div class="col-md-12 text-left ">
						<div class="col-md-12 col-xs-12 text-left " style="padding:10px;border:1px solid gray">
							<label style="font-weight:bold">
								Tanggal Kirim : 
								<label style="font-weight:normal"><?php echo $data_message[0]->date_message; ?></label>
							</label><br>
							<label style="font-weight:bold">
								Judul : 
								<label style="font-weight:normal"><?php echo $data_message[0]->title_message; ?></label>
							</label><br>
							<label style="font-weight:bold">
								Isi : 
							</label>
							<div class="col-md-12 col-xs-12" style="border:1px solid #e3f2f0;font-weight:normal;height:350px;padding:10px;">
								<?php echo $data_message[0]->content_message; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
	