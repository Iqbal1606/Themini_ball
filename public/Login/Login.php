<?php
    session_start();
 
?>
<?php
                if (isset($_POST['login'])) {
                    include "../koneksi.php";
                    $email_user = $_POST['email_user'];
                    $password    = $_POST['password_user'];
                    //var_dump($_POST);
                    //return false;
                    $cek_user = mysqli_query($conn, "SELECT * FROM user WHERE email_user='$email_user' and password_user='$password'");
                    
                    $row      = mysqli_num_rows($cek_user);

                    if ($row == 1) {
                        $fetch_pass = mysqli_fetch_assoc($cek_user);
                        //var_dump($fetch_pass);
                        //return false;
                        $cek_pass = $fetch_pass['password_user'];
                        if ($cek_pass != $password) {
                            echo "<script>alert('password salah');</script>";
                        } else {
                            $_SESSION['log'] =  $fetch_pass ;
                            $_SESSION['email_user'] = $email_user;
                            echo "<script>alert('login Berhasil');document.location.href='../keranjang.php';</script>";
                        }
                    } else {
                    
                        echo "<script>alert('email salah/belum terdaftar');</script>";
                    }
                }
                ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Icon CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <title>The Mini Ball</title>
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <!-- Login -->
            <div class="form login">
                <span class="title">Login</span>

                <form method="post">
                    <div class="input-field">
                        <input type="email" name="email_user" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password_user" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember Me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot Password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit"  name="login" value="Login">
                    </div>
                  

                    
                </form>
                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="signup/signup.php" class="text signup-link">Signup Now</a>
                    </span>
                    </div>

            
            </div>

            
        </div>
    </div>

    <script src="script.js"></script>

</body>
</html>
