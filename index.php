  <?php 
//koneksi ke database
  session_start();
  include 'koneksi.php';
  if (!isset($_SESSION['id_admin'])) 
  {
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 4.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
  ================================================================================ -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Books 12 | Sistem Payroll</title>
    <!-- Favicons-->
    <link rel="icon" href="images/favicon/mbooks.ico" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="css//materialize.css" type="text/css" rel="stylesheet">
    <link href="css//style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-brown-brown">
          <div class="nav-wrapper">
            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
               <a href="index.html" class="brand-logo darken-1">
                    <img src="images/logo/book99.png" style="height: 30px">
                    <span class="logo-text hide-on-med-and-down">Books 12</span>
                  </a>
                </h1>
              </li>
            </ul>
            <div class="header-search-wrapper hide-on-med-and-down">
              <?php
              date_default_timezone_set('Asia/Jakarta');
              if (!isset($_SESSION["id_admin"])) header("location:login.php");
              ?>
              <marquee direction="right" >
                <?php echo "Selamat Datang, " . $_SESSION['nama_admin'].".";?>
              </marquee>
            </div>
            <ul class="right hide-on-med-and-down">
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button" data-activates="translation-dropdown">
                  <span> Last access : <?php echo date("d M Y H:i:s") ;?></span>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <img src="images/admin/<?php echo $_SESSION['foto_admin'];?> " alt="avatar">
                    <i></i>
                  </span>
                </a>
              </li>
             </ul>
            <!-- translation-button -->
            <!-- notifications-dropdown -->
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
              <li>
                <a href="logout.php" class="grey-text text-darken-1">
                <i class="material-icons">keyboard_tab</i> Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- end header nav-->
    </header>
    <!-- END HEADER -->
    <!-- /////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
    <!-- START WRAPPER -->
      <div class="wrapper">
      <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
          <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
              <div class="row">
                <div class="col col s4 m4 l4">
                  <img src="images/admin/<?php echo $_SESSION['foto_admin'];?> " alt="" class="circle responsive-img valign profile-image cyan">
                </div>
                <div class="col col s8 m8 l8">
                   <ul id="profile-dropdown-nav" class="dropdown-content">
                      
                      <li>
                        <a href="logout.php" class="grey-text text-darken-1">
                          <i class="material-icons">keyboard_tab</i> Logout</a>
                      </li>
                  </ul>
                  <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav"><?php  echo $_SESSION['nama_admin']; ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                  <p class="user-roal">Administrator</p>
                </div>
              </div>
            </li>
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">
                <li class="bold">
                  <a href="index.php?halaman=home" class="waves-effect waves-cyan">
                    <i class="material-icons">home</i>
                    <span class="nav-text">Home</span>
                  </a>
                </li>
                <li class="bold">
                  <a href="index.php?halaman=ptkp" class="waves-effect waves-cyan">
                    <i class="material-icons">money_off</i>
                    <span class="nav-text">PTKP</span>
                  </a>
                </li>
                <li class="bold">
                  <a href="index.php?halaman=payroll" class="waves-effect waves-cyan">
                    <i class="material-icons">account_balance_wallet</i>
                    <span class="nav-text">Payroll</span>
                  </a>
                </li>
                <li class="bold">
                  <a href="index.php?halaman=laporan" class="waves-effect waves-cyan">
                    <i class="material-icons">description</i>
                    <span class="nav-text">Laporan</span>
                  </a> 
                </li>
              <li class="bold">
                <a href="index.php?halaman=admin" class="waves-effect waves-cyan">
                  <i class="material-icons">account_box</i>
                  <span class="nav-text">Admin</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only "><i class="material-icons">menu</i>
        </a>
      </aside>
      <!-- END LEFT SIDEBAR NAV-->
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <!-- START CONTENT -->
      <section id="content">
        <!--start container-->
          <div class="container">
            <?php 
              if (isset($_GET['halaman'])) {
               if($_GET['halaman']=='data_karyawan') {
                  include"data_karyawan.php";
                } elseif($_GET['halaman']=='gaji_karyawan') {
                  include"gaji_karyawan.php";
                } elseif($_GET['halaman']=='tambah_gaji') {
                  include"tambah_gaji.php";
                } elseif($_GET['halaman']=='tambah_karyawan'){
                  include"tambah_karyawan.php";
                } elseif($_GET['halaman']=='admin'){
                  include"admin.php";
                } elseif($_GET['halaman']=='home'){
                  include"home.php";
                } elseif($_GET['halaman']=='ptkp'){
                  include"ptkp.php";
                } elseif($_GET['halaman']=='detail_karyawan') {
                  include"detail_karyawan.php";
                } elseif($_GET['halaman']=='ubah_karyawan') {
                  include"ubah_karyawan.php";
                } elseif($_GET['halaman']=='hapus_karyawan') {
                  include"hapus_karyawan.php";
                } elseif($_GET['halaman']=='form_gaji') {
                  include"form_gaji.php";
                } elseif($_GET['halaman']=='gaji') {
                  include"gaji.php";
                } elseif($_GET['halaman']=='payroll') {
                  include"payroll.php";
                } elseif($_GET['halaman']=='tambah_payroll') {
                  include"tambah_payroll.php";
                } elseif($_GET['halaman']=='detail_payroll') {
                  include"detail_payroll.php";
                } elseif($_GET['halaman']=='hapus_payroll') {
                  include"hapus_payroll.php";
                } elseif($_GET['halaman']=='ubah_payroll') {
                  include"ubah_payroll.php";
                } elseif($_GET['halaman']=='detail_admin') {
                  include"detail_admin.php";
                } elseif($_GET['halaman']=='cetak_payroll') {
                  include"cetak_payroll.php";
                } elseif($_GET['halaman']=='laporan') {
                  include"laporan.php";
                }
              }
              else {
                include"home.php";
              }
            ?>
          </div>
        <!--end container-->
        </div>                                                                                       
      </section>
      <!-- END CONTENT -->
    </div>                                     
    <!-- END MAIN -->
    <!-- START FOOTER -->
<!--     <footer class="page-footer gradient-45deg-light-blue-cyan">
      <div class="footer-copyright">
        <div class="container">
          <span>Copyright ©
            <script type="text/javascript">
              document.write(new Date().getFullYear());
            </script> <a class="grey-text text-lighten-2" href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">Muhammad Ridwan</a> All rights reserved.</span>
          <span class="right hide-on-small-only"> Design and Developed by <a class="grey-text text-lighten-2" href="https://pixinvent.com/"> Muhammad Ridwan</a></span>
        </div>
      </div>
    </footer>
 -->    <!-- END FOOTER -->
    <!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="vendors/jquery-3.2.1.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

    
  </body>
</html>