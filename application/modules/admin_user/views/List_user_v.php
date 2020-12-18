 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List User
        <small>list semua user</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/user/">User</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List User</h3>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="10%">Foto user</th>
							<th width="25%">Nama user</th>
							<th width="20%">Email User</th>
							<th width="20%">Telepon User</th>
							<th width="10%">Status</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_user as $user)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><img src="<?php echo $url_theme;?>images/user/<?php echo $user->foto_user; ?>" width="80px" height="80px"></td>
								<td><?php echo $user->nama_user; ?></td>
								<td><?php echo $user->email_user; ?></td>
								<td><?php echo $user->phone_user; ?></td>
								<td>
									<?php 
										if($user->status_user == "aktif")
										{
									?>
											<p class="label bg-green"><?php echo $user->status_user;?></p>
									<?php
										}else
										{
									?>
											<p class="label bg-red"><?php echo $user->status_user;?></p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo site_url('admin/user/edit_user/'.$user->id_user); ?>" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
									<a href="<?php echo site_url('admin/user/delete_user/'.$user->id_user); ?>" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
							<th width="10%">Foto user</th>
							<th width="25%">Nama user</th>
							<th width="20%">Email User</th>
							<th width="20%">Telepon User</th>
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
 
