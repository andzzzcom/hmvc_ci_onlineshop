 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Product Form
        <small>Form Mengubah Produk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/product/">Product</a></li>
        <li class="active">Edit Product</li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
		<div class="row">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<?php 
						if($this->session->flashdata('message')) 
						{
							echo $this->session->flashdata('message');
							$this->session->unset_userdata('message');
						}
						
						echo form_open("admin/product/edit_product_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
					<input type="hidden" name="produk_id" value="<?php echo $data_produk[0]->id_produk; ?>">
						
					<div class="col-md-8">
						<div class="form-group">
						  <label>Nama Produk</label>
						  <input required type="text" maxlength="30" class="form-control" name="produk_name" value="<?php echo $data_produk[0]->nama_produk; ?>" placeholder="Masukkan Nama Produk">
						</div>
						
						<div class="form-group">
						  <label>Kode Produk</label>
						  <input required type="text" maxlength="30" class="form-control" name="produk_code" value="<?php echo $data_produk[0]->kode_produk; ?>" placeholder="Masukkan Kode Produk">
						</div>
						
						<div class="form-group">
						  <label>Thumbnail Produk</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/produk/<?php echo $data_produk[0]->thumbnail_produk;?>" width="100px" height="100px">
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" name="produk_thumbnail" id="uploaded1" class="upload" data-value="uploaded1">
						  </label>
						</div>
						
						<br>
						<br>
						<div class="form-group">
							<label>Gambar Produk</label>
							<br>
							<a class="btn btn-success" href="<?php echo site_url('admin/product/add_image_produk/'.$data_produk[0]->id_produk); ?>" target="_blank">Tambah Gambar </a>				
							<br><br>
							<table id="example1" class="text-center table table-bordered table-hover">
								<thead>
									<tr>
										<th width="5%">No.</th>
										<th width="35%">Gambar</th>
										<th width="35%">Status</th>
										<th></th>
									</tr>
								</thead>
								
								<tbody>
								<?php
									$i=1;
									foreach($list_all_images as $image)
									{
								?>
										<tr>
											<td><?php echo $i;?></td>
											<td><img src="<?php echo $url_theme;?>images/produk/<?php echo $image->name_image_produk; ?>" width="50px" height="50px"></td>
											<td>
												<?php 
													if($image->status_image_produk == "active")
													{
												?>
														<p class="label bg-green"><?php echo $image->status_image_produk;?></p>
												<?php
													}else
													{
												?>
														<p class="label bg-red"><?php echo $image->status_image_produk;?></p>
												<?php
													}
												?>
											</td>
											<td>
												<a href="<?php echo site_url('admin/product/edit_image_produk/'.$data_produk[0]->id_produk.'/'.$image->id_image_produk); ?>" target="_blank"><i class="fa fa-edit fa-2x"></i> </a>
												<a href="<?php echo site_url('admin/product/delete_image_produk/'.$data_produk[0]->id_produk.'/'.$image->id_image_produk); ?>" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
										<th width="35%">Gambar</th>
										<th width="35%">Status</th>
										<th></th>
									</tr>
								</tfoot>
							</table>
						</div>
						
						<br>
						<br>
						<div class="form-group">
						  <label>Deskripsi Produk</label>
						  <br>
						  <textarea id="deskripsi" rows="15" cols="10" name="produk_description"><?php echo $data_produk[0]->deskripsi_produk; ?></textarea>
						</div>
						
					</div>       
					<div class="col-md-5">
						<div class="form-group">
						  <label>Brand Produk</label>
						  <select required class="form-control" name="produk_brand">
							<?php
								foreach($list_all_brand as $brand)
								{
							?>
									<option <?php if($data_produk[0]->brand_produk == $brand->name_brand) echo"selected"; ?> class="form-control" value="<?php echo $brand->id_brand; ?>"><?php echo $brand->name_brand; ?></option>
							<?php
								}
							?>
						  </select>
						</div>
						
						<div class="form-group">
						  <label>Sub Kategori Produk</label>
						  <select required class="form-control" name="produk_category">
							<?php
								foreach($list_all_kategori as $kategori)
								{
							?>
									<option disabled class="form-control" value="<?php echo $kategori->id_kategori; ?>" style="font-weight:bold"><?php echo $kategori->name_kategori; ?></option>
							<?php
									foreach($list_all_subkategori as $subkategori)
									{
										if($kategori->id_kategori == $subkategori->id_kategori)
										{
							?>
											<option <?php if($data_produk[0]->sub_kategori_produk == $subkategori->id_sub_kategori) echo"selected"; ?> class="form-control" value="<?php echo $subkategori->id_sub_kategori; ?>"><?php echo $subkategori->name_sub_kategori; ?></option>
							<?php
										}
									}
								}
							?>
						  </select>
						</div>
						
						<div class="form-group">
						  <label>Stok Produk</label>
						  <input required type="number" step="1" min="1" class="form-control" name="produk_stok" value="<?php echo $data_produk[0]->stok_produk; ?>" placeholder="1">
						</div>
									
						<div class="form-group">
							<label>Berat Produk (gram)</label>
							<input required type="number" step="1" min="1" class="form-control" name="produk_weight" value="<?php echo $data_produk[0]->weight_produk; ?>" placeholder="1">
						</div>
						
						<div class="form-group">
						  <label>Harga Produk</label>
						  <input required type="number" step="1" min="1" placeholder="0" class="form-control" name="produk_price" value="<?php echo $data_produk[0]->harga_produk; ?>">
						</div>
									
						<div class="form-group">
							<label>Tag Produk (Pisahkan dengan tanda koma)</label>
							<input required type="text" placeholder="masukkan tag produk" class="form-control" name="produk_tag" value="<?php echo $data_produk[0]->tag_produk; ?>">
						</div>
						
						<div class="form-group">
							<label>Status Rekomendasi</label>
							<select required class="form-control" name="produk_rekomendasi">
								<option class="form-control" value="no" <?php if($data_produk[0]->status_rekomendasi =="no") echo"selected"; ?>>no</option>
								<option class="form-control" value="yes" <?php if($data_produk[0]->status_rekomendasi =="yes") echo"selected"; ?>>yes</option>
							</select>
						</div>
						
						<div class="form-group">
						  <label>Status Produk</label>
						  <select required class="form-control" name="produk_status">
							<option class="form-control" value="ready" <?php if($data_produk[0]->status_produk =="ready") echo"selected"; ?>>ready</option>
							<option class="form-control" value="sold" <?php if($data_produk[0]->status_produk =="sold") echo"selected"; ?>>sold</option>
						  </select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Edit</button>
						<a href="<?php echo site_url('Admin/Product/Product/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
