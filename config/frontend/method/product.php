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

    public function get_by($where = [])
    {
        $data  = [];
        $query = 'SELECT *, a.name AS name_product FROM product a, file_upload b 
                WHERE a.session_upload_id = b.session_upload_id 
                AND a.is_active = "1"
                AND b.type = "img"';
        $query .= ($where) ? ' AND a.code_product = "'.$where['code_product'].'"' : '';
        $query = mysqli_query($this->db->connect(), $query);
		while($row = mysqli_fetch_object($query)){
			$data = $row;
		}
        $this->result = $data;
		return $this->result;
    }

    public function get_limit($where = [])
    {
        $data  = [];
        $query = 'SELECT *, name AS name_product FROM product
                WHERE is_active = "1"';
        $query .= ($where['limit']) ? ' LIMIT '.$where['limit'].'' : '';
        $query = mysqli_query($this->db->connect(), $query);
        while($row = mysqli_fetch_object($query)){
            $cart = 0;
            $query_cart = mysqli_query($this->db->connect(), 
                'SELECT qty FROM cart
                WHERE code_product = "'.$row->code_product.'"
                AND username = "'.$_SESSION['user']->username.'"'
            );
            while($row_cart = mysqli_fetch_object($query_cart)){
                $cart = $row_cart;
            }
            $query_file_upload = mysqli_query($this->db->connect(), 
                'SELECT * FROM file_upload
                WHERE session_upload_id = "'.$row->session_upload_id.'"
                AND type = "img"'
            );
            while($row_file_upload = mysqli_fetch_object($query_file_upload)){
                $file_upload = $row_file_upload;
            }
            $row->qty = ($cart) ? $cart->qty : 0;
            $row->name = ($file_upload) ? $file_upload->name : NULL;
            $row->type = ($file_upload) ? $file_upload->type : NULL;
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
		while($row = mysqli_fetch_object($query)){
			$data['product'][] = $row;
            $query_file_upload = mysqli_query($this->db->connect(), 'SELECT * FROM file_upload WHERE session_upload_id = "'.$row->session_upload_id.'"');
            while($row_file_upload = mysqli_fetch_array($query_file_upload)){
                $data['file_upload'][] = $row_file_upload;
            }
		}
        $this->result = $data;
		return $this->result;
    }
}
