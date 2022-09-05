<div id="products">

<!--  Card body start Here -->
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Contacts</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"> Contacts
                </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--  Contacts section start -->
<section id="contacts">
<!--  Contacts -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Contacts</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
<!--  Card body Content Go Here -->
    <?php
    if ($this->session->flashdata('result_delete')) {
        ?>
        <div class="alert alert-success"><?= $this->session->flashdata('result_delete') ?></div>
        <hr>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <?php
            if ($contacts) { ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php
                                foreach ($contacts as $row) { ?>
                                    <tr>
                                        <td><?= $row['first_name']; ?></td>
                                        <td><?= $row['last_name']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td>
                                            <div class="pull-right">
                                                <a href="<?= base_url('admin/ecommerce/entries/view/' . $row['id']) ?>" class="btn btn-info">View</a>
                                                <a href="<?= base_url('admin/entries/contacts?delete=' . $row['id']) ?>"  class="btn btn-danger confirm-delete">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php   } ?>
                        </tbody>
                    </table>
                </div>
                <? //= $links_pagination ?>
            </div>
            <?php
        } else {
            ?>
            <div class ="alert alert-info">No Contacts found!</div>
        <?php } ?>
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