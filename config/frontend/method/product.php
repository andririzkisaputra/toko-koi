<?php

class Product
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
        $query = 'SELECT *, a.name AS name_product FROM product a, file_upload b 
                WHERE a.session_upload_id = b.session_upload_id 
                AND a.is_active = "1"
                AND b.type = "img"';
        $query .= ($where) ? ' AND a.code_product = "'.$where['code_product'].'"' : '';
        $query = mysqli_query($this->db->connect(), $query);
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
                WHERE a.session_upload_id = b.session_upload_id 
                AND a.is_active = "1"
                AND b.type = "img"';
        $query .= ($limit) ? ' LIMIT '.$limit.'' : '';
        $query = mysqli_query($this->db->connect(), $query);
        while($row = mysqli_fetch_array($query)){
			$data[] = $row;
		}
        $this->result = $data;
		return $this->result;
    }

    public function get_detail_product($where = [])
    {
        $data  = [];
        $query = 'SELECT * FROM product
                WHERE is_active = "1"
                AND code_product = "'.$where['code_product'].'"';
        $query = mysqli_query($this->db->connect(), $query);
		while($row = mysqli_fetch_array($query)){
			$data['product'][] = $row;
            $query = mysqli_query($this->db->connect(), 'SELECT * FROM file_upload WHERE session_upload_id = '.$row['session_upload_id'].'');
            while($row = mysqli_fetch_array($query)){
                $data['file_upload'][] = $row;
            }
		}
        $this->result = $data;
		return $this->result;
    }
}
