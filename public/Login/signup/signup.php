<?php
                     include "../../koneksi.php";
                     if(isset($_POST['submit'])){
                        mysqli_query($conn,"insert into user set nama_user= '$_POST[nama_user]',
                         email_User= '$_POST[email_User]',
                         password_user= '$_POST[password_user]',
                         alamat_user= '$_POST[alamat_user]',
                         no_telepon= '$_POST[no_telepon]'");
                         echo "<script type='text/javascript'>alert('Register_Berhasil');
                         window.location='../Login.php';
                         </script>";
                    
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
    

            <!-- Sign Up -->
            <div class="form signup">
                <span class="title">Registration</span>

                <form method="post">
                    <div class="input-field">
                        <input type="text" name = "nama_user" placeholder="Enter your name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name ="email_user"placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password_user"class="password" placeholder="Create a password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name ="alamat_user"placeholder="Enter your adress" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="number" name ="no_telepon"placeholder="Enter your number phone" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="sigCheck">
                            <label for="sigCheck" class="text">Remember Me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot Password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="submit" value="Sign Up">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already have an account
                        <a href="#" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>

</body>
</html>
