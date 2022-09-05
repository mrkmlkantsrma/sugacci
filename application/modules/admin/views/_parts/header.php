<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Sugacci</title>
    <link rel="apple-touch-icon"href="<?= base_url('assets/admin/admin-theme/images/ico/apple-icon-120.png') ;?>">
    <link rel="shortcut icon" type="image/x-icon"href="<?= base_url('assets/admin/admin-theme/images/logo/logo.jpg') ?>">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"href="<?= base_url('assets/admin/admin-theme/css/vendors.css') ?>" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css"href="<?= base_url('assets/admin/admin-theme/css/app-lite.css') ?>" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css"href="<?= base_url('assets/admin/admin-theme/css/core/menu/menu-types/vertical-menu.css') ?>" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css"href="<?= base_url('assets/admin/admin-theme/css/core/colors/palette-gradient.css') ?>" rel="stylesheet"> 
    <!-- <link href="<?= base_url('assets/admin/css/custom-admin.css') ?>" rel="stylesheet"> 
    <link href="<?= base_url('assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="<?= base_url('assets/admin/admin-theme/js/core/libraries/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/admin-theme/js/core/libraries/jquery.min.js') ?>"></script>

  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!-- fixed-top-->
<?php if ($this->session->userdata('logged_in')) { ?>
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
              <li class="nav-item d-none d-md-block"><a href="javascript:void(0);" class="h-settings nav-link">Pass Change</a></li>
            </ul>
            <ul class="nav navbar-nav float-right">         
              <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language"></span></a>
                <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                  <div class="arrow_box"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-ru"></i> Russian</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-es"></i> Spanish</a></div>
                </div>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail">             </i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><i class="ft-book"></i> Read Mail</a><a class="dropdown-item" href="#"><i class="ft-bookmark"></i> Read Later</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Mark all Read       </a></div>
                </div>
              </li>
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar avatar-online"><img src="<?= base_url();?>assets/admin/imgs/admin-user.png" alt="avatar"><i></i></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="<?= base_url();?>assets/admin/imgs/admin-user.png" alt="avatar"><span class="user-name text-bold-700 ml-1">John Doe</span></span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="<?= base_url('admin/logout') ?>"><i class="ft-power"></i> Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div class="main-menu menu-fixed menu-light menu-accordion  menu-shadow " data-scroll-to-active="true" data-img="<?= base_url('assets/admin/admin-theme/images/backgrounds/02.jpg'); ?>">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">       
          <li class="nav-item mr-auto"><a class="navbar-brand" href="<?= base_url('admin') ?>"><img class="brand-logo" width="50" alt="logo" src="<?= base_url('assets/admin/admin-theme/images/logo/logo.jpg'); ?>"/>
              <h3 class="brand-text">Sugacci Admin</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="<?= base_url('admin') ?>"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <li class="nav-item"><a href="<?= base_url('admin/product') ?>" <?= urldecode(uri_string()) == 'admin/product' ? 'class="active"' : '' ?>><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">Add Product</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('admin/products') ?>" <?= urldecode(uri_string()) == 'admin/products' ? 'class="active"' : '' ?>><i class="ft-droplet"></i><span class="menu-title" data-i18n="">All Products</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('admin/shopcategories') ?>" <?= urldecode(uri_string()) == 'admin/shopcategories' ? 'class="active"' : '' ?>><i class="ft-layers"></i><span class="menu-title" data-i18n="">Category</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('admin/orders') ?>" <?= urldecode(uri_string()) == 'admin/orders' ? 'class="active"' : '' ?>><i class="ft-box"></i><span class="menu-title" data-i18n="">Orders</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('admin/entries/contacts') ?>" <?= urldecode(uri_string()) == '' ? 'class="active"' : '' ?>><i class="ft-bold"></i><span class="menu-title" data-i18n="">Contacts</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('admin/testimonials') ?>" <?= urldecode(uri_string()) == 'admin/testimonials' ? 'class="active"' : '' ?>><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Testimonials</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('admin/blogs') ?>" <?= urldecode(uri_string()) == 'admin/blogs' ? 'class="active"' : '' ?>><i class="ft-layout"></i><span class="menu-title" data-i18n="">Blogs</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('admin/deals') ?>" <?= urldecode(uri_string()) == 'admin/deals' ? 'class="active"' : '' ?>><i class="ft-layers"></i><span class="menu-title" data-i18n="">Deal</span></a>
          </li>
          <li class="nav-item"><a href="<?= base_url('admin/emails') ?>" <?= urldecode(uri_string()) == 'admin/emails' ? 'class="active"' : '' ?>><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">Subscribers</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('admin/instagram') ?>" <?= urldecode(uri_string()) == 'admin/instagram' ? 'class="active"' : '' ?>><i class="ft-droplet"></i><span class="menu-title" data-i18n="">Instagram</span></a>  
          </li>
          <li class=" nav-item"><a href="<?= base_url('admin/youtube') ?>" <?= urldecode(uri_string()) == 'admin/youtube' ? 'class="active"' : '' ?>><i class="ft-box"></i><span class="menu-title" data-i18n="">Youtube</span></a>  
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Menu</span></a>
          </li>
         
        </ul>
      </div><div class="navigation-background"></div>
    </div>
<?php } ?>
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before">
        </div>
        <div class="content-body">


       