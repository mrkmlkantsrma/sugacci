<?php 
$CI =& get_instance();
$md= $CI->load->model('Home_Model');
?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<h3>Shop</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->
<?php 

$Allproducts = $CI->Home_Model->getAllProducts();
// echo "<pre>";
// print_r($Allproducts);
// echo "</pre>";

?>


<!--shop  area start-->
<div class="shop_area shop_fullwidth mt-100 mb-100">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!--shop wrapper start-->
				<div class="row shop_wrapper grid_4">
					<!--1 -->
					<?php foreach ($Allproducts as $Product) {  ?> 
					<!--1 -->
					<div class="col-lg-3 col-md-4 col-12 ">
						<article class="single_product">
							<figure>
								<div class="product_thumb">
									<a class="primary_img" href="<?= base_url('home/HomeController/view_product/'.$Product['id']); ?>"><img src="<?= base_url('attachments/shop_images/');?><?php echo $Product['image'];?>" alt="<?php echo $Product['title'];?>"></a>
									<?php if($Product['discount_price']){ ?>
									<div class="label_product">
										<span class="label_sale">Sale</span>
									</div>
									<?php } ?>
									<div class="action_links">
										<ul>
											<li class="add_to_cart"  value="<?= $Product['id']?>"><a href="#" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
											<li class="wishlist"  value="<?= $Product['id']?>"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
											<li class="quick_button" value="<?= $Product['id']?>"><a href="<?= $Product['id']?>" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"><i class="icon-eye" value="<?=$Product['id']?>" ></i></a></li>
										</ul>
									</div>
								</div>
								<figcaption class="product_content">
									<div class="product_rating">
										<?php 
										$rating = $Product['rating'];
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
									<h4 class="product_name"><a href="<?= base_url('home/HomeController/view_product/'.$Product['id']); ?>"><?php echo $Product['title'];?></a></h4>
									<div class="price_box">
									<?php if($Product['discount_price']){ ?> 
										<span class="current_price">₹<?php echo $Product['discount_price'];?></span>
										<span class="old_price">₹<?php echo $Product['price'];?></span>
									<?php } else{ ?>
										<span class="old_price">₹<?php echo $Product['price'];?></span>
									<?php } ?> 
									</div>
								</figcaption>
							</figure>
						</article>
					</div>
					<?php } ?>
				</div>
				<!--shop toolbar end-->
				<!--shop wrapper end-->
			</div>
		</div>
	</div>
</div>
<!--shop  area end-->
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
