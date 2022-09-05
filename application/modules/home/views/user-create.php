
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Account</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php  $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $urlName = array_pop($uriSegments); ?>
    <!--breadcrumbs area end-->
    <?php if(!$this->session->userdata('logged_in') ) {?>
    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form class="eb-form eb-mailform form-checkout" id="login_form" action="" method ="post">
                            <input type="hidden" id="urlName" name="urlName" value="<?= $urlName; ?>">
                            <p>
                                <label>Email <span>*</span></label>
                                <input type="email" id="loginEmailcheck" name="email" data-constraints="@Email @Required" placeholder="E-Mail">
                            </p>
                            <p>
                                <label>Passwords <span>*</span></label>
                                <input type="password" id="loginPassword" name="password" data-constraints="@Required" placeholder="Password:">
                            </p>
                            <div for="message" id="showLoginMessage"></div>
                            <div class="login_submit">
                                <!-- <a href="#">Lost your password?</a>
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Remember me
                                </label> -->
                                <button class="btn_sugacci" id="loginSubmit" >login</button>

                            </div>

                        </form>
                    </div>
                </div>
                <!--login area start-->
             
                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form class="eb-form eb-mailform form-checkout" id="register_form" action="" method ="post">
                            <p>
                                <label>Email address <span>*</span></label>
                                <input id="emailcheck" type="email" name="email" data-constraints="@Email @Required" placeholder="E-Mail">
                            </p>
                            <p>
                                <label>Passwords <span>*</span></label>
                                <input id="RegisterPassword" type="text" name="password" data-constraints="@Required" placeholder="Password:">
                            </p>
                            <div for="message" id="showRegMessage"></div>
                            <div class="login_submit">
                                <button class="btn_sugacci" id="RegisterSubmit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
    <!-- customer login end -->
    <?php } ?>
