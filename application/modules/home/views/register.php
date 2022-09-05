
<!-- breadcrumb -->
<section class="main_breadcrumb">
	<div class="container-fluid">
		<div class="row">
			<div class="breadcrumb-content">
				<h2>register</h2>
			</div>
		</div>
	</div>
</section>
<div id="content" class="cart_page checkout_page register_page">
<!-- cart -->
	<div id="register" class="cart_section checkout_section register_section">
		<div class="container-fluid" id="checkout">
				
			<div class="row billing_and_payment_option wow fadeInDown   animated">
				<div class="heading_wrapper wow fadeInDown animated">
					<h2 class="wow fadeInDown animated">Registration</h2>
					<p class="wow fadeInDown animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
				</div>
				<!-- Billing Address -->
				<div class="col-sm-6 col-lg-6">
					<div class="login_box">
					<h3>Create Your Account</h3>
					<form class="eb-form eb-mailform form-checkout" id="register_form" action="<?php echo base_url();?>home/HomeController/RegisterUser" method ="post">
						<!-- <form class="eb-form eb-mailform form-checkout" novalidate="novalidate"> -->
							<div class="form-wrap has-error">
								<input class="form-input form-control" id="frname" type="text" name="firstname" data-constraints="@Required" placeholder="First Name">	
							</div>
							<div class="form-wrap has-error">
								<input class="form-input form-control" id="srname" type="text" name="lastname" data-constraints="@Required" placeholder="Last Name">
							</div>
							<div class="form-wrap has-error">
								<input class="form-input form-control" id="uname" type="text" name="username" data-constraints="@Required" placeholder="UserName">
							</div>
							<div class="form-wrap">
								<input class="form-input form-control" id="emailcheck" type="email" name="email" data-constraints="@Email @Required" placeholder="E-Mail">
							</div>
							<div class="form-wrap">
								<input class="form-input form-control" id="password" type="text" name="password" data-constraints="@Required" placeholder="Password:">
							</div>
							<div class="form-wrap">
								<input class="form-input form-control" id="number" type="text" name="number" data-constraints="@Numeric" placeholder="Phone Number">
							</div>
							<div class="form-wrap">
								<input class="form-input form-control" type="hidden" id="user_type" name="user_type" value="customer" disable hidden>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="defaultUnchecked">
								<label class="custom-control-label register-remember" for="defaultUnchecked">Remember me on this device</label>
                            </div>
							
							<button type="submit" id="submitvalidation" class="btn ">Register</button>
							
							<p class="signInclass"> Already have an account? &nbsp;<a href="<?= base_url("login") ; ?>">Sign In</a> </p>
						
					</form>
					</div>
				</div>
				<!-- Delivery Address  -->
				<div class="col-sm-6 col-lg-6  wow fadeInDown   animated registration">
					<h3>Benefit of Registration</h3>
					 <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum</p>
					 
					 <ul>
						<li><i class="fa fa-check"></i> If you are going to use a passage of Lorem Ipsum</li>
						<li><i class="fa fa-check"></i> All the Lorem Ipsum generators on the Internet tend</li>
						<li><i class="fa fa-check"></i> The standard chunk of Lorem Ipsum used since the 1500s</li>
						<li><i class="fa fa-check"></i> a Latin professor at Hampden-Sydney College in Virginia</li>
						<li><i class="fa fa-check"></i> It is a long established fact that a reader </li>
					 </ul>
				</div>
			</div>
			<!-- your shopping cart -->
		</div>	
	</div>	
<!-- cart end-->	
</div>
