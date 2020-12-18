 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delete Message
        <small>Delete pesan inbox customer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/mailbox/">Mailbox</a></li>
        <li class="active">Delete Message Customer</li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
		<div class="row">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-10">
					<?php 
						if($this->session->flashdata('message')) 
						{
							echo $this->session->flashdata('message');
							$this->session->unset_userdata('message');
						}
						
						echo form_open("admin/mailbox/delete_message_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
						<input type="hidden" name="message_id" value="<?php echo $data_pesan[0]->id_message; ?>">
						<div class="form-group">
						  <label>Nama Pengirim</label>
						  <input readonly value="<?php echo $data_pesan[0]->nama_user; ?>" type="text" class="form-control">
						</div>
						
						<div class="form-group">
						  <label>Email Pengirim</label>
						  <input readonly value="<?php echo $data_pesan[0]->email_user; ?>" type="text" class="form-control">
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
						
						<button type="submit" id="submit" class="btn btn-warning">Delete</button>
						<a href="<?php echo site_url('admin/mailbox/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
						<?php echo form_close(); ?>
					</div>
					
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 