	<div class="col-main col-sm-6 col-xs-12" style="background-color:white;">
		<div class="my-account">
			<div class="page-title">
				<h2>Profile Information</h2>
			</div>
			<div class="wishlist-item table-responsive">
				<div class="col-md-12">
					<form method="post" onsubmit="return validasi();" enctype="multipart/form-data" action="<?php echo base_url();?>profile/edit_profile_action">
						<div class="col-md-12 text-left">
							<input type="hidden" name="id_user" class="form-control" value="<?php echo $data_user[0]->id_user; ?>">
							
							<?php
								if($this->session->flashdata('message_update')) 
								{
									echo $this->session->flashdata('message_update');
									$this->session->unset_userdata('message_update');
								}
							?>
							<div class="form-group" style="margin-bottom:20px;">
								<label>Nama :</label>
								<input type="text" id="nama_user" name="nama_user" class="form-control" value="<?php echo $data_user[0]->nama_user; ?>" placeholder="Masukkan nama anda">
							</div>
							<div class="form-group" style="margin-top:20px;">
								<label>Email :</label>
								<input type="text" id="email_user" name="email_user" class="form-control" value="<?php echo $data_user[0]->email_user; ?>" placeholder="Masukkan email anda">
							</div>
							<div class="form-group" style="margin-top:20px;">
								<label>Telepon/HP :</label>
								<input type="text" id="phone_user" name="phone_user" class="form-control" value="<?php echo $data_user[0]->phone_user; ?>" placeholder="Masukkan telepon/hp anda">
							</div>
							<div class="form-group" style="margin-top:20px;">
								<label>Jenis Kelamin :</label>
								<select class="form-control" name="gender_user">
									<option value="" disabled>Pilih</option>
									<option value="Pria" <?php if($data_user[0]->gender_user == "Pria") echo "selected"; ?>>Pria</option>
									<option value="Wanita" <?php if($data_user[0]->gender_user == "Wanita") echo "selected"; ?>>Wanita</option>
								</select>
							</div>
							
							<div class="form-group" style="margin-top:20px;">
								<label>Avatar :</label>
								<br>
								<img src="<?php echo $url_theme;?>images/user/<?php echo $data_user[0]->foto_user;?>" width="80px" height="80px">
								<input type="file" name="foto_user">
								<br>
							</div>
							<div class="form-group" style="margin-top:20px;">
								<input type="submit" value="Save Changes" class="btn btn-success">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>		
	</div>