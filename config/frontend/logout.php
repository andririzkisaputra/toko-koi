<?php
session_start();
unset($_SESSION['user']);
echo "<script>alert('Berhasil Logout!');history.go(-1);</script>";