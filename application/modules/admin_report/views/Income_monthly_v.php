 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Income Reports
        <small>Monthly Income Reports</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/report/monthly">Monthly</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-lg-4 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>
							<?php 
								$nincome_monthly = number_format($stat["nincome_monthly"]);
								$nincome_monthly = str_replace(",", ".",$nincome_monthly);
								echo "Rp ".$nincome_monthly.",-";
							?>
						</h3>
						<p>Total Monthly Income</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
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
							<th width="20%">Bulan</th>
							<th width="15%">Income</th>
							<th width="15%">Discount</th>
							<th width="15%">Ongkir</th>
							<th width="20%">Total Income</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						$array_data = $income_monthly;
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
								<td><?php echo $income->bulan_pesanan; ?> <?php echo $income->tahun_pesanan; ?></td>
								<td>Rp <?php echo $total_price_bruto; ?>,-</td>
								<td>Rp <?php echo $voucher_diskon; ?>,-</td>
								<td>Rp <?php echo $ongkos_kirim; ?>,-</td>
								<td>Rp <?php echo $total_price_netto; ?>,-</td>
								<td>
									<a href="<?php echo site_url('admin/report/detail_monthly_report/'.base64_encode($income->bulan_pesanan."-".$income->tahun_pesanan)); ?>" target="_blank"><i class="fa fa-edit fa-2x"></i> View</a>
								</td>
							</tr>
					<?php
							$i++;
						}
						$income_monthly = $array_data;
						
						$limit=0;
						$month = "";
						$income = "";
						foreach($income_monthly as $data)
						{
							if ($limit==9 or $data === end($income_monthly))
							{
								$month = $month.'"'.$data->bulan_pesanan."-".$data->tahun_pesanan.'"';
								$income = $income.'"'.$data->total_price_netto.'"';
							}else
							{
								$month = $month.'"'.$data->bulan_pesanan."-".$data->tahun_pesanan.'",';
								$income = $income.'"'.$data->total_price_netto.'",';
							}
							
							$limit++;
						}
						
					?>
					</tbody>
					
					<tfoot>
						<tr>
							<th width="5%">No.</th>
							<th width="20%">Bulan</th>
							<th width="15%">Income</th>
							<th width="15%">Discount</th>
							<th width="15%">Ongkir</th>
							<th width="20%">Total Income</th>
							<th width="10%"></th>
						</tr>
					</tfoot>
				</table>
				
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
		<!-- BAR CHART -->
		<div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
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
  
<script src="<?php echo $url_theme_admin;?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $url_theme_admin;?>bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo $url_theme_admin;?>plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $url_theme_admin;?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $url_theme_admin;?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $url_theme_admin;?>dist/js/demo.js"></script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------
    var areaChartData = {
      labels: [<?php echo $month;?>],
      datasets: [
        {
          label: "Electronics",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [<?php echo $income;?>]
        }
      ]
    };

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[0].fillColor = "#00a65a";
    barChartData.datasets[0].strokeColor = "#00a65a";
    barChartData.datasets[0].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>