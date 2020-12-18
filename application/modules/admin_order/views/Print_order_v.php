
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <script src="<?php echo $url_theme_admin;?>bootstrap/js/jquery-1.10.2.js" type="text/JavaScript" language="javascript"></script>
        <script src="<?php echo $url_theme_admin;?>bootstrap/js/jquery-ui-1.10.4.custom.js"></script>
        <script src="<?php echo $url_theme_admin;?>bootstrap/js/jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>

        <link type="text/css" rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.4.custom.css" />

        <link type="text/css" rel="stylesheet" href="<?php echo $url_theme_admin;?>bootstrap/css/PrintArea.css" /> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Print Transaction
        <small><b><?php echo $id_invoice;?></b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/order/">Order</a></li>
        <li class="active">Print Invoice</li>
      </ol>
    </section>

	<?php
		foreach($data_order as $transaction)
		{
			
		}
	?>
	
	 <!-- Main content -->
    <section class="invoice">
	<?php 
		if($this->session->flashdata('message')) 
		{
			echo $this->session->flashdata('message');
		}
		
	?> 
	
	<div class="print_area">
	<input type="hidden" name="invoice_code" value="<?php echo $list_all_transaction[0]->invoice_code; ?>">
					
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <?php echo $data_web[0]->title_web;?>
            <small class="pull-right">Date: <?php echo $transaction->date_order_pesanan; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong><?php echo $data_web[0]->title_web;?></strong><br>
            Phone: <?php echo $data_shipping[0]->telepon;?><br>
            Email: <?php echo $data_shipping[0]->email;?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?php echo $transaction->nama_user; ?></strong><br>
			<?php echo $transaction->alamat; ?><br>
            <?php echo $transaction->kecamatan; ?>, <?php echo $transaction->kota; ?>, <br> 
			<?php echo $transaction->provinsi; ?>, <?php echo $transaction->kodepos; ?><br>
			Phone: <?php echo $transaction->phone; ?><br>
			Kurir: <?php echo $transaction->kurir; ?><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice ID: <?php echo $id_invoice;?></b><br>
          <b>Order Date:</b> <?php echo $transaction->date_order_pesanan; ?><br>
          <b>Status Invoice:</b> <?php echo $transaction->status_pesanan; ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="text-center table table-bordered table-striped">
			<thead>
				<tr>
					<th width="10%">No.</th>
					<th width="30%">Nama Produk</th>
					<th width="20%">Harga Satuan</th>
					<th width="15%">Jumlah</th>
					<th width="25%">Subtotal</th>
				</tr>
			</thead>
			
			<tbody>
			<?php
				$i=1;
				$ongkir = 0;
				$total = 0;
				foreach($data_order as $transaction)
				{
					$harga_satuan_produk = number_format($transaction->harga_satuan_produk);
					$harga_satuan_produk = str_replace(",", ".",$harga_satuan_produk);
					
					$subtotal_produk = number_format($transaction->subtotal_produk);
					$subtotal_produk = str_replace(",", ".",$subtotal_produk);
							
					$total = number_format($transaction->total_price_pesanan);
					$total = str_replace(",", ".",$total);
							
					$ongkir = number_format($transaction->ongkir);
					$ongkir = str_replace(",", ".",$ongkir);
					
					if($transaction->voucher_discount == "")
						$transaction->voucher_discount=0;
					
					$voucher_discount = number_format($transaction->voucher_discount);
					$voucher_discount = str_replace(",", ".",$voucher_discount);
			?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $transaction->nama_produk; ?></td>
						<td>Rp <?php echo $harga_satuan_produk; ?>,-</td>
						<td><?php echo $transaction->jumlah_produk; ?></td>
						<td>Rp <?php echo $subtotal_produk; ?>,-</td>
					</tr>
			<?php
					$i++;
				}
			?>
			</tbody>
			
			<tfoot>
				<tr>
					<th colspan="3"></th>
					<th>Ongkos Kirim</th>
					<th>Rp <?php echo $ongkir; ?>,-</th>
				</tr>
				<tr>
					<th colspan="3"></th>
					<th>Voucher (<?php echo $transaction->voucher_code; ?>)</th>
					<th>- Rp <?php echo $voucher_discount; ?>,-</th>
				</tr>
				<tr>
					<th colspan="3"></th>
					<th>Total</th>
					<th>Rp <?php echo $total; ?>,-</th>
				</tr>
			</tfoot>
		</table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
			<?php
				$i=1;
				foreach($data_bank as $bank)
				{
			?>
					<img style="margin-right:30px" src="<?php echo $url_theme;?>images/bank/<?php echo $bank->name_bank;?>.jpg" alt="<?php echo $bank->name_bank;?>">
			<?php
					if($i%4==0)echo"<br>";
					$i++;
				}
			?>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Terima kasih telah berbelanja di toko <Strong><?php echo $data_web[0]->title_web;?></strong>. 
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead"><strong>Order Summary: </strong></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>Rp <?php echo $subtotal_produk; ?>,-</td>
              </tr>
              <tr>
                <th>Ongkos Kirim:</th>
                <td>Rp <?php echo $ongkir; ?>,-</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>Rp <?php echo $total; ?>,-</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

	  </div>
	  <!-- /.end print area -->
	  
	  
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button id="print_button1" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
        </div>
      </div>
    </section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
	<script>
	
		$.validate({
			lang: 'es'
		});
	</script>
	<script>

	$(document).ready(function(){
		$("#print_button1").click(function(){
			var mode = 'iframe'; // popup
			var close = mode == "popup";
			var options = { mode : mode, popClose : close};
			$("div.print_area").printArea( options );
		});

	});

	</script>
  
 
