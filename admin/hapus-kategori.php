<?php
session_start();
include "../db.php";

/* cek login */
if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit();
}

/* ambil id */
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if($id > 0){

    /* hapus status aspirasi */
    mysqli_query($koneksi,
    "DELETE FROM aspirasi WHERE id_pelaporan='$id'");

    /* hapus data aspirasi */
    mysqli_query($koneksi,
    "DELETE FROM input_aspirasi WHERE id_pelaporan='$id'");

    echo "<script>
    alert('Data aspirasi berhasil dihapus');
    window.location='data-aspirasi.php';
    </script>";

}else{

    echo "<script>
    alert('Data tidak ditemukan');
    window.location='data-aspirasi.php';
    </script>";

}
?>