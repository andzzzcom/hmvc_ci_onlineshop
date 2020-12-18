 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Product Form
        <small>Form Menambahkan Produk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/product/">Product</a></li>
        <li class="active">Add Product</li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
		<div class="row">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<?php 
						echo validation_errors();
						if($this->session->flashdata('message')) 
						{
							echo $this->session->flashdata('message');
							$this->session->unset_userdata('message');
						}
						
						echo form_open("admin/product/add_product_action/", "role='form' enctype='multipart/form-data'"); 
					?>
					<div class="col-md-8">
						<div class="form-group">
							<label>Nama Produk</label>
							<input required type="text" maxlength="30" class="form-control" name="produk_name" placeholder="Masukkan Nama Produk">
						</div>
						
						<div class="form-group">
							<label>Kode Produk</label>
							<input required type="text" maxlength="30" class="form-control" name="produk_code" placeholder="Masukkan Kode Produk">
						</div>
						
						<div class="form-group">
							<label>Thumbnail Produk</label>
							<br>
							<label class="ea-file">Choose file
								<input type="file" required name="produk_thumbnail" id="uploaded1" class="upload" data-value="uploaded1">
							</label>
						</div>
						
						<div class="form-group">
							<label>Gambar Produk</label>
							<br>
							<a onclick="addgambar()" class="btn btn-info"><i class="fa fa-plus-square"></i> &nbsp Add</a> 
							<a onclick="removegambar()" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp Remove</a>
							<br>
							<br>
							<div class="form-group" id="addimage">
								<label class='text-center' id="imagenya1">
									<img id="output1" style="margin-right:1px;" src="<?php echo $url_theme;?>images/produk/default-images-product.png" width="120px" height="120px"/>
									<br>
									<label style="cursor:pointer">
										<input name="imageproduk[]" style='display:none' onchange='loadFile(event, 1)' id="file-input" type="file"/>
										<label id='namenya1'>Choose File</label>
									</label>
								</label>
							</div>
						</div>
						
						
						<div class="form-group">
							<label>Deskripsi Produk</label>
							<br>
							<textarea id="deskripsi" rows="15" cols="10" name="produk_description"></textarea>
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
									<option class="form-control" value="<?php echo $brand->id_brand; ?>"><?php echo $brand->name_brand; ?></option>
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
											<option class="form-control" value="<?php echo $subkategori->id_sub_kategori; ?>"><?php echo $subkategori->name_sub_kategori; ?></option>
							<?php
										}
									}
								}
							?>
							</select>
						</div>
						
						<div class="form-group">
							<label>Stok Produk</label>
							<input required type="number" step="1" min="1" class="form-control" name="produk_stok" placeholder="1">
						</div>
									
						<div class="form-group">
							<label>Berat Produk (gram)</label>
							<input required type="number" step="1" min="1" class="form-control" name="produk_weight" placeholder="1">
						</div>
						
						<div class="form-group">
							<label>Harga Produk</label>
							<input required type="number" step="1" min="1" placeholder="1" class="form-control" name="produk_price" >
						</div>
									
						<div class="form-group">
							<label>Tag Produk (Pisahkan dengan tanda koma)</label>
							<input required type="text" placeholder="masukkan tag produk" class="form-control" name="produk_tag" >
						</div>
						
						<div class="form-group">
							<label>Status Rekomendasi</label>
							<select required class="form-control" name="produk_rekomendasi">
								<option class="form-control" value="no">no</option>
								<option class="form-control" value="yes">yes</option>
							</select>
						</div>
						
						<div class="form-group">
							<label>Status Produk</label>
							<select required class="form-control" name="produk_status">
								<option class="form-control" value="ready">ready</option>
								<option class="form-control" value="sold">sold</option>
							</select>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Add</button>
						<a href="<?php echo site_url('admin/product/Product/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
	<script>
		
		function loadFile(event, counter)
		{  
			var output = document.getElementById('output'+counter);
			output.src = URL.createObjectURL(event.target.files[0]);
			
			$("#namenya"+counter).html(event.target.files[0].name);
		};
		
		var i = 2;
		function addgambar()
		{
			$("#addimage").append("<label id='imagenya"+i+"' class='text-center'><img id='output"+i+"' style='margin-right:4px;' src='<?php echo $url_theme;?>images/produk/default-images-product.png' width='120px' height='120px'/><br><label class='text-center' for='file-input' style='cursor:pointer'><input style='display:none;' onchange='loadFile(event, "+i+")' name='imageproduk[]' id='file-input"+i+"' type='file'/><Label id='namenya"+i+"'>Choose File</Label>");

			i++;
		}
		
		function removegambar()
		{
			if(i>2)
			{
				i--;
				$("#imagenya"+i).remove();
			}
		}
	</script>
 