 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Brand
        <small>list semua brand</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/brand"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/brand/">Brand</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
              <h3 class="box-title">List Brand</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="15%">Nama Brand</th>
							<th width="10%">Logo Brand</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_brand as $brand)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $brand->name_brand; ?></td>
								<td><img src="<?php echo $url_theme;?>images/brand/<?php echo $brand->logo_brand; ?>" width="80px" height="80px"></td>
								<td>
									<a href="<?php echo site_url('admin/brand/edit_brand/'.$brand->id_brand); ?>" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
									<a href="<?php echo site_url('admin/brand/delete_brand/'.$brand->id_brand); ?>" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
							<th width="15%">Nama Brand</th>
							<th width="10%">Logo Brand</th>
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
 
