<?php
include('../server/db.php');
include('../frontend/method/cart.php');
include('../frontend/method/transaction.php');
include('../frontend/method/invoice.php');
$cart = new Cart;
$transaction = new Transaction;
$invoice = new Invoice;
$data_transaction = $cart->get_all();
$data_invoice = $cart->get_sum();
$code_invoice = 'IV'.rand(1000, 9999).date('YmdHis');
$code_transaction = 'TK'.rand(1000, 9999).date('YmdHis');
$date = date('Y-m-d H:i:s');
foreach ($data_transaction as $key => $value) {
    $data_transaction = [
        'code_transaction' => $code_transaction,
        'code_product' => $value->code_product,
        'username' => $_SESSION['user']->username,
        'price' => (int)$value->price,
        'qty' => (int)$value->qty,
        'status' => 'menunggu pembayaran',
        'created_at' => $date,
        'updated_at' => $date
    ];
    $data_transaction = $transaction->insert((object)$data_transaction);
}
$data_invoice = [
    'code_invoice' => $code_invoice,
    'code_transaction' => $code_transaction,
    'username' => $_SESSION['user']->username,
    'total_price' => (int)$data_invoice->price,
    'total_qty' => (int)$data_invoice->qty,
    'status' => 'menunggu pembayaran',
    'created_at' => $date,
    'updated_at' => $date
];
$data_invoice = $invoice->insert((object)$data_invoice);
print_r($data_invoice);
exit;
// $data = $transaction->insert((object)$data);
// if ($data) {
//     $data = $transaction->delete($_SESSION['user']->username);
// }
print_r(json_encode($data));