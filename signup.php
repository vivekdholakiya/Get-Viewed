<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="css/credential.css">

    <title>Sing Up</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form signup">
                <span class="title">Sign Up</span>

                <form method="POST" action="signup.php">
                    <div class="input-field">
                        <input type="text" name="uname" placeholder="Enter your full name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="email" name="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="password" placeholder="Create a password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="cpassword" placeholder="Confirm a password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon" required>
                            <label for="termCon" class="text">I accepted all <a href="#">Terms and Conditions</a>, <a href="#">Privacy Policy</a> and <a href="#">Cookie Policy</a></label>
                        </div>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Sign Up" name="signup">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already have an account?
                        <a href="#" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
            <div class="form login">
                <span class="title">Login</span>

                <form method="POST" action="signup.php">
                    <div class="input-field">
                        <input type="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>

                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login" name="login">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Don't have an account?
                        <a href="#" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>

        </div>
    </div>
    <?php

    include 'config.php';

    function signup() {
        global $con;

        $uname = $_POST['uname'];
    	$email = $_POST['email'];
    	$password = $_POST['password'];
    	$cpassword = $_POST['cpassword'];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if($password == $cpassword) {

                $hash = password_hash($password, PASSWORD_DEFAULT);

                $insert = "INSERT INTO `users`(`user_name`, `email`, `password`,`GVC`) VALUES ('$uname','$email','$hash','100')";

                $result = mysqli_query($con, $insert);

                if ($result) {
?>
                          <script type="text/javascript">
                              if (confirm("Your account has been successfully created.\nLogin to confirm registration.")) {
                                  var element = document.querySelector(".container");
                                  element.classList.add("active");
                              }
                          </script>
<?php
                }
            }
            else {
                echo '<script>alert("Passwords do not match!");location.replace("signup.php");</script>';
            }
        }
        else {
            echo '<script>alert("Email is incorrect!");location.replace("signup.php");</script>';
        }
    }
    function login(){

        if (isset($_POST['login'])) {
            echo `<script>alert("Login")</script>`;
        }
    }

    if (isset($_POST['signup'])) {
        signup();
    }
    else {
        login();
    }
    ?>
    <script src="js/credential.js"></script>

</body>
</html>
