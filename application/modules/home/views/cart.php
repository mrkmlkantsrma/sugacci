
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<h3>Cart</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->
<!--shopping cart area start -->
<?php if ($cartItems) 
        { ?>
<div class="shopping_cart_area mt-100">
    <div class="container">
        <form action="#">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
										<th class="product_remove">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cartItems as $item) 
                        { ?>
                                    <tr>
                                       
                                        <td class="product_thumb"><a href="<?= base_url('home/HomeController/view_product/'.$item['id']); ?>"><img
                                                    src="<?= base_url('attachments/shop_images/');?><?php echo $item['image'];?>" alt=""></a></td>
                                        <td class="product_name"><a href="<?= base_url('home/HomeController/view_product/'.$item['id']); ?>"><?php echo $item['name'];?></a></td>
                                        <td class="product-price">₹<?php echo number_format($item['price']);?></td>
                                        <td class="product_quantity"><label>Quantity</label> <input class="form-input stepper-input" type="number" data-zeros="true" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item['rowid']; ?>')" min="1" max="1000"></td>
                                        <td class="product_total">₹<?php echo number_format($item['subtotal']);?></td>
										<td class="product_remove"><a onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo base_url('home/ShoppingCartPage/removeItem/'.$item['rowid']); ?>':false;" ><i class="fa fa-trash-o"></i></a>
                                        </td>


                                    </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="cart_submit">
                            <button type="submit">update cart</button>
                        </div> -->
                    </div>
                </div>
            </div>
            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">
                                <p>Enter your coupon code if you have one.</p>
                                <input placeholder="Coupon code" type="text">
                                <button type="submit">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount"><?php echo '₹'.number_format($this->cart->total()).''; ?></p>
                                </div>
                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount"><?php echo '₹'.number_format($this->cart->total()).''; ?></p>
                                </div>
                                <?php if(!$this->session->userdata('logged_in') ) {?>
                                <div class="checkout_btn">
                                    <a href="<?= base_url('usercreate'); ?>">Proceed to Checkout</a>
                                </div>
                                <?php }else{ ?>
                                <div class="checkout_btn">
                                    <a href="<?= base_url('checkout'); ?>">Proceed to Checkout</a>
                                </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
        </form>
    </div>
</div>
<?php }
else{ ?>
    <div class="text-center mb-58 mt-57">
        <h3 class="text-center mb-30">No product found!</h3>
        <div class="checkout_btn text-center">
            <a href="<?= base_url("shop") ; ?>">Get Products</a>
</div>
    </div>
<?php } ?>	
</div>

<?php
if ($this->session->flashdata('deleted')) 
{  ?>
    <script>
        $(document).ready(function () {
            ShowNotificator('alert-info', '<?= $this->session->flashdata('deleted') ?>');
        });
    </script>
    <?php 
} ?>
<script>
    // Update item quantity
    function updateCartItem(obj, rowid)
    {
        $.get("<?php echo base_url('home/ShoppingCartPage/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
            if(resp == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
</script>
