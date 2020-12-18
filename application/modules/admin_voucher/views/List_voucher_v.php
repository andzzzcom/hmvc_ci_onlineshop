 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Voucher
        <small>list semua voucher</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/voucher/">Voucher</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
              <h3 class="box-title">List Voucher</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="15%">Kode Voucher</th>
							<th width="15%">Tipe</th>
							<th width="10%">Nilai</th>
							<th width="20%">Deskripsi</th>
							<th width="15%">Expire Date</th>
							<th width="10%">Status</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_voucher as $voucher)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $voucher->voucher_code; ?></td>
								<td>
									<?php 
										if($voucher->voucher_type == "free")
											echo "Free Transaction"; 
										if($voucher->voucher_type == "ongkir")
											echo "Gratis Ongkir"; 
										if($voucher->voucher_type == "persen")
											echo "Potongan Persen"; 
									?>
								</td>
								<td><?php echo $voucher->voucher_value; ?></td>
								<td><?php echo $voucher->voucher_description; ?></td>
								<td><?php echo $voucher->voucher_expire_date; ?></td>
								<td>
									<?php 
										if($voucher->voucher_status == "aktif")
										{
									?>
											<p class="label bg-green"><?php echo $voucher->voucher_status;?></p>
									<?php
										}else
										{
									?>
											<p class="label bg-red"><?php echo $voucher->voucher_status;?></p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo site_url('admin/voucher/edit_voucher/'.$voucher->id_voucher); ?>" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
									<a href="<?php echo site_url('admin/voucher/delete_voucher/'.$voucher->id_voucher); ?>" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
							<th width="15%">Kode Voucher</th>
							<th width="15%">Tipe</th>
							<th width="10%">Nilai</th>
							<th width="20%">Deskripsi</th>
							<th width="15%">Expire Date</th>
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
 
