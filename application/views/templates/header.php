<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">

    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">

    <meta name="author" content="PIXINVENT">

    <title>E Parking - <?= $title ?></title>

    <link rel="apple-touch-icon" href="<?= BASE_URL ?>assets/images/logo.jpeg">

    <link rel="shortcut icon" type="image/x-icon" href="<?= BASE_URL ?>assets/app-assets/images/ico/favicon.ico">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">



    <!-- BEGIN: Vendor CSS-->

    <link rel="stylesheet" type="text/css" href="assets/app-assets/vendors/css/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/vendors/css/charts/apexcharts.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/vendors/css/extensions/toastr.min.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">

    <!-- END: Vendor CSS-->



    <!-- BEGIN: Theme CSS-->

    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/bootstrap-extended.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/colors.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/components.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/themes/dark-layout.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/themes/bordered-layout.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->

    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/core/menu/menu-types/vertical-menu.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/plugins/charts/chart-apex.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/plugins/extensions/ext-component-toastr.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/pages/app-invoice-list.css">

    <!-- END: Page CSS-->


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

    <!-- BEGIN: Custom CSS-->

    <link rel="stylesheet" type="text/css" href="assets/assets/css/style.css">

    <!-- END: Custom CSS-->



    <style type="text/css">
        .dt {

            padding: 10px;

        }

        .required_sign {

            color: red;

        }

        .error {

            color: red;

        }

        .vertical-layout.vertical-menu-modern.menu-collapsed .main-menu .navbar-header .brand-text,
        .vertical-layout.vertical-menu-modern.menu-collapsed .main-menu .modern-nav-toggle {

            display: block !important;

            padding-left: 0 !important;

        }
    </style>

</head>

<!-- END: Head-->



<!-- BEGIN: Body-->



<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">



    <!-- BEGIN: Header-->

    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">

        <div class="navbar-container d-flex content">

            <ul class="nav navbar-nav align-items-center ms-auto">

                <!-- <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li> -->

                <!-- <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>

                    <div class="search-input">

                        <div class="search-input-icon"><i data-feather="search"></i></div>

                        <input class="form-control input" type="text" placeholder="Search Loan..." tabindex="-1" data-search="search">

                        <div class="search-input-close"><i data-feather="x"></i></div>

                        <ul class="search-list search-list-main"></ul>

                    </div>

                </li> -->

                <!-- <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge badge-pill badge-danger badge-up">5</span></a>

                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">

                        <li class="dropdown-menu-header">

                            <div class="dropdown-header d-flex">

                                <h4 class="notification-title mb-0 mr-auto">Notifications</h4>

                                <div class="badge badge-pill badge-light-primary">6 New</div>

                            </div>

                        </li>

                       

                       

                    </ul>

                </li> -->

                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <div class="user-nav d-sm-flex d-none">

                            <span class="user-name fw-bolder">



                                <?php

                                $user_type = $this->session->userdata('user_type');
                                if ($user_type == 2) {
                                    $image_url = "assets/app-assets/images/portrait/small/avatar-s-11.jpg";
                                    $email = $this->session->userdata('email');
                                    $user_detaill = $this->dbhelper->singleRow("user_login", "*", "email='$email'");
                                    $personName = $user_detaill->name;
                                } else {


                                    $user_detaill = $this->dbhelper->singleRow("site_admin", "*", "id='" . $this->admin_id . "'");




                                    $image_url = base_url('assets/app-assets/images/portrait/small/avatar-s-11.jpg');
                                    $personName = $user_detaill->person_name;
                                }
                                ?>

                                <?php echo $personName; ?>

                            </span>

                            <span class="user-status"> <?php echo $user_detaill->name; ?></span>

                        </div>

                        <span class="avatar">

                            <img class="round" src="<?= $image_url ?>" alt="avatar" height="40" width="40">

                            <span class="avatar-status-online"></span>

                        </span>

                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">

                        <a class="dropdown-item" href="<?= BASE_URL ?>profile">

                            <i class="me-50" data-feather="user"></i> Profile

                        </a>

                        <div class="dropdown-divider"></div>

                        <!--  <a class="dropdown-item" href="#">

                            <i class="me-50" data-feather="settings"></i> Settings

                        </a> -->

                        <a class="dropdown-item" href="<?php echo base_url('front/logout') ?>">

                            <i class="me-50" data-feather="power"></i> Logout

                        </a>

                    </div>

                </li>

            </ul>

        </div>

    </nav>



    <!-- BEGIN: Main Menu-->

    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">

        <div class="navbar-header">

            <ul class="nav navbar-nav flex-row">

                <li class="nav-item me-auto">

                    <a class="navbar-brand" href="<?= BASE_URL ?>">

                        <h2 class="brand-text">

                            <!-- <img src="<?= BASE_URL ?>assets/images/logo.jpg" style="    width: 30px;margin-top: -4px;object-fit: cover !important;">  -->

                            <span class="brand-logo" style="margin-right: 20px;">

                                <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">

                                    <defs>

                                        <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">

                                            <stop stop-color="#000000" offset="0%"></stop>

                                            <stop stop-color="#FFFFFF" offset="100%"></stop>

                                        </lineargradient>

                                        <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">

                                            <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>

                                            <stop stop-color="#FFFFFF" offset="100%"></stop>

                                        </lineargradient>

                                    </defs>

                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                        <g id="Artboard" transform="translate(-400.000000, -178.000000)">

                                            <g id="Group" transform="translate(400.000000, 178.000000)">

                                                <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>

                                                <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>

                                                <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>

                                                <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>

                                                <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>

                                            </g>

                                        </g>

                                    </g>

                                </svg></span>

                            E Parking
                        </h2>

                    </a>

                </li>

                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>

            </ul>

        </div>

        <div class="shadow-bottom"></div>

        <div class="main-menu-content">

            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Sections &amp; Pages</span><i data-feather="more-horizontal"></i>

                </li>



                <?php $user_type = $this->session->userdata('user_type'); ?>
                <?php if ($user_type == 2) { ?>
                    <li <?php if ($this->uri->segment(1) == "dashboard" || $this->uri->segment(1) == "") { ?> class="active nav-item" <?php } else { ?> class="nav-item" <?php } ?>>

                        <a class="d-flex align-items-center" onclick="window.location.href='/eparking/front/admindashboard'">

                            <i data-feather="home"></i>

                            <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span>

                        </a>

                    </li>
                <?php } ?>
                <?php $user_type = $this->session->userdata('user_type'); ?>
                <?php if ($user_type != 2) { ?>
                    <li <?php if ($this->uri->segment(1) == "dashboard" || $this->uri->segment(1) == "") { ?> class="active nav-item" <?php } else { ?> class="nav-item" <?php } ?>>

                        <a class="d-flex align-items-center" onclick="window.location.href='/eparking/dashboard'">

                            <i data-feather="home"></i>

                            <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span>

                        </a>

                    </li>
                <?php } ?>



                <?php $user_type = $this->session->userdata('user_type'); ?>
                <?php if ($user_type != 2) { ?>

                    <li <?php if ($this->uri->segment(2) == "userlist") { ?> class="active nav-item" <?php } else { ?> class="nav-item" <?php } ?>>

                        <a class="d-flex align-items-center" href="/eparking/site_admin/userlist">

                            <i data-feather='map'></i>

                            <span class="menu-title text-truncate" data-i18n="Dashboards">User</span>

                        </a>

                    </li>



                    <li <?php if ($this->uri->segment(2) == "parkingtypelist") { ?> class="active nav-item" <?php } else { ?> class="nav-item" <?php } ?>>

                        <a class="d-flex align-items-center" onclick="window.location.href='/eparking/site_admin/parkingtypelist'">

                            <i data-feather='book-open'></i>

                            <span class="menu-title text-truncate" data-i18n="Dashboards">Parking Type</span>

                        </a>

                    </li>

                <?php } ?>
                <li <?php if ($this->uri->segment(2) == "parkinglist") { ?> class="active nav-item" <?php } else { ?> class="nav-item" <?php } ?>>

                    <a class="d-flex align-items-center" onclick="window.location.href='/eparking/site_admin/parkinglist'">

                        <i data-feather='book-open'></i>

                        <span class="menu-title text-truncate" data-i18n="Dashboards">Parking</span>

                    </a>

                </li>

                <li <?php if ($this->uri->segment(2) == "bookinglist") { ?> class="active nav-item" <?php } else { ?> class="nav-item" <?php } ?>>

                    <a class="d-flex align-items-center" onclick="window.location.href='/eparking/site_admin/bookinglist'">

                        <i data-feather='book-open'></i>

                        <span class="menu-title text-truncate" data-i18n="Dashboards">Booking Details</span>

                    </a>

                </li>

                <?php $user_type = $this->session->userdata('user_type'); ?>
                <?php if ($user_type == 2) { ?>
                    <li <?php if ($this->uri->segment(2) == "feedbacklist") { ?> class="active nav-item" <?php } else { ?> class="nav-item" <?php } ?>>

                        <a class="d-flex align-items-center" onclick="window.location.href='/eparking/site_admin/feedbacklist'">

                            <i data-feather='book-open'></i>

                            <span class="menu-title text-truncate" data-i18n="Dashboards">Feedback</span>

                        </a>

                    </li>
                    <li <?php if ($this->uri->segment(2) == "poReport") { ?> class="active nav-item" <?php } else { ?> class="nav-item" <?php } ?>>

                        <a class="d-flex align-items-center" onclick="window.location.href='/eparking/site_admin/poReport'">

                            <i data-feather='alert-circle'></i>

                            <span class="menu-title text-truncate" data-i18n="Dashboards">Report Problem</span>

                        </a>

                    </li>
                <?php } ?>

                <?php $user_type = $this->session->userdata('user_type'); ?>
                <?php if ($user_type != 2) { ?>

                    <li <?php if ($this->uri->segment(2) == "report") { ?> class="active nav-item" <?php } else { ?> class="nav-item" <?php } ?>>

                        <a class="d-flex align-items-center" href="/eparking/site_admin/report">

                            <i data-feather='book-open'></i>

                            <span class="menu-title text-truncate" data-i18n="Dashboards">Reports</span>

                        </a>

                    </li>
                <?php } ?>







            </ul>





            </ul>



        </div>

    </div>

    <!-- END: Main Menu-->

    <?php include("message.php"); ?>

    <style>
        .submenu,
        .submenus {
            display: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.toggle-submenu').click(function(e) {
                e.preventDefault(); // Prevent default link behavior

                // Toggle submenu visibility of the clicked parent
                var submenu = $(this).siblings('.submenu');
                $('.submenu').not(submenu).slideUp(); // Hide other open submenus
                submenu.slideToggle();
            });

            $('.toggle-submenus').click(function(e) {
                e.preventDefault(); // Prevent default link behavior

                // Toggle submenu visibility of the clicked parent
                var submenu = $(this).siblings('.submenus');
                $('.submenus').not(submenu).slideUp(); // Hide other open submenus
                submenu.slideToggle();
            });
        });
    </script>