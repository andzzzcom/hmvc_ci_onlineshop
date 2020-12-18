<!DOCTYPE html>
<html lang="en">
<head>
<!-- Basic page needs -->
<meta charset="utf-8">
<!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo $titleweb; ?></title>

<meta name="title" content="<?php echo $meta_title; ?>">
<meta name="description" content="<?php echo $meta_description; ?>">
<meta name="keywords" content="bootstrap, ecommerce, fashion, layout, responsive, responsive template, responsive template download, responsive theme, retail, shop, shopping, store, Premium website templates, web templates, Multi-Purpose Responsive HTML5 Template"/>

<!-- Mobile specific metas  -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Favicon  -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $url_theme;?>images/favicon/<?php echo $favicon; ?>">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<!-- CSS Style -->
<link rel="stylesheet" href="<?php echo $url_theme;?>style.css">
</head>

<body class="shop_grid_page">
<!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]--> 

<!-- mobile menu -->
<div id="mobile-menu">
  <div id="mobile-search">
    <form>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <button class="btn-search" type="button"><i class="fa fa-search"></i></button>
      </div>
    </form>
  </div>
  <ul>
    <li><a href="<?php echo base_url();?>" class="home1">Home</a>
		<ul>
			 <li><a href="../index.html">Fruits Store</a></li>
			 <li><a href="../Version2/index.html">Shoes Store</a></li>
			 <li><a href="../Version3/index.html">Fashion Store</a></li>
			 <li><a href="index.html">Jewellery Store</a></li>
			 <li><a href="../Version5/index.html">Electronic Store</a></li>
			 <li><a href="../rtl-fruits-store/index.html">RTL Fruits Store</a></li>
		</ul>
    </li>
    <li><a href="shop_grid.html">Pages</a>
      <ul>
        <li><a href="#" class="">Shop Pages </a>
          <ul>
            <li> <a href="shop_grid.html"> Shop grid </a> </li>
            <li> <a href="shop_grid_right_sidebar.html"> Shop grid right sidebar</a> </li>
            <li> <a href="shop_list.html"> Shop list </a> </li>
            <li> <a href="shop_list_right_sidebar.html"> Shop list right sidebar</a> </li>
            <li> <a href="shop_grid_full_width.html"> Shop Full width </a> </li>
          </ul>
        </li>
        <li><a href="#">Ecommerce Pages </a>
          <ul>
            <li> <a href="wishlist.html"> Wishlists </a> </li>
            <li> <a href="checkout.html"> Checkout </a> </li>
            <li> <a href="compare.html"> Compare </a> </li>
            <li> <a href="shopping_cart.html"> Shopping cart </a> </li>
            <li> <a href="quick_view.html"> Quick View </a> </li>
          </ul>
        </li>
        <li> <a href="#">Static Pages </a>
          <ul>
            <li> <a href="account_page.html"> Create Account Page </a> </li>
            <li> <a href="about_us.html"> About Us </a> </li>
            <li> <a href="contact_us.html"> Contact us </a> </li>
            <li> <a href="404error.html"> Error 404 </a> </li>
            <li> <a href="faq.html"> FAQ </a> </li>
          </ul>
        </li>
        <li> <a href="#">Product Categories </a>
          <ul>
            <li> <a href="cat-3-col.html"> 3 Column Sidebar </a> </li>
            <li> <a href="cat-4-col.html"> 4 Column Sidebar</a> </li>
            <li> <a href="cat-4-col-full.html"> 4 Column Full width </a> </li>
            <li> <a href="cat-6-col.html"> 6 Columns Full width</a> </li>
          </ul>
        </li>
        <li> <a href="#">Single Product Pages </a>
          <ul>
            <li><a href="single_product.html"> single product </a> </li>
            <li> <a href="single_product_left_sidebar.html"> single product left sidebar</a> </li>
            <li> <a href="single_product_right_sidebar.html"> single product right sidebar</a> </li>
            <li> <a href="single_product_magnify_zoom.html"> single product magnify zoom</a> </li>
          </ul>
        </li>
        <li> <a href="#"> Blog Pages </a>
          <ul>
            <li><a href="blog_right_sidebar.html">Blog – Right sidebar </a></li>
            <li><a href="blog_left_sidebar.html">Blog – Left sidebar </a></li>
            <li><a href="blog_full_width.html">Blog_ - Full width</a></li>
            <li><a href="single_post.html">Single post </a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a href="contact_us.html">Contact us</a></li>
    <li><a href="about_us.html">About us</a></li>
    <li><a href="blog.html">Blog</a>
      <ul>
        <li><a href="blog_right_sidebar.html">Blog – Right sidebar </a></li>
        <li><a href="blog_left_sidebar.html">Blog – Left sidebar </a></li>
        <li><a href="blog_full_width.html">Blog_ - Full width</a></li>
        <li><a href="single_post.html">Single post </a></li>
      </ul>
    </li>
    <li><a href="shop_grid.html">Home Appliances</a>
      <ul>
        <li><a href="#" class="">Room Heaters</a>
          <ul>
            <li><a href="shop_grid.html">Cocktail</a></li>
            <li><a href="shop_grid.html">Day</a></li>
            <li><a href="shop_grid.html">Evening</a></li>
            <li><a href="shop_grid.html">Sundresses</a></li>
          </ul>
        </li>
        <li><a href="#">Lightings</a>
          <ul>
            <li><a href="shop_grid.html">Accessories</a></li>
            <li><a href="shop_grid.html">Hats and Gloves</a></li>
            <li><a href="shop_grid.html">Lifestyle</a></li>
            <li><a href="shop_grid.html">Bras</a></li>
          </ul>
        </li>
        <li> <a href="#">Outdoor Furniture</a>
          <ul>
            <li> <a href="shop_grid.html">Flat Shoes</a> </li>
            <li> <a href="shop_grid.html">Flat Sandals</a> </li>
            <li> <a href="shop_grid.html">Boots</a> </li>
            <li> <a href="shop_grid.html">Heels</a> </li>
          </ul>
        </li>
        <li> <a href="#">Air Coolers</a>
          <ul>
            <li> <a href="shop_grid.html">Bracelets</a> </li>
            <li> <a href="shop_grid.html">Necklaces &amp; Pendent</a> </li>
            <li> <a href="shop_grid.html">Pendants</a> </li>
            <li> <a href="shop_grid.html">Pins &amp; Brooches</a> </li>
          </ul>
        </li>
        <li> <a href="#">Microwave Ovens</a>
          <ul>
            <li> <a href="shop_grid.html">Casual Dresses</a> </li>
            <li> <a href="shop_grid.html">Evening</a> </li>
            <li> <a href="shop_grid.html">Designer</a> </li>
            <li> <a href="shop_grid.html">Party</a> </li>
          </ul>
        </li>
        <li> <a href="#">Nightstands</a>
          <ul>
            <li> <a href="shop_grid.html">Swimsuits</a> </li>
            <li> <a href="shop_grid.html">Beach Clothing</a> </li>
            <li> <a href="shop_grid.html">Clothing</a> </li>
            <li> <a href="shop_grid.html">Bikinis</a> </li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a href="shop_grid.html">Women</a>
      <ul>
        <li> <a href="#" class="">Sofas</a>
          <ul class="level1">
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Coats &amp; Jackets</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Raincoats</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Blazers</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Jackets</a> </li>
          </ul>
        </li>
        <li> <a href="#">Folding Chairs</a>
          <ul class="level1">
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Casual Dresses</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Evening</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Designer</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Party</a> </li>
          </ul>
        </li>
        <li> <a href="#" class="">Side Tables</a>
          <ul class="level1">
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Sport Shoes</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Casual Shoes</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Leather Shoes</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">canvas shoes</a> </li>
          </ul>
        </li>
        <li> <a href="#">Designer</a>
          <ul class="level1">
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Coats</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Formal Jackets</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Leather Jackets</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Blazers</a> </li>
          </ul>
        </li>
        <li> <a href="#">Accesories</a>
          <ul class="level1">
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Backpacks</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Wallets</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Laptops Bags</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Belts</a> </li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a href="shop_grid.html">Home Office</a>
      <ul>
        <li> <a href="shop_grid.html">Wall Units</a>
          <ul>
            <li> <a href="shop_grid.html">iPhone</a> </li>
            <li> <a href="shop_grid.html">Samsung</a> </li>
            <li> <a href="shop_grid.html">Nokia</a> </li>
            <li> <a href="shop_grid.html">Sony</a> </li>
          </ul>
        </li>
        <li> <a href="shop_grid.html" class="">Bedroom</a>
          <ul>
            <li> <a href="shop_grid.html">Audio</a> </li>
            <li> <a href="shop_grid.html">Cameras</a> </li>
            <li> <a href="shop_grid.html">Appling</a> </li>
            <li> <a href="shop_grid.html">Car Music</a> </li>
          </ul>
        </li>
        <li> <a href="shop_grid.html">Kitchen & Dining</a>
          <ul>
            <li> <a href="shop_grid.html">Home &amp; Office</a> </li>
            <li> <a href="shop_grid.html">TV &amp; Home Theater</a> </li>
            <li> <a href="shop_grid.html">Phones &amp; Radio</a> </li>
            <li> <a href="shop_grid.html">All Electronics</a> </li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
</div>
<!-- end mobile menu -->
<div id="page"> 
  <!-- Header -->
  <header>
    <div class="header-container">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-sm-4 hidden-xs"> 
              <!-- Default Welcome Message -->
              <div class="welcome-msg ">Welcome to <?php echo $titleweb;?> </div>
            </div>
            
            <!-- top links -->
            <div class="headerlinkmenu col-lg-8 col-md-7 col-sm-8 col-xs-12">
              <div class="links">
				<?php 
					if(!empty($_SESSION["email_user"]))
					{
				?>
					<div class="myaccount"><a title="My Account" href="<?php echo base_url();?>profile"><i class="fa fa-user"></i><span class="hidden-xs">My Account</span></a></div>
					<div class="wishlist"><a title="My Wishlist" href="<?php echo base_url();?>profile/wishlist"><i class="fa fa-heart"></i><span class="hidden-xs">Wishlist</span></a></div>
				<?php
					}
				?>
				<div class="blog"><a title="Blog" href="blog.html"><i class="fa fa-rss"></i><span class="hidden-xs">Blog</span></a></div>
				
				<?php 
					if(empty($_SESSION["email_user"]))
					{
				?>
					<div class="login"><a href="<?php echo base_url();?>login"><i class="fa fa-unlock-alt"></i><span class="hidden-xs">Log In</span></a></div>
				<?php
					}else
					{
				?>
					<div class="logout"><a title="logout" href="<?php echo base_url();?>logout"><i class="fa fa-rss"></i><span class="hidden-xs">Logout</span></a></div>
				<?php
					}
				?>
			  </div>
              <div class="language-currency-wrapper">
                <div class="inner-cl">
                  <div class="block block-language form-language">
                    <div class="lg-cur"> <span> <img src="<?php echo $url_theme;?>images/flag-default.jpg" alt="French"> <span class="lg-fr">French</span> <i class="fa fa-angle-down"></i> </span> </div>
                    <ul>
                      <li> <a class="selected" href="#"> <img src="<?php echo $url_theme;?>images/flag-english.jpg" alt="flag"> <span>English</span> </a> </li>
                      <li> <a href="#"> <img src="<?php echo $url_theme;?>images/flag-default.jpg" alt="flag"> <span>French</span> </a> </li>
                      <li> <a href="#"> <img src="<?php echo $url_theme;?>images/flag-german.jpg" alt="flag"> <span>German</span> </a> </li>
                      <li> <a href="#"> <img src="<?php echo $url_theme;?>images/flag-brazil.jpg" alt="flag"> <span>Brazil</span> </a> </li>
                      <li> <a href="#"> <img src="<?php echo $url_theme;?>images/flag-chile.jpg" alt="flag"> <span>Chile</span> </a> </li>
                      <li> <a href="#"> <img src="<?php echo $url_theme;?>images/flag-spain.jpg" alt="flag"> <span>Spain</span> </a> </li>
                    </ul>
                  </div>
                  <div class="block block-currency">
                    <div class="item-cur"> <span>USD </span> <i class="fa fa-angle-down"></i></div>
                    <ul>
                      <li> <a href="#"><span class="cur_icon">€</span> EUR</a> </li>
                      <li> <a href="#"><span class="cur_icon">¥</span> JPY</a> </li>
                      <li> <a class="selected" href="#"><span class="cur_icon">$</span> USD</a> </li>
                    </ul>
                  </div>
                </div>
                
                <!-- End Default Welcome Message --> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-4 col-md-3 col-xs-12"> 
            <!-- Header Logo -->
            <div class="logo"><a title="e-commerce" href="<?php echo base_url();?>"><img  style="max-height:80px;" alt="e-commerce" src="<?php echo $url_theme;?>images/logo/<?php echo $logo_web;?>"></a> </div>
            <!-- End Header Logo --> 
          </div>
          <div class="col-md-9 col-sm-8 hidden-xs">
            <div class="mtmegamenu">
              <ul>
                <li class="mt-root demo_custom_link_cms">
                  <div class="mt-root-item"><a href="<?php echo base_url();?>">
                    <div class="title title_font"><span class="title-text">Home</span></div>
                    </a>
				  </div>
                  <ul class="menu-items col-md-3 col-sm-4 col-xs-12 hidden">
                    <li class="menu-item depth-1">
                      <div class="title"> <a href="../index.html"><span>Fruits Store</span></a></div>
                    </li>
                    <li class="menu-item depth-1">
                      <div class="title"> <a href="../Version2/index.html"><span>Shoes Store</span></a></div>
                    </li>
                    <li class="menu-item depth-1">
                      <div class="title"> <a href="../Version3/index.html"><span>Fashion Store</span></a></div>
                    </li>
                    <li class="menu-item depth-1">
                      <div class="title"> <a href="index.html"><span>Jewellery Store</span></a></div>
                    </li>
                    <li class="menu-item depth-1">
                      <div class="title"> <a href="../Version5/index.html"><span>Electronic Store</span></a></div>
                    </li> 
                    <li class="menu-item depth-1">
                      <div class="title"> <a href="../rtl-fruits-store/index.html"><span>RTL Fruits Store</span></a></div>
                    </li>                   
                    </ul>
                </li>
                <li class="mt-root">
                  <div class="mt-root-item"><a href="shop_grid.html">
                    <div class="title title_font"><span class="title-text">Contact Us</span> </div>
                    </a></div>
                </li>
                <li class="mt-root">
                  <div class="mt-root-item"><a href="about_us.html">
                    <div class="title title_font"><span class="title-text">about us</span></div>
                    </a></div>
                </li>
                <li class="mt-root demo_custom_link_cms">
                  <div class="mt-root-item"><a href="blog.html">
                    <div class="title title_font"><span class="title-text">Blog</span></div>
                    </a>
				  </div>
                  <ul class="menu-items col-md-3 col-sm-4 col-xs-12 hidden">
                    <li class="menu-item depth-1">
                      <div class="title"> <a href="blog_right_sidebar.html"> Blog – Right Sidebar </a></div>
                    </li>
                    <li class="menu-item depth-1">
                      <div class="title"> <a href="blog_left_sidebar.html"> Blog – Left Sidebar </a></div>
                    </li>
                    <li class="menu-item depth-1">
                      <div class="title"> <a href="blog_full_width.html"> Blog – Full-Width </a></div>
                    </li>
                    <li class="menu-item depth-1">
                      <div class="title"> <a href="single_post.html"> Single post </a></div>
                    </li>
                  </ul>
                </li>
              </ul>
              
              <div class="call-us hidden-sm"> <i class="fa fa-phone"></i>
                <div class="call-us-inner"> <span class="call-text">free call us</span> <span class="call-num">Call: + 0123 456 789</span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- end header --><!-- Navbar -->
  <nav>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-3">
          <div class="mm-toggle-wrap">
            <div class="mm-toggle"> <i class="fa fa-align-justify"></i> </div>
            <span class="mm-label hidden-xs">Categories</span> 
		  </div>
          <div class="mega-container visible-lg visible-md visible-sm">
            <div class="navleft-container">
              <div class="mega-menu-title">
                <h3>shop by category</h3>
              </div>
              <div class="mega-menu-category">
                <ul class="nav">
					<?php
						foreach($category as $cat)
						{
					?>
						<li class="nosub"><a href="shop_grid.html"><?php echo $cat->name_kategori;?></a></li>
					<?php
						}
					?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-9 col-sm-6 col-md-6 hidden-xs"> 
          <!-- Search -->
          
          <div class="top-search">
            <div id="search">
                <div class="input-group">
                  <input type="text" class="form-control" onkeypress="handleKeyPress(event)" placeholder="Search" id="querysearch">
                  <select class="cate-dropdown hidden-xs hidden-sm" name="category_ids">
                    <option>All Categories</option>
                    <option>women</option>
                    <option>&nbsp;&nbsp;&nbsp;Chair </option>
                    <option>&nbsp;&nbsp;&nbsp;Decoration</option>
                    <option>&nbsp;&nbsp;&nbsp;Lamp</option>
                    <option>&nbsp;&nbsp;&nbsp;Handbags </option>
                    <option>&nbsp;&nbsp;&nbsp;Sofas </option>
                    <option>&nbsp;&nbsp;&nbsp;Essential </option>
                    <option>Men</option>
                    <option>Electronics</option>
                    <option>&nbsp;&nbsp;&nbsp;Mobiles </option>
                    <option>&nbsp;&nbsp;&nbsp;Music &amp; Audio </option>
                  </select>
                  <button class="btn-search" onclick="search()" type="button"><i class="fa fa-search"></i></button>
                </div>
            </div>
          </div>
          
          <!-- End Search --> 
        </div>
        <!-- top cart -->
        <div class="col-md-3 col-xs-9 col-sm-2 top-cart">
          <div class="top-cart-contain">
            <div class="mini-cart">
              <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="#">
                <div class="cart-icon"><i class="fa fa-shopping-basket"></i></div>
                <div class="shoppingcart-inner hidden-xs hidden-sm"><span class="cart-title">Shopping Cart</span> <span class="cart-total"><?php echo $total_item;?> Item(s): Rp <?php echo $total;?>,-</span></div>
                </a></div>
              <div>
			  
				<!-- cart header content -->
				<div class="top-cart-content">
					<div class="block-subtitle hidden-xs">Cart added item(s)</div>
						<ul id="cart-sidebar" class="mini-products-list">
						<?php
							$i=0;
							$totalnya=0;
							$total = 0;
							foreach($cart as $cart)
							{
								$harga_produk = "";
								$kodeproduk = "";
								$thumbnailproduk = "";
								
								$temp = $content;
								foreach($content as $content)
								{
									if($content[0]->id_produk == $cart["id"])
									{
										$harga_produk = "".number_format($content[0]->harga_produk);
										$harga_produk = str_replace(",", ".",$harga_produk);
										
										$subtotal = "".number_format($cart["subtotal"]);
										$subtotal = str_replace(",", ".",$subtotal);
										
										$kodeproduk = $content[0]->kode_produk;
										$thumbnailproduk = $content[0]->thumbnail_produk;
									}
								}
								$content = $temp;
								
						?>
							<li class="item odd"> 
								<a target="_blank" href="<?php echo base_url();?>product/detail/<?php echo $cart["id"];?>" title="Ipsums Dolors Untra" class="product-image">
									<img src="<?php echo $url_theme;?>images/produk/<?php echo $thumbnailproduk;?>" alt="Lorem ipsum dolor" width="65">
								</a>
								<div class="product-details"> 
									<a href="#" onclick="removecart('<?php echo $cart["id"];?>')" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a>
									<p class="product-name"><a target="_blank" href="<?php echo base_url();?>product/detail/<?php echo $cart["id"];?>"><?php echo $cart["name"];?> </a> </p>
									<strong><?php echo $cart["qty"];?></strong> 
									<span class="price">Rp <?php echo $harga_produk; ?>,00</span> 
								</div>
							</li>
						<?php
								
								$total += $cart["subtotal"];
							}
							$total_edit = "".number_format($total);
							$total_edit = str_replace(",", ".",$total_edit);
						?>
						</ul>
						<div class="top-subtotal">Subtotal: <span class="price">Rp <?php echo $total_edit; ?>,00</span></div>
						<div class="actions">
							<a href="<?php echo base_url();?>checkout"><button class="btn-checkout" type="button"><i class="fa fa-check"></i><span>Checkout</span></button></a>
							<a href="<?php echo base_url();?>cart"><button class="view-cart" type="button"><i class="fa fa-shopping-basket"></i> <span>View Cart</span></button></a>
						</div>
					</div>
				</div>
				<!-- end cart header content -->
				
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- end nav --> 
<script>	
	function handleKeyPress(e){
		var key = e.keyCode || e.which;
		if (key==13){
			var query = $("#querysearch").val();
			if(query !== "")
			{
				var url = '<?php echo base_url()."search/"; ?>';
				$(location).attr('href',  url+query);
			}
		}
	}
	
	function search()
	{
		var query = $("#querysearch").val();
		if(query == "")
		{
			return false;
		}else
		{
			var url = '<?php echo base_url()."search/"; ?>';
			
			$(location).attr('href',  url+query);
			
		}
		
	}
	
	function removecart(idproduk)
	{
		$.ajax({
			type: "POST",
			url: '<?php echo site_url("cart/delete_data_cart") ?>',
			cache: false,
			data: {idproduk: idproduk}, // appears as $_GET['id'] @ your backend side
			success: function(data) {
				
				location.reload();			
			}
		});
	}
</script>
  
  
  <!-- Breadcrumbs -->