 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Page
        <small>list semua page</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/page/">Page</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
              <h3 class="box-title">List Page</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="20%">Kode Page</th>
							<th width="25%">Title Page</th>
							<th width="25%">Sub Title Page</th>
							<th width="15%">Status Page</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_page as $page)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $page->kode_page; ?></td>
								<td><?php echo $page->title_page; ?></td>
								<td><?php echo $page->sub_title_page; ?></td>
								<td>
									<?php 
										if($page->status_page == "active")
										{
									?>
											<p class="label bg-green"><?php echo $page->status_page;?></p>
									<?php
										}else
										{
									?>
											<p class="label bg-red"><?php echo $page->status_page;?></p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo site_url('admin/page/edit_page/'.$page->id_page); ?>" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
									<a href="<?php echo site_url('admin/page/delete_page/'.$page->id_page); ?>" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
							<th width="20%">Kode Page</th>
							<th width="25%">Title Page</th>
							<th width="25%">Sub Title Page</th>
							<th width="15%">Status Page</th>
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
 
