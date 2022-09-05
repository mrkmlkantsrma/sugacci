
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
					<h3>Thank you</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->
<?php 
$orderId = $this->session->userdata('order');
if($orderId){
	$order = $CI->Home_Model->getSingleOrder($orderId);
	$orderItems = $CI->Home_Model->getOrderItems($orderId);
	?>
	<!--sugacci about start-->
	<div class="blog_details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="blog_wrapper blog_wrapper_details">
                    <article>
                        <figure>
                            <div class="blog_thumb">
                                <a href="#"><img src="<?php echo base_url() ; ?>assets/img/bg/bkg_top_vogue2.png" alt=""></a>
                            </div>
                        </figure>
                    </article>
					<div class="thankyou_sugacci">
						<div class="container">
							<div class="thankyou_container ">
								<div class="row">
									<div class="col-lg-12 col-md-12 mt-50">
										<h3 class="text-center mb-4">Order Details</h3>
										<div class="table_desc">
											<div class="cart_page table-responsive">
												<table>
													<thead>
														<tr>
															<th class="product_name">Product</th>
															<th class="product-price">Price</th>
															<th class="product_quantity">Quantity</th>
															<th class="product_total">SubTotal</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($orderItems as $orderItem){ ?>
														<tr>
															<td class="product_name"><?= $orderItem['product_name']; ?></td>

															<td class="product-price">₹<?= $orderItem['regular_price']; ?></td>

															<td class="product_quantity"><?= $orderItem['qty']; ?></td>

															<td class="product_total">₹<?= $orderItem['total_price']; ?></td>


														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="container thankyouAddress">
						<div class="row">
							<div class="col-lg-3 col-md-3">
								<div class="comments_box">
									<h3>Address</h3>
									<div class="comment_list">
										<div class="comment_content">
											<div class="comment_meta">
												<h5><a href="#">Name</a></h5>
											</div>
											<p><?= $order['first_name']; ?><?= $order['last_name']; ?></p>
										</div>
									</div>
									<div class="comment_list">
										<div class="comment_content">
											<div class="comment_meta">
												<h5><a href="#">Phone</a></h5>
											</div>
											<p><?= $order['billing_phone']; ?></p>
										</div>
									</div>
									<div class="comment_list">
										<div class="comment_content">
											<div class="comment_meta">
												<h5><a href="#">Email</a></h5>
											</div>
											<p><?= $order['email']; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-3">
								<div class="comments_box">
									<h3></br></h3>
									<div class="comment_list">
										<div class="comment_content">
											<div class="comment_meta">
												<h5><a href="#">Address</a></h5>
											</div>
											<p><?= $order['billing_address']; ?> , <?= $order['billing_city']; ?> , <?= $order['billing_state']; ?><?= $order['billing_post_code']; ?></p>
										</div>
									</div>
									<div class="comment_list">
										<div class="comment_content">
											<div class="comment_meta">
												<h5><a href="#">Payment Type</a></h5>
											</div>
											<p><?= $order['payment_type']; ?></p>
										</div>
									</div>
									<div class="comment_list">
										<div class="comment_content">
											<div class="comment_meta">
												<h5><a href="#">Date</a></h5>
											</div>
											<p>01-01-01</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="comments_box">
								<h3>Order Details</h3>
								<div class="comment_list mt-40 ">
										<div class="comment_content text-center">
											<div class="comment_meta mt-10 mb-4">
												<h5><a href="#">Payment Type</a></h5>
												<p><?= $order['payment_type']; ?></p>
											</div>
											<div class="comment_meta mt-10 mb-4">
												<h5><a href="#">Payment Status</a></h5>
												<p><?= $order['payment_status']; ?></p>
											</div>
											<div class="comment_meta mt-10 mb-4">
												<h5><a href="#">Transaction Id</a></h5>
												<p><?= $order['payment_status']; ?></p>
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
</div>


	<!--sugacci about end-->
<?php }else{ ?>
	<div class="text-center mb-58 mt-57">
        <h3 class="text-center mb-30">No order item found!</h3>
        <div class="checkout_btn text-center">
            <a href="<?= base_url("shop") ; ?>">Get Products</a>
        </div>
    </div>
<?php }
$now = time();
if($now > $_SESSION['expire']){
	$this->session->unset_userdata('order'); 
}
$this->cart->destroy();
?>
