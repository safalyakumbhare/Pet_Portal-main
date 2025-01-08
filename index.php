<?php
session_start();
include("common/connection.php");
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

  $doctor = "SELECT * FROM doctor WHERE email = '$email';";
  $doctor_result = mysqli_query($conn, $doctor);

  if (mysqli_num_rows($doctor_result)) {

    $doctor_row = mysqli_fetch_assoc($doctor_result);
    if ($doctor_row['approval'] == "Pending") {
      echo "<script>alert('Your account is pending for approval. Please wait for the admin approval.');
       window.location.href='index.php';</script>";
      exit();
    } elseif ($doctor_row['approval'] == "Rejected") {
      echo "<script>alert('Your Approval is Rejected. Please contact the admin.');
      window.location.href='index.php';</script>";
      exit();
    } elseif ($doctor_row['status'] == "Inactive") {
      echo "<script>alert('Account is Inactive. Please contact the admin.');
       window.location.href='index.php';</script>";
      exit();

    } elseif ($doctor_row['approval'] == "Approved" && $doctor_row['status'] == "Active") {
      if (password_verify($password, $doctor_row['password'])) {

        $_SESSION['username'] = $doctor_row['name'];
        $_SESSION['logged_in'] = true;
        header("Location: doctor-dashboard.php");
      } else {
        echo "<script>alert('Invalid password');</script>";
      }

    }
  } else {





    $sql = "SELECT * FROM users WHERE email= '$email'";
    $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_array($result);
      if ($user['status'] == "Inactive") {
        echo "<script>alert('Account is Inactive. Please contact the admin.');
       window.location.href='index.php';</script>";
        exit();
      } elseif ($user['status'] == "Active") {
        if (password_verify($password, $user['password'])) {

          session_start();
          $_SESSION['username'] = $user['username'];
          $_SESSION['logged_in'] = true;


          header("Location: main-dashboard.php");
        } else {

          echo "<script>alert('Invalid password');
          window.location.href='index.php';</script>";
        }
      }
    } else {

      echo "<script>alert('No user Found Please Register...!');</script>";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/login_css/style.css">
  <link rel="shortcut icon" href="/assets/images/pets.png" type="image/x-icon">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
    integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Pets Portal - Login</title>
</head>

<body class="bg-dark">

  <h1 class="text-center pt-5" style="color:#243946;">Pets Portal Login!</h1>
  <div class="center">
    <div class="ear ear--left"></div>
    <div class="ear ear--right"></div>
    <div class="face">
      <div class="eyes">
        <div class="eye eye--left">
          <div class="glow"></div>
        </div>
        <div class="eye eye--right">
          <div class="glow"></div>
        </div>
      </div>
      <div class="nose">
        <svg width="38.161" height="22.03">
          <path
            d="M2.017 10.987Q-.563 7.513.157 4.754C.877 1.994 2.976.135 6.164.093 16.4-.04 22.293-.022 32.048.093c3.501.042 5.48 2.081 6.02 4.661q.54 2.579-2.051 6.233-8.612 10.979-16.664 11.043-8.053.063-17.336-11.043z"
            fill="#243946"></path>
        </svg>
        <div class="glow"></div>
      </div>
      <div class="mouth">
        <svg class="smile" viewBox="-2 -2 84 23" width="84" height="23">
          <path d="M0 0c3.76 9.279 9.69 18.98 26.712 19.238 17.022.258 10.72.258 28 0S75.959 9.182 79.987.161"
            fill="none" stroke-width="3" stroke-linecap="square" stroke-miterlimit="3"></path>
        </svg>
        <div class="mouth-hole"></div>
        <div class="tongue breath">
          <div class="tongue-top"></div>
          <div class="line"></div>
          <div class="median"></div>
        </div>
      </div>
    </div>
    <div class="hands">
      <div class="hand hand--left">
        <div class="finger">
          <div class="bone"></div>
          <div class="nail"></div>
        </div>
        <div class="finger">
          <div class="bone"></div>
          <div class="nail"></div>
        </div>
        <div class="finger">
          <div class="bone"></div>
          <div class="nail"></div>
        </div>
      </div>
      <div class="hand hand--right">
        <div class="finger">
          <div class="bone"></div>
          <div class="nail"></div>
        </div>
        <div class="finger">
          <div class="bone"></div>
          <div class="nail"></div>
        </div>
        <div class="finger">
          <div class="bone"></div>
          <div class="nail"></div>
        </div>
      </div>
    </div>
    <div class="login">
      <form method="post">
        <label>
          <div class="fa fa-phone"></div>
          <input class="username" name="email" type="email" autocomplete="on" placeholder="Email" />
        </label>
        <label>
          <div class="fa fa-commenting"></div>
          <input class="password" type="password" id="myInput" name="password" autocomplete="off"
            placeholder="password" />
          <button class="password-button" onclick="showText()"><i class='bx bx-show'></i></button>
        </label>
        <button class="login-button" type="submit" name="submit">Login</button>
        <div class="row mt-4 justify-content-evenly">
          <div class="col-md-4  text-center ">
            <a href="forget_password.php">Forgot Password?</a>
          </div>
          <div class="col-md-4  text-center">
            <a href="who_register.php">Register Now</a>

          </div>
        </div>

      </form>
    </div>
  </div>

  <script src="assets/js/login_js/script.js"></script>
</body>

</html>