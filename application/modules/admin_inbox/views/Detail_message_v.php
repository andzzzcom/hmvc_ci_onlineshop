 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Message
        <small>Detail pesan inbox</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Admin/Home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Admin/Inbox/">Inbox</a></li>
        <li class="active">Detail Message</li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
		<div class="row">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-10">
						<div class="form-group">
						  <label>Nama Pengirim</label>
						  <input readonly value="<?php echo $data_pesan[0]->nama_pengirim; ?>" type="text" class="form-control">
						</div>
						
						<div class="form-group">
						  <label>Email Pengirim</label>
						  <input readonly value="<?php echo $data_pesan[0]->email_pengirim; ?>" type="text" class="form-control" name="admin_email">
						</div>
						
						<div class="form-group">
						  <label>Tanggal Kirim</label>
						  <br>
						  <input readonly value="<?php echo $data_pesan[0]->tanggal_kirim; ?>" type="text" class="form-control">
						</div>
						
						<div class="form-group">
						  <label>Judul Pesan</label>
						  <br>
						  <input readonly value="<?php echo $data_pesan[0]->subjek_message; ?>" class="form-control">
						</div>
						
						<div class="form-group">
						  <label>Isi Pesan</label>
						  <br>
							<div style="border:1px solid gray;height:300px;padding:20px">
								<?php echo $data_pesan[0]->isi_message; ?>
							</div>
						</div>
						
					</div>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 