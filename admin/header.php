<?php session_start(); 

include "lib/koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Planet Coffee &mdash; Planet Coffee</title>

  <!-- General CSS Files -->
  <link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Histories
              </div>
              <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">#Planet</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-header">
                Result
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="assets/img/products/product-3-50.png" alt="product">
                  oPhone S9 Limited Edition
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="assets/img/products/product-2-50.png" alt="product">
                  Drone X2 New Gen-7
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="assets/img/products/product-1-50.png" alt="product">
                  Headphone Blitz
                </a>
              </div>
              <div class="search-header">
                Projects
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-danger text-white mr-3">
                    <i class="fas fa-code"></i>
                  </div>
                  Stisla Admin Template
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-primary text-white mr-3">
                    <i class="fas fa-laptop"></i>
                  </div>
                  Create a new Homepage Design
                </a>
              </div>
            </div>
          </div>
        </form>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $_SESSION['username']; ?> <?= $_SESSION['level']; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Online</div>
              <a href="<?php echo $baseUrl;?>logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo $baseUrl; ?>dashboard.php" class="fas fa-meteor">Planet</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo $baseUrl; ?>dashboard.php">">Planet</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header" class="fas fa-meteor">Dashboard</li>
              <li><a class="nav-link" href="<?php echo $baseUrl; ?>dashboard.php"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            
                    <li class="menu-header">Main Menu</li>
              <?php
              //session_start();
              if($_SESSION['level']=='A'){ ?>
              <li><a class="nav-link" href="<?php echo $baseUrl;?>pages/kategori/main.php"><i class="fas fa-shopping-basket"></i> <span>Kategori</span></a></li>
              <li><a class="nav-link" href="<?php echo $baseUrl;?>pages/transaksi/main.php"><i class="fab fa-cc-visa"></i> <span>Transaksi</span></a></li>
              <li><a class="nav-link" href="<?php echo $baseUrl;?>pages/produk/main.php"><i class="fas fa-barcode"></i> <span>Produk</span></a></li>
              <li><a class="nav-link" href="<?php echo $baseUrl;?>pages/kota/main.php"><i class="fas fa-crosshairs"></i> <span>Kelurahan</span></a></li>
              <li><a class="nav-link" href="<?php echo $baseUrl;?>pages/jasa/main.php"><i class="fas fa-bicycle"></i> <span>Kurir</span></a></li>
              <li><a class="nav-link" href="<?php echo $baseUrl;?>pages/biaya/main.php"><i class="fas fa-donate"></i> <span>Biaya Kirim</span></a></li>
              <li><a class="nav-link" href="<?php echo $baseUrl;?>pages/bayar/main.php"><i class="fas fa-donate"></i> <span>Metode Bayar</span></a></li>
              <li><a class="nav-link" href="<?php echo $baseUrl;?>pages/pelanggan/main.php"><i class="fas fa-child"></i> <span>User</span></a></li>
              <li><a class="nav-link" href="<?php echo $baseUrl;?>pages/custom/main.php"><i class="fas fa-chalkboard-teacher"></i> <span>Customer</span></a></li>
              <li><a class="nav-link" href="<?php echo $baseUrl;?>logout.php"><i class="fas fa-power-off"></i> <span>Log Out</span></a></li>

              <?php } else {?>
              <li><a class="nav-link" href="<?php echo $baseUrl;?>pages/produk/main.php"><i class="fas fa-barcode"></i> <span>Produk</span></a></li>
              <li><a class="nav-link" href="<?php echo $baseUrl;?>logout.php"><i class="fas fa-power-off"></i> <span>Log Out</span></a></li>
              <?php } ?>
              
            </ul>  

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div>
        </aside>
      </div>