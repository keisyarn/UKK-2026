<?php

session_start();
include "db.php";

$username = $_POST['username'];
$password = md5($_POST['password']);


/* CEK ADMIN */

$queryAdmin = mysqli_query(
                    $koneksi,
                    "SELECT * FROM tb_admin
                     WHERE username='$username'
                     AND password='$password'"
                );

if(mysqli_num_rows($queryAdmin) > 0){

    $_SESSION['login'] = "tb_admin";
    $_SESSION['username'] = $username;

    header("Location: admin/dashboard.php");
    exit();

}


/* CEK SISWA */

$querySiswa = mysqli_query(
                    $koneksi,
                    "SELECT * FROM siswa
                     WHERE nis='$username'
                     AND password='$password'"
                );

if(mysqli_num_rows($querySiswa) > 0){

    $_SESSION['login'] = "siswa";
    $_SESSION['nis'] = $username;

    header("Location: siswa/input-aspirasi.php");
    exit();

}


/* JIKA SALAH */

echo "<script>
        alert('Username atau Password salah!');
        window.location='login.php';
      </script>";

?>