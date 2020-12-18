	<div class="col-main col-sm-6 col-xs-12" style="background-color:white;">
		<div class="my-account">
			<div class="page-title">
				<h2>Security Settings</h2>
			</div>
			<div class="wishlist-item table-responsive">
				<div class="col-md-12">
					<form method="post" onsubmit="return validasi();" enctype="multipart/form-data" action="<?php echo base_url();?>profile/security_settings_action">
						<div class="col-md-12 text-left">
							<input type="hidden" name="id_user" class="form-control" value="<?php echo $data_user[0]->id_user; ?>">
							
							<?php
								if($this->session->flashdata('message_update')) 
								{
									echo $this->session->flashdata('message_update');
									$this->session->unset_userdata('message_update');
								}
							?>
							<div class="col-md-9 text-left">
								<div class="form-group" style="margin-bottom:20px;">
									<label>Old Password :</label>
									<input autocomplete="off" type="password" name="oldpassword" class="form-control" placeholder="Masukkan password lama anda">
								</div>
								<div class="form-group" style="margin-top:20px;">
									<label>New Password :</label>
									<input autocomplete="off" type="password" name="newpassword_confirmation" class="form-control" placeholder="Masukkan password baru anda">
								</div>
								<div class="form-group" style="margin-top:20px;">
									<label>New Password (confirmation) :</label>
									<input autocomplete="off" type="password" name="newpassword" class="form-control" placeholder="Masukkan password baru anda (konfirmasi)">
								</div>
								<div class="form-group" style="margin-top:20px;">
									<input type="submit" value="Save Changes" class="btn btn-success">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>		
	</div>