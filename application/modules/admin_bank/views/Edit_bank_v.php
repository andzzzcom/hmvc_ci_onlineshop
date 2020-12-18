 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Bank Form
        <small>Form Mengubah Bank</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/bank/">Bank</a></li>
        <li class="active">Edit Bank</li>
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
						
						echo form_open("admin/bank/edit_bank_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<input type="hidden" name="bank_id" value="<?php echo $data_bank[0]->id_bank; ?>">
					<div class="col-md-6">
						<div class="form-group">
						  <label>Nama Bank</label>
						  <select required class="form-control" name="bank_name">
							<option <?php if( $data_bank[0]->name_bank == "BCA") echo"selected"; ?> class="form-control" value="BCA">BCA</option>
							<option <?php if( $data_bank[0]->name_bank == "BRI") echo"selected"; ?> class="form-control" value="BRI">BRI</option>
							<option <?php if( $data_bank[0]->name_bank == "BNI") echo"selected"; ?> class="form-control" value="BNI">BNI</option>
							<option <?php if( $data_bank[0]->name_bank == "mandiri") echo"selected"; ?> class="form-control" value="mandiri">mandiri</option>
							<option <?php if( $data_bank[0]->name_bank == "CIMB") echo"selected"; ?> class="form-control" value="CIMB">CIMB</option>
							<option <?php if( $data_bank[0]->name_bank == "BTN") echo"selected"; ?> class="form-control" value="BTN">BTN</option>
							<option <?php if( $data_bank[0]->name_bank == "BUKOPIN") echo"selected"; ?> class="form-control" value="BUKOPIN">BUKOPIN</option>
						  </select>
						</div>
						
						<div class="form-group">
						  <label>Location Bank</label>
						  <input value="<?php echo $data_bank[0]->place_bank; ?>" required type="text" maxlength="30" class="form-control" name="bank_place" placeholder="Masukkan Lokasi Bank">
						</div>
						
						<div class="form-group">
						  <label>Nama Pemilik Rekening</label>
						  <br>
						  <input value="<?php echo $data_bank[0]->owner_bank; ?>" required type="text" maxlength="30" class="form-control" name="bank_owner_name" placeholder="Masukkan Nama Pemilik Rekening">
						</div>
						
						<div class="form-group">
						  <label>Nomor Rekening</label>
						  <br>
						  <input value="<?php echo $data_bank[0]->number_bank; ?>" required type="text" maxlength="30" class="form-control" name="bank_number" placeholder="Masukkan Nomor Rekening">
						</div>
						
						<div class="form-group">
						  <label>Status Bank</label>
						  <select required class="form-control" name="bank_status">
							<option <?php if($data_bank[0]->status_bank =="aktif") echo"selected"; ?> class="form-control" value="aktif">aktif</option>
							<option <?php if($data_bank[0]->status_bank =="nonaktif") echo"selected"; ?> class="form-control" value="nonaktif">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Edit</button>
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
 