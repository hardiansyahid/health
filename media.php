<?php 
 error_reporting(0);
  session_start(); 
include"koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Health Klinik DR Cika Naya</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/logo_puskes.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio - v4.7.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="bi bi-clock"></i> Klinik DR Cika Naya
      </div>
     
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a href="#" class="logo me-auto"><img src="img/core-img/logo.png" width="50" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="?module=profil_puskes">Profil Klinik</a></li>
          <li><a class="nav-link scrollto" href="?module=hub">Hubungi Kami</a></li>
          <?php 
                  if($_SESSION['kode']==''){
                    ?> 
                                        <li><a href="?module=kunjungan">Daftar Kunjungan</a></li>
                               <?php
                  }else{
                    ?> 




                    <li class="dropdown"><a href="#"><span>Menu saya</span> <i class="bi bi-chevron-down"></i></a>
                                                <ul class="dropdown">
                        <li><a href="?module=profil_saya">Profil</a></li>
                        <li><a href="?module=rekam">Rekam Medis</a></li>
                        <li><a href="?module=history"> History Kunjungan</a></li>
                        </ul>
                                         </li>




                    
                    <li class="dropdown"><a href="#"><span>Menu Utama</span> <i class="bi bi-chevron-down"></i></a>
                                                <ul class="dropdown">
                        <li><a href="?module=poli">Daftar Poli</a></li>
                                                <li><a href="?module=kunjungan">Daftar Kunjungan</a></li>
                        <li><a href="?module=praktik">Jadwal Praktik</a></li>
                                                  

                                                    
                                                   
                                                </ul>
                                            </li>







                    <li><a href="logout.php">Logout</a></li> <?php
                  }
                  ?>
                                    

         
          
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
<?php 
                  if($_SESSION['kode']==''){
                    ?><a href="?module=login" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Masuk</a> <?php
                  }else{}?>
      

    </div>
  </header><!-- End Header -->

 
    <?php include"tengah.php"; ?>
   

  

   

  </main><!-- End #main -->

 <div style="position:fixed;left:20px;bottom:20px;overflow: hidden;">
<a href="https://api.whatsapp.com/send?phone=+6282376195401&text=Halo Klinik DR Cika">
<button style="background:#32C03C;vertical-align:center;height:36px;border-radius:5px">
<img src="https://www.tanjunglesung.com/wp-content/uploads/2018/12/logo-wa-whatsapp.png" width="30"> 
<font color="white">Chat Kami</font></button></a>
</div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Klinik DR Cika Naya</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>