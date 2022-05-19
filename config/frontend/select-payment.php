<?php
include('../server/db.php');
include('../frontend/method/payment.php');
$payment = new Payment;
$data = $payment->selectPayment($_POST);
print_r(json_encode($data));