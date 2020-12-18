
  <!-- Breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="<?php echo base_url();?>">Home</a><span>&raquo;</span></li>
            <li><strong>Profile Information</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  
  <!-- Main Container -->
  <section class="main-container col2-left-layout">
    <div class="main container">
      <div class="row">
	  
        <aside class="left sidebar col-sm-3 col-xs-12">
          <div class="sidebar-account block">
            <div class="sidebar-bar-title">
              <h3>Profile Dashboard</h3>
            </div>
            <div class="block-content">
              <ul>
                <li class="<?php if($current == "profile")echo"current";?>"><a href="<?php echo base_url();?>profile">Profile Information</a></li>
                <li class="<?php if($current == "security")echo"current";?>"><a href="<?php echo base_url();?>profile/security_settings">Security Settings</a></li>
                <li class="<?php if($current == "shipping")echo"current";?>"><a href="<?php echo base_url();?>profile/shipping_settings">Shipping Settings</a></li>
                <li class="<?php if($current == "orders")echo"current";?>"><a href="<?php echo base_url();?>profile/orders">My Orders</a></li>
                <li class="<?php if($current == "wishlist")echo"current";?>"><a href="<?php echo base_url();?>profile/wishlist">My Wishlist</a></li>
                <li class="<?php if($current == "sendmessage")echo"current";?>"><a href="<?php echo base_url();?>profile/send_message">Mailbox (create)</a></li>
                <li class="<?php if($current == "inbox")echo"current";?>"><a href="<?php echo base_url();?>profile/mailbox">Mailbox (inbox)</a></li>
                <li class="<?php if($current == "inboxsent")echo"current";?>"><a href="<?php echo base_url();?>profile/mailbox_sent">Mailbox (sent)</a></li>
              </ul>
            </div>
          </div>
          <div class="compare block hidden">
            <div class="sidebar-bar-title">
              <h3>Compare Products (2)</h3>
            </div>
            <div class="block-content">
              <ol id="compare-items">
                <li class="item"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a> <a href="#" class="product-name">Vestibulum porta tristique porttitor.</a> </li>
                <li class="item"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a> <a href="#" class="product-name">Lorem ipsum dolor sit amet</a> </li>
              </ol>
              <div class="ajax-checkout">
                <button type="submit" title="Submit" class="button button-compare"> <span><i class="fa fa-signal"></i> Compare</span></button>
                <button type="submit" title="Submit" class="button button-clear"> <span><i class="fa fa-eraser"></i> Clear All</span></button>
              </div>
            </div>
          </div>
        </aside>
	  