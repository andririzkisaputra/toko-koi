<?php
include('../server/db.php');
include('../frontend/method/cart.php');
$cart = new Cart;
$data['cart'] = $cart->get_all();
print_r(json_encode($data));