
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>My Account</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            <button id="forgetClick">Forget Password ? Click here</button>
            <div class="account_form col-lg-6 col-md-6" id="forgetPassword">
                <form class="eb-form eb-mailform form-checkout" id="forgetPassword_form" action="" method ="post">
                    <p>
                        <label>Email address <span>*</span></label>
                        <input id="forgetemailcheck" type="email" name="email" data-constraints="@Email @Required" placeholder="E-Mail">
                    </p>
                    <div for="message" id="showforgetMessage"></div>
                    <div class="forget_submit">
                        <button class="btn_sugacci" id="ForgetPasswordSubmit">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- customer login end -->
    <?php } ?>

    <!-- my account start  -->
    <?php if($this->session->userdata('logged_in') && $this->session->userdata('logged_in_email')){ ?>
    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <?php if($this->session->userdata('logged_in') && $this->session->userdata('logged_in_email')){ ?>
                                 <li><a href="#account-details" data-bs-toggle="tab" class="nav-link active">Account details</a></li>
                                 <?php } ?>
                                <!-- <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Dashboard</a></li> -->
                                <li> <a href="#orders" data-bs-toggle="tab" class="nav-link">Orders</a></li>
                                <!-- <li><a href="#downloads" data-bs-toggle="tab" class="nav-link">Downloads</a></li> -->
                                <li><a href="#address" data-bs-toggle="tab" class="nav-link">Addresses</a></li>
                                <!-- <li><a href="#downloads" data-bs-toggle="tab" class="nav-link">Forgot Password</a></li> -->
                                <li><a href="home/HomeController/logout" class="nav-link">logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                        <?php if($this->session->userdata('logged_in') && $this->session->userdata('logged_in_email')){ ?>
                            <div class="tab-pane fade show active" id="account-details">
                                <h3>Account details </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <form id="FillUser_Details" action="" method ="post">
                                                <label>First Name</label>
                                                <input type="text" name="first-name" id="first-name" value="<?= $userData['firstname']; ?>">
                                                <label>Last Name</label>
                                                <input type="text" name="last-name" id="last-name" value="<?= $userData['lastname']; ?>">
                                                <label>Username</label>
                                                <input type="text" name="user-name" id="user-name" value="<?= $userData['username']; ?>" Readonly>
                                                <label>Email</label>
                                                <input type="text" name="email-name" id="email-name" value="<?= $userData['email']; ?>" Readonly>
                                                <input type="hidden" name="email" id="email" value="<?= $userData['email']; ?>" Readonly>
                                                <label>Phone</label>
                                                <input type="text" name="number" id="number" value="<?= $userData['number']; ?>">
                                                <div class="detailsbtn">
                                                    <button class="btn_sugacci" type="submit" id="FillUserDetails" >Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- <div class="tab-pane fade show active" id="dashboard">
                                <h3>Dashboard </h3>
                                <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent
                                        orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a
                                        href="#">Edit your password and account details.</a></p>
                            </div> -->
                            <div class="tab-pane fade" id="orders">
                                <h3>Orders</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>May 10, 2018</td>
                                                <td><span class="success">Completed</span></td>
                                                <td>$25.00 for 1 item </td>
                                                <td><a href="cart.html" class="view">view</a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>May 10, 2018</td>
                                                <td>Processing</td>
                                                <td>$17.00 for 1 item </td>
                                                <td><a href="cart.html" class="view">view</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <h4 class="billing-address">Billing address</h4>
                                <a href="#" class="view">Edit</a>
                                <p><strong>Bobby Jackson</strong></p>
                                <address>
                                    <span><strong>City:</strong> Seattle</span>,
                                    <br>
                                    <span><strong>State:</strong> Washington(WA)</span>,
                                    <br>
                                    <span><strong>ZIP:</strong> 98101</span>,
                                    <br>
                                    <span><strong>Country:</strong> USA</span>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <!-- my account end   -->