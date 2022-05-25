<?php
include('../server/db.php');
include('../frontend/method/user.php');
$user = new User;
$cek_user = $user->get_by((object)$_POST);
if ($cek_user) {
    $_SESSION['user'] = $cek_user;
    echo "<script>alert('Berhasil Login!');window.location='../../'</script>";
} else {
    echo "<script>alert('Akun Tidak Terdaftar!');history.go(-1);</script>";
}