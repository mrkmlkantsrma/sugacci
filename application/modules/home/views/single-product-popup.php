<?php 
$CI =& get_instance();
$md= $CI->load->model('Home_Model');
?> 

<?php 
$product = $CI->Home_Model->getSingleProduct($product_id);
?>
<div class="container">
	<div class="row">
		<div class="col-lg-5 col-md-5 col-sm-12">
			<div class="modal_tab">
				<div class="tab-content product-details-large">
					<div class="tab-pane fade show active" id="tab1" role="tabpanel">
						<div class="modal_tab_img">
							<a href="#"><img src="<?= base_url('attachments/shop_images/');?><?php echo $product['image'];?>" alt=""></a>
						</div>
					</div>
				</div>
				<div class="modal_tab_button">
					<ul class="nav product_navactive owl-carousel" role="tablist">
						<li>
							<a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab"
								aria-controls="tab1" aria-selected="false"><img
									src="<?php echo base_url() ; ?>assets/img/product/product1.jpg" alt=""></a>
						</li>
						<li>
							<a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab"
								aria-controls="tab2" aria-selected="false"><img
									src="<?php echo base_url() ; ?>assets/img/product/product2.jpg" alt=""></a>
						</li>
						<li>
							<a class="nav-link button_three" data-bs-toggle="tab" href="#tab3"
								role="tab" aria-controls="tab3" aria-selected="false"><img
									src="<?php echo base_url() ; ?>assets/img/product/product3.jpg" alt=""></a>
						</li>
						<li>
							<a class="nav-link" data-bs-toggle="tab" href="#tab4" role="tab"
								aria-controls="tab4" aria-selected="false"><img
									src="<?php echo base_url() ; ?>assets/img/product/product8.jpg" alt=""></a>
						</li>

					</ul>
				</div>
			</div>
		</div>
		
		<div class="col-lg-7 col-md-7 col-sm-12">
			<div class="modal_right">
				<div class="modal_title mb-10">
					<h2><?= $product['title']; ?></h2>
				</div>
			
				<div class="modal_price mb-10">
				<?php if($product['discount_price']){ ?> 
					<span class="new_price">₹<?php echo $product['discount_price'];?></span>
					<span class="old_price">₹<?php echo $product['price'];?></span>
					<?php } else{ ?>
					<span class="old_price">₹<?php echo $product['price'];?></span>
				<?php } ?> 
				</div>
				<div class="modal_description mb-15">
					<p><?= $product['description']; ?></p>
				</div>
				<div class="variants_selects">
					<div class="modal_add_to_cart">
						
							<input min="1" max="100" step="1" value="1" type="hidden" >
							<input id="popupProduct" value="<?= $product_id; ?>" type="hidden">
							<button id="add_into_cart" class="cart_button button" onclick="addcartPopup()">add to cart</button>
						
					</div>
				</div>
				<div class="modal_social">
					<h2>Share this product</h2>
					<ul>
						<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
						<li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a>
						</li>
						<li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
var baseurl = $('#baseurl').val();
	function addcartPopup(){

    var product_id = $('#popupProduct').val();
    console.log(product_id)
    var href = $(this).attr('href');
    var url = baseurl+'home/HomeController/homepageCart/'+product_id;
    $.ajax({
        url: url,
        type: 'POST',
        data: {product_id: product_id},
        success: function(response){ 
            console.log(response);
			setTimeout(() => {
				$("#modal_box").fadeOut('600');
				$(".modal-content .close").trigger('click');
				document.body.scrollTop = 0; // For Safari
				document.documentElement.scrollTop = 0; 
			},400);
			setTimeout(() => {
				$(".mini_cart_wrapper > a").trigger('click');
				$(".mini_cart_close").hide();
			}, 1000);
			$("#mini_card #mini_cart").load(location.href + '#mini_card #mini_cart');

        }
    });
}
</script>