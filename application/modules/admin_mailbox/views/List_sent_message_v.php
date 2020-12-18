 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Sent Message Inbox Customer
        <small>list semua pesan Admin Inbox Customer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/mome"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/mailbox/">Sent Mailbox</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
              <h3 class="box-title">List Sent Messages</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="15%">Email Penerima</th>
							<th width="50%">Judul Pesan</th>
							<th width="20%">Tanggal Kirim</th>
							<th width="10%">Status</th>
							<th width="10%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_mailbox as $mailbox)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><a href="<?php echo site_url("admin/User/edit_user");?>/<?php echo $mailbox->id_customer; ?>" target="_blank"><?php echo $mailbox->email_user; ?></a></td>
								<td><a href="<?php echo site_url("admin/mailbox/detail_message");?>/<?php echo $mailbox->id_message; ?>" target="_blank"><?php echo $mailbox->title_message; ?></a></td>
								<td><?php echo $mailbox->date_message; ?></td>
								<td>
									<?php 
										if($mailbox->status_message == "active")
										{
									?>
											<p class="label bg-green"><?php echo $mailbox->status_message;?></p>
									<?php
										}else
										{
									?>
											<p class="label bg-red"><?php echo $mailbox->status_message;?></p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo site_url('admin/mailbox/delete_message/'.$mailbox->id_message); ?>" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
							<th width="15%">Email Penerima</th>
							<th width="50%">Judul Pesan</th>
							<th width="20%">Tanggal Kirim</th>
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
 
