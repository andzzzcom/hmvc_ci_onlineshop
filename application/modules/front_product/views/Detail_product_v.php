
  <!-- Breadcrumbs -->
  
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="<?php echo base_url();?>">Home</a><span>&raquo;</span></li>
            <li class=""> <a title="Go to Home Page" href="<?php echo base_url();?>product">All Products</a><span>&raquo;</span></li>
            <li><strong><?php echo $data_produk[0]->nama_produk;?></strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  <!-- Main Container -->
  <div class="main-container col2-left-layout" style="background-color:white">
    <div class="container">
      <div class="row">
      <div class="col-main col-sm-9 col-xs-12">
          <div class="product-view-area">
			<div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
				<!--<div class="icon-sale-label sale-left">Sale</div>-->
				<div class="large-image"> 
					<a style="height:300px;width:auto" href="<?php echo $url_theme;?>images/produk/<?php echo $data_produk[0]->thumbnail_produk;?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> 
						<img class="zoom-img" style="height:300px;width:auto" src="<?php echo $url_theme;?>images/produk/<?php echo $data_produk[0]->thumbnail_produk;?>" alt="products"> 
					</a> 
				</div>
				<div class="flexslider flexslider-thumb">
					<ul class="previews-list slides">
						<?php 
							foreach($data_gambar_produk as $gambar)
							{
						?>
							<li style="height:70px;max-width:80px;overflow-y:hidden"><a href='<?php echo $url_theme;?>images/produk/<?php echo $gambar->name_image_produk;?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo $url_theme;?>images/produk/<?php echo $gambar->name_image_produk;?>' "><img height="100%" src="<?php echo $url_theme;?>images/produk/<?php echo $gambar->name_image_produk;?>" alt = "<?php echo $gambar->name_image_produk;?>"/></a></li>
						<?php
							}
						?>
					</ul>
				</div>
            
            <!-- end: more-images --> 
            
          </div>
          <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
       
              <div class="product-name">
                <h1><?php echo $data_produk[0]->nama_produk;?></h1>
              </div>
              <div class="price-box">
                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> Rp <?php echo str_replace(",", ".", number_format($data_produk[0]->harga_produk));?>,- </span> </p>
                <!--<p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> Rp <?php echo str_replace(",", ".", number_format($data_produk[0]->harga_produk));?>,- </span> </p>-->
              </div>
              <div class="ratings">
                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator"> </p>
                <p class="availability in-stock pull-right">Availability: <span>In Stock</span></p>
              </div>
              <div class="hidden short-description">
                <h2>Quick Overview</h2>
				<?php echo $data_produk[0]->deskripsi_produk;?>
              </div>
              <div class="product-color-size-area ">
                <div class="color-area">
                  <h2 class="saider-bar-title">Color</h2>
                  <div class="color">
                    <ul>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                    </ul>
                  </div>
                </div>
                <div class="size-area">
                  <h2 class="saider-bar-title">Size</h2>
                  <div class="size">
                    <ul>
                      <li><a href="#">S</a></li>
                      <li><a href="#">L</a></li>
                      <li><a href="#">M</a></li>
                      <li><a href="#">XL</a></li>
                      <li><a href="#">XXL</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="product-variation">
                <form action="#" method="post">
                  <div class="cart-plus-minus">
                    <label for="qty">Quantity:</label><br>
                    <div class="numbers-row">
                      <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="dec qtybutton"><i class="fa fa-minus">&nbsp;</i></div>
                      <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                      <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton"><i class="fa fa-plus">&nbsp;</i></div>
                    </div>
                  </div>
				</form>
              </div>
              <div class="product-cart-option">
				<button class="button pro-add-to-cart" onclick="add_cart('<?php echo $data_produk[0]->id_produk;?>', '<?php echo $data_produk[0]->nama_produk;?>', '<?php echo $data_produk[0]->harga_produk;?>')" title="Add to Cart" type="button"><span><i class="fa fa-shopping-basket"></i> Add to Cart</span></button>
			  </div>
              <div class="product-cart-option" style="padding-top:50px">
                <ul>
                  <li><a href="#"><i class="fa fa-heart"></i><span>Add to Wishlist</span></a></li>
                  <li><a href="#"><i class="fa fa-retweet"></i><span>Add to Compare</span></a></li>
                </ul>
              </div>
			</div>
		</div>
          <div class="product-overview-tab">
			<div class="product-tab-inner"> 
              <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                <li class="active"> <a href="#description" data-toggle="tab"> Description </a> </li>                
				<li> <a href="#reviews" data-toggle="tab">Reviews</a> </li>
				<!--<li><a href="#product_tags" data-toggle="tab">Tags</a></li>
                <li> <a href="#custom_tabs" data-toggle="tab">Custom Tab</a> </li>-->
              </ul>
              <div id="productTabContent" class="tab-content">
					<div class="tab-pane fade in active" id="description">
						<div class="std">
							<p>
								<?php echo $data_produk[0]->deskripsi_produk;?>
							</p>
						</div>
                    </div>
                
                  <div id="reviews" class="tab-pane fade">
					<div class="col-sm-5 col-lg-5 col-md-5">
						<div class="reviews-content-left">
							<h2>Customer Reviews</h2>
							<div class="review-ratting">
							<p><a href="#">Amazing</a> Review by Company</p>
							<table>
								<tbody><tr>
									<th>Price</th>
									<td>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
									</td>
								</tr>
								<tr>
									<th>Value</th>
									<td>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
									</td>
								</tr>
								<tr>
									<th>Quality</th>
									<td>
										<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
									</td>
								</tr>
							</tbody></table>
							<p class="author">
								Angela Mack<small> (Posted on 16/12/2015)</small>
							</p>
							</div>
							
							
							<div class="review-ratting">
							<p><a href="#">Good!!!!!</a> Review by Company</p>
							<table>
								<tbody><tr>
									<th>Price</th>
									<td>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
									</td>
								</tr>
								<tr>
									<th>Value</th>
									<td>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
									</td>
								</tr>
								<tr>
									<th>Quality</th>
									<td>
										<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
									</td>
								</tr>
							</tbody></table>
							<p class="author">
								Lifestyle<small> (Posted on 20/12/2015)</small>
							</p>
							</div>
							
							
							<div class="review-ratting">
							<p><a href="#">Excellent</a> Review by Company</p>
							<table>
								<tbody><tr>
									<th>Price</th>
									<td>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
									</td>
								</tr>
								<tr>
									<th>Value</th>
									<td>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
									</td>
								</tr>
								<tr>
									<th>Quality</th>
									<td>
										<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
									</td>
								</tr>
							</tbody></table>
							<p class="author">
								Jone Deo<small> (Posted on 25/12/2015)</small>
							</p>
							</div>
							
						</div>
					</div>
					<div class="col-sm-7 col-lg-7 col-md-7">
						<div class="reviews-content-right">
							<h2>Write Your Own Review</h2>
							<form>
								<h3>You're reviewing: <span>Donec Ac Tempus</span></h3>
								<h4>How do you rate this product?<em>*</em></h4>
								<div class="table-responsive reviews-table">
								<table>
									<tbody><tr>
										<th></th>
										<th>1 star</th>
										<th>2 stars</th>
										<th>3 stars</th>
										<th>4 stars</th>
										<th>5 stars</th>
									</tr>
									<tr>
										<td>Quality</td>
										<td><input type="radio"></td>
										<td><input type="radio"></td>
										<td><input type="radio"></td>
										<td><input type="radio"></td>
										<td><input type="radio"></td>
									</tr>
									<tr>
										<td>Price</td>
										<td><input type="radio"></td>
										<td><input type="radio"></td>
										<td><input type="radio"></td>
										<td><input type="radio"></td>
										<td><input type="radio"></td>
									</tr>
									<tr>
										<td>Value</td>
										<td><input type="radio"></td>
										<td><input type="radio"></td>
										<td><input type="radio"></td>
										<td><input type="radio"></td>
										<td><input type="radio"></td>
									</tr>
								</tbody></table></div>
								<div class="form-area">
									<div class="form-element">
										<label>Nickname <em>*</em></label>
										<input type="text">
									</div>
									<div class="form-element">
										<label>Summary of Your Review <em>*</em></label>
										<input type="text">
									</div>
									<div class="form-element">
										<label>Review <em>*</em></label>
										<textarea></textarea>
									</div>
									<div class="buttons-set">
										<button class="button submit" title="Submit Review" type="submit"><span><i class="fa fa-thumbs-up"></i> &nbsp;Review</span></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
            
                <div class="tab-pane fade" id="product_tags">
                  <div class="box-collateral box-tags">
                    <div class="tags">
                                
                        
                      <form id="addTagForm" action="#" method="get">
                        <div class="form-add-tags">

                          
                          <div class="input-box"><label for="productTagName">Add Your Tags:</label>
                            <input class="input-text" name="productTagName" id="productTagName" type="text">
                            <button type="button" title="Add Tags" class="button add-tags"><i class="fa fa-plus"></i> &nbsp;<span>Add Tags</span> </button>
                          </div>
                          <!--input-box--> 
                        </div>
                      </form>
                    </div>
                    <!--tags-->
                    <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                  </div>
                </div>
                <div class="tab-pane fade" id="custom_tabs">
                  <div class="product-tabs-content-inner clearfix">
                    <p><strong>Lorem Ipsum</strong><span>&nbsp;is
                      simply dummy text of the printing and typesetting industry. Lorem Ipsum
                      has been the industry's standard dummy text ever since the 1500s, when 
                      an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the 
                      leap into electronic typesetting, remaining essentially unchanged. It 
                      was popularised in the 1960s with the release of Letraset sheets 
                      containing Lorem Ipsum passages, and more recently with desktop 
                      publishing software like Aldus PageMaker including versions of Lorem 
                      Ipsum.</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
 
        </div>
        
		<aside class="right sidebar col-sm-3 col-xs-12">
			  <div class="block special-product">
				<div class="sidebar-bar-title">
				  <h3>Special Products</h3>
				</div>
				<div class="block-content">
				  <ul>
					<?php 
						foreach($special_product as $prod)
						{
					?>	
						<li class="item">
						  <div class="products-block-left"> <a target="_blank" href="<?php echo base_url();?>product/detail/<?php echo $prod->id_produk;?>" title="<?php echo $prod->nama_produk;?>" class="product-image"><img src="<?php echo $url_theme;?>images/produk/<?php echo $prod->thumbnail_produk;?>" alt="Sample Product "></a></div>
						  <div class="products-block-right">
							<p class="product-name"> <a target="_blank" href="<?php echo base_url();?>product/detail/<?php echo $prod->id_produk;?>"><?php echo $prod->nama_produk;?></a> </p>
							<span class="price">Rp <?php echo str_replace(",", ".", number_format($prod->harga_produk));?>,-  </span>
							<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
						  </div>
						</li>
					<?php 
						}
					?>	
				  </ul>
				  <a target="_blank" class="link-all" href="<?php echo base_url();?>product">All Products</a> </div>
			  </div>
			  
			  <div class="single-img-add sidebar-add-slider hidden">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>
				  
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
					<div class="item active"> <img src="<?php echo $url_theme;?>images/add-slide1.jpg" alt="slide1">
					  <div class="carousel-caption">
						<h3><a href="single_product.html" title=" Sample Product">Sale Up to 50% off</a></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<a href="#" class="info">shopping Now</a> </div>
					</div>
					<div class="item"> <img src="<?php echo $url_theme;?>images/add-slide1.jpg" alt="slide2">
					  <div class="carousel-caption">
						<h3><a href="single_product.html" title=" Sample Product">Smartwatch Collection</a></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<a href="#" class="info">All Collection</a> </div>
					</div>
					<div class="item"> <img src="<?php echo $url_theme;?>images/add-slide1.jpg" alt="slide3">
					  <div class="carousel-caption">
						<h3><a href="single_product.html" title=" Sample Product">Summer Sale</a></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					  </div>
					</div>
				  </div>
				  
				  <!-- Controls --> 
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
			  </div>
			  
			  <div class="block popular-tags-area hidden">
				<div class="sidebar-bar-title">
				  <h3>Popular Tags</h3>
				</div>
				<div class="tag ">
				  <ul>
					<li><a href="#">Boys</a></li>
					<li><a href="#">Camera</a></li>
					<li><a href="#">good</a></li>
					<li><a href="#">Computers</a></li>
					<li><a href="#">Phone</a></li>
					<li><a href="#">clothes</a></li>
					<li><a href="#">girl</a></li>
					<li><a href="#">shoes</a></li>
					<li><a href="#">women</a></li>
					<li><a href="#">accessoties</a></li>
					<li><a href="#">View All Tags</a></li>
				  </ul>
				</div>
			</div>
		</aside>
        
      </div>
    </div>
  </div>
  
  <!-- Main Container End --> 
  <!-- Related Product Slider -->
  
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="related-product-area">
          <div class="page-header">
            <h2>Related Products</h2>
          </div>
          <div class="related-products-pro">
            <div class="slider-items-products">
              <div id="related-product-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4">
				
				<?php 
					foreach($related_product as $prod)
					{
				?>	
                  <div class="product-item" style="height:400px">
                    <div class="item-inner">
                      <div class="product-thumb has-hover-img">
                        <figure> <a title="<?php echo $prod->nama_produk;?>" href="<?php echo base_url()."product/detail/".$prod->id_produk;?>"> <img style="height:250px;width:100%;overflow-y:hidden" class="first-img" src="<?php echo $url_theme;?>images/produk/<?php echo $prod->thumbnail_produk;?>" alt=""> <img style="height:250px;width:100%;overflow-y:hidden" class="hover-img" src="<?php echo $url_theme;?>images/produk/<?php echo $prod->thumbnail_produk;?>" alt=""> </a></figure>
                        <div class="pr-info-area animated animate6"><a href="quick_view.html" class="quick-view"><i class="fa fa-search"><span>Quick view</span></i></a> <a href="wishlist.html" class="wishlist"><i class="fa fa-heart"><span>Wishlist</span></i></a> <a href="compare.html" class="compare"><i class="fa fa-exchange"><span>Compare</span></i></a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="<?php echo $prod->nama_produk;?>" href="<?php echo base_url()."product/detail/".$prod->id_produk;?>"><?php echo $prod->nama_produk;?></a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> Rp <?php echo str_replace(",", ".", number_format($prod->harga_produk));?>,-  </span> </p>
                               </div>
                            </div>
                            <div class="pro-action">
                              <button type="button" onclick="add_cart_one('<?php echo $prod->id_produk;?>', '<?php echo $prod->nama_produk;?>', '<?php echo $prod->harga_produk;?>')" class="add-to-cart-mt"> <i class="fa fa-shopping-basket"></i><span> Add to Cart</span> </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
				<?php 
					}
				?>	
				
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Related Product Slider End --> 
  
  
<script>
	function ubah(srcnya)
	{
		document.getElementById("imgnya").src=srcnya;
	}


	function add_cart(id, name, price)
	{
		var count = $("#qty").val();
		$.ajax({

			type: "POST",
			url: '<?php echo site_url("cart/add_data_cart") ?>',
			cache: false,
			data: {id_produk: id, name: name, price:price, count:count}, // appears as $_GET['id'] @ your backend side
			success: function(data) {
		   
				alert("Berhasil Menambahkan Ke Keranjang !");
			}

		});
	  
	}
	
	function add_cart_one(id, name, price)
	{
		var count = 1;
		$.ajax({

			type: "POST",
			url: '<?php echo site_url("cart/add_data_cart") ?>',
			cache: false,
			data: {id_produk: id, name: name, price:price, count:count}, // appears as $_GET['id'] @ your backend side
			success: function(data) {
		   
				alert("Berhasil Menambahkan Ke Keranjang !");
			}

		});
	  
	}
	
	//belum bisa
	function add_wishlist(idcustomer, idproduk)
	{
		$.ajax({

			type: "POST",
			url: '<?php echo site_url("Home/add_wishlist") ?>',
			cache: false,
			data: {idcustomer: idcustomer, idproduk: idproduk}, // appears as $_GET['id'] @ your backend side
			success: function(data) {
				if(data == "true")
				{
					$("#produk"+idproduk).html("<i class='fa fa-minus-square'></i>Remove From wishlist");
					alert("Berhasil Menambahkan Produk ke Wishlist !");
				}
				else
				{
					alert("Berhasil Menghapus Produk dari Wishlist !");
					$("#produk"+idproduk).html("<i class='fa fa-plus-square'></i>Add to wishlist");
				}
					
			}

		});
	}
</script>
		