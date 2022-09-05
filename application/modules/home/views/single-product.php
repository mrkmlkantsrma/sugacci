<?php 
$CI =& get_instance();
$md= $CI->load->model('Home_Model');
$product = $CI->Home_Model->getSingleProduct($product_id);
$productGallary = $CI->Home_Model->getSingleProductGallary($product_id);
?> 

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
                <h3><?= $product['title']; ?></h3>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->
<!--product details start-->
<div class="product_details mt-100 mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div class="zoom-left">
                        <a href="#">
                            <img id="zoom1" src="<?= base_url('attachments/shop_images/');?><?php echo $product['image'];?>"
                                data-zoom-image="<?= base_url('attachments/shop_images/');?><?php echo $product['image'];?>" alt="big-1">
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <div>
                        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                        <?php foreach ($productGallary as $proGallary)  { ?>
                        <li>
                                <a href="#" class="elevatezoom-gallery active" data-update=""
                                    data-image="<?= base_url('attachments/shop_images/');?><?php echo $proGallary['image_name'];?>"
                                    data-zoom-image="<?= base_url('attachments/shop_images/');?><?php echo $proGallary['image_name'];?>">
                                    <img src="<?= base_url('attachments/shop_images/');?><?php echo $proGallary['image_name'];?>" alt="zo-th-1" width="100" />
                                </a>
                        </li>
                         <?php } ?>   
                           
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <form method="post" action="<?php echo base_url('home/HomeController/Cart/'.$product['id']); ?>">

                        <h1><?= $product['title']; ?></h1>
                        <input type="hidden" name="prod_name" id="prod_name" value="<?php echo $product['title'];?>" />
						<input type="hidden" name="prod_image" id="prod_image" value="<?php echo $product['image'];?>" />

                        <div class=" product_ratting">
                            <?php 
                            $rating = $product['rating'];
                            $star = 5 - $rating; ?>
                            <ul>
                                <?php for($i=0; $i < $rating; $i++){ ?>
                                    <li><a><i class="fa fa-star checked"></i></a></li>
                                <?php } ?>
                                <?php for($i=0; $i < $star; $i++){ ?>
                                    <li><a><i class="fa fa-star"></i></a></li>
                                <?php } ?>
                            
                            </ul>

                        </div>
                        

                        <div class="price_box">
                            <?php if($product['discount_price']){ ?> 
                                <span class="current_price">₹<?php echo $product['discount_price'];?></span>
                                <span class="old_price">₹<?php echo $product['price'];?></span>
                            <?php } else{ ?>
                                <span class="old_price">₹<?php echo $product['price'];?></span>
                            <?php } ?>

                        </div>
                        <div class="product_desc">
                            <p> <?= $product['basic_description'] ?> </p>
                        </div>
                      
                        <div class="product_variant quantity">
                            <label>quantity</label>
                            <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
							<input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
							<button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                            <input type="submit" class="button addToCart" name="submit" value="Add to Cart" title="Add to Cart" ></input>
                        </div>
                        <div class=" product_d_action">
                            <ul>
                                <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li>
                            </ul>
                        </div>
                        <!-- <div class="product_meta">
                            <span>Category: <a href="#">Clothing</a></span>
                        </div> -->

                    </form>
                    <div class="priduct_social">
                        <ul>
                            <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i>
                                    Like</a></li>
                            <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a>
                            </li>
                            <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i>
                                    save</a></li>
                            <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i>
                                    share</a></li>
                            <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i>
                                    linked</a></li>
                        </ul>
                    </div>
                   

                </div>
            </div>
        </div>
    </div>
</div>
<!--product details end-->


<!--product info start-->
<div class="product_d_info mb-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist" id="nav-tab">
                            <li>
                                <a class="active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info"
                                    aria-selected="false">Description</a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                    aria-selected="false">Specification</a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                    aria-selected="false">Reviews (1)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <p><?= $product['description'] ?></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                            <div class="product_d_table">
                                <form action="#">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="first_child">Top Note</td>
                                                <td>Sugacci</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Heart Note</td>
                                                <td>Mens</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Base Note</td>
                                                <td>Perfume</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                           
                        </div>

                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="reviews_wrapper">
                                <h2>Reviews for <?= $product['title']; ?></h2>
                                <div class="reviews_comment_box">
                                    <div class="comment_thmb">
                                        <img src="assets/img/blog/comment2.jpg" alt="">
                                    </div>
                                    <div class="comment_text">
                                        <div class="reviews_meta">
                                            <div class="star_rating">
                                                <?php 
                                                $rating = $product['rating'];
                                                $star = 5 - $rating; ?>
                                                <ul>
                                                    <?php for($i=0; $i < $rating; $i++){ ?>
                                                        <li><a><i class="fa fa-star checked"></i></a></li>
                                                    <?php } ?>
                                                    <?php for($i=0; $i < $star; $i++){ ?>
                                                        <li><a><i class="fa fa-star"></i></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                            <p><strong>admin </strong>- September 12, 2018</p>
                                            <span>roadthemes</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->

<!---- ---------------------->
			
<?php 
$Category = $product['shop_categorie'];
$RelatedProducts = $CI->Home_Model->getRelatedProducts($Category);

// $PopularProducts = $CI->Home_Model->getPopularProducts();

?>
    <!--product area start-->
    <section class="product_area related_products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Related Products </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product_carousel product_column4 owl-carousel">
                    <?php   foreach ($RelatedProducts as $PopularProduct) {?>
                        <div class="col-lg-3">
                            <div class="product_items">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="<?= base_url('home/HomeController/view_product/'.$PopularProduct['id']); ?>"><img src="<?= base_url('attachments/shop_images/');?><?php echo $PopularProduct['image'];?>" alt="<?php echo $PopularProduct['title'];?>"></a>
                                            <?php if($PopularProduct['discount_price']){ ?>
                                            <div class="label_product">
                                                <span class="label_sale">Sale</span>
                                            </div>
                                            <?php } ?>
                                            <div class="action_links">
                                                <ul>
                                                <li class="add_to_cart"  value="<?= $PopularProduct['id']?>"><a href="#" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                                    <li class="wishlist"  value="<?= $PopularProduct['id']?>"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                    <li class="quick_button" value="<?= $PopularProduct['id']?>"><a href="<?= $PopularProduct['id']?>" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"><i class="icon-eye" value="<?=$PopularProduct['id']?>" ></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="product_rating">
                                            <?php 
                                                $rating = $PopularProduct['rating'];
                                                $star = 5 - $rating; ?>
                                                <ul>
                                                    <?php for($i=0; $i < $rating; $i++){ ?>
                                                        <li><a><i class="fa fa-star checked"></i></a></li>
                                                    <?php } ?>
                                                    <?php for($i=0; $i < $star; $i++){ ?>
                                                        <li><a><i class="fa fa-star"></i></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="<?= base_url('home/HomeController/view_product/'.$PopularProduct['id']); ?>"><?php echo $PopularProduct['title'];?></a></h4>
                                            <div class="price_box">
                                            <?php if($PopularProduct['discount_price']){ ?> 
                                                <span class="current_price">₹<?php echo $PopularProduct['discount_price'];?></span>
                                                <span class="old_price">₹<?php echo $PopularProduct['price'];?></span>
                                            <?php } else{ ?>
                                                <span class="old_price">₹<?php echo $PopularProduct['price'];?></span>
                                            <?php } ?> 
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!--product area end-->

	
    <!--brand area start-->
    <div class="brand_area brand__three">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand1.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand3.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand4.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand5.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand6.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->
     <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-x"></i></span>
                </button>
                <div class="modal_body">
                    <!-- single detail popup data here from jQuery -->
                </div>
            </div>
        </div>
    </div>
    <!-- modal area end-->

   