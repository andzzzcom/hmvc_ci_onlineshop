 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Transaction
        <small>list semua transaksi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/order/">Order</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3><?php echo $stat["norder"];?></h3>
						<p>Total Orders</p>
					</div>
					<div class="icon">
						<i class="fa fa-shopping-cart"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
						<h3><?php echo $stat["npaidorder"];?></h3>
						<p>Total Paid Orders</p>
					</div>
					<div class="icon">
						<i class="fa fa-shopping-cart"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><?php echo $stat["nconfirmorder"];?></h3>
						<p>Total Confirmed Orders</p>
					</div>
					<div class="icon">
						<i class="fa fa-shopping-cart"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			
			
			<div class="hidden col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-blue">
					<div class="inner">
						<h3><?php echo $stat["nfinishorder"];?></h3>
						<p>Total Finish Orders</p>
					</div>
					<div class="icon">
						<i class="fa fa-shopping-cart"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php echo $stat["nexpiredorder"];?></h3>
						<p>Total Expired Orders</p>
					</div>
					<div class="icon">
						<i class="fa fa-shopping-cart"></i>
					</div>
				</div>
			</div>
		</div>
		
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="20%">Id Transaksi</th>
							<th width="15%">Customer Name</th>
							<th width="15%">Tanggal Transaksi</th>
							<th width="20%">Total Harga</th>
							<th width="10%">Status</th>
							<th width="15%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_transaction as $transaction)
						{
							$total_price = "".number_format($transaction->total_price_pesanan);
							$total_price = str_replace(",", ".",$total_price);
									
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><a href="<?php echo base_url();?>admin/order/edit_transaction/<?php echo base64_encode($transaction->invoice_code); ?>" target="_blank"><?php echo $transaction->invoice_code; ?></a></td>
								<td><a target="_blank" href="<?php echo base_url();?>admin/user/edit_user/<?php echo $transaction->id_user; ?>"><?php echo $transaction->nama_user; ?></a></td>
								<td><?php echo $transaction->date_order_pesanan; ?></td>
								<td>Rp <?php echo $total_price; ?>,-</td>
								<td>
									<?php 
										if($transaction->status_pesanan == "unpaid")
										{
									?>
											<p class="label label-danger"><?php echo $transaction->status_pesanan;?></p>
									<?php
										}else if($transaction->status_pesanan == "confirmed")
										{
									?>
											<p class="label label-warning"><?php echo $transaction->status_pesanan;?></p>
									<?php
										}else if($transaction->status_pesanan == "expired")
										{
									?>
											<p class="label label-default"><?php echo $transaction->status_pesanan;?></p>
									<?php
										}else
										{
									?>
											<p class="label label-success"><?php echo $transaction->status_pesanan;?></p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo site_url('admin/order/edit_transaction/'.base64_encode($transaction->invoice_code)); ?>" target="_blank"><i class="fa fa-edit"></i> Edit</a> &nbsp &nbsp &nbsp &nbsp
									<a href="<?php echo site_url('admin/order/print_transaction/'.base64_encode($transaction->invoice_code)); ?>" target="_blank"><i class="fa fa-print"></i> Print</a>
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
							<th width="15%">Customer Name</th>
							<th width="15%">Tanggal Transaksi</th>
							<th width="20%">Total Harga</th>
							<th width="10%">Status</th>
							<th width="15%"></th>
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
 

