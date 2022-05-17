<?php
    include('config/server/db.php');
    include('config/frontend/cart.php');
    include('config/frontend/category.php');
    $cart = new Cart();
    $category = new Category();
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode('/', $uri_path);
?>
<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Toko Koi</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        
        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-login.css" rel="stylesheet">

        <!-- Template Main JS File -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    </head>

    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
            <div class="container d-flex align-items-center justify-content-between">
                <div class="logo">
                    <h1><a href="index.php">Toko Koi</a></h1>
                </div>
                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto <?= ($uri[1] == 'index.php' || $uri[1] == '') ? 'active' : ''?>" href="index.php">Home</a></li>
                        <?php if (count($category->get_all()) > 0) : ?>
                            <li class="dropdown"><a href="#"><span>Kategori</span> <i class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">Ikan Koi Tancho</a></li>
                                    <li><a href="#">Ikan Koi Shiro Utsuri</a></li>
                                    <li><a href="#">Ikan Koi Ki Utsuri</a></li>
                                    <li><a href="#">Ikan Koi Kumpay Slayer</a></li>
                                </ul>
                            </li>
                        <?php endif ?>
                        <li><a class="nav-link scrollto <?= ($uri[1] == 'tentang.php') ? 'active' : ''?>" href="tentang.php">Tentang</a></li>
                        <?php if(!isset($_SESSION['user'])) : ?>
                            <li><a class="nav-link scrollto open-modal" href="javascript:void(0)">Login</a></li>
                            <li><a class="nav-link scrollto" href="sign-up.php">Signup</a></li>
                        <?php endif ?>
                        <?php if(isset($_SESSION['user'])) : ?>
                            <li>
                                <a class="nav-link scrollto" href="keranjang.php">Keranjang
                                    <span class="cart-count"><?= count($cart->get_all()) ?></span>
                                </a>
                            </li>
                            <li><a class="nav-link scrollto " href="akun.php">Akun</a></li>
                            <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
                        <?php endif ?>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
            </div>
        </header><!-- End Header -->