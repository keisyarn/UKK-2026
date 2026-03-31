<?php
session_start();
include '../db.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,
"SELECT * FROM input_aspirasi WHERE id_pelaporan='$id'");

$d = mysqli_fetch_assoc($data);

if(isset($_POST['kirim'])){

$feedback = $_POST['feedback'];
$status = "Selesai";

mysqli_query($koneksi,
"UPDATE input_aspirasi 
SET feedback='$feedback', status='$status'
WHERE id_pelaporan='$id'");

echo "<script>
alert('Feedback berhasil dikirim');
window.location='data-aspirasi.php';
</script>";

}
?>

<h2>Feedback Aspirasi</h2>

<form method="post">

<p><b>Aspirasi :</b></p>
<p><?php echo $d['ket']; ?></p>

<textarea name="feedback" required></textarea>

<br><br>

<button type="submit" name="kirim">
Kirim Feedback
</button>

</form>