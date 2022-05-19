<?php

class Payment
{
    protected $data;
    protected $db;
    protected $result;

    public function __construct() {
        $this->db = new Database;
    }

    public function selectPayment($where = [])
    {
        $data  = [];
        $data_payment = 'SELECT * FROM payment WHERE is_active = "1" AND code_bank = "'.$where['code_bank'].'"';
        $data_payment = mysqli_query($this->db->connect(), $data_payment);
        while($row_payment = mysqli_fetch_object($data_payment)){
            $payment = 'SELECT * FROM payment WHERE is_active = "1" ORDER BY id';
            $payment = mysqli_query($this->db->connect(), $payment);
            while($params = mysqli_fetch_object($payment)){
                $row_payment->list_payment[] = $params;
            }
            $data = $row_payment;
        }
        $this->result = $data;
		return $this->result;
    }
}
