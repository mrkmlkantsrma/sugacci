<script src="<?= base_url('assets/admin/ckeditor/ckeditor.js') ?>"></script>
<!--  Card body start Here -->
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Instagram</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"> Add instagram Posts
                </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--  Add instagram section start -->
<section id="add-instagram">
<!--  Add instagram -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Add Insta Post</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
<!--  Card body Content Go Here -->
<div class="row">
    <div class="col-sm-8 col-md-7">
        <?php if (validation_errors()) { ?>
            <hr>
            <div class="alert alert-danger"><?= validation_errors() ?></div>
            <hr>
        <?php }
        ?>
        <?php if ($this->session->flashdata('result_publish')) { ?>
            <hr>
            <div class="alert alert-danger"><?= $this->session->flashdata('result_publish'); ?></div>
            <hr>
        <?php }
        ?>
        <form method="POST" enctype="multipart/form-data">
            
                <div class="form-group"> 
                    <label>Post Url </label>
                    <input type="text" name="insta_url" value="<?php echo set_value('insta_url');?>" class="form-control">
                </div>
                <div class="form-group bordered-group">
                <?php
                    if (isset($_POST['image']) && $_POST['image'] != null) {
                        $image = 'attachments/instagram_images/' . htmlspecialchars($_POST['image']);
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
                    <label for="userfile">Instagram Post Thumbnail Image</label>
                    <input type="file" id="userfile" name="userfile">
                </div>
            <button type="submit" name="submit" class="btn btn-default">Publish</button>
            <?php if ($id > 0) { ?>
                <a href="<?= base_url('admin/instagram') ?>" class="btn btn-info">Cancel</a>
            <?php } ?>
        </form>
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