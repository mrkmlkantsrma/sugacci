
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<h3>Checkout</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->
<!--Checkout page section-->
<?php if($cartItems){ ?>
<!-- <form method="post" id="checkoutForm" action="" > -->
<?php $attributes = array('id' => 'checkoutForm');
                echo form_open(uri_string(), $attributes); ?>
    <div class="Checkout_section  mt-100" id="accordion">
        <div class="container">
            <!-- <div class="row">
                <div class="col-12">
                    <div class="user-actions">
                        <h3>
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Returning customer?
                            <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login"
                                aria-expanded="true">Click here to login</a>
                        </h3>
                        <div id="checkout_login" class="collapse" data-parent="#accordion">
                            <div class="checkout_info">
                                <p>If you have shopped with us before, please enter your details in the boxes below. If
                                    you are a new customer please proceed to the Billing & Shipping section.</p>
                                <form action="#">
                                    <div class="form_group">
                                        <label>Username or email <span>*</span></label>
                                        <input type="text">
                                    </div>
                                    <div class="form_group">
                                        <label>Password <span>*</span></label>
                                        <input type="text">
                                    </div>
                                    <div class="form_group group_3 ">
                                        <button type="submit">Login</button>
                                        <label for="remember_box">
                                            <input id="remember_box" type="checkbox">
                                            <span> Remember me </span>
                                        </label>
                                    </div>
                                    <a href="#">Lost your password?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="user-actions">
                        <h3>
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Returning customer?
                            <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_coupon"
                                aria-expanded="true">Click here to enter your code</a>

                        </h3>
                        <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                            <div class="checkout_info coupon_info">
                                <form action="#">
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->


            
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h3>Billing Details</h3>
                        <div class="row">
                        <?php if($this->session->userdata('logged_in') || $this->session->userdata('logged_in_email')){ 
                           $username = $this->session->userdata('logged_in');
                           $email = $this->session->userdata('logged_in_email');
                           $data = array();
                           $data['username'] =  $this->session->userdata('logged_in');
                           $data['email'] =  $this->session->userdata('logged_in_email');
                           $CI =& get_instance();
                           $md = $CI->load->model('Home_Model');
                           $userDetail = $CI->Home_Model->GetUserDetailsByemailorUsername($data);   
                           $userData = $CI->Home_Model->getSingleCustomerDetails($userDetail['user']); ?>
                           <?php if($userData){ ?>
                            <!-- GetUserDetails -->
                            
                            <input type="hidden" name="user_id" id="user_id" value="<?= $userDetail['user']; ?>">
                                <div class="col-lg-6 mb-20">
                                    <label>First Name <span>*</span></label>
                                    <input type="text" name="first_name" value="<?= $userData['first_name']; ?>" data-constraints="@Required" placeholder="First Name">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Last Name <span>*</span></label>
                                    <input type="text" name="last_name" value="<?= $userData['last_name']; ?>" data-constraints="@Required" placeholder="Last Name">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Phone<span>*</span></label>
                                    <input type="text" name="billing_phone" value="<?= $userData['billing_phone']; ?>" data-constraints="@Numeric" placeholder="Phone">

                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label> Email Address <span>*</span></label>
                                    <input type="text" name="email" value="<?= $userData['email']; ?>" data-constraints="@Email @Required" placeholder="E-Mail">

                                </div>

                                <div class="col-12 mb-20">
                                    <label>Street address <span>*</span></label>
                                    <input placeholder="House number and street name"  value="<?= $userData['billing_address']; ?>" type="text" name="billing_address" data-constraints="@Required">
                                </div>
                               
                                <div class="col-12 mb-20">
                                    <label>Town / City <span>*</span></label>
                                    <input type="text" name="billing_city" value="<?= $userData['billing_city']; ?>" data-constraints="@Required" placeholder="City/Town">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>State / County <span>*</span></label>
                                    <input type="text" name="billing_state" value="<?= $userData['billing_state']; ?>" data-constraints="@Required" placeholder="State">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Post Code <span>*</span></label>
                                    <input type="text"name="billing_post_code" value="<?= $userData['billing_post_code']; ?>" data-constraints="@Required" placeholder="PostCode">
                                </div>
                                <div class="col-12 mb-20">
                                    <!-- <input id="account" type="checkbox" data-bs-target="createp_account" />
                                    <label for="account" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-controls="collapseOne">Create an account?</label> -->

                                    <!-- <div id="collapseOne" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                            <label> Account password <span>*</span></label>
                                            <input placeholder="password" type="password">
                                        </div>
                                    </div> -->
                                </div>

                                <div class="col-12 mb-20">
                                    <input id="address" type="checkbox" data-bs-target="createp_account" />
                                    <label class="righ_0" for="address" data-bs-toggle="collapse"
                                        data-bs-target="#collapsetwo" aria-controls="collapseOne">Ship to a different
                                        address?</label>

                                    <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                                        <div class="row">
                                            <div class="col-lg-6 mb-20">
                                                <label>Phone<span>*</span></label>
                                                <input type="text" name="shipping_phone" data-constraints="@Numeric" placeholder="Phone">

                                            </div>

                                            <div class="col-12 mb-20">
                                                <label>Street address <span>*</span></label>
                                                <input placeholder="House number and street name" type="text" name="shipping_address" data-constraints="@Required">
                                            </div>
                                           
                                            <div class="col-12 mb-20">
                                                <label>Town / City <span>*</span></label>
                                                <input type="text" name="shipping_city" data-constraints="@Required" placeholder="City/Town">
                                            </div>
                                            <div class="col-12 mb-20">
                                                <label>State / County <span>*</span></label>
                                                <input type="text" name="shipping_state" data-constraints="@Required" placeholder="State">
                                            </div>
                                            
                                            <div class="col-12 mb-20">
                                                <label>Post Code <span>*</span></label>
                                                <input type="text"name="shipping_post_code" data-constraints="@Required" placeholder="PostCode">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-12">
                                    <div class="order-notes">
                                        <label for="order_note">Order Notes</label>
                                        <textarea id="order_note"
                                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div> -->
                                <?php }else{ ?>
                                    <input type="hidden" name="user_id" id="user_id" value="<?= $userDetail['user']; ?>">
                                    <div class="col-lg-6 mb-20">
                                    <label>First Name <span>*</span></label>
                                    <input type="text"  name="first_name" data-constraints="@Required" placeholder="First Name">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Last Name <span>*</span></label>
                                    <input type="text" name="last_name" data-constraints="@Required" placeholder="Last Name">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Phone<span>*</span></label>
                                    <input type="text" name="billing_phone" data-constraints="@Numeric" placeholder="Phone">

                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label> Email Address <span>*</span></label>
                                    <input type="text" name="email" data-constraints="@Email @Required" placeholder="E-Mail">

                                </div>

                                <div class="col-12 mb-20">
                                    <label>Street address <span>*</span></label>
                                    <input placeholder="House number and street name" type="text" name="billing_address" data-constraints="@Required">
                                </div>
                               
                                <div class="col-12 mb-20">
                                    <label>Town / City <span>*</span></label>
                                    <input type="text" name="billing_city" data-constraints="@Required" placeholder="City/Town">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>State / County <span>*</span></label>
                                    <input type="text" name="billing_state" data-constraints="@Required" placeholder="State">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Post Code <span>*</span></label>
                                    <input type="text"name="billing_post_code" data-constraints="@Required" placeholder="PostCode">
                                </div>
                                <div class="col-12 mb-20">
                                    <!-- <input id="account" type="checkbox" data-bs-target="createp_account" />
                                    <label for="account" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-controls="collapseOne">Create an account?</label> -->

                                    <!-- <div id="collapseOne" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                            <label> Account password <span>*</span></label>
                                            <input placeholder="password" type="password">
                                        </div>
                                    </div> -->
                                </div>

                                <div class="col-12 mb-20">
                                    <input id="address" type="checkbox" data-bs-target="createp_account" />
                                    <label class="righ_0" for="address" data-bs-toggle="collapse"
                                        data-bs-target="#collapsetwo" aria-controls="collapseOne">Ship to a different
                                        address?</label>

                                    <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                                        <div class="row">
                                            <div class="col-lg-6 mb-20">
                                                <label>Phone<span>*</span></label>
                                                <input type="text" name="shipping_phone" data-constraints="@Numeric" placeholder="Phone">

                                            </div>

                                            <div class="col-12 mb-20">
                                                <label>Street address <span>*</span></label>
                                                <input placeholder="House number and street name" type="text" name="shipping_address" data-constraints="@Required">
                                            </div>
                                           
                                            <div class="col-12 mb-20">
                                                <label>Town / City <span>*</span></label>
                                                <input type="text" name="shipping_city" data-constraints="@Required" placeholder="City/Town">
                                            </div>
                                            <div class="col-12 mb-20">
                                                <label>State / County <span>*</span></label>
                                                <input type="text" name="shipping_state" data-constraints="@Required" placeholder="State">
                                            </div>
                                            
                                            <div class="col-12 mb-20">
                                                <label>Post Code <span>*</span></label>
                                                <input type="text"name="shipping_post_code" data-constraints="@Required" placeholder="PostCode">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-12">
                                    <div class="order-notes">
                                        <label for="order_note">Order Notes</label>
                                        <textarea id="order_note"
                                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div> -->
                               <?php } ?>
                        <?php }else{ ?>
                                <div class="col-lg-6 mb-20 mt-55">
                                <?php if(!$this->session->userdata('logged_in') ) {?>
                                <div class="checkout_btn">
                                    <a href="<?= base_url('usercreate'); ?>">Login / Register</a>
                                </div>
                                <?php } ?>
                                </div>

                    <?php } ?>
                               
                            </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                    
                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cartItems as $item) 
                        { ?>
                                        <tr>
                                            <td><?php echo $item['name'];?><strong> × <?php echo $item["qty"]; ?></strong></td>
                                            <td>₹<?php echo number_format($item['subtotal']);?></td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <td><?php echo '₹'.number_format($this->cart->total()).''; ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <th>Shipping</th>
                                            <td><strong>$5.00</strong></td>
                                        </tr> -->
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong><?php echo '₹'.number_format($this->cart->total()).''; ?></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment_methodtype">
                                <div class="panel-default">
                                    <input type="radio"
                                    name="payment_type" id="payment_type" value="razorpay" require/>
                                    <label for="payment">Pay with RozerPay</label>
                                </div>
                                <div class="panel-default mb-20">
                                    <input type="radio"
                                    name="payment_type" id="payment_type" value="cashOnDelivery" require  />
                                    <label for="payment">Cash On Delivery</label>
                                </div>
                                <div class="order_button">
                                    <button type="submit" name="submit" id="submitOrder">Place Order</button>
                                </div>
                                <i class="fa fa-spinner fa-spin jqSpinner" style="display: none;"></i>
                                <div class="col-md-12 ajaxResponse text-center" style="display:none"></div>
                            </div>
						</div>
					</div>
            </div>
        </div>
    </div>
    <!--Checkout page section end-->	
</div>
</form>

    <!-- modal area start-->
    <div class="modal fade" id="modal_RazorBox" tabindex="-1" role="dialog" aria-hidden="true">
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
<?php }
else{ ?>
    <div class="text-center mb-58 mt-57">
        <h3 class="text-center mb-30">No cart item found!</h3>
        <div class="checkout_btn text-center">
            <a href="<?= base_url("shop") ; ?>">Get Products</a>
        </div>
    </div>
<?php } ?>
<?php
if ($this->session->flashdata('deleted')) 
{  ?>
    <script>
        $(document).ready(function () {
            ShowNotificator('alert-info', '<?= $this->session->flashdata('deleted') ?>');
        });
    </script>
    <?php 
} ?>
<script>
    // Update item quantity
    function updateCartItem(obj, rowid)
    {
        $.get("<?php echo base_url('home/ShoppingCartPage/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
            if(resp == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
</script>