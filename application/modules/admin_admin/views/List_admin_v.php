 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Admin
        <small>list semua admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/admin/">Admin</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
              <h3 class="box-title">List Admin</h3>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="15%">Foto Admin</th>
							<th width="25%">Nama Admin</th>
							<th width="20%">Email Admin</th>
							<th width="15%">Telepon Admin</th>
							<th width="10%">Status</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_admin as $admin)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><img src="<?php echo $url_theme;?>images/admin/<?php echo $admin->foto_admin; ?>" width="80px" height="80px"></td>
								<td><?php echo $admin->nama_admin; ?></td>
								<td><?php echo $admin->email_admin; ?></td>
								<td><?php echo $admin->phone_admin; ?></td>
								<td>
									<?php 
										if($admin->status_admin == "aktif")
										{
									?>
											<p class="label bg-green"><?php echo $admin->status_admin;?></p>
									<?php
										}else
										{
									?>
											<p class="label bg-red"><?php echo $admin->status_admin;?></p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo site_url('admin/admin/edit_admin/'.$admin->id_admin); ?>" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
									<a href="<?php echo site_url('admin/admin/delete_admin/'.$admin->id_admin); ?>" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
							<th width="15%">Foto Admin</th>
							<th width="25%">Nama Admin</th>
							<th width="20%">Email Admin</th>
							<th width="15%">Telepon Admin</th>
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
 
