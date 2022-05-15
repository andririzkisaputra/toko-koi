<?php

class Product
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
        $query = mysqli_query($this->db->connect(), 'SELECT * FROM product');
		while($row = mysqli_fetch_array($query)){
			$data[] = $row;
		}
        $this->result = $data;
		return $this->result;
    }

    public function get_limit($limit)
    {
        $data  = [];
        $query = 'SELECT *, a.name AS name_product FROM product a, file_upload b
                WHERE a.session_upload_id = b.session_upload_id';
        $query .= ($limit) ? ' LIMIT '.$limit.'' : '';
        $query = mysqli_query($this->db->connect(), $query);
        while($row = mysqli_fetch_array($query)){
			$data[] = $row;
		}
        $this->result = $data;
		return $this->result;
    }
}
