<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <h1><a href="index.php">Juwita Fish Farm</a></h1>
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
                    <li><a class="nav-link scrollto" href="login.php">Login</a></li>
                <?php endif ?>
                <?php if(isset($_SESSION['user'])) : ?>
                    <li>
                        <a class="nav-link scrollto <?= ($uri[1] == 'keranjang.php') ? 'active' : ''?>" href="keranjang.php">Keranjang
                            <?php if ($cart->get_all()) : ?>
                                <span class="cart-count"><?= count($cart->get_all()); ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li><a class="nav-link scrollto <?= ($uri[1] == 'pesanan.php') ? 'active' : ''?>" href="pesanan.php">Pesanan</a></li>
                    <li><a class="nav-link scrollto <?= ($uri[1] == 'akun.php') ? 'active' : ''?>" href="akun.php">Akun</a></li>
                    <li><a class="nav-link scrollto" href="config/frontend/logout.php">Logout (<?= $_SESSION['user']->username; ?>)</a></li>
                <?php endif ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->