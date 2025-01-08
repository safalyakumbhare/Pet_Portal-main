<?php
include("common/connection.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $confirmpassword = $_POST['confirmpassword'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $filename = $_FILES["imageupload"]["name"];
    $tempname = $_FILES["imageupload"]["tmp_name"];

    if ($_POST['password'] !== $confirmpassword) {
        echo "<script>alert('Passwords do not match');
        window.location.href='user_registration.php'</script>";
    } else {
        $check = "SELECT * FROM users WHERE username ='$name'";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('User Already Registered');
            window.location.href='user_registration.php';</script>";
        } else {
            $folder = "assets/images/" . basename($filename);

            $sql = "INSERT INTO users(username, email, password, phone, address, gender, dob, role_id, profile) 
                    VALUES ('$name', '$email', '$password', '$phone', '$address', '$gender', '$dob', 2, '$filename');";

            $insert = mysqli_query($conn, $sql);

            if ($insert) {
                if (move_uploaded_file($tempname, $folder)) {
                    echo "<script>alert('User Registered Successfully');
                    window.location.href='index.php';</script>";
                } else {
                    echo "<script>alert('Failed to upload image');
                    window.location.href='user_registration.php';</script>";
                }
            } else {
                echo "<script>alert('Error occurred while registering user');
                window.location.href='user_registration.php';</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Registration</title>
    <link rel="shortcut icon" href="/assets/images/pets.png" type="image/x-icon">

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/user_registration_css/style.css">
</head>

<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="assets/images/user_registration.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" id="register-form" class="register-form" id="register-form"
                        enctype="multipart/form-data">
                        <h2>User Registration Form</h2>

                        <div class="form-group">
                            <label for="name">Username :</label>
                            <input type="text" name="name" id="name" placeholder="Enter your Name" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address :</label>
                            <input type="email" name="email" placeholder="Enter your email" id="email" />
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number :</label>
                            <input type="number" name="phone" placeholder="Enter your phone number" id="phone" />
                        </div>

                        <div class="form-group">
                            <label for="address">Address :</label>
                            <!-- <input type="text" name="address"  id="address" /> -->
                            <textarea name="address" id="address" placeholder="Enter your address"></textarea>
                        </div>
                        <div class="form-radio">
                            <label for="gender" class="radio-label">Gender :</label>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" id="male" value="Male">
                                <label for="male">Male</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" id="female" value="Female">
                                <label for="female">Female</label>
                                <span class="check"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dob">DOB :</label>
                            <input type="date" name="dob" id="dob">
                        </div>
                        <div class="form-group">
                            <label for="pincode">Pincode :</label>
                            <input type="text" name="pincode" id="pincode">
                        </div>
                        <div class="form-group">
                            <label for="imageupload">Profile Photo :</label>
                            <input type="file" name="imageupload" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <input type="password" name="password" id="password" />
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password :</label>
                            <input type="password" name="confirmpassword" id="confirmpassword" />
                        </div>
                        <div class="form-submit">
                            <input type="reset" value="Reset All" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Register" class="submit" name="submit" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <!-- <script src="assets/js/user_registration_js/vendor/jquery/jquery.min.js"></script>/ -->
    <script src="/assets/jquery/jquery-3.7.1.min.js"></script>
    <script src="assets/jquery/jquery-ui.min.js"></script>
    <script src="assets/jquery/jquery.validate.min.js"></script>
    <script src="assets/js/user_registration_js/main.js"></script>
</body>

</html>