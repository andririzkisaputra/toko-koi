<?php include('template/frontend/header.php'); ?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(assets/img/bg-1.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign Up</h3>
                                </div>
                            </div>
                            <form method="POST" action="config/frontend/proses-sign-up.php" class="signin-form">
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="username" required>
                                    <label class="form-control-placeholder" for="username">Username</label>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="name" required>
                                    <label class="form-control-placeholder" for="name">Nama</label>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea type="text" class="form-control" name="address" required></textarea>
                                    <label class="form-control-placeholder" for="address">Alamat</label>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="email" required>
                                    <label class="form-control-placeholder" for="email">Email</label>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="number" class="form-control" name="number" required>
                                    <label class="form-control-placeholder" for="number">HP</label>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control" name="password" required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
                                </div>
                            </form>
                            <p class="text-left"><a data-toggle="tab" href="login.php"><i class="fa fa-fw fa-arrow-left"></i> Kembali</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include('template/frontend/footer.php'); ?>
