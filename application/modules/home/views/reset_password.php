<?php 
    $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $auth_number = array_pop($uriSegments);
    if($auth_number){
        if($auth == $auth_number){
    ?>
    <!-- customer reset start -->
    <div class="customer_reset">
        <div class="container">
            <div class="row">
                <!--reset area start-->
                <div class="col-lg-3 col-md-3">
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>Reset Password</h2>
                        <form class="eb-form eb-mailform form-checkout" id="resetPassword_form" action="" method ="post">
                            <p>
                                <label>Create new Password <span>*</span></label>
                                <input type="hidden" class="form-control" id="email" value="<?= $email; ?>" />
                                <input type="password" id="password" name="password" data-constraints="@Required" placeholder="Password:">
                            </p>
                            <div for="message" id="showresetMessage"></div>
                            <div class="reset_submit">
                                <button class="btn_sugacci" id="resetPasswordSubmit" >Create</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                </div>
                <!--reset area start-->
            </div>
        </div>
    </div>
    <!-- customer reset end -->
    <?php }
else { ?>
    <div class="customer_reset">
    <div class="container">
       <p><label>Link Expired</label></p>               
        </div>
    </div>
</div>
<?php }
 } ?>
