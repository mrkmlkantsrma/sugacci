<!--  Card body start Here -->
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">youtube</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">youtube
                </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--   youtubes section start -->
<section id="youtube">
<!--   youtubes -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> youtube</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <a href="<?= base_url('admin/youtubepublish') ?>" class="btn btn-primary btn-xs pull-right" style="margin-bottom:10px;"><b>+</b> Add youtube Post</a>
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
<hr>
<?php
if (!empty($youtubes)) {
    ?>
    <div class="row">
        <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Youtube Title</th>
                                <th>Youtube Url</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($youtubes as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $row['youtube_title']; ?>
                                    </td>
                                    <td>
                                        <?= $row['youtube_url']; ?>
                                    </td>
                                    
                                    <td>
                                        <div class="pull-right">
                                            <a href="<?= base_url('admin/blog/youtubePublish/edit/' . $row['id']) ?>" class="btn btn-info">Edit</a>
                                            <a href="<?= base_url('admin/youtube?delete=' . $row['id']) ?>"  class="btn btn-danger confirm-delete">Delete</a>
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
