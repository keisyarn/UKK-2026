<?php
session_start();
include "../db.php";

/* proteksi login */
if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit();
}

/* ambil id aspirasi */
$id = $_GET['id'];

/* ambil data aspirasi */
$data = mysqli_query($koneksi,
"SELECT * FROM input_aspirasi WHERE id_pelaporan='$id'");

$d = mysqli_fetch_assoc($data);


/* proses simpan status */
if(isset($_POST['simpan'])){

    $status = $_POST['status'];

    /* cek apakah sudah ada status */
    $cek = mysqli_query($koneksi,
    "SELECT * FROM aspirasi WHERE id_pelaporan='$id'");
  

    if(mysqli_num_rows($cek) > 0){

        /* update jika sudah ada */
        mysqli_query($koneksi,
        "UPDATE aspirasi
        SET status='$status'
        WHERE id_pelaporan='$id'");

    }else{

        /* insert jika belum ada */
        mysqli_query($koneksi,
        "INSERT INTO aspirasi (id_pelaporan,status)
        VALUES ('$id','$status')");

    }

    echo "<script>
    alert('Status berhasil diperbarui');
    window.location='data-aspirasi.php';
    </script>";

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Feedback Aspirasi</title>

<link rel="stylesheet" href="../css/feedback.css">

</head>

<body>

<div class="container">

<h2>Feedback Aspirasi</h2>

<div class="box">

<p>
<b>NIS :</b>
<?php echo $d['nis']; ?>
</p>

<p>
<b>Lokasi :</b>
<?php echo $d['lokasi']; ?>
</p>

<p>
<b>Keterangan :</b>
</p>

<div class="keterangan">
<?php echo $d['ket']; ?>
</div>


<form method="POST">

<label>Status Aspirasi</label>

<select name="status" required>

<option value="">
Pilih Status
</option>

<option value="proses">
diproses
</option>

<option value="selesai">
selesai
</option>

</select>

<button type="submit" name="simpan">
Simpan Status
</button>

</form>

</div>

</div>

</body>
</html>