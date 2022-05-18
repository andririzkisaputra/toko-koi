<?php

class User
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
        $query = 'SELECT * FROM user';
        $query .= ($where) ? ' WHERE username = "'.$where['username'].'"' : '';
        $query = mysqli_query($this->db->connect(), $query);
		while($row = mysqli_fetch_array($query)){
			$data[] = $row;
		}
        $this->result = $data;
		return $this->result;
    }
}
