<?php
include('../server/db.php');
include('../frontend/product.php');
$product = new Product;
$data['data'] = $product->get_limit($_POST['limit']);
$data['count'] = count($product->get_all());
print_r(json_encode($data));