
<!--  Card body start Here -->
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Emails</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"> Emails
                </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--  emails section start -->
<section id="emails">
<!--  emails -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Here are all subscribed emails of users</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
<!--  Card body Content Go Here -->
<hr>
<?php if ($this->session->flashdata('emailDeleted')) { ?>
    <hr>
    <div class="alert alert-info"><?= $this->session->flashdata('emailDeleted') ?></div>
    <?php
}
?>
<div class="table-responsive">
    <table class="table table-condensed table-bordered table-striped custab">
        <thead>
            <tr>
                <th>Email</th>
                <th>Browser</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($emails->result()) {
                foreach ($emails->result() as $email) {
                    ?>
                    <tr>
                        <td><?= $email->email ?></td>
                        <td><?= $email->browser ?></td>
                        <td><?= date('Y.m.d / H.m.s', $email->time) ?></td>
                        <td><a href="?delete=<?= $email->id ?>" class="btn-xs btn-danger confirm-delete">Delete</a></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr><td colspan="5">No emails found!</td></tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php if ($emails->result()) { ?>
    <form method="POST"><input type="submit" name="export" value="Export" class="btn btn-default"></form>
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