<?php 

include './admin/skeleton/config/controller.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="skeleton/assets/img/favicon.png" rel="icon"> -->
  <link rel="icon" href="../sia-kasmaran/admin/public/image/img/Pemkab.png">
  <link href="skeleton/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="skeleton/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="skeleton/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="skeleton/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="skeleton/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="skeleton/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="skeleton/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="skeleton/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="skeleton/assets/css/style.css" rel="stylesheet">

  <style>
    #hero {
      width: 100%;
      height: 100vh;
      position: relative;
      /* background: url("skeleton/assets/img/hero-bg.jpg") top center; */
      background: url("skeleton/assets/img/poltek.jpg") top center;
      background-size: cover;
      position: relative;
    }

    #hero:before {
      content: "";
      background: rgba(255, 255, 255, 0.6);
      position: absolute;
      bottom: 0;
      top: 0;
      left: 0;
      right: 0;
    }

    #hero .container {
      padding-top: 80px;
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">SIA-KASMARAN</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="skeleton/assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#fasilitas">Fasilitas</a></li>
          <li><a class="nav-link scrollto" href="#berita">Berita</a></li>
          <li><a class="nav-link scrollto" href="#layanan-adm">Layanan Admimistrasi</a></li>
          <li><a class="nav-link scrollto" href="#kontak">Kontak</a></li>
          <li><a class="nav-link scrollto" href="../sia-kasmaran/admin/login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->