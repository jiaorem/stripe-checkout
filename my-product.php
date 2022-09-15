<?php

require "vendor/autoload.php";

$stripe = new \Stripe\StripeClient(
  'sk_test_51LgIL6JDVdkZQkB8LlIgHQbRhd0nkWRJZmUlg32mJIleQ6DyHGmdMg2JXKk3wXWenDOaQ8fMGgmBBSt0wmJeY0HY00FjrBokRO'
);
$product = $stripe->products->retrieve(
	'prod_MP6pNBh2v4EVfo',
	[]
);
$price = $stripe->prices->retrieve('price_1LgIbxJDVdkZQkB8WQuERC4Y',[]);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Apple Store</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
        <script src="https://js.stripe.com/v3/"></script>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Apple</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Store</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Mac</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">iPad</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">iPhone</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Watch</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Airpods</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">TV&Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Only on Apple</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Accessories</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Support</a></li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo array_pop($product->images); ?>" alt="<?php echo $product->name; ?>" /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?php echo $product->name; ?></h1>
                        <p class="lead">iPhone 99 40TB</p>
                        <p class="lead"><?php echo $product->description; ?></p>
                        <div class="fs-5 mb-5">
                            <h2><?php echo strtoupper($price->currency); ?> <?php echo $price->unit_amount_decimal; ?></h2>
                        </div>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <form action="/stripe-checkout/create-checkout-session.php" method="POST">
                            <button class="btn btn-outline-dark flex-shrink-0" type="submit" id="checkout-button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Micoh Jomarie A. Yabut 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
