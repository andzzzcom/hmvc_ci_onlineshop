
        <aside class="right sidebar col-sm-3 col-xs-12">
			<div class="sidebar-account block">
				<div class="sidebar-bar-title">
					<h3>Profile Dashboard</h3>
				</div>
				<div class="block-content">
					<ul>
						<li><a href="<?php echo base_url();?>profile">Profile Information</a></li>
						<li><a href="<?php echo base_url();?>profile/security">Security Settings</a></li>
						<li><a href="<?php echo base_url();?>profile/shipping">Shipping Settings</a></li>
						<li><a href="<?php echo base_url();?>profile/order">My Orders</a></li>
						<li><a href="<?php echo base_url();?>profile/mailbox">Mailbox</a></li>
						<li class="current"><a href="<?php echo base_url();?>profile/wishlist">My Wishlist</a></li>
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
    </div>
</section>
<br>