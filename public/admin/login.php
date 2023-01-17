<?php
    session_start();
 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login Mahasiswa</title>
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>The Mini Ball</h1>
        <h1>Admin</h1>
        <h2>Website Thrifting  Hoddie dan Crewneck</h2>
        <div class="wrapper">
            <div class="title">Login</div>
            <form method= "post">
                <div class="field">
                   <input type="text" name="username_admin" placeholder="Masukan Username" required>
                    
                </div>
                <div class="field">
                   <input type="password" name="password_admin" placeholder="Masukkan Password" required>
                    
                </div>
                <div class="content">
                    <input type="checkbox" id="ingatkan saya">
                    <label for="ingatkan saya">Ingatkan saya</label>
                </div>
                <div class="pass-link">
                    <a href="#">Lupa Password</a>
                </div>

                <div class="field">
                    <input type="submit"  name="login" value="Login">
                </div>
            </form> 

            <?php
if (isset($_POST['login'])) {
    include "../koneksi.php";
    $username_admin = $_POST['username_admin'];
    $password    = $_POST['password_admin'];
    $cek_user = mysqli_query($conn, "SELECT * FROM `admin` WHERE  username_admin='$username_admin' and password_admin='$password'");
    $row      = mysqli_num_rows($cek_user);
    if ($row == 1) {
    $fetch_pass = mysqli_fetch_assoc($cek_user);

    $cek_pass = $fetch_pass['password_admin'];
    if ($cek_pass != $password) {
      echo "<script>alert('password salah');</script>";
    } else {
    $_SESSION['log'] = true;
    $_SESSION['id_admin'] = $fetch_pass;
    echo "<script>alert('login Berhasil');document.location.href='index.php';</script>";
        }
} else {
    echo "<script>alert('Email salah/belum terdaftar');</script>";
}
}
?>
        </div>
    </body>
</html>