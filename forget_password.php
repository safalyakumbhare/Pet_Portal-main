<?php

    include("common/connection.php");

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $confirmPassword = $_POST['confirmPassword'];

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0){
            
            if($confirmPassword == $_POST['password']){

                $update = "UPDATE users SET password='$password' WHERE email='$email'";
                $update_query = mysqli_query($conn, $update);

                if($update_query){
                    echo "<script>alert('Password Reset Successfully');
                    window.location.href='index.php';</script>";
                } else {
                    echo "<script>alert('Failed to Reset Password');
                    window.location.href='forget_password.php';</script>";
                }

            }
            else{
                echo "<script>alert('New Password and Confirm Password do not match');
                window.location.href='forget_password.php';</script>";
            }
        }
        else{
            echo "<script>alert('No user found with this email');
            window.location.href='forget_password.php';</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-dark">

    <div class="container-fluid">

        <h1 class="text-center text-light mt-md-5 mb-5">Reset Password</h1>
        
        <div class="row justify-content-center">
            <div class="col-md-5 bg-light rounded-3 p-3">
                <form action="" method="post">
                    <div class="form-group m-3">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group m-3">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group  m-3">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <button type="submit" name="submit" class="m-3 btn btn-primary">Reset Password</button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>