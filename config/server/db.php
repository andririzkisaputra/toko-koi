<?php

class Database
{
    protected $host;
    protected $database;
    protected $username;
    protected $password;

    public function __construct() {
        error_reporting(0);
        session_start();
        date_default_timezone_set('Asia/Jakarta');
        $this->host     = 'localhost';
        $this->database = 'toko-koi';
        $this->username = 'root';
        $this->password = '';
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
