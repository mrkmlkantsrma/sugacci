<script src="<?= base_url('assets/highcharts/highcharts.js') ?>"></script>
<script src="<?= base_url('assets/highcharts/data.js') ?>"></script>
<script src="<?= base_url('assets/highcharts/drilldown.js') ?>"></script>

<!--  Card body start Here -->
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">DASHBOARD</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a>
                </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--  Dashboard section start -->
<section id="dashboard">
<!--  Dashboard -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Dashboard - Statistics Overview</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
<!--  Card body Content Go Here -->
<section id="minimal-statistics-details">
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-x-purple-blue">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-top">
                                <i class="icon-eye icon-opacity text-white font-large-4 float-left"></i>
                            </div>
                            <div class="media-body text-white text-right align-self-bottom mt-3">
                                <span class="d-block mb-1 font-medium-1">Last Login</span>
                                <h1 class="text-white mb-0"><?= date('d.m.Y', $_SESSION['last_login']) ?></h1>
                                <h2 class="text-white mb-0"><?php // echo date('H:i:s', $_SESSION['last_login']) ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-x-purple-red">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-top">
                                <i class="icon-users icon-opacity text-white font-large-4 float-left"></i>
                            </div>
                            <div class="media-body text-white text-right align-self-bottom mt-3">
                                <span class="d-block mb-1 font-medium-1">Total Customers</span>
                                <h1 class="text-white mb-0">12</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-x-blue-green">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-top">
                                <i class="icon-basket-loaded icon-opacity text-white font-large-4 float-left"></i>
                            </div>
                            <div class="media-body text-white text-right align-self-bottom mt-3">
                                <span class="d-block mb-1 font-medium-1">New Orders</span>
                                <h1 class="text-white mb-0">12<?php // echo $newOrdersCount ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-x-orange-yellow">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-top">
                                <i class="icon-wallet icon-opacity text-white font-large-4 float-left"></i>
                            </div>
                            <div class="media-body text-white text-right align-self-bottom mt-3">
                                 <span class="d-block mb-1 font-medium-1">Subscribers</span>
                                <h1 class="text-white mb-0">14<?php // echo $lastSubscribed ?></h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="minimal-statistics-details">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart - Orders By Month</h3>
                </div>
                <div class="panel-body">
                    <div id="container-by-month" style="min-width: 310px; height: 400px; margin: 0 auto;">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart - Orders From Referrer</h3>
                </div>
                <div class="panel-body">
                    <div id="container-by-referrer" style="min-width: 310px; height: 400px; margin: 0 auto;">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Most Orders By Payment Type</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Payment type</th>
                                    <th>Num Orders</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($ordersByPaymentType)) {
                                    foreach ($ordersByPaymentType as $paymentT) {
                                        ?>
                                        <tr>
                                            <td><?= $paymentT['payment_type'] ?></td>
                                            <td><?= $paymentT['num'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="2">No Orders</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Last Activity Log</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($activity->result()) {
                                    foreach ($activity->result() as $action) {
                                        ?>
                                        <tr>
                                            <td><i class="fa fa-user" aria-hidden="true"></i> <b><?= $action->username ?></b></td>
                                            <td><?= $action->activity . ' on ' . date('d.m.Y / H.m.s', $action->time) ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="2">No history found!</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="<?= base_url('admin/history') ?>">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Most Sold</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Sales</th>
                                    <th>Url</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($mostSold)) {
                                    foreach ($mostSold as $product) {
                                        ?>
                                        <tr>
                                            <td><?= $product['procurement'] ?></td>
                                            <td><a target="_blank" href="<?= base_url($product['url']) ?>"><?= base_url($product['url']) ?></a></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="2">No Orders</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="<?= base_url('admin/products?orderby=procurement=desc') ?>">View All Products <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                </section>
<!--  Card body footer start Here -->
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!--  Card body footer End Here -->
<script>
    /*
     * Chart for orders by referrer
     */
    $(function () {
    Highcharts.chart('container-by-referrer', {
    chart: {
    type: 'column'
    },
            title: {
            text: 'Orders comming from..'
            },
            subtitle: {
            text: 'Most Orders By Referrer'
            },
            xAxis: {
            type: 'category'
            },
            yAxis: {
            title: {
            text: 'Total max numbers'
            }

            },
            legend: {
            enabled: false
            },
            plotOptions: {
            series: {
            borderWidth: 0,
                    dataLabels: {
                    enabled: true,
                            format: '{y}'
                    }
            }
            },
            tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
            },
            series: [{
            name: 'Referrer',
                    colorByPoint: true,
                    data: [
<?php foreach ($byReferral as $referrer) { ?>
                        {
                        name: '<?= $referrer['referrer'] ?>',
                                y: <?= $referrer['num'] ?>,
                                drilldown: '<?= $referrer['referrer'] ?>'
                        },
<?php } ?>
                    ]
            }]
    });
    });
    /*
     * Chart for orders by mount/year 
     */
    $(function () {
    Highcharts.chart('container-by-month', {
    title: {
    text: 'Monthly Orders',
            x: - 20
    },
            subtitle: {
            text: 'Source: Orders table',
                    x: - 20
            },
            xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
            title: {
            text: 'Orders'
            },
                    plotLines: [{
                    value: 0,
                            width: 1,
                            color: '#808080'
                    }]
            },
            tooltip: {
            valueSuffix: ' Orders'
            },
            legend: {
            layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
            },
            series: [
<?php foreach ($ordersByMonth['years'] as $year) { ?>
                {
                name: '<?= $year ?>',
                        data: [<?= implode(',', $ordersByMonth['orders'][$year]) ?>]
                },
<?php } ?>
            ]
    });
    });
</script>
