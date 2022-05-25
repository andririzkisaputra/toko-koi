<?php
session_start();
unset($_SESSION['user']);
echo "<script>alert('Berhasil Logout!');window.location='../../';</script>";