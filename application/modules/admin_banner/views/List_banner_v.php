 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Banner
        <small>list semua banner</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/banner"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/Banner/">Banner</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
              <h3 class="box-title">List Banner</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="25%">Preview Banner</th>
							<th width="20%">Kode Banner</th>
							<th width="20%">Link Banner</th>
							<th width="20%">Status Banner</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_banner as $banner)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><img src="<?php echo $url_theme;?>images/banner/<?php echo $banner->gambar_banner; ?>" width="100px" height="100px"></td>
								<td><?php echo $banner->kode_banner; ?></td>
								<td><a href="<?php echo $banner->link_banner; ?>" target="_blank"><?php echo $banner->link_banner; ?></a></td>
								<td>
									<?php 
										if($banner->status_banner == "aktif")
										{
									?>
											<p class="label bg-green"><?php echo $banner->status_banner;?></p>
									<?php
										}else
										{
									?>
											<p class="label bg-red"><?php echo $banner->status_banner;?></p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo site_url('admin/banner/edit_banner/'.$banner->id_banner); ?>" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
									<a href="<?php echo site_url('admin/banner/delete_banner/'.$banner->id_banner); ?>" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
							<th width="25%">Preview Banner</th>
							<th width="20%">Kode Banner</th>
							<th width="20%">Link Banner</th>
							<th width="20%">Status Banner</th>
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
 
