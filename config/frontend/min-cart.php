<?php
include('../server/db.php');
include('../frontend/method/cart.php');
include('../frontend/method/product.php');
$cart = new Cart;
$product = new Product;
$select_cart = $cart->get_by($_POST);
$select_product = $product->get_by([
    'code_product' => $_POST['product']
]);
$select_cart->qty--;
if ($select_cart->qty != 0) {
    $select_cart->price = $select_product->price*$select_cart->qty;
    $update = $cart->update($select_cart);
    print_r(json_encode($update));
} else {
    $delete = $cart->delete($select_cart);
    print_r(json_encode($delete));
}
