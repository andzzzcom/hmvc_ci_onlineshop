 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Confirmation
        <small>list semua konfirmasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/confirmation/">Confirmation</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
              <h3 class="box-title">List Confirmation</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="20%">Invoice ID</th>
							<th width="15%">Customer Name</th>
							<th width="25%">Tanggal Konfirmasi</th>
							<th width="15%">Bukti Konfirmasi</th>
							<th width="10%">Status</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_confirmation as $confirmation)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><a target="_blank" href="<?php echo base_url();?>admin/order/edit_transaction/<?php echo base64_encode($confirmation->invoice_code); ?>"><?php echo $confirmation->invoice_code; ?></a></td>
								<td><a target="_blank" href="<?php echo base_url();?>admin/user/edit_user/<?php echo $confirmation->id_user; ?>"><?php echo $confirmation->nama_user; ?></a></td>
								<td><?php echo $confirmation->tanggal_konfirmasi_pembayaran; ?></td>
								<td>
									<?php
										if($confirmation->bill_file == "")
										{
											
										}else
										{
									?>
										<a target="_blank" href="<?php echo $url_theme;?>images/user/confirm/<?php echo $confirmation->bill_file;?>">File</a>
									<?php
										}
									?>
								</td>
								<td>
									<?php 
										if($confirmation->status_konfirmasi_pembayaran == "confirmed")
										{
									?>
											<p class="label label-warning"><?php echo $confirmation->status_konfirmasi_pembayaran;?></p>
									<?php
										}else if($confirmation->status_konfirmasi_pembayaran == "unpaid")
										{
									?>
											<p class="label label-danger"><?php echo $confirmation->status_konfirmasi_pembayaran;?></p>
									<?php
										}else
										{
									?>
											<p class="label label-success"><?php echo $confirmation->status_konfirmasi_pembayaran;?></p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo site_url('admin/confirmation/edit_confirmation/'.$confirmation->id_konfirmasi_pembayaran); ?>" target="_blank"><i class="fa fa-edit fa-2x"></i> Edit</a>
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
							<th width="20%">Id Transaksi</th>
							<th width="15%">Id Customer</th>
							<th width="25%">Tanggal Konfirmasi</th>
							<th width="15%">Bukti Konfirmasi</th>
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
 
