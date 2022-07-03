<!DOCTYPE html>
<html>

<head>
<little>Dashboard SIA</title>
</head>

</body>
    <h2>Halaman Admin</h2>
    <br/>

    <!-- Cek apakah sudah login -->
    <?php
    session_start();
    if($_SESSION['status'] !="login"){
        header("location:../index.php?pesan=belum_login");
    }
    ?>

    <h4>Selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login/</h4>

    <br/>
    <br/>

    <a href="logout.php">LOGOUT</a>
</body>

</html>