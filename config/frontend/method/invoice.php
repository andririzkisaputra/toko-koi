<?php

class Invoice
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
        $query = 'SELECT * FROM invoice';
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
        $sql = 'INSERT INTO invoice (
            code_invoice,
            code_transaction,
            username,
            total_price,
            total_qty,
            status,
            created_at,
            updated_at
        )
        VALUES (
            "'.$data->code_invoice.'",
            "'.$data->code_transaction.'",
            "'.$data->username.'",
            '.$data->total_price.',
            '.$data->total_qty.',
            "'.$data->status.'",
            "'.$data->created_at.'",
            "'.$data->updated_at.'"
        )';
        return mysqli_query($this->db->connect(), $sql);
    }

    public function update($data)
    {
        $sql = 'UPDATE invoice SET
        status = '.$data->status.',
        updated_at = '.date('Y-m-d H:i:s').',
        AND username = "'.$data->username.'"';
        return mysqli_query($this->db->connect(), $sql);
    }

    public function delete($username)
    {
        $sql = 'DELETE FROM invoice WHERE username = "'.$username.'"';
        return $this->db->connect()->query($sql);
    }
}
