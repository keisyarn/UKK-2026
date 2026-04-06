<?php
    session_start();

    if(!isset($_SESSION['login']) || $_SESSION['login'] != true){
        echo '<script>window.location="../login.php"</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <!-- HEADER -->
    <header>
        <div class="container header-flex">
            <div class="logo">
                <h1>Pengaduan Aspirasi Siswa</h1>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="logout.php" class="logout">
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>


    <!-- CONTENT -->
    <section class="section">
        <div class="container">
            <h2>
                Dashboard Admin
            </h2>
            <div class="card">
                <p>
                    Selamat datang di sistem <b>Pengaduan Aspirasi Siswa</b>.
                    Melalui sistem ini siswa dapat menyampaikan aspirasi,
                    kritik, dan saran terkait fasilitas maupun kegiatan
                    di sekolah agar dapat ditindaklanjuti oleh pihak sekolah.
                </p>
            </div>

            <div class="menu-box">

                <a href="data-aspirasi.php" class="menu-card">
                    <h3>
                        Data Aspirasi
                    </h3>
                    <p>
                        Melihat seluruh laporan aspirasi siswa.
                    </p>
                </a>

                <a href="tambah-kategori.php" class="menu-card">
                    <h3>
                        Tambah Kategori
                    </h3>
                    <p>
                        Menambahkan kategori pengaduan siswa.
                    </p>
                </a>

            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer>
        <div class="container">
            <p>
                © 2026 Sistem Pengaduan Aspirasi Siswa
            </p>
        </div>
    </footer>
</body>
</html>