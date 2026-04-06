<!DOCTYPE html>
<html>

<head>
<title>Login Sistem</title>

<link rel="stylesheet" href="css/login.css">

</head>

<body>

<div class="login-container">

    <form action="proses-login.php" method="post" class="login-box">

        <h3>Login Sistem</h3>

        <p class="subtitle">
            Aplikasi Pengaduan Aspirasi Siswa
        </p>

        <hr>

        <input
        type="text"
        name="username"
        placeholder="Username / NIS"
        required
        >

        <input
        type="password"
        name="password"
        placeholder="Password"
        required
        >

        <button type="submit">
            Login
        </button>

    </form>

</div>

</body>
</html>