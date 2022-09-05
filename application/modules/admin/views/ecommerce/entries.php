<link href="<?= base_url('assets/css/bootstrap-toggle.min.css') ?>" rel="stylesheet">

<!--  Card body start Here -->
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Entries</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"> Entries
                </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Entries section start -->
<section id="entries">
<!-- Entries -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Entries</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
<!--  Card body Content Go Here -->
<hr>
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <a href="<?php echo base_url('admin/entries/contacts');?>" class="btn btn-primary btn-lg" style="font-size:30px;"><i class="fa fa-list-alt" aria-hidden="true"></i> Contact Entries</a>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <a href="<?php echo base_url('admin/entries/info');?>" class="btn btn-success btn-lg" style="font-size:30px;"><i class="fa fa-list" aria-hidden="true"></i> Request Info Entries</a>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <a href="<?php echo base_url('admin/entries/moreInfo');?>" class="btn btn-success btn-lg" style="font-size:30px;"><i class="fa fa-list" aria-hidden="true"></i> More Info Entries</a>
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
