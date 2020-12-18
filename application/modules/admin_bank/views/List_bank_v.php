 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Bank
        <small>list semua bank</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/bank/">Bank</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
              <h3 class="box-title">List Bank</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="10%">Logo Bank</th>
							<th width="15%">Nama Bank</th>
							<th width="15%">Nomor Rekening</th>
							<th width="15%">Nama Pemilik</th>
							<th width="15%">Cabang Bank</th>
							<th width="15%">Status</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_bank as $bank)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><img src="<?php echo $url_theme;?>images/bank/<?php echo $bank->logo_bank; ?>"></td>
								<td><?php echo $bank->name_bank; ?></td>
								<td><?php echo $bank->number_bank; ?></td>
								<td><?php echo $bank->owner_bank; ?></td>
								<td><?php echo $bank->place_bank; ?></td>
								<td>
									<?php 
										if($bank->status_bank == "aktif")
										{
									?>
											<p class="label bg-green"><?php echo $bank->status_bank;?></p>
									<?php
										}else
										{
									?>
											<p class="label bg-red"><?php echo $bank->status_bank;?></p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo site_url('admin/bank/edit_bank/'.$bank->id_bank); ?>" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
									<a href="<?php echo site_url('admin/bank/delete_bank/'.$bank->id_bank); ?>" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
							<th width="10%">Logo Bank</th>
							<th width="15%">Nama Bank</th>
							<th width="15%">Nomor Rekening</th>
							<th width="15%">Nama Pemilik</th>
							<th width="15%">Cabang Bank</th>
							<th width="15%">Status</th>
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
 
