 
  <!-- Theme style -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Voucher Form
        <small>Form Menambahkan Voucher</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/voucher/">Voucher</a></li>
        <li class="active">Add Voucher</li>
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
						
						echo form_open("admin/voucher/add_voucher_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<div class="col-md-6">
						<div class="form-group">
						  <label>Kode Voucher</label>
						  <input required type="text" maxlength="30" class="form-control" name="voucher_code" placeholder="Masukkan Kode Voucher">
						</div>
						
						<div class="form-group">
						  <label>Tipe Voucher</label>
						  <select onchange="change(this)" required class="form-control" name="voucher_type">
							<option class="form-control" value="persen">Potongan %</option>
							<option class="form-control" value="ongkir">Gratis Ongkir</option>
							<option class="form-control" value="free">Free Transaksi</option>
						  </select>
						</div>
						
						<div class="form-group">
						  <label>Nilai Voucher</label>
						  <br>
						  <input required id="voucher_value" type="number" min="1" max="100" step="1" class="form-control" name="voucher_value" placeholder="Masukkan Nilai Voucher">
						</div>
						
						<div class="form-group">
						  <label>Deskripsi Voucher</label>
						  <br>
						  <input required type="text" maxlength="50" class="form-control" name="voucher_description" placeholder="Masukkan Deskripsi Voucher">
						</div>
						
						<div class="form-group">
						  <label>Expire Date Voucher</label>
							<br>
							<div class="form-group col-md-6">
								<div class="input-group date">
								  <div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								  </div>
									<input data-date-format="dd-mm-yyyy" placeholder="Pilih Expire Date Voucher" required type="text" class="form-control" name="datenya" class="form-control pull-right" id="datepicker">
								</div>
							</div>
							
							<div class="bootstrap-timepicker col-md-6">
								<div class="form-group">
									  <div class="input-group">
										<input type="text" class="form-control timepicker" name="timenya">
										<div class="input-group-addon">
										  <i class="fa fa-clock-o"></i>
										</div>
									  </div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group">
						  <label>Status Voucher</label>
						  <select required class="form-control" name="voucher_status">
							<option class="form-control" value="aktif">aktif</option>
							<option class="form-control" value="nonaktif">nonaktif</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Add</button>
						<a href="<?php echo site_url('admin/voucher/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  
<!-- SlimScroll 1.3.0 -->
<!-- iCheck 1.0.1 -->
<script>
  $(function () {
  
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
    });
	
    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false,
    });
    $('.timepicker').timepicker({ timeFormat: 'h:mm:ss p' });
  });
</script>
<script>
  
	function change(sel)
	{
		if(sel.value == "persen")
		{
			$('#voucher_value').prop('readonly', false);
		}else
		{
			$('#voucher_value').val(0);
			$('#voucher_value').prop('readonly', true);
		}
			
	}
	
  
</script>