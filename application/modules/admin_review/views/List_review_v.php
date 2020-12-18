 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Rating & Review
        <small>list semua rating & review</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/review/">Rating & Review</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
              <h3 class="box-title">List Rating & Review</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="15%">Invoice Code</th>
							<th width="15%">Nama Produk</th>
							<th width="10%">Rating</th>
							<th width="20%">Review</th>
							<th width="15%">Date Review</th>
							<th width="10%">Status</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_review as $review)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><a href="<?php echo base_url();?>admin/order/edit_transaction/<?php echo base64_encode($review->id_invoice); ?>" target="_blank"><?php echo $review->id_invoice; ?></a></td>
								<td><a href="<?php echo base_url();?>product/detail/<?php echo $review->id_produk; ?>" target="_blank"><?php echo $review->nama_produk; ?></a></td>
								<td><?php echo $review->rating; ?> of 5</td>
								<td><?php echo $review->review; ?></td>
								<td><?php echo $review->date_review; ?></td>
								<td>
									<?php 
										if($review->status_review == "active")
										{
									?>
											<p class="label bg-green"><?php echo $review->status_review;?></p>
									<?php
										}else
										{
									?>
											<p class="label bg-red"><?php echo $review->status_review;?></p>
									<?php
										}
									?>
									<a style="cursor:pointer" onclick="update_status(<?php echo $review->id_review; ?>)" target="_blank"><i class="fa fa-refresh "></i> </a>
									<input type="hidden" id="status_review-<?php echo $review->id_review; ?>" value="<?php echo $review->status_review; ?>">
								</td>
								<td>
									<a style="cursor:pointer" href="<?php echo base_url();?>admin/review/reply_review/<?php echo $review->id_review; ?>" target="_blank"> <i class="fa fa-mail-forward"></i> Reply </a>
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
							<th width="15%">Invoice Code</th>
							<th width="15%">Nama Produk</th>
							<th width="10%">Rating</th>
							<th width="20%">Review</th>
							<th width="15%">Date Review</th>
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
 
	
<script>
		
	function update_status(id_review)
	{
		var status_review = $("#status_review-"+id_review).val();
		$.ajax({
			type: "POST",
			url: '<?php echo site_url("Admin/Review/update_status_review") ?>',
			cache: false,
			data: 'id_review=' + id_review + '&status_review=' + status_review, 
			success: function(data) 
			{
				if(data == "true")
				{
					alert("Berhasil Update Status Rating & Review !");
					location.reload();
				}else
				{
					alert("Gagal Update Status Rating & Review !");
				}
			}

		});
	  
	}
</script>