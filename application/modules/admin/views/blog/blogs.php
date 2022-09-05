
<!--  Card body start Here -->
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Blogs</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"> Blogs
                </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--  Blogs section start -->
<section id="Blogs">
<!--  Blogs -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Blogs</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <a href="<?= base_url('admin/blogpublish') ?>" class="btn btn-primary btn-xs pull-right" style="margin-bottom:10px;"><b>+</b> Add Blog</a>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
<!--  Card body Content Go Here -->
    
<?php if ($this->session->flashdata('result_publish')) { ?>
    <hr>
    <div class="alert alert-info"><?= $this->session->flashdata('result_publish') ?></div>
    <?php
}
?>
<!-- <div class="row">
    <div class="col-sm-6">
        <form method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="search" value="<?php // echo @$_GET['search'] ?>" placeholder="Find here">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Search</button>
                </span>
            </div>
            <?php // if (isset($_GET['search'])) { ?>
                <a href="<?php // echo base_url('admin/blogs') ?>">Clear search</a>
            <?php // } ?>
        </form>
    </div>
</div> -->
<hr>
<?php
if (!empty($Blogs)) {
    ?>
    <h1><? //= !isset($_GET['search']) ? $page == 0 ? '' : 'Page: ' . floor($page / 20 + 1) : '' ?></h1>
    <div class="row">
        <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Author</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($Blogs as $row) {
                                $u_path = 'attachments/blog_images/';
                                if ($row['image'] != null && file_exists($u_path . $row['image'])) {
                                    $image = base_url($u_path . $row['image']);
                                } else {
                                    $image = base_url('attachments/no-image.png');
                                }
                                ?>

                                <tr>
                                    <td>
                                        <img src="<?= $image ?>" alt="No Image" class="img-thumbnail" style="height:100px;">
                                    </td>
                                    <td>
                                        <?= $row['name']; ?>
                                    </td>
                                    <td>
                                        <?= $row['author']; ?>
                                    </td>
                                    
                                    <td>
                                        <div class="pull-right">
                                            <a href="<?= base_url('admin/blog/blogPublish/edit/' . $row['id']) ?>" class="btn btn-info">Edit</a>
                                            <a href="<?= base_url('admin/Blogs?delete=' . $row['id']) ?>"  class="btn btn-danger confirm-delete">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
    </div>
<?php } else { ?>
    <div class="alert alert-danger" role="alert">No Posts</div>
<?php } ?>
<!--  Card body footer start Here -->
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!--  Card body footer End Here -->
