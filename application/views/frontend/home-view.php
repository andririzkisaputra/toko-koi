<!doctype html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Headers · Bootstrap v5.1</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

        <!-- Bootstrap core CSS -->
        <link href="assets/frontend/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="assets/frontend/css/headers.css" rel="stylesheet">
        <!-- Icon -->
        <?php include("assets/frontend/icons/my-icon.svg"); ?>
    </head>
    <body>
        <main>
            <header>
                <div class="px-3 py-2 bg-dark text-white">
                    <div class="container">
                        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                            <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                                <h1>Toko Koi</h1>
                            </a>
                            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                                <li>
                                    <a href="#" class="nav-link text-secondary">
                                        <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"/></svg>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link text-white">
                                        <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#table"/></svg>
                                        Orders
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link text-white">
                                        <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#grid"/></svg>
                                        Products
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link text-white">
                                        <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#people-circle"/></svg>
                                        Customers
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="px-3 py-2 border-bottom mb-3">
                    <div class="container d-flex flex-wrap justify-content-center">
                        <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">
                            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                        </form>
                        <div class="text-end">
                            <button type="button" class="btn btn-light text-dark me-2">Login</button>
                            <button type="button" class="btn btn-primary">Sign-up</button>
                        </div>
                    </div>
                </div>
            </header>
        </main>
    <script src="assets/frontend/js/bootstrap.bundle.min.js"></script>      
    </body>
</html>
