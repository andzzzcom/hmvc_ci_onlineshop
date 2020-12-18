
	<div class="col-main col-sm-6 col-xs-12" style="background-color:white;">
		<div class="my-account">
			<div class="page-title">
				<h2>Create Message to Admin</h2>
			</div>
			<div class="wishlist-item table-responsive">
				<div class="col-md-12">
					<div class="col-md-12 text-left ">
						<div class="col-md-12 col-xs-12 text-left " style="padding:10px;border:1px solid gray">
							<?php
								if($this->session->flashdata('message_update')) 
								{
									echo $this->session->flashdata('message_update');
									$this->session->unset_userdata('message_update');
								}
							?>
							<div>
								<form action="<?php echo base_url();?>profile/send_message_action/" method="post">
									<label style="font-weight:bold">
										Judul : 
									</label>
									<input type="text" class="form-control" name="title_message" placeholder="insert your title">
									<br><br>
									<label style="font-weight:bold">
										Isi : 
									</label>
									<br>
									<textarea name="content_message" id="deskripsi" cols="100" rows="10"></textarea>
									<br><br>
									<input type="submit" class="btn btn-info" value="send">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
	