<?php
include('../server/db.php');
include('../frontend/method/cart.php');
include('../frontend/method/product.php');
$cart = new Cart;
$product = new Product;
$select = $cart->get_by($_GET);
if (!$select) {
    $select_product = $product->get_by([
        'code_product' => $_GET['product']
    ]);
    $insert = $cart->insert($select_product);
    if ($insert) {
        print_r('berhasil di input');
        exit;
    }
} else {
    $select_product = $product->get_by([
        'code_product' => $_GET['product']
    ]);
    $select->qty++;
    $select->price = $select_product->price*$select->qty;
    $update = $cart->update($select);
    if ($update) {
        print_r('berhasil di update');
        exit;
    }
}