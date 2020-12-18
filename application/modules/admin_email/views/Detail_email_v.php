 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Email</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/email/">Email</a></li>
        <li class="active">Detail Email</li>
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
						  <label>Judul Email</label>
						  <input readonly value="<?php echo $data_email[0]->judul_email; ?>" type="text" class="form-control">
						</div>
						
						<div class="form-group">
						  <label>Kode Email</label>
						  <input readonly value="<?php echo $data_email[0]->kode_email; ?>" type="text" class="form-control">
						</div>
						
						<div class="form-group">
						  <label>Status Email</label>
						  <br>
						  <input readonly value="<?php echo $data_email[0]->status_email; ?>" type="text" class="form-control">
						</div>
						
						<div class="form-group">
						  <label>Isi Email</label>
						  <br>
							<div style="border:1px solid gray;height:500px;padding:20px">
								<?php echo $data_email[0]->isi_email; ?>
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
 