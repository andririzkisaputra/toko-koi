<?php

class Database
{
    protected $host;
    protected $database;
    protected $username;
    protected $password;

    public function __construct() {
        session_start();
        date_default_timezone_set('Asia/Jakarta');
        $this->host     = 'localhost';
        $this->database = 'kemasayu_toko-koi';
        $this->username = 'kemasayu';
        $this->password = '1ql4BuBU8N9(m:';
    }

    public function connect()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if ($conn == false) {
            die(mysqli_connect_error());
        }

        return $conn;
    }
}
