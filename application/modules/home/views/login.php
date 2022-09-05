
<!-- breadcrumb -->
<section class="main_breadcrumb">
	<div class="container-fluid">
		<div class="row">
			<div class="breadcrumb-content">
				<h2>login</h2>
			</div>
		</div>
	</div>
</section>
<div id="content" class="cart_page checkout_page register_page login_page">
<!-- cart -->
	<div id="register" class="cart_section checkout_section register_section">
		<div class="container-fluid" id="checkout">
				
			<div class="row billing_and_payment_option wow fadeInDown   animated">
				<div class="heading_wrapper wow fadeInDown animated">
					<h2 class="wow fadeInDown animated">Login your Account</h2>
					<p class="wow fadeInDown animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
				</div>
				<!-- Billing Address -->
				<div class="login_box">
					<h3>Login Your Account</h3>
						<form class="eb-form eb-mailform form-checkout" id="login_form" action="<?php echo base_url(); ?>home/HomeController/LoginUser" method ="post">
							<div class="form-wrap">
								<input class="form-input form-control"  type="email" id="loginEmailcheck" name="email" data-constraints="@Email @Required" placeholder="E-Mail">
							</div>
							<div class="form-wrap">
								<input class="form-input form-control" type="text" id="password" name="password" data-constraints="@Required" placeholder="Password:">
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="defaultUnchecked">
								<label class="custom-control-label register-remember" for="defaultUnchecked">Remember me on this device</label>
                            </div>
							<button type="submit" id="loginvalidation" class="btn ">Login</button>
							
							<p class="signInclass"> Dont Have an Account?  &nbsp;<a href="<?= base_url("register") ; ?>">Sign In</a> </p>
						
					</form>
					<div class="clear"></div>
				</div>
				<!-- Delivery Address  -->
			</div>
			<!-- your shopping cart -->
		</div>	
	</div>	
<!-- cart end-->	
</div>
