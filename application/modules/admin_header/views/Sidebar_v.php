<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image" style="margin:10px">
          <img src="<?php echo $url_theme;?>images/admin/<?php echo $fotoadmin;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $namaadmin; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cart-plus"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
				<a href="<?php echo site_url('admin/product/'); ?>"><i class="fa fa-circle-o"></i> List All Product
					<span class="pull-right-container">
					  <small class="label pull-right bg-green"><?php echo $total_product; ?></small>
					</span>
				</a>
			</li>
            <li>
				<a href="<?php echo site_url('admin/product/list_recommended_product'); ?>"><i class="fa fa-circle-o"></i> List Special Product
					<span class="pull-right-container">
					  <small class="label pull-right bg-orange"><?php echo $total_recommended_product; ?></small>
					</span>
				</a>
			</li>
            <li>
				<a href="<?php echo site_url('admin/product/add_product'); ?>"><i class="fa fa-circle-o"></i> Add New Product</a>
			</li>
          </ul>
        </li>
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/category/'); ?>"><i class="fa fa-circle-o"></i> List All</a></li>
            <li><a href="<?php echo site_url('admin/category/add_category'); ?>"><i class="fa fa-circle-o"></i> Add New Category</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-circle"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/brand/'); ?>"><i class="fa fa-circle-o"></i> List All</a></li>
            <li><a href="<?php echo site_url('admin/brand/add_brand'); ?>"><i class="fa fa-circle-o"></i> Add New Brand</a></li>
          </ul>
        </li>
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Transactions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
				<a href="<?php echo site_url('admin/order/'); ?>"><i class="fa fa-circle-o"></i> List Transaction
					<span class="pull-right-container">
					  <small class="label pull-right bg-green"><?php echo $norder; ?></small>
					</span>
				</a>
			</li>
            <li><a href="<?php echo site_url('admin/confirmation/'); ?>"><i class="fa fa-circle-o"></i> List Confirmation</a></li>
          </ul>
        </li>
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>List Review</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/review/'); ?>"><i class="fa fa-circle-o"></i> List Review</a></li>
          </ul>
        </li>
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>List User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/user/'); ?>"><i class="fa fa-circle-o"></i> List All user</a></li>
            <li><a href="<?php echo site_url('admin/user/add_user'); ?>"><i class="fa fa-circle-o"></i> Register New User</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-user-circle"></i>
            <span>List Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/admin/'); ?>"><i class="fa fa-circle-o"></i> List All Admin</a></li>
            <li><a href="<?php echo site_url('admin/admin/add_admin'); ?>"><i class="fa fa-circle-o"></i> Register New Admin</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-bank"></i>
            <span>List Bank</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/bank/'); ?>"><i class="fa fa-circle-o"></i> List All Bank</a></li>
            <li><a href="<?php echo site_url('admin/bank/add_bank'); ?>"><i class="fa fa-circle-o"></i> Add New Bank</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>List Voucher</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/voucher/'); ?>"><i class="fa fa-circle-o"></i> List All Voucher</a></li>
            <li><a href="<?php echo site_url('admin/voucher/add_voucher'); ?>"><i class="fa fa-circle-o"></i> Add New Voucher</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Inbox Guest</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/inbox/'); ?>"><i class="fa fa-circle-o"></i> List Message</a></li>
            <li><a href="<?php echo site_url('admin/inbox/create_message'); ?>"><i class="fa fa-circle-o"></i> Compose Message</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Mailbox Customer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/mailbox/'); ?>"><i class="fa fa-circle-o"></i>List Inbox Message</a></li>
            <li><a href="<?php echo site_url('admin/mailbox/list_sent_message'); ?>"><i class="fa fa-circle-o"></i>List Sent Message</a></li>
            <li><a href="<?php echo site_url('admin/mailbox/create_message'); ?>"><i class="fa fa-circle-o"></i>Compose Message</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-circle"></i>
            <span>List Page</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/page/'); ?>"><i class="fa fa-circle-o"></i> List All Page</a></li>
            <li><a href="<?php echo site_url('admin/page/create_page'); ?>"><i class="fa fa-circle-o"></i> Add New Page</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>List Email Notification</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/email/'); ?>"><i class="fa fa-circle-o"></i> List All Email</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>List Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/slider/'); ?>"><i class="fa fa-circle-o"></i> List All Slider</a></li>
            <li><a href="<?php echo site_url('admin/slider/add_slider'); ?>"><i class="fa fa-circle-o"></i> Add New Slider</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>List Banner</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/banner/'); ?>"><i class="fa fa-circle-o"></i> List All Banner</a></li>
            <li><a href="<?php echo site_url('admin/banner/add_banner'); ?>"><i class="fa fa-circle-o"></i> Add New Banner</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Income Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/report/monthly'); ?>"><i class="fa fa-circle-o"></i> Monthly</a></li>
            <li><a href="<?php echo site_url('admin/report/yearly'); ?>"><i class="fa fa-circle-o"></i> Yearly</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Website Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/settings/general_settings'); ?>"><i class="fa fa-circle-o"></i>General Settings</a></li>
            <li><a href="<?php echo site_url('admin/settings/upload_settings'); ?>"><i class="fa fa-circle-o"></i>Upload Settings</a></li>
            <li><a href="<?php echo site_url('admin/settings/courier_settings'); ?>"><i class="fa fa-circle-o"></i>Courier Settings</a></li>
            <li><a href="<?php echo site_url('admin/settings/payment_settings'); ?>"><i class="fa fa-circle-o"></i>Payment Settings</a></li>
            <li><a href="<?php echo site_url('admin/settings/shipping_settings'); ?>"><i class="fa fa-circle-o"></i>Shipping Settings</a></li>
          </ul>
        </li>
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>