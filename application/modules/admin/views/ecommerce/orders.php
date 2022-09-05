<link href="<?= base_url('assets/css/bootstrap-toggle.min.css') ?>" rel="stylesheet">

<!--  Card body start Here -->
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Orders</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"> Orders
                </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--  Orders section start -->
<section id="Orderst">
<!--  Orders -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Orders</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0"> 
                            <?php if (!isset($_GET['settings'])) { ?>
                            <li><a href="?settings" >Settings</a></li>
                            <?php } else { ?>
                            <li><a href="<?= base_url('admin/orders') ?>">Back</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                <div class="card-content collapse show">
            <div class="card-body">
<!--  Card body Content Go Here -->
<div>
</div>
<hr>
<hr>
<?php
if(validation_errors()) 
{ ?>
    <hr>
        <div class="alert alert-danger"><?= validation_errors() ?></div>
    <hr>
    <?php
}
if($this->session->flashdata('result_delete'))
{ ?>
    <hr>
        <div class="alert alert-success"><?= $this->session->flashdata('result_delete') ?></div>
    <hr>
    <?php
}

if (!isset($_GET['settings'])) {
    if (!empty($orders)) {
        ?>
        <div style="margin-bottom:10px;">
            <select class="selectpicker changeOrder">
                <option <?= isset($_GET['order_by']) && $_GET['order_by'] == 'id' ? 'selected' : '' ?> value="id">Order by new</option>
                <option <?= (isset($_GET['order_by']) && $_GET['order_by'] == 'payment_status') || !isset($_GET['order_by']) ? 'selected' : '' ?> value="payment_status">Order by not payment_status</option>
            </select>
        </div>
        <div class="table-responsive">
            <table class="table table-condensed table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Shipping Phone</th>
                        <th class="text-center">Status</th>
                        <!-- <th class="text-center">Preview</th> -->
                        <th class="text-center">Order View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            

                    foreach ($orders as $tr) {
                        
                        if ($tr['payment_status'] == 'cashOnDelivery') {
                            $class = 'bg-danger';
                            $type = 'No payment_status';
                        }

                        if ($tr['payment_status'] == 'cashOnDelivery') {
                            $class = 'bg-success';
                            $type = 'payment_status';
                        }

                        if ($tr['payment_status'] == 'cashOnDelivery') {
                            $class = 'bg-warning';
                            $type = 'Rejected';
                        }
                        ?>
                        <tr>
                            <td class="relative" id="order_id-id-<?= $tr['order_id'] ?>">
                                # <?= $tr['order_id'] ?>
                                <?php if ($tr['payment_status'] == 'cashOnDelivery') { ?>
                                    <div id="new-order-alert-<?= $tr['id'] ?>">
                                        <!-- <img src="<?= base_url('assets/imgs/new-blinking.gif') ?>" style="width:100px;" alt="blinking"> -->
                                    </div>
                                <?php } ?>

                                <div class="confirm-result">
                                    <?php if ($tr['payment_status'] == 'cashOnDelivery') { ?>
                                        <span class="label label-success">Confirmed by email</span>
                                    <?php } else { ?> 
                                        <span class="label label-danger">Not Confirmed</span> 
                                    <?php } ?>
                                </div>
                            </td>

                            <td><?= date('d.M.Y / H:i:s', $tr['date']); ?></td>

                            <td>
                                <i class="fa fa-user" aria-hidden="true"></i> 
                                <?= $tr['first_name'] . ' ' . $tr['last_name'] ?>
                            </td>

                            <td><i class="fa fa-phone" aria-hidden="true"></i> <?= $tr['billing_phone'] ?></td>

                            <td class="text-center" data-action-id="<?= $tr['id'] ?>">
                                <div class="status" style="padding:5px; font-size:16px;">
                                    <!-- -- <b><? // = $type ?></b> -- -->
                                </div>
                                <div style="margin-bottom:4px;"><a href="javascript:void(0);" onclick="changeOrdersOrderStatus(<?= $tr['id'] ?>, 1, '<?= htmlentities($tr['products']) ?>', '<?= $tr['email'] ?>')" class="btn btn-success btn-xs">payment_status</a></div>
                                <div style="margin-bottom:4px;"><a href="javascript:void(0);" onclick="changeOrdersOrderStatus(<?= $tr['id'] ?>, 0)" class="btn btn-danger btn-xs">No payment_status</a></div>
                                <div style="margin-bottom:4px;"><a href="javascript:void(0);" onclick="changeOrdersOrderStatus(<?= $tr['id'] ?>, 2)" class="btn btn-warning btn-xs">Rejected</a></div>
                            </td>

                            <!-- <td class="text-center">
                                <a href="javascript:void(0);" class="btn btn-default more-info" data-toggle="modal" data-target="#modalPreviewMoreInfo" style="margin-top:10%;" data-more-info="<?= $tr['order_id'] ?>">
                                    More Info 
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                </a>
                            </td> -->

                            <td class="hidden" id="order-id-<?= $tr['order_id'] ?>">
                                <div class="table-responsive">
                                    <table class="table more-info-purchase">
                                        <tbody>
                                            <tr>
                                                <td><b>Email</b></td>
                                                <td><a href="mailto:<?= $tr['email'] ?>"><?= $tr['email'] ?></a></td>
                                            </tr>

                                            <tr>
                                                <td><b>Shipping Address</b></td>
                                                <td><?= $tr['shipping_address'] ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>Shipping City</b></td>
                                                <td><?= $tr['shipping_city'] ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>Shipping State</b></td>
                                                <td><?= $tr['shipping_state'] ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>Shipping Postcode</b></td>
                                                <td><?= $tr['shipping_post_code'] ?></td>
                                            </tr>

                                           
                                            
                                            <tr>
                                                <td><b>Payment Type</b></td>
                                                <td><?= $tr['payment_type'] ?></td>
                                            </tr>

                                           

                                            <tr>
                                                <td colspan="2"><b>Products</b></td>
                                            </tr>

                                           
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                            <td class="text-center" ><a type="button" style="margin-top:10px;" class="btn btn-primary" href="<?= base_url('admin/ecommerce/orders/singleOrder_View/' . $tr['id']) ?>"><i class="fa fa-eye" aria-hidden="true"></i> View</a></td>
                        </tr>
                        <?php 
                    } ?>
                </tbody>
            </table>
        </div>
        <? //= $links_pagination ?>
        <?php 
    } 
    else 
    { ?>
        <div class="alert alert-info">No orders to the moment!</div>
        <?php 
    }
    ?>        
    <hr>
    <?php
}

if (isset($_GET['settings'])) 
{ ?>
    <h3>Cash On Delivery</h3>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Change visibility of this purchase option</div>
                <div class="panel-body">
                    <?php if ($this->session->flashdata('cashondelivery_visibility')) { ?>
                        <div class="alert alert-info"><?= $this->session->flashdata('cashondelivery_visibility') ?></div>
                    <?php } ?>

                    <form method="POST" action="">
                        <input type="hidden" name="cashondelivery_visibility" value="<?= $cashondelivery_visibility ?>">
                        <input <?= $cashondelivery_visibility == 1 ? 'checked' : '' ?> data-toggle="toggle" data-for-field="cashondelivery_visibility" class="toggle-changer" type="checkbox">
                        <button class="btn btn-default" value="" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h3>Paypal Account Settings</h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Paypal sandbox mode (use for paypal account tests)</div>
                <div class="panel-body">
                    <?php if ($this->session->flashdata('paypal_sandbox')) { ?>
                        <div class="alert alert-info"><?= $this->session->flashdata('paypal_sandbox') ?></div>
                    <?php } ?>
                    <form method="POST" action="">
                        <input type="hidden" name="paypal_sandbox" value="<?= $paypal_sandbox ?>">
                        <input <?= $paypal_sandbox == 1 ? 'checked' : '' ?> data-toggle="toggle" data-for-field="paypal_sandbox" class="toggle-changer" type="checkbox">
                        <button class="btn btn-default" value="" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Paypal business email</div>
                <div class="panel-body">

                    <?php if ($this->session->flashdata('paypal_email')) { ?>
                        <div class="alert alert-info"><?= $this->session->flashdata('paypal_email') ?></div>
                    <?php } ?>

                    <form method="POST" action="">
                        <div class="input-group">
                            <input class="form-control" placeholder="Leave empty for no paypal available method" name="paypal_email" value="<?= $paypal_email ?>" type="text">
                            <span class="input-group-btn">
                                <button class="btn btn-default" value="" type="submit">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
    <hr>
    <h3>Bank Account Settings</h3>
    <div class="row">
        <div class="col-sm-6">
            <?php if ($this->session->flashdata('bank_account')) { ?>
                <div class="alert alert-info"><?= $this->session->flashdata('bank_account') ?></div>
            <?php } ?>
            <form method="POST" action="">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td colspan="2"><b>Pay to - Recipient name/ltd</b></td>
                            </tr>

                            <tr>
                                <td colspan="2"><input type="text" name="name" value="<?= $bank_account != null ? $bank_account['name'] : '' ?>" class="form-control" placeholder="Example: BoxingTeam Ltd."></td>
                            </tr>

                            <tr>
                                <td><b>IBAN</b></td>
                                <td><b>BIC</b></td>
                            </tr>

                            <tr>
                                <td><input type="text" class="form-control" value="<?= $bank_account != null ? $bank_account['iban'] : '' ?>" name="iban" placeholder="Example: BG11FIBB329291923912301230"></td>
                                <td><input type="text" class="form-control" value="<?= $bank_account != null ? $bank_account['bic'] : '' ?>" name="bic" placeholder="Example: FIBBGSF"></td>
                            </tr>

                            <tr>
                                <td colspan="2"><b>Bank</b></td>
                            </tr>

                            <tr>
                                <td colspan="2"><input type="text" value="<?= $bank_account != null ? $bank_account['bank'] : '' ?>" name="bank" class="form-control" placeholder="Example: First Investment Bank"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <input type="submit" class="form-control" value="Save Bank Account Settings">
            </form>
        </div>
    </div>
    <?php 
} ?>

<!-- Modal for more info buttons in orders -->
<div class="modal fade" id="modalPreviewMoreInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Preview <b id="client-name"></b></h4>
            </div>
            <div class="modal-body" id="preview-info-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--  Card body footer start Here -->
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!--  Card body footer End Here --> 
<script src="<?= base_url('assets/js/bootstrap-toggle.min.js') ?>"></script>

