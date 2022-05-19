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
        $query = 'SELECT * FROM cart c, file_upload f, user u, product p'; 
        $query .= ' WHERE p.session_upload_id = f.session_upload_id';
        $query .= ' AND c.code_product = p.code_product';
        $query .= ' AND c.username = u.username';
        $query .= ' AND c.username = "'.$_SESSION['user']['username'].'"';
        if ($where) {
            $query .= ' AND c.code_product = "'.$where['product'].'"';
        }
        $query = mysqli_query($this->db->connect(), $query);
		while($row = mysqli_fetch_object($query)){
			$data[] = $row;
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
