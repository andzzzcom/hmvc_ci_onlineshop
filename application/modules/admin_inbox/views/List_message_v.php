 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Message Inbox
        <small>list semua pesan Inbox</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url();?>admin/inbox/">Inbox</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive box">
            <div class="box-header">
              <h3 class="box-title">List Messages</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example1" class="text-center table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="30%">Judul Pesan</th>
							<th width="15%">Nama Pengirim</th>
							<th width="15%">Email Pengirim</th>
							<th width="20%">Tanggal Kirim</th>
							<th width="10%">Status</th>
							<th width="5%"></th>
						</tr>
					</thead>
					
					<tbody>
					<?php
						$i=1;
						foreach($list_all_inbox as $inbox)
						{
					?>
							<tr>
								<td><?php echo $i;?></td>
								<td><a href="<?php echo base_url();?>admin/inbox/detail_message/<?php echo $inbox->id_inbox_message; ?>" target="_blank"><?php echo $inbox->subjek_message; ?></a></td>
								<td><?php echo $inbox->nama_pengirim; ?></td>
								<td><?php echo $inbox->email_pengirim; ?></td>
								<td><?php echo $inbox->tanggal_kirim; ?></td>
								<td>
									<?php 
										if($inbox->status_message == "active")
										{
									?>
											<p class="label bg-green"><?php echo $inbox->status_message;?></p>
									<?php
										}else
										{
									?>
											<p class="label bg-red"><?php echo $inbox->status_message;?></p>
									<?php
										}
									?>
								</td>
								<td>
									<a href="<?php echo base_url();?>admin/inbox/delete_message/<?php echo $inbox->id_inbox_message; ?>" target="_blank"><i class="fa fa-trash-o fa-2x"></i> </a>
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
							<th width="30%">Judul Pesan</th>
							<th width="15%">Nama Pengirim</th>
							<th width="15%">Email Pengirim</th>
							<th width="20%">Tanggal Kirim</th>
							<th width="10%">Status</th>
							<th width="5%"></th>
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
 
