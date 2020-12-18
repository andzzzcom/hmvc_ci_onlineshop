 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Courier Form
        <small>Form Mengubah Kurir</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/settings/courier_settings">Courier Settings</a></li>
        <li class="active">Edit Courier</li>
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
						
						echo form_open("admin/settings/edit_courier_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<input type="hidden" name="id_kurir" value="<?php echo $data_kurir[0]->id_kurir; ?>">
					<div class="col-md-4">
						<div class="form-group">
						  <label>Nama Kurir</label>
						  <input value="<?php echo $data_kurir[0]->name_kurir; ?>" required type="text" maxlength="30" class="form-control" name="name_kurir" placeholder="Masukkan nama Kurir">
						</div>
						
						<div class="form-group">
						  <label>Kode Kurir</label>
						  <input readonly value="<?php echo $data_kurir[0]->code_kurir; ?>" required type="text" maxlength="30" class="form-control" name="code_kurir" placeholder="Masukkan Kode Kurir">
						</div>
						
						<div class="form-group">
						  <label>Logo Kurir</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/courier/<?php echo $data_kurir[0]->logo_kurir;?>" width="100px" height="100px">
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" name="logo_kurir" id="uploaded1" data-placeholder="<?php echo $data_kurir[0]->logo_kurir;?>" class="upload filestyle" data-value="uploaded1">
						  </label>
						</div>
						
						<div class="form-group">
						  <label>Status Kurir</label>
						  <select required class="form-control" name="status_kurir">
							<option <?php if($data_kurir[0]->status_kurir =="1") echo"selected"; ?> class="form-control" value="1">aktif</option>
							<option <?php if($data_kurir[0]->status_kurir =="0") echo"selected"; ?> class="form-control" value="0">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Edit</button>
						<a href="<?php echo site_url('admin/settings/courier_settings');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 