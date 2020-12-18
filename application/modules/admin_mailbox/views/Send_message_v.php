 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Send Mailbox Message
        <small>Kirim Pesan ke Customer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/mailbox/">Mailbox</a></li>
        <li class="active">Compose Message</li>
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
						
						echo form_open("admin/mailbox/create_message_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						<div class="form-group">
						  <label>Email Penerima</label>
						  <select required class="form-control" name="receiver_email">
							<?php 
								foreach($list_email as $email)
								{
							?>
								<option class="form-control" value="<?php echo $email->id_user;?>-<?php echo $email->email_user;?>"><?php echo $email->id_user;?> - <?php echo $email->nama_user;?> - <?php echo $email->email_user;?></option>
							<?php
								}
							?>
						 </select>
						</div>
						
						<div class="form-group">
						  <label>Judul Pesan</label>
						  <br>
						  <input type="text" required data-validation="length" data-validation-length="min3" maxlength="50" name="judul_message" class="form-control" placeholder="Masukkan Judul Pesan">
						</div>
						
						<div class="form-group">
						  <label>Isi Pesan</label>
						  <br>
						  <textarea id="deskripsi" data-validation="length" data-validation-length="min5" name="isi_message" cols="100" rows="10" placeholder="Masukkan Isi Pesan"></textarea>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Send</button>
						<a href="<?php echo site_url('admin/mailbox/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
				<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 