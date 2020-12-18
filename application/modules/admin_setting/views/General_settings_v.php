 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit General Settings
        <small>Form Mengubah Settings</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/general_settings/">General Settings</a></li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
		<div class="row">
			<div class="table-responsive box">
				<!-- /.box-header -->
				<div class="box-body">
					<?php 
						if($this->session->flashdata('message')) 
						{
							echo $this->session->flashdata('message');
							$this->session->unset_userdata('message');
						}
						
						echo form_open("admin/settings/general_settings_action/", "role='form' enctype='multipart/form-data'"); 
					?> 
						
					<input type="hidden" name="admin_id" value="<?php echo $list_all_settings[0]->id_settings; ?>">
					<div class="col-md-6">
						<h3>Title Settings</h3>
						<div class="form-group">
						  <label>Title Web</label>
						  <input maxlength="50" value="<?php echo $list_all_settings[0]->title_web; ?>" required type="text" class="form-control" name="title_web" placeholder="Masukkan Title Web">
						</div>
						
						<div class="form-group">
						  <label>Subtitle Web</label>
						  <input maxlength="50" value="<?php echo $list_all_settings[0]->subtitle_web; ?>" required type="text" class="form-control" name="subtitle_web" placeholder="Masukkan Subtitle Web">
						</div>
						
						<div class="form-group">
						  <label>Title Menu Admin Panel</label>
						  <input maxlength="50" value="<?php echo $list_all_settings[0]->title_admin_panel; ?>" required type="text" class="form-control" name="title_admin_panel" placeholder="Masukkan Title Admin Menu">
						</div>
						
						<div class="form-group">
						  <label>Title Menu Admin Panel Minimize</label>
						  <input maxlength="5" value="<?php echo $list_all_settings[0]->title_admin_panel_minimize; ?>" required type="text" class="form-control" name="title_admin_panel_minimize" placeholder="Masukkan Title Admin Minimize">
						</div>
						
						<br>
						<h3>Social Media Settings</h3>
						<div class="form-group">
						  <label>Url Facebook (with http:// or https://)</label>
						  <input value="<?php echo $list_all_settings[0]->url_facebook; ?>" required type="text" class="form-control" name="url_facebook" placeholder="Masukkan Url Facebook">
						</div>
						
						<div class="form-group">
						  <label>Url Twitter (with http:// or https://)</label>
						  <input value="<?php echo $list_all_settings[0]->url_twitter; ?>" required type="text" class="form-control" name="url_twitter" placeholder="Masukkan Url Twitter">
						</div>
						
						<div class="form-group">
						  <label>Url Instagram (with http:// or https://)</label>
						  <input value="<?php echo $list_all_settings[0]->url_instagram; ?>" required type="text" class="form-control" name="url_instagram" placeholder="Masukkan Url Instagram">
						</div>
						
						
					</div>
					
					<div class="col-md-6">
						<h3>Logo Settings</h3>
						<div class="form-group">
						  <label>Logo Website</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/logo/<?php echo $list_all_settings[0]->logo_web;?>" width="100px" height="50px">
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" name="logo_web" id="uploaded2" class="upload" data-value="uploaded2">
						  </label>
						</div>
						
						<div class="form-group">
						  <label>Fav Icon</label>
						  <br>
						  <img src="<?php echo $url_theme;?>images/favicon/<?php echo $list_all_settings[0]->fav_icon;?>" width="30px" height="30px">
						  <br>
						  <label class="ea-file">Choose file
							<input type="file" name="fav_icon" id="uploaded1" class="upload" data-value="uploaded1">
						  </label>
						</div>
						<br>
						
						<h3>SEO Settings</h3>
						<div class="form-group">
						  <label>Meta Title</label>
						  <input maxlength="100" value="<?php echo $list_all_settings[0]->meta_title; ?>" required type="text" class="form-control" name="meta_title" placeholder="Masukkan Meta Title">
						</div>
						
						<div class="form-group">
						  <label>Meta Description</label>
						  <input maxlength="1000" value="<?php echo $list_all_settings[0]->meta_description; ?>" required type="text" class="form-control" name="meta_description" placeholder="Masukkan Meta Description">
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Edit</button>
						<a href="<?php echo site_url('admin/settings/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 