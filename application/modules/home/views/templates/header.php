<!doctype html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sugacci</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ; ?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/css/font.awesome.css">
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/css/slinky.menu.css">
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/css/plugins.css">
    <link rel="stylesheet" href="<?php echo base_url() ; ?>assets/css/style.css">
	<?php echo modules::run( $this->router->fetch_class().'/load_style'); ?>
</head>
<body>
<input type="hidden" id="baseurl" name="baseurl" value="<?php echo base_url(); ?>" />
    <!--header area start-->
    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">
    </div>
    <div class="offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                    </div>
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="icon-x"></i></a>
                        </div>
                        <div class="welcome-text">
                            <p>Free Delivery: Powered By Sugacci</p>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="<?php echo base_url() ; ?>">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">For Him</a>
                                            <ul class="sub-menu">
                                                <li><a href="<?= base_url("shop") ; ?>"><img src="<?= base_url() ; ?>assets/img/bg/Him-Category.jpg" alt=""></a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">For Her</a>
                                            <ul class="sub-menu">
                                                <li><a href="<?= base_url("shop") ; ?>"><img src="<?= base_url() ; ?>assets/img/bg/Her-Category.jpg" alt=""></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="<?= base_url("aboutus") ; ?>">about Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="<?= base_url("why-sugacci") ; ?>">why sugacci</a>
                                </li>
                                <!-- <li class="menu-item-has-children">
                                    <a href="<? // = base_url("blog") ; ?>">blog</a>
                                </li> -->
                                <li class="menu-item-has-children">
                                    <a href="<?= base_url("contact") ; ?>"> Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--offcanvas menu area end-->
    <header>
        <div class="main_header header_five">
            <div class="header_top">
                <div class="col-lg-12 col-md-12">
                    <div class="sale-header">
                        <div class="sale-box">
                            <div class="box box--1">
                                <div class="line">
                                    <span>Limited period offer 50% OFF. Hurry up!</span>
                                    <span>Limited period offer 50% OFF. Hurry up!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_middle header_middle5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 col-4">
                            <div class="logo">
                                <a href="<?php echo base_url() ; ?>"><img src="<?php echo base_url() ; ?>assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-6 colm_none">
                            <!--main menu start-->
                            <div class="main_menu menu_position">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="<?php echo base_url() ; ?>">home</a></li>
                                        <li class="mega_items"><a href="<?= base_url("shop") ; ?>">shop<i class="fa fa-angle-down"></i></a>
                                            <div class="mega_menu">
                                                <ul class="mega_menu_inner">
                                                    <li><a href="">For Him</a>
                                                        <ul>
                                                            <li> <a href="<?= base_url("shop") ; ?>"><img src="<?= base_url() ; ?>assets/img/bg/Him-Category.jpg" alt=""></a>
                                                         </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">For Her</a>
                                                        <ul>
                                                            <li>
                                                            <a href="<?= base_url("shop") ; ?>"><img src="<?= base_url() ; ?>assets/img/bg/Her-Category.jpg" alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><a href="<?= base_url("aboutus") ; ?>">About Us</a></li>
                                        <li><a href="<?= base_url("why-sugacci") ; ?>">why sugacci</a></li>
                                        <!-- <li><a href="<? // = base_url("blog") ; ?>">blog</a></li> -->
                                        <li><a href="<?= base_url("contact") ; ?>"> Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!--main menu end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="header_account_area header_account5">
                                <div class="header_account-list top_links">
                                    <a href="#"><i class="icon-users"></i></a>
                                    <ul class="dropdown_links">
                                        <li><a href="<?= base_url("checkout") ; ?>">Checkout </a></li>
                                        <li><a href="<?= base_url("account") ; ?>">My Account </a></li>
                                        <li><a href="<?= base_url("cart") ; ?>">Shopping Cart</a></li>
                                        <li><a href="<?= base_url("wishlist") ; ?>">Wishlist</a></li>
                                    </ul>
                                </div>
                                <div class="header_account-list header_wishlist">
                                    <a href="<?= base_url("wishlist") ; ?>"><i class="icon-heart"></i></a>
                                </div>
                            <!--mini cart START-->
                                <?php $cartItems = $this->cart->contents();
                                $rows = count($cartItems); ?>
                                <div class="header_account-list  mini_cart_wrapper" id="mini_card">
                                    <a href="javascript:void(0)"><i class="icon-shopping-bag"></i><span class="item_count"><?= $rows; ?></span></a>
                                    <!--mini cart-->
                                    <div id="mini_cart" class="mini_cart">
                                        <div class="cart_gallery" >
                                            <div class="cart_close">
                                                <div class="cart_text">
                                                    <h3>cart</h3>
                                                </div>
                                                <div class="mini_cart_close">
                                                    <a href="javascript:void(0)"><i class="icon-x"></i></a>
                                                </div>
                                            </div>
                                            <?php if($cartItems){ 
                                            foreach ($cartItems as $item) { ?>
                                                    <div class="cart_item">
                                                        <div class="cart_img">
                                                            <a href="<?= base_url('home/HomeController/view_product/'.$item['id']); ?>"><img src="<?= base_url('attachments/shop_images/');?><?php echo $item['image'];?>" alt=""></a>
                                                        </div>
                                                        <div class="cart_info">
                                                            <a href="<?= base_url('home/HomeController/view_product/'.$item['id']); ?>"><?php echo $item['name'];?></a>
                                                            <p><?=$item['qty'] ;?> x <span> ₹<?php echo number_format($item['price']);?></span></p>
                                                        </div>
                                                        <div class="cart_remove">
                                                            <a href="<?php echo base_url('home/ShoppingCartPage/removeItem/'.$item['rowid']); ?>"><i class="icon-x"></i></a>
                                                        </div>
                                                    </div>
                                            <?php } } ?>
                                        </div>
                                        <?php if($cartItems){ ?>
                                        <div class="mini_cart_table">
                                            <div class="cart_table_border">
                                                <div class="cart_total">
                                                    <span>Sub total:</span>
                                                    <span class="price"><?php echo '₹'.number_format($this->cart->total()).''; ?></span>
                                                </div>
                                                <div class="cart_total mt-10">
                                                    <span>total:</span>
                                                    <span class="price"><?php echo '₹'.number_format($this->cart->total()).''; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_footer">
                                            <div class="cart_button">
                                                <a href="<?= base_url('cart'); ?>"><i class="fa fa-shopping-cart"></i> View cart</a>
                                            </div>
                                            <div class="cart_button">
                                                <a class="active" href="<?= base_url('checkout'); ?>"><i class="fa fa-sign-in"></i>
                                                    Checkout</a>
                                            </div>
                                        </div>
                                        <?php } else{?>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="welcome_lukani_thumb">
                                                    <img src="<?php echo base_url() ; ?>assets/img/bg/empty-Cart.jpg" alt="">
                                                </div>
                                            </div>
                                         <div class="cart_button">
                                            <a class="active" onclick="return" href="<?php echo base_url('shop') ; ?>" disabled><i class="fa fa-shopping-cart"></i> No item in Cart</a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <!--mini cart end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
 <!--header area end-->