<?php
include('../server/db.php');
include('../frontend/method/product.php');
$product = new Product;
$data['data'] = $product->get_limit($_POST);
$data['count'] = count($product->get_all());
print_r(json_encode($data));