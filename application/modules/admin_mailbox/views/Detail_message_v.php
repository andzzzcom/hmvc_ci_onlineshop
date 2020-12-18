 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Message
        <small>Detail pesan inbox customer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/mailbox/">Mailbox</a></li>
        <li class="active">Detail Message Customer</li>
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
						  <input readonly value="<?php echo $data_pesan[0]->nama_user; ?>" type="text" class="form-control">
						</div>
						
						<div class="form-group">
						  <label>Email Pengirim</label>
						  <input readonly value="<?php echo $data_pesan[0]->email_user; ?>" type="text" class="form-control" name="admin_email">
						</div>
						
						<div class="form-group">
						  <label>Tanggal Kirim</label>
						  <br>
						  <input readonly value="<?php echo $data_pesan[0]->date_message; ?>" type="text" class="form-control">
						</div>
						
						<div class="form-group">
						  <label>Judul Pesan</label>
						  <br>
						  <input readonly value="<?php echo $data_pesan[0]->title_message; ?>" class="form-control">
						</div>
						
						<div class="form-group">
						  <label>Isi Pesan</label>
						  <br>
							<div style="border:1px solid gray;height:300px;padding:20px">
								<?php echo $data_pesan[0]->content_message; ?>
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
 