 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reply Review Form
        <small>Form membalas Review</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>admin/review/">Review</a></li>
        <li class="active">Reply Review</li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
		<div class="row">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-6">
					<h3> Customer Review </h3>
						<div class="form-group">
						  <label>Invoice Code</label>
						  <a target="_blank" href="<?php echo base_url();?>admin/order/edit_transaction/<?php echo base64_encode($data_review[0]->id_invoice); ?>"><input style="cursor:pointer" class="form-control" value="<?php echo $data_review[0]->id_invoice; ?>" readonly type="text"></a>
						</div>
						
						<div class="form-group">
						  <label>Date Review</label>
						  <input class="form-control" value="<?php echo $data_review[0]->date_review; ?>" readonly type="text">
						</div>
						
						<div class="form-group">
						  <label>Customer Name</label>
						  <a target="_blank" href="<?php echo base_url();?>admin/user/edit_user/<?php echo $data_review[0]->id_customer; ?>"><input style="cursor:pointer" class="form-control" value="<?php echo $data_review[0]->nama_user; ?>" readonly type="text"></a>
						</div>
						
						<div class="form-group">
						  <label>Product Name</label>
						  <a target="_blank" href="<?php echo base_url();?>admin/product/edit_product/<?php echo $data_review[0]->id_produk; ?>"><input style="cursor:pointer" class="form-control" value="<?php echo $data_review[0]->nama_produk; ?>" readonly type="text"></a>
						</div>
						
						<div class="form-group">
						  <label>Rating</label>
						  <input class="form-control" value="<?php echo $data_review[0]->rating; ?> of 5" readonly type="text">
						</div>
						
						<div class="form-group">
						  <label>Review</label>
						  <textarea disabled class="form-control"><?php echo $data_review[0]->review; ?></textarea>
						</div>
						
						<div class="form-group">
						  <label>Status</label>
						  <input class="form-control" value="<?php echo $data_review[0]->status_review; ?>" readonly type="text">
						</div>
						
					</div>
					
					<?php 
						if($this->session->flashdata('message')) 
						{
							echo $this->session->flashdata('message');
							$this->session->unset_userdata('message');
						}
						
						echo form_open("admin/review/reply_review_action/", "role='form' enctype='multipart/form-data'"); 
						
						$reply_message = "";
						$date_reply_review = "";
						if(!empty($data_reply_review))
						{
							$reply_message = $data_reply_review[0]->reply_message;
							$date_reply_review = $data_reply_review[0]->date_reply_review;;
						}
					?> 
						
					<input type="hidden" name="id_review" value="<?php echo $data_review[0]->id_review; ?>">
					<div class="col-md-6">
					<h3> Admin Reply </h3>
						<div class="form-group">
						  <label>Reply Date</label>
						  <input class="form-control" value="<?php echo $date_reply_review; ?>" readonly type="text">
						</div>
						
						<div class="form-group">
						  <label>Reply Message</label>
						  <br>
						  <textarea maxlength="30" class="form-control" name="reply_message" placeholder="Masukkan Reply Message"><?php echo $reply_message; ?></textarea>
						</div>
						
						<button type="submit" id="submit" class="btn btn-warning">Reply</button>
						<a href="<?php echo site_url('admin/review/');?>"><button type="button" class="btn btn-danger">Cancel</button></a>
					 
					</div>
					<?php echo form_close(); ?>
				</div>
				  
					 
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 