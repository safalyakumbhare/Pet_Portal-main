<?php
include("common/connection.php");
if (isset($_POST['submit'])) {
  // echo "<script>alert('Submit');</script>";
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $profile = $_FILES['profile']["name"];
  $license = $_POST["license"];
  $specialization = $_POST["specialization"];
  $certification = $_POST["certification"];
  $experience = $_POST["experience"];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $confirm_password = $_POST['confirm_password'];

  $folder = "assets/images/doctors/" . basename($profile);

  if ($_POST['password'] !== $confirm_password) {
    echo "<script>alert('Confirm Password do not match');
    window.location.href='doctor_registration.php';</script>";
  } else {
    $check = "SELECT * FROM doctor WHERE name ='$fname';";
    $check_result = mysqli_query($conn, $check);

    if (mysqli_num_rows($check_result)) {
      echo "<script>alert('Doctor Already Registered');
      window.location.href='doctor_registration.php';</script>";
    } else {
      $sql = "INSERT INTO doctor(name,email,phone,dob,address,gender,password,profile,license_no,specialization,experience,certification) VALUES ('$fname','$email','$phone','$dob','$address','$gender','$password','$profile','$license','$specialization','$experience','$certification');";

      $result = mysqli_query($conn, $sql);

      if ($result) {
        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $folder)) {
          echo "<script>alert('Approval Sent to Admin');
          window.location.href='index.php';</script>";
        } else {
          echo "<script>alert('Failed to Upload Profile Image');
          window.location.href='doctor_registration.php';</script>";
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Pets Portal - Doctor's Registration</title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  <link rel="shortcut icon" href="/assets/images/pets.png" type="image/x-icon">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Fonts and icons -->
  <script src="/assets/js/dashboard_js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Public Sans:300,400,500,600,700"]
      },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["/assets/css/dashboard_css/fonts.min.css"],
      },
      active: function() {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="/assets/css/dashboard_css/bootstrap.min.css" />
  <link rel="stylesheet" href="/assets/css/dashboard_css/plugins.min.css" />
  <link rel="stylesheet" href="/assets/css/dashboard_css/kaiadmin.min.css" />
  <!-- <link rel="stylesheet" href="//assets/css/dashboard_css/"> -->

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="/assets/css/dashboard_css/demo.css" />
</head>

<body>
  <div class="wrapper">
    <!-- Including sidebar and navbar -->

    <div class="container">
      <div class="page-inner">
        <div class="page-header">
          <h1 class="fw-bold mb-3">Pets Portal Doctor's Registration</h1>

        </div>
        <form id="doctor_form" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header rounded-top-3" style="background-color: lightgray">
                  <div class="card-title">Basic Information</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fullname" class="form-label">Full Name :
                        </label>
                        <input type="text" class="form-control" name="fname" id="fullname" placeholder="Enter Fullname"
                           />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email" class="form-label">Email : </label>
                        <input type="email" class="form-control" name="email" id="email"
                          placeholder="Enter Email Address"  />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone" class="form-label">Phone Number :</label>
                        <input type="number" class="form-control" name="phone" id="phone"
                          placeholder="Enter Phone Number"  />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="dob" class="form-label">Date of Birth :
                        </label>
                        <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter Date of Birth"
                           />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">Address : </label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Address"
                          ></textarea>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="gender">Gender :</label>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="male" value="male"  />
                          <label class="form-check-label" for="male">
                            Male
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                             />
                          <label class="form-check-label" for="female">
                            Female
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="profile">Profile Photo :</label>
                        <input type="file" id="profile" name="profile" class="form-control"  />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="card">
                <div class="card-header rounded-top-3" style="background-color: lightgray">
                  <div class="card-title">Professional Details :</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="license">License Number : </label>
                        <input type="text" class="form-control" name="license" id="license"
                          placeholder="Enter License Number"  />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="specialization">Specialization :
                        </label>
                        <input type="text" class="form-control" name="specialization" id="specialization"
                          placeholder="Enter Specialization"  />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="certification">Certification & Qualifications :</label>
                        <textarea class="form-control" name="certification" id="certification" rows="3"
                          placeholder="List Certification & Qualifications" ></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="experience">Experience : </label>
                        <textarea class="form-control" name="experience" id="experience" rows="3"
                          placeholder="Enter your Experience" ></textarea>

                      </div>
                    </div>


                  </div>
                </div>
              </div>


            </div>

            <div class="col-md-12">
              <div class="card">
                <div class="card-header rounded-top-3" style="background-color: lightgray">
                  <div class="card-title">Password :</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password">Password : </label>
                        <input type="password" class="form-control" name="password" id="password"
                          placeholder="Enter Password"  />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="confirm_password">Confirm Password :
                        </label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                          placeholder="Confirm Password"  />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="card">
                <div class="card-body justify-content-center">
                  <div class="row justify-content-center">
                    <div class="col-md-2">
                      <input type="submit" class="btn btn-primary btn-block" value="Send Approval" name="submit">

                    </div>
                    <div class="col-md-2">
                      <a href="index.php" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <?php

    include("common/footer.php");
    ?>
  </div>
  <!-- 
  <script src="assets/jquery/jquery-3.7.1.min.js"></script>
  <script src="assets/jquery/jquery.validate.min.js"></script>
  <script src="assets/jquery/jquery-ui.min.js"></script> -->
  <!-- <script src="assets/js/doctor_registration_js/script.js"></script> -->
</body>

</html>