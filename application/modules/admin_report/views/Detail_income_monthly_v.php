 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Income Reports
        <small>Detail Monthly Income Reports</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Admin/Home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Admin/Reports/monthly">Monthly</a></li>
        <li class="active"><a href="<?php echo base_url();?>Admin/Reports/detail_monthly_report">Detail Monthly Reports</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
              <h3 class="box-title">Detail Monthly Income Reports</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="20%">Tanggal Invoice</th>
							<th width="25%">Income</th>
							<th width="15%">Discount</th>
							<th width="15%">Ongkos Kirim</th>
							<th width="20%">Total Income</th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($income_monthly as $income)
						{
							$total_price_bruto = number_format($income->total_price_bruto);
							$total_price_bruto = str_replace(",", ".",$total_price_bruto);
							
							$voucher_diskon = number_format($income->voucher_diskon);
							$voucher_diskon = str_replace(",", ".",$voucher_diskon);
							
							$ongkos_kirim = number_format($income->ongkos_kirim);
							$ongkos_kirim = str_replace(",", ".",$ongkos_kirim);
							
							$total_price_netto = number_format($income->total_price_netto);
							$total_price_netto = str_replace(",", ".",$total_price_netto);
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $income->tanggal_pesanan; ?> <?php echo $income->bulan_pesanan; ?> <?php echo $income->tahun_pesanan; ?></td>
								<td>Rp <?php echo $total_price_bruto; ?>,-</td>
								<td>Rp <?php echo $voucher_diskon; ?>,-</td>
								<td>Rp <?php echo $ongkos_kirim; ?>,-</td>
								<td>Rp <?php echo $total_price_netto; ?>,-</td>
							</tr>
					<?php
							$i++;
						}
					?>
					</tbody>
					
					<tfoot>
						<tr>
							<th width="5%">No.</th>
							<th width="20%">Tanggal Invoice</th>
							<th width="25%">Income</th>
							<th width="15%">Discount</th>
							<th width="15%">Ongkos Kirim</th>
							<th width="20%">Total Income</th>
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
 
