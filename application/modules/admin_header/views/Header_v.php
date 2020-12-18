
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>admin/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?php echo $titleadminpanelminimize; ?></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $titleadminpanel; ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span style="display:none" class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Your 5 Latest Messages</li>
              <li>
                <ul class="menu">
				<?php
					$i = 1;
					foreach($list_inbox as $inbox)
					{
						if($i>5)
							break;
				?>
					  <li>
						<div class="pull-left" style="padding:10px"><img src="<?php echo $url_theme;?>images/favicon/envelope.ico" width="30px" height="30px"></div>
						<a href="<?php echo base_url();?>admin/inbox/detail_message/<?php echo $inbox->id_inbox_message;?>" target="_blank">
						  <h4>
							<?php echo $inbox->nama_pengirim; ?>
							<small><i class="fa fa-clock-o"></i> <?php echo $inbox->tanggal_kirim; ?></small>
						  </h4>
						  <p><?php echo $inbox->subjek_message; ?></p>
						</a>
					  </li>
				<?php
						$i++;
					}
				?>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url();?>admin/inbox/" target="_blank">See All Messages</a></li>
            </ul>
          </li>
		  
          <!-- Notifications: style can be found in dropdown.less -->
			
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" style="display:none">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Your 10 Latest Transactions</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
				<?php
					$i = 1;
					foreach($list_order as $list_order)
					{
						if($i>10)
							break;
				?>
						<li>
							<a href="<?php echo base_url();?>admin/order/edit_transaction/<?php echo base64_encode($list_order->invoice_code);?>" target="_blank">
								<i class="fa fa-shopping-cart text-green"></i><?php echo $list_order->invoice_code; ?>
							</a>
						</li>
				<?php
						$i++;
					}
				?>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url();?>Admin/order/" target="_blank">View all</a></li>
            </ul>
          </li>
		  
		  
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu" style="display:none">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
		  
		  
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $url_theme;?>images/admin/<?php echo $fotoadmin;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $namaadmin; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $url_theme;?>images/admin/<?php echo $fotoadmin;?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $namaadmin; ?> - <?php echo $roleadmin; ?>
                  <small><?php echo $reg_date_admin; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body" style="display:none">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>admin/admin/edit_admin/<?php echo $id_admin; ?>" target="_blank" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('admin/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
		  
          <!-- Control Sidebar Toggle Button -->
          <li style="display:none">
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
		  
        </ul>
      </div>
    </nav>
  </header>
  