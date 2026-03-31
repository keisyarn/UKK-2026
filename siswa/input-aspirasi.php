<?php
session_start();
include '../db.php';

if(!isset($_SESSION['login']) || $_SESSION['login'] != "siswa"){
    header("Location: ../login.php");
    exit();
}

$nis = $_SESSION['nis'];

if(isset($_POST['kirim'])){

    $kategori = $_POST['kategori'];
    $lokasi   = $_POST['lokasi'];
    $ket      = $_POST['ket'];
    $tgl_input  = date('Y-m-d');

    $insert = mysqli_query($koneksi,
        "INSERT INTO input_aspirasi
        (nis,id_kategori,lokasi,ket,tgl_input)
        VALUES
        ('$nis','$kategori','$lokasi','$ket','$tgl_input')"
    );

    if($insert){
        echo "<script>alert('Aspirasi berhasil dikirim');</script>";
    }else{
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Input Aspirasi Siswa</title>

<link rel="stylesheet" href="../css/input-aspirasi.css">

</head>

<body>

<div class="container">

<h2>Form Aspirasi Siswa</h2>

<form method="post">

<label>NIS</label>

<input type="text" value="<?php echo $nis; ?>" readonly>

<label>Kategori</label>

<select name="kategori" required>

<option value="">Pilih Kategori</option>

<?php
$kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
while($k = mysqli_fetch_assoc($kategori)){
?>

<option value="<?php echo $k['id_kategori']; ?>">
<?php echo $k['ket_kategori']; ?>
</option>

<?php } ?>

</select>

<label>Lokasi</label>

<input type="text" name="lokasi" placeholder="Contoh : Kelas 12 RPL 2" required>

<label>Keterangan</label>

<textarea name="ket" placeholder="Tuliskan aspirasi atau pengaduan..." required></textarea>

<button type="submit" name="kirim">
Kirim Aspirasi
</button>

</form>

</div>

</body>
</html>