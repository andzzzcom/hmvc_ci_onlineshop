 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Kategori
        <small>list semua kategori</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/category/">Category</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
              <h3 class="box-title">List Kategori</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="30%">Nama Kategori</th>
							<th width="15%">Icon Kategori</th>
							<th width="15%">Subkategori</th>
							<th width="15%">Status</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_kategori as $kategori)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $kategori->name_kategori; ?></td>
								<td><img src="<?php echo $url_theme;?>images/kategori/<?php echo $kategori->icon_kategori; ?>" width="30px" height="30px"></td>
								<td><a target="_blank" href="<?php echo site_url('admin/category/list_subcategory/'.$kategori->id_kategori);?>" class="btn btn-info">View Subcategory</a></td>
								<td>
									<?php 
										if($kategori->status_kategori == "aktif")
										{
									?>
											<p class="label bg-green"><?php echo $kategori->status_kategori;?></p>
									<?php
										}else
										{
									?>
											<p class="label bg-red"><?php echo $kategori->status_kategori;?></p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo site_url('admin/category/edit_category/'.$kategori->id_kategori); ?>" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
									<a href="<?php echo site_url('admin/category/delete_category/'.$kategori->id_kategori);?>" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
							<th width="30%">Nama Kategori</th>
							<th width="15%">Icon Kategori</th>
							<th width="15%">Subkategori</th>
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
 
