
	<div class="col-main col-sm-6 col-xs-12" style="background-color:white;">
		<div class="my-account">
			<div class="page-title">
				<h2>Payment Confirmation</h2>
			</div>
			<div class="wishlist-item table-responsive">
				<div class="col-md-12">
					<form method="post" onsubmit="return validasi();" enctype="multipart/form-data" action="<?php echo base_url();?>profile/confirmation_action">
						<div class="col-md-12 text-left">
							<input type="hidden" name="id_user" class="form-control" value="<?php echo $data_user[0]->id_user; ?>">
							
							<?php
								if($this->session->flashdata('message_update')) 
								{
									echo $this->session->flashdata('message_update');
									$this->session->unset_userdata('message_update');
								}
								
								$bank_owner_name_sender="";$bank_number_sender="";$keterangan="";$bank_name_sender="";$bank_name="";$bill_file="";
								if(!empty($check_link_confirmation))
								{
									$bank_owner_name_sender = $check_link_confirmation[0]->bank_owner_name_sender;
									$bank_number_sender = $check_link_confirmation[0]->bank_number_sender;
									$keterangan = $check_link_confirmation[0]->keterangan;
									$bank_name_sender = $check_link_confirmation[0]->bank_name_sender;
									$bank_name = $check_link_confirmation[0]->bank_name;
									$bill_file = $check_link_confirmation[0]->bill_file;
								}
								
							?>
							<div class="form-group" style="margin-bottom:20px;">
								<label>Bank Shop :</label>
								<select required class="form-control" name="bank_shop">
									<option value="" disabled>Pilih</option>
									<?php 
										foreach($data_bank as $bank)
										{
											$name_bank = $bank->name_bank;
											$number_bank = $bank->number_bank;
											$owner_bank = $bank->owner_bank;
											$concate = $name_bank." - ".$number_bank." - a.n. ".$owner_bank;
									?>
										<option <?php if($bank_name == $concate) echo "selected"; ?> value="<?php echo $bank->name_bank;?> - <?php echo $bank->number_bank;?> - a.n. <?php echo $bank->owner_bank;?>"><?php echo $bank->name_bank;?> - <?php echo $bank->number_bank;?> - a.n. <?php echo $bank->owner_bank;?></option>
									<?php 
										}
									?>
								</select>
							</div>
							<div class="form-group" style="margin-top:20px;">
								<label>Bank Name :</label>
								<select required class="form-control" name="bank_name">
									<option value="" disabled>Pilih</option>
									<option <?php if($bank_name_sender == "BCA") echo "selected"; ?> value="BCA">BCA</option>
									<option <?php if($bank_name_sender == "MANDIRI") echo "selected"; ?> value="MANDIRI">MANDIRI</option>
									<option <?php if($bank_name_sender == "BNI") echo "selected"; ?> value="BNI">BNI</option>
									<option <?php if($bank_name_sender == "BRI") echo "selected"; ?> value="BRI">BRI</option>
									<option <?php if($bank_name_sender == "CIMB") echo "selected"; ?> value="CIMB">CIMB</option>
									<option <?php if($bank_name_sender == "BTN") echo "selected"; ?> value="BTN">BTN</option>
								</select>
							</div>
							<div class="form-group" style="margin-top:20px;">
								<label>Bank Owner Name :</label>
								<input value="<?php echo $bank_owner_name_sender;?>" required type="text" id="bank_owner_name" name="bank_owner_name" class="form-control" placeholder="Masukkan nama pemilik bank anda">
							</div>
							<div class="form-group" style="margin-top:20px;">
								<label>Bank Number :</label>
								<input value="<?php echo $bank_number_sender;?>" required type="text" id="bank_number" name="bank_number" class="form-control" placeholder="Masukkan nomor rekening bank anda">
							</div>
							<div class="form-group" style="margin-top:20px;">
								<label>Bukti Transfer :</label>
								<br>
								<a href="<?php echo $url_theme;?>images/user/confirm/<?php echo $bill_file;?>" target="_blank"><?php echo $bill_file;?></a>
								<br>
								<input style="margin-top:10px;" type="file" name="bukti_transfer">
							</div>
							<div class="form-group" style="margin-top:20px;">
								<label>Keterangan :</label>
								<input value="<?php echo $keterangan;?>" type="text" name="keterangan" class="form-control" placeholder="Masukkan keterangan">
							</div>
							
							<input type="hidden" name="invoice_code" value="<?php echo $invoice_code;?>">
							
							<div class="form-group" style="margin-top:20px;">
								<input type="submit" value="Submit" class="btn btn-success">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>		
	</div>
	
	
	
	
<script>
		
	function validasi()
	{
		var bank_owner_name = $('#bank_owner_name').val();
		var bank_number = $('#bank_number').val();
		
		if(bank_owner_name=="" || bank_number=="")
		{
			alert("Semua field harus di isi !");
			
			return false;
		}
		
		if(validasi_nama(bank_owner_name) == false || validasi_bank_number(bank_number) == false)
			return false;
	}
</script>