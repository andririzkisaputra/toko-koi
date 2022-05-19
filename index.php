<?php include('template/frontend/header.php'); ?>
<?php include('template/frontend/navbar.php'); ?>
<script>
    let user = false;
    <?php if(isset($_SESSION['user'])) : ?>
        user = <?= json_encode($_SESSION['user']['username']); ?>
    <?php endif; ?>
</script>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">Ikan Koi</h2>
                <p class="animate__animated fanimate__adeInUp">
                    Koi atau secara spesifiknya koi berasal dari bahasa Jepang yang berarti ikan karper. Lebih spesifik lagi merujuk pada nishikigoi, yang kurang lebih bermakna ikan karper yang bersulam emas atau perak
                </p>
                <a href="tentang.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Selengkapnya</a>
            </div>
        </div>
        <!-- <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        </a> -->
    </div>
</section><!-- End Hero -->

<main id="main">
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="section-title" >
                <h2>Produk</h2>
                <p>Tersedia</p>
            </div>

            <ul id="portfolio-flters" class="d-flex justify-content-end">
                <li data-filter=".filter-app">Terlaris</li>
                <li data-filter=".filter-card">Termurah</li>
                <li data-filter=".filter-web">Termahal</li>
            </ul>

            <div class="row product"></div>
            <div id="more" class="d-flex flex-column justify-content-end align-items-center">
                <button class="btn-get-started animate__animated animate__fadeInUp scrollto">Selengkapnya</button>
            </div>
        </div>
    </section><!-- End Portfolio Section -->
</main>

<script src="assets/js/home.js"></script>
<?php include('template/frontend/footer.php'); ?>