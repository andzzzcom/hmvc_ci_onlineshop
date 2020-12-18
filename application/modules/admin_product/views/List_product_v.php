
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Produk
        <small>list semua produk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/product/">Product</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3><?php echo $stat["nproduct"];?></h3>
						<p>All Products</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
						<h3><?php echo $stat["nactiveproduct"];?></h3>
						<p>Active Products</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><?php echo $stat["nnonactiveproduct"];?></h3>
						<p>Non Active Products</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php echo $stat["nrecommendedproduct"];?></h3>
						<p>Rcommended Products</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
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
							<th width="15%">Produk Code</th>
							<th width="10%">Thumbnail</th>
							<th width="35%">Product Name</th>
							<th width="15%">Price</th>
							<th width="10%">Status</th>
							<th></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_produk as $produk)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td>
									<?php echo $produk->kode_produk; ?>
									<br>
									<?php 
										if($produk->status_rekomendasi == "yes")
										{
									?>
											<p class="label bg-blue">recommended</p>
									<?php
										}
									?>
								
								</td>
								<td><img src="<?php echo $url_theme;?>images/produk/<?php echo $produk->thumbnail_produk; ?>" width="80px" height="80px"></td>
								<td><a href="<?php echo base_url();?>product/detail/<?php echo $produk->id_produk; ?>" target="_blank"><?php echo $produk->nama_produk; ?></a></td>
								<td><?php echo $produk->harga_produk; ?></td>
								<td>
									<?php 
										if($produk->status_produk == "ready")
										{
									?>
											<p class="label bg-green"><?php echo $produk->status_produk;?></p>
									<?php
										}else
										{
									?>
											<p class="label bg-red"><?php echo $produk->status_produk;?></p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo site_url('admin/product/edit_product/'.$produk->id_produk); ?>" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
									<a href="<?php echo site_url('admin/product/delete_product/'.$produk->id_produk); ?>" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
							<th width="15%">Produk Code</th>
							<th width="10%">Thumbnail</th>
							<th width="35%">Product Name</th>
							<th width="15%">Price</th>
							<th width="10%">Status</th>
							<th></th>
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
 
