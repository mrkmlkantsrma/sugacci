
    
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
                <li class="breadcrumb-item active"> Contact Detail
                </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Contact Detail section start -->
<section id="add-product">
<!--  Contact Detail -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $contact['first_name']; ?>'s detail</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
<!--  Card body Content Go Here -->
<div id="products">
    <div class="">
        <div class="col-xs-12">
            <!-- <div class="well hidden-xs"> 
                <div class="row"> 
                </div>
            </div>
            <hr> -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                            <tr>
                                <th>First Name</th>
                                <td><?= $contact['first_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td><?= $contact['last_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                 <td><a href="mailto:<?= $contact['phone']; ?>"><?= $contact['email']; ?></a></td>
                               
                            </tr>
                            <tr>
                                <th>Phone</th>
                                   <td><a href="tel:<?= $contact['phone']; ?>"><?= $contact['phone']; ?></a></td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                  <td> <?= $contact['message']; ?></td>
                            </tr>
                 
                        <tbody> 
                        </tbody>
                    </table>
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