<?php
include('../server/db.php');
include('../frontend/method/cart.php');
$cart = new Cart;
$data = $cart->get_all_cart();
print_r(json_encode($data));