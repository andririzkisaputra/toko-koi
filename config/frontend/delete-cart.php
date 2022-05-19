<?php
include('../server/db.php');
include('../frontend/method/cart.php');
$data = null;
$cart = new Cart;
$select_cart = $cart->get_by($_POST);
if ($select_cart) {
    $data = $cart->delete($select_cart);
}
print_r(json_encode($data));