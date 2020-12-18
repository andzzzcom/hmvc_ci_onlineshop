 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Payment Form
        <small>Form Mengubah Payment</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/settings/edit_payment">Payment Settings</a></li>
        <li class="active">Edit Payment</li>
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
						
						echo form_open("admin/settings/edit_payment_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<input type="hidden" name="id_payment" value="<?php echo $data_payment[0]->id_payment; ?>">
					<div class="col-md-4">
						<div class="form-group">
						  <label>Nama Payment</label>
						  <input value="<?php echo $data_payment[0]->name_payment; ?>" required type="text" maxlength="30" class="form-control" name="name_payment" placeholder="Masukkan nama Payment">
						</div>
						
						<div class="form-group">
						  <label>Logo Payment</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/payment/<?php echo $data_payment[0]->logo_payment;?>" width="100px" height="100px">
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" name="logo_payment" id="uploaded1" data-placeholder="<?php echo $data_payment[0]->logo_payment;?>" class="upload filestyle" data-value="uploaded1">
						  </label>
						</div>
						
						<div class="form-group">
						  <label>Status Payment</label>
						  <select required class="form-control" name="status_payment">
							<option <?php if($data_payment[0]->status_payment =="1") echo"selected"; ?> class="form-control" value="1">aktif</option>
							<option <?php if($data_payment[0]->status_payment =="0") echo"selected"; ?> class="form-control" value="0">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Edit</button>
						<a href="<?php echo site_url('admin/settings/payment_settings');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 