 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List payment method
        <small>list semua metode pembayaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/settings/payment_settings">Payment Settings</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
              <h3 class="box-title">List Payment Method</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="15%"></th>
							<th width="60%">Nama Payment</th>
							<th width="10%">Status</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_payment as $payment)
						{
									
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><img style="max-width:100px;max-height:80px;" src="<?php echo $url_theme;?>images/payment/<?php echo $payment->logo_payment; ?>"></td>
								<td><?php echo $payment->name_payment; ?></td>
								<td>
									<?php 
										if($payment->status_payment == "0")
										{
									?>
											<p class="label label-danger">Not Active</p>
									<?php
										}else
										{
									?>
											<p class="label label-success">Active</p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo site_url('admin/settings/edit_payment/'.$payment->id_payment); ?>" target="_blank"><i class="fa fa-edit"></i> Edit</a> &nbsp &nbsp &nbsp &nbsp
								</td>
							</tr>
					<?php
							$i++;
						}
					?>
					</tbody>
					
					<tfoot>
						<tr>
							<th width="5%">No.</th>
							<th width="15%"></th>
							<th width="60%">Nama Kurir</th>
							<th width="10%">Status</th>
							<th width="10%"></th>
						</tr>
					</tfoot>
				</table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

