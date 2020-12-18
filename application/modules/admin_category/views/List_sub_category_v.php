 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Subkategori
        <small>list semua subkategori</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/category/">Category</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/category/list_subcategory/<?php echo $kategori[0]->id_kategori;?>">Subcategory</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
				<h3 class="box-title">
					Kategori : 
					<a target="_blank" href="<?php echo site_url('admin/category/edit_category/'.$kategori[0]->id_kategori);?>" class="btn btn-info"><b><?php echo $kategori[0]->name_kategori; ?></b></a>	
				</h3>
				<br><br>
				<br>
				<a target="_blank" href="<?php echo site_url('admin/category/add_subcategory/'.$kategori[0]->id_kategori);?>" class="btn btn-success">Tambah Subkategori</a>	
				
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="30%">Nama Subkategori</th>
							<th width="15%">Icon Subkategori</th>
							<th width="15%">Status</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_subkategori as $subkategori)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $subkategori->name_sub_kategori; ?></td>
								<td><img src="<?php echo $url_theme;?>images/kategori/subkategori/<?php echo $subkategori->icon_sub_kategori; ?>" width="30px" height="30px"></td>
								<td>
									<?php 
										if($subkategori->status_sub_kategori == "aktif")
										{
									?>
											<p class="label bg-green"><?php echo $subkategori->status_sub_kategori;?></p>
									<?php
										}else
										{
									?>
											<p class="label bg-red"><?php echo $subkategori->status_sub_kategori;?></p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo site_url('admin/category/edit_subcategory/'.$kategori[0]->id_kategori.'/'.$subkategori->id_sub_kategori); ?>" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
									<a href="<?php echo site_url('admin/category/delete_subcategory/'.$kategori[0]->id_kategori.'/'.$subkategori->id_sub_kategori); ?>" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
							<th width="30%">Nama Subkategori</th>
							<th width="15%">Icon Subkategori</th>
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
 
