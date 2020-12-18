 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Bank Form
        <small>Form Menambahkan Bank</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/bank/">Bank</a></li>
        <li class="active">Add Bank</li>
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
						
						echo form_open("admin/bank/add_bank_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<div class="col-md-6">
						<div class="form-group">
						  <label>Nama Bank</label>
						  <select required class="form-control" name="bank_name">
							<option class="form-control" value="BCA">BCA</option>
							<option class="form-control" value="BRI">BRI</option>
							<option class="form-control" value="BNI">BNI</option>
							<option class="form-control" value="mandiri">mandiri</option>
							<option class="form-control" value="CIMB">CIMB</option>
							<option class="form-control" value="BTN">BTN</option>
							<option class="form-control" value="BUKOPIN">BUKOPIN</option>
						  </select>
						</div>
						
						<div class="form-group">
						  <label>Location Bank</label>
						  <input required type="text" maxlength="30" class="form-control" name="bank_place" placeholder="Masukkan Lokasi Bank">
						</div>
						
						<div class="form-group">
						  <label>Nama Pemilik Rekening</label>
						  <br>
						  <input required type="text" maxlength="30" class="form-control" name="bank_owner_name" placeholder="Masukkan Nama Pemilik Rekening">
						</div>
						
						<div class="form-group">
						  <label>Nomor Rekening</label>
						  <br>
						  <input required type="text" maxlength="30" class="form-control" name="bank_number" placeholder="Masukkan Nomor Rekening">
						</div>
						
						<div class="form-group">
						  <label>Status Bank</label>
						  <select required class="form-control" name="bank_status">
							<option class="form-control" value="aktif">aktif</option>
							<option class="form-control" value="nonaktif">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Add</button>
						<a href="<?php echo site_url('Admin/Bank/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 