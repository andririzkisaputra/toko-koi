<?php

class User
{
    protected $data;
    protected $db;
    protected $result;

    public function __construct() {
        $this->db = new Database;
    }

    public function get_by($where = [])
    {
        $data  = [];
        $query = 'SELECT * FROM user';
        $query .= ($where) ? ' WHERE username = "'.$where->username.'" AND password = "'.$where->password.'"' : '';
        $query = mysqli_query($this->db->connect(), $query);
		while($row = mysqli_fetch_object($query)){
			$data = $row;
		}
        $this->result = $data;
		return $this->result;
    }

    public function insert($data)
    {
        $sql = 'INSERT INTO user (
            username,
            name,
            number,
            email,
            password,
            address,
            created_at
        )
        VALUES (
            "'.$data->username.'",
            "'.$data->name.'",
            "'.$data->number.'",
            "'.$data->email.'",
            "'.$data->password.'",
            "'.$data->address.'",
            "'.date('Y-m-d H:i:s').'"
        )';
        return mysqli_query($this->db->connect(), $sql);
    }
}
