<?php include('template/frontend/header.php'); ?>
<?php include('template/frontend/navbar.php'); ?>
<script>
    let user = false;
    <?php if(isset($_SESSION['user'])) : ?>
        user = <?= json_encode($_SESSION['user']->username); ?>
    <?php endif; ?>
</script>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Detail</h2>
            <ol>
            <li><a href="index.php">Home</a></li>
            <li>Detail</li>
            </ol>
        </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4 details"></div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<script src="assets/js/detail-product.js"></script>
<?php include('template/frontend/footer.php'); ?>
