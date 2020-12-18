 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Slider
        <small>list semua slider</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/slider"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/slider/">Slider</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
              <h3 class="box-title">List Slider</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="25%">Preview Slider</th>
							<th width="20%">Kode Slider</th>
							<th width="20%">Link Slider</th>
							<th width="20%">Status Slider</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_slider as $slider)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><img src="<?php echo $url_theme;?>images/slider/<?php echo $slider->gambar_slider; ?>" width="150px" height="150px"></td>
								<td><?php echo $slider->kode_slider; ?></td>
								<td><a href="<?php echo $slider->link_slider; ?>" target="_blank"><?php echo $slider->link_slider; ?></a></td>
								<td>
									<?php 
										if($slider->status_slider == "aktif")
										{
									?>
											<p class="label bg-green"><?php echo $slider->status_slider;?></p>
									<?php
										}else
										{
									?>
											<p class="label bg-red"><?php echo $slider->status_slider;?></p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo site_url('admin/slider/edit_slider/'.$slider->id_slider); ?>" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
									<a href="<?php echo site_url('admin/slider/delete_slider/'.$slider->id_slider); ?>" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
							<th width="25%">Preview Slider</th>
							<th width="20%">Kode Slider</th>
							<th width="20%">Link Slider</th>
							<th width="20%">Status Slider</th>
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
 
