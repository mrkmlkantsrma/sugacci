<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container" id="success-order">
    <div class="body">
        <div class="mission">
            <h2>Payment Received</h2>
            <div class="row">
                <div class="col-md-7 text-right" style="margin-left: -27px;">
                    <h4>Order confirmation number :</h4>
                </div>
                <div class="col-md-5 text-left" style=" margin-left: -18px;"> 
                    <h5><?php echo $transcationId; ?></h5>
                </div>
            </div>
        </div>
        <div class="mission">
            <h2>Shipping & Billing Details</h2>
        </div>
            <div class="row payment_details">
                <div class="col-md-12 client-details">
                    <h3>Customer Detail</h3>
                    <div class="box">
                        <label>Name :</label>
                        <p id="firstNameInput" style="display: inline;"><?php echo $userDetails['first_name'];?>&nbsp;<?php echo $userDetails['last_name']; ?></p>
                    </div>
                    <div class="box">
                        <label>Email Address :</label>
                        <p id="emailAddressInput"  style="display: inline;"><?php echo $userDetails['email']; ?></p>
                    </div>
                    <div class="box">                 
                        <label>Company :</label>
                        <p id="company"  style="display: inline;"><?php echo $userDetails['company']; ?></p>
                    </div>                    
                </div>
                <div class="col-md-12">
                    <div class="col-md-6 billing-address">
                        <h3>Billing Address</h3>
                        <p id="billing_address" style="margin-left: -15px;"><?php if($userDetails['billing_address']) echo $userDetails['billing_address']; ?><br><?php if($userDetails['billing_city']) echo $userDetails['billing_city'].' ,'; ?>  <?php if($userDetails['billing_state']) echo $userDetails['billing_state']; ?> <br> <?php if($userDetails['billing_post_code']) echo $userDetails['billing_post_code'].' ,'; ?> USA <br>  <?php if($userDetails['billing_phone']) echo $userDetails['billing_phone']; ?></p>
                    </div>
                    <div class="col-md-6 shipping_address">
                        <h3>Shipping Address</h3>
                        <p id="shipping_address" style="margin-left: -15px;"><?php if($userDetails['shipping_address']) echo $userDetails['shipping_address']; ?><br><?php if($userDetails['shipping_city']) echo $userDetails['shipping_city'].' ,'; ?> <?php if($userDetails['shipping_state']) echo $userDetails['shipping_state']; ?> <br> <?php if($userDetails['shipping_post_code']) echo $userDetails['shipping_post_code'].' ,'; ?> USA <br>  <?php if($userDetails['shipping_phone']) echo $userDetails['shipping_phone']; ?></p>
                    </div>
                </div>   
            </div>
            <div class="table-responsive " style="margin-top:10px; padding:0px 0px 0px 0px!important; margin-bottom:0px">
                <table class="table table-orders payment-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th> 
                            <th>Total</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php foreach ($orderDataitems as $item) { ?>
                        <tr> 
                            <td class="text-right"><a href="#"><?php echo $item['name'];?> ( <small><?php  if( $item['var_design']!=""){ echo "<strong>Design: </strong>"; echo $item['var_design']; }?></small>  <small><?php if( $item['var_color']!=""){ echo "<strong>Color: </strong>"; echo $item['var_color']; } ?></small>)</a></td>
                            <td class="text-right"> $<?php echo number_format($item['price']);?></td>
                            <td class="text-right"><?php echo $item["qty"]; ?></td>                               
                            <td class="text-right">$<?php echo number_format($item['subtotal']);?></td>
                        </tr>
                    <?php } ?>
                        <tr style="border-top:1px solid #39b4c4; padding-top:20px">
                            <td></td>
                            <td></td>
                            <td><strong>Order Total</strong></td>
                            <td class="text-right"><?php echo '$'.number_format($this->cart->total()).''; ?></td>
                            <td></td>
                        </tr>
                </tbody>
            </table>
        </div>  
    </div>  
</div>
<script type="text/javascript">
    $(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.history.go());
        };
    });
</script>
<style>
    .col-md-6.billing-address h3 { margin-left: -17px;margin-top: 5px;}
    .col-md-6.shipping_address h3 { margin-left: -17px;margin-top: 5px;}
    .col-md-6.shipping_address {padding-left: 35px;}
    .col-md-12.client-details {border-bottom: 1px solid #39b4c4; padding-bottom: 16px;margin-bottom: 16px;}
    .col-md-6.billing-address { border-right: 1px solid #39b4c4;}
    .card {background-color: #fff;border: 1px solid #39b4c4 ;position: relative; margin-bottom: 40px;}
    .l-bg-cherry { background: #fff; padding: 20px 40px 20px 40px;}
    .card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {font-size: 140px;}
    .card .card-statistic-3 .card-icon {text-align: center; line-height: 10px;margin-left: 15px;color: #fff;position: absolute;right: -5px;top: 20px;opacity: 0.1;}
    #success-order{ border: 1px solid #39b4c4;padding: 5px 15px 2px 13px;margin-bottom: 40px;margin-top: 40px;}
    #success-order .body{padding: 20px 50px 20px 50px;}
    .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 0px solid #ddd;}
    .full_total tr td{width:20%;text-align:center;}
    .table>thead>tr>th {vertical-align: bottom;border-bottom: 1px solid #ddd;padding-bottom: 10px;text-align:center;}
    .table>tbody>tr>td{text-align:center;padding-top: 20px;padding-bottom: 20px;}
    .table-orders thead{background: #39b4c4;color: #fff;}
    .table.user-details tbody tr td{text-align:left;padding: 8px;}
    .table.user-details tbody tr th{text-align:left;color: #39b4c4;}
    .mission h5 {margin-top: 13px;}
    #btnContactUs {border-radius: 0;color: #39b4c4;background-color: #fff!important;border: 1px solid #fff;padding: 10px 0px;font-size: 15px;  }
    .about-contact p{text-align: left;padding: 15px 0px;}
    .about-contact p a{color:#39b4c4;}
    #muqty{padding: 6px 30px;border: 1px solid #39b4c4;margin-right: 5px;width:90px;text-align:center;margin: 0 auto;}
    .payment-table thead th{position: relative;z-index: 9;}
    .payment-table thead {position: relative;}
    .payment-table thead::after {
    background: #3ab4c4;content: ''; position: absolute; right: 0;width: 100%; padding: 10px; font-size: 0;height: 40px;top: 0;}
    .go-order, #shopping-cart .go-checkout {float: none;}
    .panel-default>.panel-heading {color: #333;background-color: #fff; border: 0px;}
    .panel-title{float:left;padding:10px;}
    .same{width: 50%;float: left;margin-top: 20px;text-align: right;}
    .panel-default {border-color: #ddd;border: 0px;box-shadow:0 0px 0px rgb(0 0 0 / 5%)!important;}
    .panel-body {padding: 15px 0px;}
    #btnContactUs { border-radius: 0;color: #39b4c4;background-color: #fff!important;border: 1px solid #fff;padding: 10px 0px;font-size: 15px;}
    #payment-form{margin-top:-23px;margin-left:-15px;margin-right:-15px;}
    .payment_details label{font-size: 15px;font-weight: 600;letter-spacing: 0.5px;}
    .payment_details .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {opacity: 1;font-size: 16px;height: 45px;padding: 12px 12px!important;color: #000!important;background-color: #fff!important;border: 1px solid #39b4c4!important;border-radius: 0px!important;}
    .payment_details html input[disabled] {height: 50px;}
</style>



