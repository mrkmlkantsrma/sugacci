
    <?php 
    $CI =& get_instance();
    $md= $CI->load->model('Home_Model');
    ?>
    <!--slider area start-->
    <section class="slider_section">
        <div class="slider_area owl-carousel">
            <div class="single_slider d-flex align-items-center" data-bgimg="<?php echo base_url() ; ?>assets/img/slider/3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h1>BIG SALE</h1>
                                <p>Discount <span>20% Off </span> For Sugacci Members </p>
                                <a class="button" href="<?= base_url("shop") ; ?>">Discover Now </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="<?php echo base_url() ; ?>assets/img/slider/2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h1>TOP SALE</h1>
                                <p>Discount <span>20% Off </span> For Sugacci Members </p>
                                <a class="button" href="<?= base_url("shop") ; ?>">Discover Now </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="<?php echo base_url() ; ?>assets/img/slider/1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider_content">
                                <h1>Lovely Perfumes </h1>
                                <p>Discount <span>20% Off </span> For Sugacci Members </p>
                                <a class="button" href="<?= base_url("shop") ; ?>">Discover Now </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->
    <!--sugacci about start-->
    <div class="about_sugacci">
        <div class="container">
            <div class="about_container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="about_thumb">
                            <a href="<?= base_url("aboutus") ; ?>"><img src="<?php echo base_url() ; ?>assets/img/bg/sugacci-about.webp" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="about_sugacci_content">
                            <div class="about_header">
                                <h3>Welcome to Sugacci store</h3>
                                <h2>Sugacci History</h2>
                            </div>
                            <div class="about_desc">
                                <p>Commodo sociosqu venenatis cras dolor sagittis integer luctus sem primis eget
                                    maecenas
                                    sedurna malesuada consectetuer.</p>
                                <p>Ornare integer commodo mauris et ligula purus, praesent cubilia laboriosam viverra.
                                    Mattis id rhoncus. Integer lacus eu volutpat fusce. Elit etiam phasellus suscipit
                                    suscipit dapibus,
                                    condimentum tempor quis, turpis luctus dolor sapien vivamus.</p>
                            </div>
                            <div class="about_footer">
                                <img src="<?php echo base_url() ; ?>assets/img/bg/signature.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--sugacci about end-->
    <!--shipping area start-->
    <div class="shipping_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="<?php echo base_url() ; ?>assets/img/about/shipping1.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Free Delivery</h3>
                            <p>Free shipping around the world for all <br> orders over $120</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping col_2">
                        <div class="shipping_icone">
                            <img src="<?php echo base_url() ; ?>assets/img/about/shipping2.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Safe Payment</h3>
                            <p>With our payment gateway, don’t worry <br> about your information</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping col_3">
                        <div class="shipping_icone">
                            <img src="<?php echo base_url() ; ?>assets/img/about/shipping3.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Friendly Services</h3>
                            <p>You have 30-day return guarantee for <br> every single order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--shipping area end-->
    <!--Men/Women area start-->
    <div class="category_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="<?= base_url("shop") ; ?>"><img src="<?php echo base_url() ; ?>assets/img/bg/Him-Category.jpg" alt=""></a>
                            <div class="banner_content">
                                <h3>Men's Products</h3>
                                <h2>Perfume <br> For Men's</h2>
                                <a class="btn_sugacci" href="<?= base_url("shop") ; ?>">Shop Now</a>
                            </div>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-6 col-md-6">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="<?= base_url("shop") ; ?>"><img src="<?php echo base_url() ; ?>assets/img/bg/Her-Category.jpg" alt=""></a>
                            <div class="banner_content">
                                <h3>Women's Products</h3>
                                <h2>Perfume <br> For Women's</h2>
                                <a class="btn_sugacci" href="<?= base_url("shop") ; ?>">Shop Now</a>
                            </div>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->
    <!--product area One start-->
    <?php 
    $PopularProducts = $CI->Home_Model->getPopularProducts();
    ?>
    <div class="product_area_one  mb-95">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>Our Products</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="popularProducts" role="tabpanel">
                    <div class="row">
                        <div class="product_carousel product_column4 owl-carousel">
                            <?php   foreach ($PopularProducts as $PopularProduct) {?>
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
                                                        <li class="wishlist"  value="<?= $PopularProduct['id']?>"><a href="<?= base_url('wishlist'); ?>" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
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
            </div>
        </div>
    </div>
    <!--product area One end-->
    <!--Today Deal area start-->
    <?php 
    $Deals = $CI->Home_Model->getDeals();
    if($Deals) {

    ?>
    <div class="product_deal_area product_deals ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Today Deals</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($Deals as $deal){ ?>
    <div class="banner_fullwidth" style="background-image: url(<?= base_url('attachments/deal_images/');?><?php echo $deal['image'];?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_fullwidth_content">
                        <h3>Amazing From Sugacci</h3>
                        <h2><?= $deal['title']; ?></h2>
                        <p>Discount <?= $deal['discount']; ?>% Off For Sugacci Members</p>
                        <div class="product_timing">
                            <?php $date = str_replace("-","/",$deal['end_date']);?>
                            <div data-countdown="<?= $date; ?>"></div>
                        </div>
                        <a href="<?= $deal['product']; ?>">Discover Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <?php } ?>
    <?php } ?>
    <!--Today Deal area start-->
    <!--testimonial area start-->
    <?php 
    $Youtubes = $CI->Home_Model->getYoutubes();
    ?>
    <?php if($Youtubes){?>
    <div class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>What Our Customers Says ?</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="customers-testimonials" class="owl-carousel">
                    <?php foreach ($Youtubes as $Youtube) {?>
                        <div class="item">
                            <div class="shadow-effect">
                                <iframe src="<?= $Youtube['youtube_url']; ?>" title="<?= $Youtube['youtube_title']; ?>" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div> 
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>                       
    <!--testimonial area end-->
    <!--blog area start-->
    <?php 
    //$Blogs = $CI->Home_Model->getBlogs();
    ?>
    <!-- <section class="blog_section blogs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Our Latest Posts</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog_carousel blog_column3 owl-carousel">
                <?php // foreach ($Blogs as $Blog) {?>
                    <div class="col-lg-3">
                        <article class="single_blog">
                            <figure>
                                <div class="blog_thumb">
                                    <a href="<? // = base_url('blog-details'); ?>"><img src="<? // = base_url('attachments/blog_images/');?><?php // echo $Blog['image'];?>" alt=""></a>
                                </div>
                                <figcaption class="blog_content">
                                    <h4 class="post_title"><a href="#"><?php // echo $Blog['name'];?></a></h4>
                                    <div class="articles_date">
                                        <p>By <span><?php // echo $Blog['author'];?> / July 16, 2021</span></p>
                                    </div>
                                    <p class="post_desc"><?php // echo substr_replace($Testimonial['description'], " ...", 150); ?></p>
                                        <a class="btn_sugacci" href="<? // = base_url('blog-details'); ?>">Read More</a>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <?php // } ?>
                </div>
            </div>
        </div>
    </section> -->
    <!--blog area end-->
    <?php 
    $Instagrams = $CI->Home_Model->getInstagrams();
    ?>
    <!--instagram area start-->
    <?php if($Instagrams){?>
    <div class="instagram_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Our Instagram</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="instagram_carousel instagram_column4 owl-carousel">
                <?php foreach ($Instagrams as $Instagram) {?>
                    <div class="col-lg-3">
                        <article class="single_instagallary">
                            <figure>
                                <div class="insta_thumb">
                                    <a href="<?= $Instagram['insta_url']; ?>" target="_blank"><img src="<?= base_url('attachments/instagram_images/');?><?php echo $Instagram['image'];?>" alt=""></a>
                                </div>
                            </figure>
                        </article>
                    </div>

                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!--instagram area end-->

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