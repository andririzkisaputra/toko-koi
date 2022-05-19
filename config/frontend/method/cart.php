<?php

class Cart
{
    protected $data;
    protected $db;
    protected $result;

    public function __construct() {
        $this->db = new Database;
    }

    public function get_all($where = [])
    {
        $data  = [];
        $query = 'SELECT * FROM cart';
        $query .= ' WHERE username = "'.$_SESSION['user']['username'].'"';
        if ($where) {
            $query .= ' AND code_product = "'.$where['product'].'"';
        }
        $query = mysqli_query($this->db->connect(), $query);
		while($row = mysqli_fetch_object($query)){
			$data[] = $row;
		}
        $this->result = $data;
		return $this->result;
    }

    public function get_all_cart()
    {
        $data  = [];
        $cart = 'SELECT * FROM cart';
        $cart .= ' WHERE username = "'.$_SESSION['user']['username'].'"';
        $cart = mysqli_query($this->db->connect(), $cart);
		while($row = mysqli_fetch_object($cart)){
            $data_product = null;
            $product = mysqli_query($this->db->connect(), 
                'SELECT p.*, f.name AS gambar FROM product p, file_upload f 
                WHERE p.session_upload_id = f.session_upload_id 
                AND f.type = "img"
                AND p.code_product = "'.$row->code_product.'"'
            );
            while($row_product = mysqli_fetch_object($product)){
                $data_product = $row_product;
            }
            $row->product = ($data_product) ? $data_product : null;
			$data['cart'][] = $row;
		}
        $data_payment = 'SELECT * FROM payment WHERE is_active = "1" ORDER BY id ASC LIMIT 1';
        $data_payment = mysqli_query($this->db->connect(), $data_payment);
        while($row_payment = mysqli_fetch_object($data_payment)){
            $payment = 'SELECT * FROM payment WHERE is_active = "1" ORDER BY id';
            $payment = mysqli_query($this->db->connect(), $payment);
            while($params = mysqli_fetch_object($payment)){
                $row_payment->list_payment[] = $params;
            }
            $data['payment'] = $row_payment;
        }
        $this->result = $data;
		return $this->result;
    }

    public function get_by($where = [])
    {
        $data  = [];
        $query = 'SELECT * FROM cart';
        $query .= ' WHERE username = "'.$_SESSION['user']['username'].'"';
        if ($where) {
            $query .= ' AND code_product = "'.$where['product'].'"';
        }
        $query = mysqli_query($this->db->connect(), $query);
		while($row = mysqli_fetch_object($query)){
			$data = $row;
		}
        $this->result = $data;
		return $this->result;
    }

    public function insert($data)
    {
        $sql = 'INSERT INTO cart (
            code_product,
            username,
            qty,
            price,
            created_at
        )
        VALUES (
            "'.$data->code_product.'",
            "'.$_SESSION['user']['username'].'",
            1,
            '.$data->price.',
            "'.date('Y-m-d H:i:s').'"
        )';
        return mysqli_query($this->db->connect(), $sql);
    }

    public function update($data)
    {
        $sql = 'UPDATE cart SET 
        qty = '.$data->qty.',
        price = '.$data->price.'
        WHERE code_product = "'.$data->code_product.' "
        AND username = "'.$_SESSION['user']['username'].'"';
        return mysqli_query($this->db->connect(), $sql);
    }

    public function delete($where)
    {
        $sql = 'DELETE FROM cart WHERE id = '.$where->id;
        return $this->db->connect()->query($sql);
    }
}
