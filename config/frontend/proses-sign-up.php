<?php
include('../server/db.php');
include('../frontend/method/user.php');
$user = new User;
<<<<<<< HEAD
$_POST = (object)$_POST;
$cek_user = $user->get_all($_POST);
=======
$cek_user = $user->get_by($_POST);
>>>>>>> ccb68164708c82fad7834319e9a4defa74432e83
if (!$cek_user) {
    $insert = $user->insert($_POST);
    if ($insert) {
        $_SESSION['user']=$_POST;
        echo "<script>alert('Berhasil Terdaftar!');window.location='../../'</script>";
    } else {
        echo "<script>alert('Gagal Silahkan Coba Lagi!');history.go(-1);</script>";
    }
} else {
    echo "<script>alert('Akun Sudah Terdaftar!');history.go(-1);</script>";
}