<?php include('template/frontend/header.php'); ?>
<?php include('template/frontend/navbar.php'); ?>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Keranjang</h2>
                    <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>Keranjang</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->
        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="col-lg-12">
                    <div class="section-title" >
                        <h2>Keranjang</h2>
                        <p>Belanja</p>
                    </div>
                </div>
                <div class="col-lg-12 cart">
                    <div class="section-title" style="padding-bottom: 15px;">
                        <p>Penerima</p>
                        <hr>
                        <div class="row d-flex justify-content-between align-items-center">
                            <b class="col-lg-6">Nama Penerima</b>
                            <b class="col-lg-6"><?= $_SESSION['user']['name'] ?></b>
                        </div>
                        <hr>
                        <div class="row d-flex justify-content-between align-items-center">
                            <b class="col-lg-6">Nomor</b>
                            <b class="col-lg-6"><?= $_SESSION['user']['number'] ?></b>
                        </div>
                        <hr>
                        <div class="row d-flex justify-content-between align-items-center">
                            <b class="col-lg-6">Email</b>
                            <b class="col-lg-6"><?= $_SESSION['user']['email'] ?></b>
                        </div>
                        <hr>
                        <div class="row d-flex justify-content-between align-items-center">
                            <b class="col-lg-6">Alamat</b>
                            <b class="col-lg-6"><?= $_SESSION['user']['address'] ?></b>
                        </div>
                        <hr>
                        <p>Pembayaran</p>
                        <hr>
                        <div class="row d-flex justify-content-between align-items-center">
                            <b class="col-lg-6">Bank</b>
                            <b class="col-lg-6">BCA</b>
                        </div>
                        <hr>
                        <div class="row d-flex justify-content-between align-items-center">
                            <b class="col-lg-6">Nomor Rekening</b>
                            <b class="col-lg-6">1234567890</b>
                        </div>
                        <hr>
                        <div class="row d-flex justify-content-between align-items-center">
                            <b class="col-lg-6">Nama</b>
                            <b class="col-lg-6">Lawliet</b>
                        </div>
                        <hr>

                        <div id="more" class="d-flex flex-column align-items-center">
                            <button class="btn-get-started">Pilih Pembayaran</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 cart">
                    <div class="section-title" style="padding-bottom: 15px;">
                        <p>Keranjang</p>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <td></td>
                                <td>Produk</td>
                                <td>Sex</td>
                                <td>Quality</td>
                                <td>Size</td>
                                <td>Qty</td>
                                <td>Harga</td>
                                <td>Total</td>
                                <td>Hapus</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    <div class="row col-lg-12 d-flex justify-content-between" style="padding: 15px;">
                        <div class="col-lg-7 cart">
                            <div class="section-title" >
                                <p>Keterangan Belanja</p>
                                <b>Total belanja belum termasuk pajak pengiriman</b>
                            </div>
                        </div>
                        <div class="col-lg-4 cart">
                            <div class="section-title" style="padding-bottom: 15px;">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <b class="col-lg-6">SubTotal</b>
                                    <b class="col-lg-6">Rp 21.000</b>
                                </div>
                                <div class="row d-flex justify-content-between align-items-center">
                                    <p class="col-lg-6">Total</p>
                                    <b class="col-lg-6">Rp 21.000</b>
                                </div>
                                <hr>
                                <div id="more" class="d-flex flex-column align-items-center">
                                    <button class="btn-get-started">Bayar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Portfolio Details Section -->
    </main>
<script src="assets/js/keranjang.js"></script>
<?php include('template/frontend/footer.php'); ?>