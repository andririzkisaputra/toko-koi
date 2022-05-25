<?php

class Transaction
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
        $query = 'SELECT * FROM transaction';
        $query .= ' WHERE username = "'.$_SESSION['user']->username.'"';
        $query = mysqli_query($this->db->connect(), $query);
		while($row = mysqli_fetch_object($query)){
			$data[] = $row;
		}
        $this->result = $data;
		return $this->result;
    }

    public function insert($data)
    {
        $sql = 'INSERT INTO transaction (
            code_transaction,
            code_product,
            username,
            price,
            qty,
            status,
            created_at,
            updated_at
        )
        VALUES (
            "'.$data->code_transaction.'",
            "'.$data->code_product.'",
            "'.$data->username.'",
            '.$data->price.',
            '.$data->qty.',
            "'.$data->status.'",
            "'.$data->create_at.'",
            "'.$data->updated_at.'"
        )';
        return mysqli_query($this->db->connect(), $sql);
    }

    public function update($data)
    {
        $sql = 'UPDATE transaction SET
        status = '.$data->status.',
        updated_at = '.date('Y-m-d H:i:s').',
        AND username = "'.$data->username.'"';
        return mysqli_query($this->db->connect(), $sql);
    }

    public function delete($username)
    {
        $sql = 'DELETE FROM transaction WHERE username = "'.$username.'"';
        return $this->db->connect()->query($sql);
    }
}
