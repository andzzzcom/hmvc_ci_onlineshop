 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delete Bank Form
        <small>Form Menghapus Bank</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/bank/">Bank</a></li>
        <li class="active">Delete Bank</li>
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
						
						echo form_open("admin/bank/delete_bank_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<input type="hidden" name="bank_id" value="<?php echo $data_bank[0]->id_bank; ?>">
					<div class="col-md-6">
						<div class="form-group">
						  <label>Nama Bank</label>
						  <input disabled value="<?php echo $data_bank[0]->name_bank; ?>" required type="text" class="form-control" name="bank_name" placeholder="Masukkan Nama Bank">
						</div>
						
						<div class="form-group">
						  <label>Logo Bank</label>
						  <br>
						  <img style="max-width:100px;max-height:100px;width:auto;height:auto" src="<?php echo $url_theme;?>images/bank/<?php echo $data_bank[0]->logo_bank;?>">
						</div>
						
						<div class="form-group">
						  <label>Location Bank</label>
						  <input disabled value="<?php echo $data_bank[0]->place_bank; ?>" required type="text" class="form-control" name="bank_place" placeholder="Masukkan Lokasi Bank">
						</div>
						
						<div class="form-group">
						  <label>Nama Pemilik Rekening</label>
						  <br>
						  <input disabled value="<?php echo $data_bank[0]->owner_bank; ?>" required type="text" class="form-control" name="bank_owner_name" placeholder="Masukkan Nama Pemilik Rekening">
						</div>
						
						<div class="form-group">
						  <label>Nomor Rekening</label>
						  <br>
						  <input disabled value="<?php echo $data_bank[0]->number_bank; ?>" required type="text" class="form-control" name="bank_number" placeholder="Masukkan Nomor Rekening">
						</div>
						
						<div class="form-group">
						  <label>Status Bank</label>
						  <select disabled required class="form-control" name="bank_status">
							<option <?php if($data_bank[0]->status_bank =="aktif") echo"selected"; ?> class="form-control" value="aktif">aktif</option>
							<option <?php if($data_bank[0]->status_bank =="nonaktif") echo"selected"; ?> class="form-control" value="nonaktif">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Delete</button>
						<a href="<?php echo site_url('admin/bank/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 