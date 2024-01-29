<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('public/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('public/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('public/images/favicon.png')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .navbar-menu-wrapper.flex-grow.d-flex.align-items-stretch {
        background: white;
        box-shadow: 20px 19px 19px -29px rgba(0, 0, 0, 0.5) !important;
    }

    .nav-item:hover .menu-title {
        color: white !important;
    }

    .navbar .navbar-menu-wrapper .search input {
        background: #006500;
        padding: 15px;
        border: unset;
        line-height: 0px;
        color: white;
    }

    .navbar-toggler span {
        color: #030303;
        font-size: 35px;
    }

    .footer {
        background: #e4f7e5;
    }

    .btn.btn-primary {
        background: #cc6601;
        border: unset;
        padding: 10px 25px;
    }

    button.btn.btn-dark {
        background: #006500;
        border: unset;
        padding: 10px 25px;
    }

    .page-title {
        color: black;
    }

    .footer span {
        color: black !important;
        font-size: 15px;
    }

    .content-wrapper {
        background: #f6f9ff;
        padding: 30px 30px;
    }

    .badge.badge-success {
        background: #cc6601;
        border: unset;
        padding: 10px 25px;
    }

    .sidebar-brand-wrapper {
        border-bottom: 1px solid #f9f6f645;
    }

    #sidebar .icon .icon-item {
        color: white;
    }

    #sidebar span.menu-title {
        color: black;
    }

    .icon.icon-box-success {
        color: white;
    }

    .icon.icon-box-danger {
        color: #ffffff;
        background-color: #cc6601;
    }

    .navbar-profile-name {
        color: black;
    }

    .navbar-profile i {
        color: black !important;
    }

    .sidebar .sidebar-brand-wrapper .sidebar-brand img {
        height: unset !important
    }

    .sidebar .sidebar-brand-wrapper {
        background-color: white !important;
        box-shadow: 20px 19px 19px -29px rgba(0, 0, 0, 0.5) !important;
    }

    .page-title {
        font-size: 26px;
        margin: 20px 0px 20px 0px;
        color: #006500 !important;
    }

    .adminNavSearch {
        display: flex;
        align-items: center;
        margin-bottom: unset;
    }

    .adminNavSearch input {
        width: 50% !important;
        color: white !important;
        border-radius: 30px !important;
    }

    .adminNavSearch ::placeholder {
        color: white !important;
    }

    .sidebar .nav .nav-item.active>.nav-link:before {
        background: #006700 !important;
        color: white;
    }

    .sidebar .nav .nav-item.active>.nav-link {
        background: #cc6601 !important;
    }

    .sidebar .nav .nav-item.active>i {
        color: black !important;
    }

    .nav.flex-column.sub-menu {
        background: #f6f9ff;
        border-radius: 5px;
        padding: 20px 10px;
    }

    .nav.flex-column.sub-menu a {
        color: black !important;
        padding-bottom: 10px;
        display: inline-block !important;
    }

    .sub-menu .nav-item {
        padding-left: 14px !important;
        font-size: 22px !important;
    }

    .cardDash .card-body {
        background: white;
        border: unset;
        /* box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px; */
        box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
        padding: 40px 30px !important;
    }

    .sidebar {
        background-color: white !important;
    }

    .sidebar .nav .nav-item.active>.nav-link .menu-title {
        color: #ffffff !important;
    }

    .sidebar .nav:not(.sub-menu)>.nav-item:hover:not(.nav-category):not(.account-dropdown)>.nav-link {
        background: #cc6601;
    }

    .card {
        background: white;
    }

    a.paginate_button.current {
        background: #cc6601 !important;
        border: unset !important;
    }

    td.sorting {
        border-bottom: unset !important;
    }

    table#branch_list td {
        padding: 15px 10px;
    }

    table.dataTable tbody td {
        padding: 15px 10px !important;
        height: 65px !important;
    }

    .IconView i {
        color: #006500;
        font-size: 20px;
        padding-right: 10px;
    }

    .dataTable tbody tr {
        background-color: transparent;
        border-color: #cc660138;
    }

    button.btn.btn-primary.btnActive {
        background: #006500;
        width: 100px;
        padding: 10px 20px;
    }

    div#branch_list_filter input {
        color: black !important;
    }

    div#branch_list_filter input::placeholder {
        color: black !important;
    }

    h4.card-title.btn.btn-primary.mbUnset.brachAdd {
        /* margin-top: 30px; */
        position: absolute;
        top: 66px;
        z-index: 999999999999;
        padding: 10px 20px;
        /* left: 10px; */
        margin-left: 10px;
    }

    button.btn.btn-danger.btnInactive {
        background: #cc6601;
        padding: 10px 20px;
        width: 100px;
        border: unset;
    }

    .penIcon button {
        background: #006500;
        padding: 10px 30px !important;
        border: unset;
    }

    button.dt-button.buttons-excel.buttons-html5:hover {
        background: #006500;
        border: unset;
    }

    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #006500;
        padding: 7px 15px;
        color: black;
        background-color: transparent;
    }

    .card-title.btn.btn-primary.mbUnset.brachAdd {
        /* margin-top: 30px; */
        position: absolute;
        top: 90px !important;
        z-index: 999999999999;
        padding: 10px 20px;
        margin-left: 26px !important;
    }

    div#branch_list_filter label {
        color: black;
        font-weight: 500;
    }

    .mainDashHead {
        font-size: 25px;
        color: #006500 !important;
        margin-bottom: 32px !important;
    }

    .page-header {
        /* text-align: right; */
        display: flex !important;
        justify-content: end !important;
        margin-bottom: 30px;
    }

    .dt-button.buttons-excel.buttons-html5 {
        background: #cc6601;
        border: unset;
        margin-bottom: 30px !important;
    }

    th.sorting::before {
        display: none !important;
    }

    th.sorting::after {
        display: none !important;
    }

    th.sorting {
        padding: 30px 10px !important;
    }

    div#student_list_filter label {
        color: black;
    }

    .form-group label {
        color: black !important;
    }

    .form-group input {
        background: white;
        border: 1px solid #cc6601;
        border-radius: 5px;
        color: black !important;
    }

    .form-group select {
        background: white;
        color: black !important;
        border: 1px solid #cc6601;
        border-radius: 5px;
    }

    .form-group input:focus {
        background: white !important;
        color: black !important;
    }

    .form-group select:focus {
        background: white !important;
        color: black !important;
    }

    li.nav-item.menu-items:hover i {
        color: white !important;
    }

    .menu-icon i {
        color: black !important;
        font-size: 22px !important;
    }

    .menu-icon {
        background: unset !important;
    }

    .dropdown-menu.dropdown-menu-right.navbar-dropdown.preview-list.show {
        background: #f6f9ff;
    }

    .preview-list .preview-item .preview-item-content p {
        color: black !important;
    }

    .preview-icon {
        background: #f6f9ff !important;
    }

    .dropdown-item.preview-item:hover p {
        color: white !important;
    }

    .dropdown-item.preview-item:hover {
        background: #cc6601 !important;
    }

    .preview-icon i {
        color: black !important;
    }

    .penIcon button:hover {
        background: #cc6601;
    }

    .penIcon button:focus {
        background: #cc6601 !important;
    }

    ul.nav.flex-column.sub-menu span {
        color: black !important;
    }
</style>
<?php
$id = Session::get('admin_id');
$adminData = DB::table('admins')->where(['id' => $id])->first();
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="#"><img src="{{asset('public/images/smsslogo.png')}}" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="#"><img src="{{asset('public/images/logo-mini.svg')}}" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                </div>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                </div>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('Home')}}">
                <span class="menu-icon">
                    <i class="fa fa-tachometer"></i>
                </span>
                <span class="menu-title">Tableau de bord</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('create_sub_admin')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                </span>
                <span class="menu-title">Ajouter une succursale</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="fa fa-commenting-o"></i>
                </span>
                <span class="menu-title">SMS</span>
                <span class="mdi mdi-triangle-down"></span>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <span class="fa fa-plus-circle" aria-hidden="true"></span> <a class="nav-link" href="{{url('list_add_class')}}">Ajouter une classe</a>
                    </li>
                    <li class="nav-item"> <span class="fa fa-plus-circle" aria-hidden="true"></span> <a class="nav-link" href="{{url('option_list')}}">Ajouter une option</a></li>
                    <li class="nav-item"> <span class="fa fa-plus-circle" aria-hidden="true"></span> <a class="nav-link" href="{{url('AddSchoolFee')}}">
                            Ajouter des frais</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('public/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
                <li class="nav-item w-100">
                    <form class="nav-link mt-md-0 d-none d-lg-flex search adminNavSearch">
                        <input type="text" class="form-control" placeholder="Search products">
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                        <div class="navbar-profile">
                            <?php if (isset($branch_image)) { ?>
                                <img class="img-xs rounded-circle" src="{{asset('branch_image')}}/{{$adminData->image}}" alt="">
                            <?php } ?>
                            <p class="mb-0 d-none d-sm-block navbar-profile-name">{{$adminData->name}}</p>
                            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                        <a class="dropdown-item preview-item" onclick="window.location.href='{{url("adminProfileManage")}}'">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-account"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">
                                    Profil</p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item" onclick="window.location.href='{{url("admin_chnagePassword")}}'">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-lock-open"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Changer le mot de passe</p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item" onclick="window.location.href='{{url("admin_logout")}}'">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-logout"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Se déconnecter</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
            </button>
        </div>
    </nav>