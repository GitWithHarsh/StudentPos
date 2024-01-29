<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="{{asset('public/subAdmin/img/favicon.png')}}" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{asset('public/subAdmin/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/subAdmin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <!-- <link href="{{asset('public/subAmdin/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <link href="{{asset('public/subAdmin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{asset('public/subAdmin/css/style.css')}}" rel="stylesheet">
</head>
<style>
  nav.navbar.navbar-expand.bg-secondary.navbar-dark {
        background: #ffff !important;
        box-shadow: 20px 19px 19px -29px rgba(0, 0, 0, 0.5) !important;
    }

    .content .navbar .sidebar-toggler {
        border-radius: 40px;
        color: white;
        font-size: 25px;
        background-color: unset;
    }

    .nav-item.dropdown span {
        color: white;
    }

    .content .navbar .navbar-nav .nav-link {
        color: white !important;
    }



    .cardDashStudent h6 {
        color: black;
    }

    .cardDashStudent i {
        color: rgb(204 102 1) !important;
        font-size: 35px;
    }

    .footereBg {
        background-color: #e4f7e5;
    }

    .footereBg a {
        color: #006500 !important;
        font-size: 15px;
    }

    .footereBg p {
        color: black !important;
        font-size: 15px;
    }

    .footereBg {
        background-color: #e4f7e5;
        position: fixed;
        bottom: 0px;
        right: 0px;
        left: 250px;
    }

    .content-wrapper {
        width: 90%;
        position: relative;
        left: 55px;
    }

    .footereBg span {
        color: #100f0f;
        font-size: 14px !important;
    }

    .sideMenuPos a:hover {
        color: white !important;
        background: #006500 !important;
        border-color: rgb(204 102 1) !important;
    }


    .sidebar .navbar .navbar-nav .nav-link {
        padding: 7px !important;
        border-left: unset !important;
    }

    .dropdown-menu.bg-transparent.border-0.show {
        background: #f6f9ff !important;
    }

    li.paginate_button.page-item.active a {
        background: #cc6601;
        border: unset;
    }

    a.btn.btn-lg.btn-primary.btn-lg-square.back-to-top {
        background: #cc6601 !important;
        border: unset !important;
    }

    .sidebar {
        background: #ffff !important;
    }

    nav.navbar.bg-secondary.navbar-dark {
        background: #ffff !important;
    }

    .sidebar-toggler i {
        color: #030303;
        font-size: 30px;
    }

    .headerSearch ::placeholder {
        color: white;
    }

    .headerSearch {
        width: 75%;
        margin: 0px 0px 0px 10px !important;
    }

    .headerSearch input {
        background: #006500 !important;
        color: white !important;
        border-radius: 20px;
        width: 50%;
        padding: 7px 10px;
        line-height: unset !important;

    }

    .colorBlack {
        color: black !important;
    }

    .content {
        background: #f6f9ff;

    }

    .sidebar-brand.brand-logo {
        padding-left: 7px;
        box-shadow: 20px 19px 19px -29px rgba(0, 0, 0, 0.5) !important;
        width: 100%;
    }

    .sideMenuPos {
        margin-top: 15px;
    }

    .sideMenuPos .nav-link {
        font-size: 0.9375rem !important;
        color: black !important;
    }

    .sidebar .navbar .navbar-nav .nav-link i {
        background: unset !important;
        color: black;
        height: 35px !important;
        width: 35px !important;
        font-size: 20px !important;
    }

    .sideMenuPos .nav-link:hover i {
        color: white !important;
    }

    .sideMenuPos .nav-link:hover {
        background: #cc6601 !important;
    }

    .sideMenuPos .nav-link:hover a {
        color: #fff !important;
    }

    .cardDashStudent {
        background: white !important;
        border: unset;
        box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
        padding: 50px 30px !important;
        border-radius: 10px !important;
    }

    div#student_list_wrapper {
        padding-left: unset;
        padding-right:unset !important;
        margi
    }

    .bg-secondary {
        background: #fff !important;
    }

    .mainHead {
        font-size: 25px;
        color: #006500;
        font-weight: 500;
    }

    button.btn.btn-info {
        background: #cc6601;
        border: unset;
        color: white;
        font-weight: 500;
        font-size:16px !important;
        padding: 7px 30px;
    }
    div#student_list_filter input {
    background: white !important;
    float: right;
}
div#student_list_filter{
    text-align:right;
}
.rightAdd{
text-align:right;
}
li.paginate_button.page-item.active {
    background: #cc6601;
    border-radius: unset !important;
}
#student_list td, th {
    border: unset !important;
}{
    border:unset !important;
}
#student_list td{
    padding:15px 10px !important;
}
#student_list th{
    padding:20px 10px !important;
}
#student_list i {
    color: 006500 !important;
    font-size: 20px;
    margin-right: 10px;
}
ul.pagination {
    float: right;
} 
div#student_list_filter input {
    border: 1px solid #006500;
}
div#student_list_filter label {
    text-align: left;
}
.btnActive {
    background: #006500 !important;
    width: 100px !important;
    padding: 5px 20px !important;
}
.btnInActive {
    background: #cc6601 !important;
    padding: 5px 20px !important;
    width: 100px !important;
    border: unset !important;
}form#StudentForm input {
    border: 1px solid #cc6601;
}
form#StudentForm select {
    border: 1px solid #cc6601;
}
.btnRight{
    text-align:right;
}
 
form#editResult {
    background: #fff;
    padding: 30px;
    border-radius:5px;
}
.modal-footer button {
    background: #006500;
    border: unset;
}
/*  */
.modal-dialog .modal-title {
    color: #fff;
}
.modal-dialog input:focus {
    background: #fff !important;
 }
.modal-dialog input {
    background: #fff;
    border: 1px solid #cc6601;
    margin-top: 10px;
}
.modal-dialog select {
    background: #fff;
    border: 1px solid #cc6601;
    margin-top: 10px;
}
.modal-dialog label{
    color:black;
    margin-top:10px;
}
.modal-header {
    background: #cc6601;
}
button.btn-close {
    background-color: white;
    opacity: 1 !important;
}
.btnRightText{
    text-align:right;
}
 
.btnRightText button {
    background: #cc6601;
    border: unset;
    padding: 7px 20px;
}
button.btn.btn-primary {
    background: #cc6601 !important;
    border:unset;
}
button.btn.btn-primary:hover {
    background: #006500  !important;
}
ul.pagination {
    float: right;
    margin-bottom: 30px;
}

</style>
<!-- Spinner Start -->
<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->
<!-- Sidebar Start -->
<?php $id = session()->get('admin_id');
$add_sub_admins = DB::table('add_sub_admins')->where(['id' => $id])->first();
?>
<div class="sidebar">
    <nav class="navbar bg-secondary navbar-dark">

        <!-- <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Student PoS</h3> -->
        <!-- <img src="{{asset('public/images/smsslogo.png')}}" alt=""> -->
        <a class="sidebar-brand brand-logo" href="#"><img style="margin: 10px 60px 20px 0px;" width="100" src="{{asset('public/images/smsslogo.png')}}" alt="logo" /></a>


        <div class="navbar-nav w-100 sideMenuPos">
            <a href="{{url('sub_index')}}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Tableau de
                bord</a>
            <!-- <a href="{{url('result_publication')}}" class="nav-item nav-link"><i class="fas fa-sort-amount-up me-2"></i></i></a> -->
            <a href="{{url('ManageStudent')}}" class="nav-item nav-link"><i class="fas fa-poll me-2"></i>Publications des résultats</a>
            <a href="{{url('manageStudentByClass')}}" class="nav-item nav-link"><i class="fas fa-user-friends me-2"></i>Gérer les étudiants</a>
            <a href="{{url('parent_meeting')}}" class="nav-item nav-link"><i class="fas fa-handshake me-2"></i>Gérer les réunions</a>
            <a href="{{url('school_fee')}}" class="nav-item nav-link"><i class="fas fa-receipt me-2"></i>Gérer les frais</a>
            <a href="{{url('punishment')}}" class="nav-item nav-link"><i class="fas fa-universal-access me-2"></i>Gérer les punitions</a>
            <a href="{{url('student_Register')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>
                Ajouter un étudiant</a>
            <!--  <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
            <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
            <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a> -->
            <!-- <div class="nav-item dropdown dropPos">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-comment-dots me-2"></i></i>SMS</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{url('result_publication')}}" class="nav-item nav-link"> <i class="fab fa-old-republic me-1"></i> Publication des résultats</a>
                    <a href="{{url('parent_meeting')}}" class="nav-item nav-link"> <i class="fab fa-meetup me-1"></i>
                        Réunion de parents</a>
                    <a href="{{url('call_log')}}" class="nav-item nav-link">
                        <i class="fas fa-phone-volume me-1"></i> Journal d'appel</a>
                    <a href="{{url('school_fee')}}" class="nav-item nav-link">
                        <i class="fas fa-money-check-alt me-1"></i> Frais scolaires</a>
                    <a href="{{url('punishment')}}" class="nav-item nav-link"><i class="fas fa-street-view me-1"></i>Châtiment</a>
                </div>
            </div> -->
        </div>
    </nav>
</div>
<!-- Sidebar End -->
<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-2">
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <form class="d-none d-md-flex ms-4 headerSearch">
            <input class="form-control bg-dark border-0" type="search" placeholder="Search">
        </form>
        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="{{asset('branch_image')}}/{{$add_sub_admins->branch_image}}" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex colorBlack" style="font-size:0.875rem;">{{$add_sub_admins->first_name}}
                        {{$add_sub_admins->last_name}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                    <a href="#" class="dropdown-item" onclick="window.location.href='{{url(" profilePage")}}'">
                        Profil</a>
                    <a href="#" class="dropdown-item" onclick="window.location.href='{{url("
                        changePassword")}}'">Changer le mot de passe</a>
                    <a href="#" class="dropdown-item" onclick="window.location.href='{{url("logout_subadmin")}}'">Se
                        déconnecter</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->