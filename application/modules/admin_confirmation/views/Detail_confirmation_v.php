 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Confirmation
        <small>Form Confirmation</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/confirmation/">Confirmation</a></li>
        <li class="active">Detail Confirmation</li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
		<div class="row">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-6">
					<?php 
						if($this->session->flashdata('message')) 
						{
							echo $this->session->flashdata('message');
							$this->session->unset_userdata('message');
						}
						
					?> 
						
						<div class="form-group">
						  <label>Invoice Code</label>
						  <br>
						  <a target="_blank" href="<?php echo base_url();?>admin/order/edit_transaction/<?php echo base64_encode($detail_confirmation[0]->invoice_code); ?>"><input style="cursor:pointer" class="form-control" readonly type="text" value="<?php echo $detail_confirmation[0]->invoice_code; ?>"></a>
						</div>
						
						<div class="form-group">
						  <label>Customer Name</label>
						  <br>
						  <a target="_blank" href="<?php echo base_url();?>admin/user/edit_user/<?php echo $detail_confirmation[0]->id_user; ?>"><input style="cursor:pointer" class="form-control" readonly type="text" value="<?php echo $detail_confirmation[0]->nama_user; ?>"></a>
						</div>
						
						<div class="form-group">
						  <label>Bank Tujuan (SHOP)</label>
						  <input readonly value="<?php echo $detail_confirmation[0]->bank_name; ?>" type="text" class="form-control" name="bank_tujuan">
						</div>
						
						<div class="form-group">
						  <label>Nama Bank Customer</label>
						  <input readonly value="<?php echo $detail_confirmation[0]->bank_name_sender; ?>" type="text" class="form-control" name="bank_name_customer">
						</div>
						
						<div class="form-group">
						  <label>Nomor Bank Customer</label>
						  <input readonly value="<?php echo $detail_confirmation[0]->bank_number_sender; ?>" type="text" class="form-control" name="bank_number_customer">
						</div>
						
						<div class="form-group">
						  <label>Nama Pemilik Bank Customer</label>
						  <input readonly value="<?php echo $detail_confirmation[0]->bank_owner_name_sender; ?>" type="text" class="form-control" name="bank_owner_customer">
						</div>
						
						<div class="form-group">
						  <label>Bukti Konfirmasi</label>
						  <a target="_blank" href="<?php echo base_url();?>assets/images/produk/<?php echo $detail_confirmation[0]->bill_file; ?>"><input style="cursor:pointer" class="form-control" readonly type="text" value="File"></a>
						</div>
						
						<div class="form-group">
						  <label>Tanggal Konfirmasi</label>
						  <input readonly value="<?php echo $detail_confirmation[0]->tanggal_konfirmasi_pembayaran; ?>" type="text" class="form-control" name="date_confirm">
						</div>
						
						<div class="form-group">
						  <label>Keterangan Konfirmasi</label>
						  <input readonly value="<?php echo $detail_confirmation[0]->keterangan; ?>" type="text" class="form-control" name="keterangan_konfirmasi">
						</div>
						
						<div class="form-group">
						  <label>Status Konfirmasi</label>
						  <input readonly value="<?php echo $detail_confirmation[0]->status_konfirmasi_pembayaran; ?>" type="text" class="form-control" name="status_konfirmasi">
						</div>
						
						<?php echo form_open("admin/confirmation/edit_status_order_action/", "role='form' enctype='multipart/form-data'"); ?>
							
							<input type="hidden" name="id_confirmation" value="<?php echo $id_confirmation; ?>">
							<input type="hidden" name="invoice_code" value="<?php echo $id_invoice; ?>">
							<div class="form-group">
								<label>Status Transaction</label>
								<select required class="form-control" name="status_pesanan">
									<option class="form-control" value="unpaid" <?php if($list_all_transaction[0]->status_pesanan =="unpaid" or $list_all_transaction[0]->status_pesanan =="expired") echo"selected"; ?>>Unpaid</option>
									<option class="form-control" value="confirmed" <?php if($list_all_transaction[0]->status_pesanan =="confirmed") echo"selected"; ?>>Confirmed</option>
									<option class="form-control" value="paid" <?php if($list_all_transaction[0]->status_pesanan =="paid") echo"selected"; ?>>Paid</option>
								</select>
								<br>
								<button type="submit" id="submit" class="btn btn-warning">Edit</button>
								<a href="<?php echo site_url('admin/confirmation/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
							 
								<br><br>
								<label style="font-weight:normal">1. Unpaid : belum lunas</label><br>
								<label style="font-weight:normal">2. Confirmed : sudah dikonfirmasi</label><br>
								<label style="font-weight:normal">3. Paid : sudah lunas</label><br>
								  
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
	<script>
	
		$.validate({
			lang: 'es'
		});
	</script>