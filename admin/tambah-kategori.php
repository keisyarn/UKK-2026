<?php
    session_start();
    include '../db.php';

    /* cek login */
    if(!isset($_SESSION['login']) || $_SESSION['login'] != true){
        echo '<script>window.location="../login.php"</script>';
    }

    /* proses simpan kategori */
    if(isset($_POST['simpan'])){

        $kategori = $_POST['ket_kategori'];

        $insert = mysqli_query(
                    $koneksi,
                    "INSERT INTO kategori (ket_kategori)
                     VALUES ('$kategori')"
                 );

        if($insert){

            echo "<script>
                    alert('Kategori berhasil ditambahkan');
                    window.location='dashboard.php';
                  </script>";

        }else{

            echo "<script>
                    alert('Kategori gagal ditambahkan');
                  </script>";

        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tambah Kategori</title>

    <link rel="stylesheet" href="../css/tambah-kategori.css">

</head>

<body>

    <!-- CONTENT -->
    <section class="section">

        <div class="container">

            <h2>
                Tambah Kategori Pengaduan
            </h2>

            <div class="form-box">

                <form method="post">

                    <label>
                        Nama Kategori
                    </label>

                    <input 
                        type="text"
                        name="ket_kategori"
                        placeholder="Masukkan kategori..."
                        required
                    >

                    <button 
                        type="submit"
                        name="simpan"
                    >
                        Simpan Kategori
                    </button>

                </form>

            </div>

        </div>

    </section>

</body>
</html>