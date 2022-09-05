
1<style>
.deleteOuter {display: flex;gap:10px;}  
.deleteOuter .jqDeleteImage i {color: #fff;font-size: 12px;}
.jqDeleteImage {position: absolute;right: -3px;top: -6px;background: #000;font-size: 21px;border-radius: 50%;width: 16px;height: 16px;display: flex;align-items: center;justify-content: center;}
.jqImageContainer {position: relative;}
.delete-record {margin-bottom: 15px;}
.device_row { margin-bottom: 15px; }
.genderChoice { display: flex; margin: 0px 0px 0px 60px;}
.genderChoice .btn-check{ width: 20px; margin-right: 10px; margin-left: 10px;}
.genderChoice .btn-check .btn{ margin-right: 10px; margin-left: -10px;}
.ratingChoice { display: flex; margin: 0px 0px 0px 10px;}
.ratingChoice .btn-check{ width: 20px; margin-right: 10px; margin-left: 10px;}
.ratingChoice .btn-check .btn{ margin-right: 10px; margin-left: -10px;}
</style>
<link rel="stylesheet" href="<?= base_url('assets/admin/select2/dist/css/select2.min.css') ?>">
<script src="<?= base_url('assets/admin/ckeditor/ckeditor.js') ?>"></script>
<!--  Card body start Here -->
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Products</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"> Add product
                </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--  Add product section start -->
<section id="add-product">
<!--  Add product -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Add product</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
<!--  Card body Content Go Here -->
<?php
$timeNow = time();
if (validation_errors()) {
    ?>
    <hr>
        <div class="alert alert-danger"><?= validation_errors() ?></div>
    <hr>
    <?php
}
if ($this->session->flashdata('result_publish')) {
    ?>
    <hr>
        <div class="alert alert-success"><?= $this->session->flashdata('result_publish') ?></div>
    <hr>
    <?php
}
if ($this->session->flashdata('message'))
{
    ?>
    <hr>
        <div class="alert alert-danger"><?= $this->session->flashdata('message') ?></div>
    <hr>     
    <?php
}
?>
<form method="POST" action="" enctype="multipart/form-data">
<input type="hidden" name="translations" value="en">
<div class="form-group"> 
    <label>Product Name</label>
    <input type="text" name="title" value="<?php echo set_value('title');?>" class="form-control">
</div>

<div class="form-group"> 
    <label>Meta Title</label>
    <input type="text" name="meta_title" value="<?php echo set_value('meta_title');?>" class="form-control">
</div>

<div class="form-group"> 
    <label>Meta Tags</label>
    <textarea name="meta_tags" id="meta_tags" rows="2" class="form-control"></textarea>
</div>

<div class="form-group"> 
    <label>Product Basic Info & meta Description</label>
    <textarea name="basic_description" id="basic_description" rows="2" class="form-control"></textarea>
</div>

<div class="form-group"> 
    <label>Product Description</label>
    <textarea name="description" id="description" rows="10" class="form-control"></textarea>
</div>

<div class="form-group for-shop">
    <div class="row">
    <div class="col-md-6">
        <label>Price</label>
        <input type="text" name="price" placeholder="without currency at the end" value="<?php echo set_value('price');?>" class="form-control">
    </div>
    <div class="col-md-6">
    </div>
    </div>
</div>
<div class="form-group for-shop">
    <div class="row">
    <div class="col-md-6">
        <label>Discount Price</label>
        <input type="text" name="old_price" placeholder="without currency at the end" value="<?php echo set_value('old_price');?>" class="form-control">
    </div>
    <div class="col-md-6">
    </div>
    </div>
</div>


<div class="form-group bordered-group">
    <?php
    if (isset($_POST['image']) && $_POST['image'] != null) {
        $image = 'attachments/shop_images/' . htmlspecialchars($_POST['image']);
        if (!file_exists($image)) {
            $image = 'attachments/no-image.png';
        }
        ?>
        <p>Current Thumbnail image:</p>
        <div>
            <img src="<?= base_url($image) ?>" class="img-responsive img-thumbnail" style="max-width:300px; margin-bottom: 5px;">
        </div>
       
            <input type="hidden" name="image" value="<?= htmlspecialchars($_POST['image']) ?>">
            <?php
        
    }
    ?>
    <label for="userfile">Product Thumbnail Image</label>
    <input type="file" id="userfile" name="userfile">
</div>
<div class="form-group">
    <label> Add Roll Over Images </label>
    <div class="table-responsive">
        <table class="table table-bordered" id="dynamic_field_img">
            <tr>  
                <td> Image 1 <input type="file" name="gallery_image[]"  class="form-control name_list" /></td>  
                <td><button type="button" name="add" id="add_image" class="btn btn-success">Add More Image</button></td>  
            </tr>  
        </table>
        <p id="warningRollerMsg"></p>                         
    </div>              
</div> 
<!-- Category option start  -->

<div class="form-group for-shop">
    <div class="row">
        <div class="col-md-6">
        <label>Shop Category</label><br />
        <select class="selectpicker form-control show-tick show-menu-arrow" name="shop_categories">
            <?php foreach ($shop_categories as $shop_categorie) { ?>
                <option <?= isset($_POST['shop_categorie']) && $_POST['shop_categorie'] == $shop_categorie['id'] ? 'selected' : '' ?> value="<?= $shop_categorie['id'] ?>"><?= $shop_categorie['name'] ?></option>
            <?php } ?>
        </select>
        </div>
        <div class="col-md-6">
        <label>Gender</label><br />
            <div class="btn-group genderChoice" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="gender" id="btnradio1" value="male" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="btnradio1">Male</label>

                <input type="radio" class="btn-check" name="gender" id="btnradio2" value="female"  autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio2">Female</label>

                <input type="radio" class="btn-check" name="gender" id="btnradio3" value="both"  autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio3">Unisex</label>
            </div>
        </div>
    </div>
</div>

<div class="form-group for-shop">
    <div class="row">
        <div class="col-md-6">
            <label>Quantity</label>
            <input type="text" placeholder="number" name="quantity" value="<?= isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : '' ?>" class="form-control" id="quantity">
        </div>
        <div class="col-md-6">
            <label>Rating</label><br />
            <div class="btn-group ratingChoice" role="group" aria-label="Basic radio toggle button group" >
                <input type="radio" class="btn-check" name="rating" id="ratingradiobtn1" value="1" autocomplete="off">
                <label class="btn btn-outline-primary" for="ratingradiobtn1">1</label>

                <input type="radio" class="btn-check" name="rating" id="ratingradiobtn2" value="2"  autocomplete="off">
                <label class="btn btn-outline-primary" for="ratingradiobtn2">2</label>

                <input type="radio" class="btn-check" name="rating" id="ratingradiobtn3" value="3"  autocomplete="off">
                <label class="btn btn-outline-primary" for="ratingradiobtn3">3</label>

                <input type="radio" class="btn-check" name="rating" id="ratingradiobtn4" value="4"  autocomplete="off">
                <label class="btn btn-outline-primary" for="ratingradiobtn4">4</label>

                <input type="radio" class="btn-check" name="rating" id="ratingradiobtn5" value="5"  autocomplete="off" >
                <label class="btn btn-outline-primary" for="ratingradiobtn5">5</label>
            </div>
        </div>
    </div>
</div>
<div class="form-group for-shop">
    <div class="row">
        <div class="col-md-6">
            <label>Position/order</label>
            <input type="text" placeholder="Position number" name="position" value="<?= isset($_POST['position']) ? htmlspecialchars($_POST['position']) : '' ?>" class="form-control">
        </div>
        <div class="col-md-6">
        </div>
    </div>
</div>
    <button type="submit" name="submit" class="btn btn-lg btn-default btn-publish">Publish</button>
    <!-- btn-lg btn-default btn-publish -->
    <?php if ($this->uri->segment(3) !== null) { ?>
        <a href="<?= base_url('admin/furniture_products') ?>" class="btn btn-lg btn-default">Cancel</a>
    <?php } ?>
</form>

<!-- Modal Upload More Images -->
<div class="modal fade" id="modalMoreImages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Upload more images</h4>
            </div>
            <div class="modal-body">
                <form id="uploadImagesForm">
                    <input type="hidden" value="<?= isset($_POST['folder']) ? htmlspecialchars($_POST['folder']) : $timeNow ?>" name="folder">
                    <label for="others">Select images</label>
                    <input type="file" name="others[]" id="others" multiple />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default finish-upload">
                    <span class="finish-text">Finish</span>
                    <img src="<?= base_url('assets/admin/imgs/load.gif') ?>" class="loadUploadOthers" alt="">
                </button>
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
<!-- <script src="<? // = base_url('assets/admin/select2/dist/js/select2.min.js') ?>" type='text/javascript'></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->
<!-- <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script> -->
<script src="https://dev.hangarbot.com/resource/js/jquery.repeater.js"></script>
<script src="<? //= base_url('assets/admin/ckeditor/ckeditor.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/bootstrap-toggle.min.js') ?>"></script>

<script>

$(document).ready(function(){

        // Roll Images Drag Feature
            // $( function() {
            //     $( "#sortable" ).sortable();
            // } );            
        // End
        
        // Roll Images Reordering

            $(document).on('click', '#arrangedImg', function(){  
                
                var rowID = [];

                $('.reorderImg').each(function(){
                    rowID.push( $(this).attr('data-row_id') );
                })

                $.ajax({
                    url: `<?php echo base_url();?>ajax/reArrangeGalleryImage`,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        row_id : rowID,
                        gallery_type : "Furniture"
                    },
                    success: function(response) {
                        jsonResposne = JSON.parse(response);                
                    }            
                });
            });

        // End 
        
        var i=1;  
        $('#add_image').click(function(){  
            i++;                 
            if(i >= 7) { 
                $('#warningRollerMsg').html('<div class ="alert-rollover" style="display: inline-flex; margin-top: 10px;"><p style="color: #d9534f;border-color: #d43f3a;text-transform: uppercase;margin-left: 5px;">Notification:</p><span style="margin-left: 5px;">You have selected all Roll Over Images</span></div>');             
            }else{
                $('#dynamic_field_img').append('<tr id="row1'+i+'"><td> Image '+i+' <input type="file" name="gallery_image[]"  class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_img">X</button></td></tr>');             
            }         
        }); 

        // End
        
        $(document).on('click', '.btn_remove_img', function(){  
            var button_id = $(this).attr("id");   
            $('#row1'+button_id+'').remove();  
        }); 

        $(document).on('click', '.jqDeleteImage', function(){  
            var imageId = $(this).attr("data-imageId");   
            var obj = $(this);
            $.ajax({
                url: `<?php echo base_url();?>ajax/deleteProductGalleryImage`,
                type: 'post',
                data: {
                    imageId:imageId,
                    galleryType: 'Furniture'
                },
                success: function(response) {
                    jsonResposne = JSON.parse(response);
                    if( jsonResposne.status === true ){
                        obj.parent().remove();
                    }
                }            
            });
        });  

        $(document).on('click', '.deleteCat', function(){  
            if (confirm('Are You Sure?')){
                var productId = $(this).attr("productId");   
                var mCatId    = $(this).attr("mCatId"); 
                $.ajax({
                    url: `<?php echo base_url();?>admin/ecommerce/Furniture_Publish/deleteMCat/`,
                    type: 'post',
                    data: {
                        productId:productId,
                        mCatId:mCatId
                    },
                    success: function(data) {
                    if(data==false){
                        window.location.reload();
                    }
                    else{
                        alert('Delete Unsuccessfull');
                    }
                    }            
                });
            }
        });  

        $(document).on('click', '#dltRelatedProduct', function(){  
            if (confirm('Are You Sure?')){   
                $.ajax({
                    url: `<?php echo base_url();?>admin/ecommerce/Furniture_Publish/deleteRelatedProduct/`,
                    type: 'post',
                    data: {
                        'product_id' : <?= $id ?>
                    },
                    success: function(data) {
                        console.log(data);
                    if(data==false){
                        alert('Delete successfully');

                        $("#relatedProductSection").css("display: none;");
                        $("#relatedProductSection").hide();
                        
                    }
                    else{
                        alert('Delete Unsuccessfull');
                        }
                    }            
                });
            }
        });  

    }); 


if($('.report-repeater').length)
    {
        var  reportRepeater = $('.report-repeater').repeater({
            defaultValues: {
                'textarea-input': 'foo',
                'text-input': 'bar',
            },
            show: function () {
                $(this).slideDown();
              $('#relatedProductSection .select2-container').remove();
                $('select').select2({
                   width: '100%',
                    placeholder: "Choose Option",
                    allowClear: true
                });
            },
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this?')) {
                    $(this).slideUp(deleteElement);
                }
            }

        });
    }

    $(document).on('click', '#dltCustomerRelatedProduct', function(){  
            if (confirm('Are You Sure?')){   
                $.ajax({
                    url: `<?php echo base_url();?>admin/ecommerce/Furniture_Publish/deleteCustomerRelatedProduct/`,
                    type: 'post',
                    data: {
                        'product_id' : <?= $id ?>
                    },
                    success: function(data) {
                        console.log(data);
                    if(data==false){
                        window.location.reload();

                        $("#relatedProductSection").css("display: none;");
                        $("#relatedProductSection").hide();
                        
                    }
                    else{
                        alert('Delete Unsuccessfull');
                        }
                    }            
                });
            }
        }); 

     // Roll over Images Reapeter

     var i=1;  
        $('#add_related_btn').click(function(){  
            i++;    
            console.log(i);             
            if(i == 4 ) { 
                $('#warningRelatedProduct').html('<div class ="alert-relatedProduct" style="display: inline-flex; margin-top: 10px;"><p style="color: #d9534f;border-color: #d43f3a;text-transform: uppercase;margin-left: 5px;">Notification:</p><span style="margin-left: 5px;">You have Only add 4 Related products</span></div><br>');             
                $('#add_related_btn').hide();
            }        
        }); 
        $('#dlt_related_btn').click(function(){     
              $('#add_related_btn').show();      
        }); 
    
    // End
    
</script>

