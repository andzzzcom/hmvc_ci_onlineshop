
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delete Voucher Form
        <small>Form Menghapus Voucher</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/voucher/">Voucher</a></li>
        <li class="active">Delete Voucher</li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
		<div class="row">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<?php 
						if($this->session->flashdata('message')) 
						{
							echo $this->session->flashdata('message');
							$this->session->unset_userdata('message');
						}
						
						echo form_open("admin/voucher/delete_voucher_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<input type="hidden" name="id_voucher" value="<?php echo $data_voucher[0]->id_voucher; ?>">
					<div class="col-md-6">
						<div class="form-group">
						  <label>Kode Voucher</label>
						  <input readonly value="<?php echo $data_voucher[0]->voucher_code; ?>" required type="text" maxlength="30" class="form-control" name="voucher_code" placeholder="Masukkan Kode Voucher">
						</div>
						
						<div class="form-group">
						  <label>Tipe Voucher</label>
						  <select readonly required class="form-control" name="voucher_type">
							<option <?php if( $data_voucher[0]->voucher_type == "ongkir") echo"selected"; ?> class="form-control" value="ongkir">Gratis Ongkir</option>
							<option <?php if( $data_voucher[0]->voucher_type == "persen") echo"selected"; ?> class="form-control" value="persen">Potongan %</option>
							<option <?php if( $data_voucher[0]->voucher_type == "free") echo"selected"; ?> class="form-control" value="free">Free Transaksi</option>
						  </select>
						</div>
						
						<div class="form-group">
						  <label>Nilai Voucher</label>
						  <br>
						  <input readonly value="<?php echo $data_voucher[0]->voucher_value; ?>" required type="text" maxlength="30" class="form-control" name="voucher_value" placeholder="Masukkan Nilai Voucher">
						</div>
						
						<div class="form-group">
						  <label>Deskripsi Voucher</label>
						  <br>
						  <input readonly value="<?php echo $data_voucher[0]->voucher_description; ?>" required type="text" maxlength="50" class="form-control" name="voucher_description" placeholder="Masukkan Deskripsi Voucher">
						</div>
						
						<div class="form-group">
						  <label>Expire Date Voucher</label>
						  <br>
						  <input readonly value="<?php echo $data_voucher[0]->voucher_expire_date; ?>" required type="text" maxlength="30" class="form-control" name="voucher_expire_date" placeholder="Masukkan Expire Date Voucher">
						</div>
						
						<div class="form-group">
						  <label>Status Voucher</label>
						  <select readonly required class="form-control" name="voucher_status">
							<option <?php if($data_voucher[0]->voucher_status =="aktif") echo"selected"; ?> class="form-control" value="aktif">aktif</option>
							<option <?php if($data_voucher[0]->voucher_status =="nonaktif") echo"selected"; ?> class="form-control" value="nonaktif">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Delete</button>
						<a href="<?php echo site_url('admin/voucher/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 