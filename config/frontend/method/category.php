<?php

class Category
{
    protected $data;
    protected $db;
    protected $result;

    public function __construct() {
        $this->db = new Database;
    }

    public function get_all()
    {
        $data  = [];
        $query = mysqli_query($this->db->connect(), 'SELECT * FROM category');
		while($row = mysqli_fetch_array($query)){
			$data[] = $row;
		}
        $this->result = $data;
		return $this->result;
    }
}
