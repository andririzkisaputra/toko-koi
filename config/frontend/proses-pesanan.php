<?php
include('../server/db.php');
include('../frontend/method/cart.php');
$cart = new Cart;
$data = $cart->get_all();
$data = [
    'username' => $_SESSION['user']['username'],
];
print_r(json_encode($data));