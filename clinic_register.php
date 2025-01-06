<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Clinic Register</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="/assets/images/kaiadmin/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts and icons -->
    <script src="/assets/js/dashboard_js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["/assets/css/dashboard_css/fonts.min.css"],
            },
            active: function () {
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
        <?php

        include("common/doctor-sidebar.php");


        if ($row['role_id'] == 3) {

            $doctor_id = $row['doctor_id'];

            if (isset($_POST['submit'])) {
                $clinic_name = $_POST['clinic_name'];
                $clinic_address = $_POST['clinic_address'];
                $clinic_phone = $_POST['clinic_phone'];
                $pet_type = $_POST['pet_type'];
                $open_time = $_POST['opening_time'];
                $close_time = $_POST['closing_time'];
                $open_day = $_POST['open_day'];
                $close_day = $_POST['close_day'];
                $photo = $_FILES['photo']['name'];
                $fees = $_POST['fees'];
                $email = $_POST['email'];
                $rating = $_POST['rating'];
                $about = $_POST['about'];
                $folder = "assets/images/clinics/" . basename($photo);

                $sql = "SELECT * FROM clinic WHERE name = '$clinic_name';";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result)) {
                    echo "<script>alert('Clinic Already Exists');</script>";
                    exit();
                } else {
                    $sql = "INSERT INTO clinic (name,address,phone,doctor_id,open_time,close_time,open_days,close_days,fees,pet_type,photo,email,rating,about_us)
                    VALUES ('$clinic_name','$clinic_address','$clinic_phone','$doctor_id','$open_time','$close_time','$open_day','$close_day','$fees','$pet_type','$photo','$email','$rating','$about');";

                    if (mysqli_query($conn, $sql)) {

                        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $folder)) {
                            echo "<script>alert('Clinic Approval Sent to Admin');
                        window.location.href='doctor-dashboard.php'</script>";
                        } else {
                            echo "<script>alert('Error Uploading Image');
                            window.location.href='doctor-dashboard.php'</script>";
                        }
                    } else {
                        echo "<script>alert('Failed to Register Clinic');</script>";
                    }
                }
            }
            ?>
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Register Clinic</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Clinic Registration Form</div>
                            </div>
                            <div class="card-body">
                                <form method="post" id="clinic" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="clinic_name" class="form-label">Clinic Name :
                                                </label>
                                                <input type="text" class="form-control" name="clinic_name" id="clinic_name"
                                                    placeholder="Enter Clinic Name" required />

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="clinic_address" class="form-label">Clinic Address :
                                                </label>
                                                <textarea class="form-control" id="clinic_address" name="clinic_address"
                                                    rows="3" placeholder="Enter Clinic Address" required></textarea>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email Address : </label>
                                                <input type="email" class="form-control" placeholder="Enter your Email" name="email" id="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="clinic_phone" class="form-label">Clinic Phone :
                                                </label>
                                                <input type="number" class="form-control" name="clinic_phone"
                                                    id="clinic_phone" placeholder="Enter Clinic Phone" required />
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pet" class="form-label">Pet Type : </label>
                                                <input type="text" name="pet_type" class="form-control" id="pet_type"
                                                    placeholder="eg :- Dogs, Cats etc.." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="rate">Ratings : </label>
                                                <input type="text" id="rating" placeholder="Enter your Rating stars and number of user rated eg : 3.3 (10)" name="rating" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="opening-time" class="form-label">Opening Time :</label>
                                                <input type="time" class="form-control" name="opening_time"
                                                    id="opening_time" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="closing-time" class="form-label">Closing Time :</label>
                                                <input type="time" class="form-control" name="closing_time"
                                                    id="closing_time" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="open_day" class="form-label">Days Open :</label>
                                                <input type="text" class="form-control"
                                                    placeholder="eg :- Monday to Saturday" name="open_day" id="open_day">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="close_day" class="form-lebel">Days Closed :</label>
                                                <input type="text" class="form-control"
                                                    placeholder="eg :- Public Holidays or Sundays" name="close_day"
                                                    id="close_day">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="photo" class="form-label">Clinic Image :</label>
                                                <input type="file" class="form-control" name="photo" id="photo" required>
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="about" class="form-label">About : </label>
                                                <textarea class="form-control" placeholder="Enter your about"
                                                    name="about" id="about" rows="3"></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fees" class="form-label">Fees : </label>
                                                <textarea class="form-control" placeholder="Enter your Fees" name="fees"
                                                    id="fees" rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 d-flex justify-content-center">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" name="submit">Send
                                                    Approval</button>
                                                <button type="reset" class="btn btn-danger :">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php
        }
        ?>

        <script src="assets/jquery/jquery-3.7.1.min.js"></script>
        <script src="assets/jquery/jquery.validate.min.js"></script>
        <script src="assets/jquery/jquery-ui.min.js"></script>
        <script src="assets/js/clinic_registration_js/script.js"></script>