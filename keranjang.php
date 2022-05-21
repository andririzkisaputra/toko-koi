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
                <div class="data-info">
                    <div class="col-lg-12 cart">
                        <div class="section-title" style="padding-bottom: 15px;">
                            <p>Penerima</p>
                            <hr>
                            <div class="row d-flex justify-content-between align-items-center">
                                <b class="width-50">Nama Penerima</b>
                                <b class="width-50"><?= $_SESSION['user']['name'] ?></b>
                            </div>
                            <hr>
                            <div class="row d-flex justify-content-between align-items-center">
                                <b class="width-50">Nomor</b>
                                <b class="width-50"><?= $_SESSION['user']['number'] ?></b>
                            </div>
                            <hr>
                            <div class="row d-flex justify-content-between align-items-center">
                                <b class="width-50">Email</b>
                                <b class="width-50"><?= $_SESSION['user']['email'] ?></b>
                            </div>
                            <hr>
                            <div class="row d-flex justify-content-between align-items-center">
                                <b class="width-50">Alamat</b>
                                <b class="width-50"><?= $_SESSION['user']['address'] ?></b>
                            </div>
                            <hr>
                            <div class="payment-details"></div>
                            <div class="bank-list"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 cart">
                    <div class="section-title" style="padding-bottom: 15px;">
                        <p>Keranjang</p>
                    </div>
                    <div style="overflow: scroll;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td scope="col"></td>
                                    <td scope="col">Produk</td>
                                    <td scope="col">Sex</td>
                                    <td scope="col">Quality</td>
                                    <td scope="col">Size</td>
                                    <td scope="col">Qty</td>
                                    <td scope="col"></td>
                                    <td scope="col">Harga</td>
                                    <td scope="col"></td>
                                    <td scope="col">Total</td>
                                    <td scope="col"></td>
                                    <td scope="col"></td>
                                    <td scope="col"></td>
                                    <td scope="col">Hapus</td>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="row col-lg-12 d-flex justify-content-between rincian" style="padding: 15px;">
                        <div class="col-lg-7 cart">
                            <div class="section-title" >
                                <p>Keterangan Belanja</p>
                                <b>Total belanja belum termasuk pajak pengiriman</b>
                            </div>
                        </div>
                        <div class="col-lg-4 cart">
                            <div class="section-title" style="padding-bottom: 15px;">
                                <div class="row d-flex justify-content-between align-items-center subtotal"></div>
                                <div class="row d-flex justify-content-between align-items-center total"></div>
                                <hr>
                                <div id="more" class="d-flex flex-column align-items-center">
                                    <button class="btn-get-started beli">Bayar</button>
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