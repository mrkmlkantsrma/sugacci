
    <!--footer area start-->
    <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widgets_container contact_us">
                            <h3>Opening Time</h3>
                            <p><span>Mon - Fri:</span> 8AM - 10PM</p>
                            <p><span>Sat - Suns:</span> 9AM-8PM</p>
                            <p><b>We Work All The Holidays</b></p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Information</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="<?= base_url("checkout") ; ?>">About Us</a></li>
                                    <li><a href="<?= base_url("account") ; ?>">My Account</a></li>
                                    <li><a href="<?= base_url("contact") ; ?>">Contact</a></li>
                                    <li><a href="<?= base_url("why-sugacci/#faq_content") ; ?>">Frequently Questions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <div class="widgets_container widget_app">
                            <div class="footer_logo">
                                <a href="<?php echo base_url() ; ?>"><img src="<?php echo base_url() ; ?>assets/img/logo/logo.png" alt=""></a>
                            </div>
                            <div class="footer_social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Shopping</h3>
                            <div class="footer_menu">
                                <ul>
                                    <!-- <li><a href="<? // = base_url("blog") ; ?>">Blog</a></li> -->
                                    <li><a href="<?= base_url("wishlist") ; ?>">Wishlist</a></li>
                                    <li><a href="<?= base_url("cart") ; ?>">Shopping cart</a></li>
                                    <li><a href="<?= base_url("checkout") ; ?>">Checkout</a></li>
                                    <li><a href="<?= base_url("shop") ; ?>">Shop</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Customer Service</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="<?= base_url("term-of-use") ; ?>">Terms of use</a></li>
                                    <li><a href="<?= base_url("privacy-policy") ; ?>">Privacy Policy</a></li>
                                    <li><a href="<?= base_url("returns") ; ?>">Returns</a></li>
                                    <li><a href="<?= base_url("shipping-policy") ; ?>">Shipping Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="copyright_area">
                            <p class="copyright-text">&copy; 2022 <a href="<?php echo base_url() ; ?>">Sugacci</a>. Powered <i class="fa fa-heart text-danger"></i> by <a href="https://sugacci.com/" target="_blank"> Sugacci </a> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->
    
    <!--newsletter popup start-->
<div class="newletter-popup">
    <div id="myModal" class="modal fade">
	<div class="modal-dialog modal-newsletter">
		<div class="modal-content">
        <form id="subscribeForm" method="post">
				<div class="modal-header">
					<div class="icon-box mx-auto">						
						<i class="fa fa-envelope-open-o"></i>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
				</div>
				<div class="modal-body text-center">
					<h4>Subscribe to our newsletter</h4>	
					<p>Join our subscribers list to get the latest news, updates and special offers delivered directly in your inbox.</p>
					<div class="input-group">
                        <input type="email" id="subscribeEmail" name="subscribeEmail" class="form-control" placeholder="Enter your email" required>
						<div class="input-group-append">
                        <input type="button" class="btn btn-primary" value="Subscribe"  id="subscribeBtn">
						</div>
					</div>
				</div>
			</form>			
            <div class="subscriptionFormNotices form-notices"></div>
		</div>
	</div>
</div>
</div>

    <!--newsletter popup end-->
    <script src="<?php echo base_url() ; ?>assets/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url() ; ?>assets/js/popper.js"></script>
    <script src="<?php echo base_url() ; ?>assets/js/swiper.min.js"></script>
    <script src="<?php echo base_url() ; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ; ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() ; ?>assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url() ; ?>assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url() ; ?>assets/js/jquery.countdown.js"></script>
    <script src="<?php echo base_url() ; ?>assets/js/jquery.ui.js"></script>
    <script src="<?php echo base_url() ; ?>assets/js/jquery.elevatezoom.js"></script>
    <script src="<?php echo base_url() ; ?>assets/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url() ; ?>assets/js/slinky.menu.js"></script>
    <script src="<?php echo base_url() ; ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url() ; ?>assets/js/main.js"></script>
    <script src="<?php echo base_url() ; ?>assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <?php $method_name = strtolower($this->router->fetch_method());
    if($method_name == 'account' || $method_name == 'checkout'){ 
	    echo modules::run( $this->router->fetch_class().'/load_script'); 
    } ?>
</body>
</html>