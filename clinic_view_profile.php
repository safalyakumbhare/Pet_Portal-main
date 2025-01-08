<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Clinic Profile</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="/assets/images/kaiadmin/favicon.ico" type="image/x-icon" />
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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <div class="wrapper">

        <!-- Including sidebar and navbar -->
        <?php
        include "common/sidebar.php";

        if ($row['role_id'] == 2) {

            if (isset($_GET['clinic_id'])) {

                $clinic_id = $_GET['clinic_id'];

                $sql = "SELECT * FROM clinic WHERE clinic_id = $clinic_id";
                $result = mysqli_query($conn, $sql);
                $clinic = mysqli_fetch_assoc($result);
                $doctor_id = $clinic['doctor_id'];

                $doctor_sql = "SELECT * FROM doctor WHERE doctor_id = $doctor_id";
                $doctor_result = mysqli_query($conn, $doctor_sql);
                $doctor = mysqli_fetch_assoc($doctor_result);


        ?>

                <div class="container">
                    <div class="page-inner">
                        <div class="page-header">
                            <h3 class="fw-bold mb-3">Clinic Profile</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h1 class="card-title">Clinic Information</h1>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="row justify-content-center">
                                            <div class="col-md-6">
                                                <img src="assets/images/clinics/<?php echo $clinic['photo'] ?>"
                                                    alt="Clinic Photo" class="img-fluid rounded-3">
                                            </div>
                                        </div>
                                        <h2 class="card-title mt-3"><?php echo $clinic['name'] ?></h2>
                                        <p class="text-muted"><i class="fas fa-map-marker-alt"></i>
                                            <?php echo $clinic['address'] ?></p>
                                        <p><i class="fas fa-star text-warning"></i> <?php echo $clinic['rating'] ?></p>
                                        <a href="callto:9766072987" class="btn btn-primary">Contact Clinic</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h1 class="card-title">Contact Information</h1>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Phone:</strong> +91 <?php echo $clinic['phone'] ?></p>
                                        <p><strong>Email:</strong> <?php echo $clinic['email'] ?> </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h1 class="card-title">About Clinic</h1>
                                    </div>
                                    <div class="card-body">

                                        <p><?php echo $clinic['about_us'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h1 class="card-title">Services Offered and Princing</h1>
                                    </div>
                                    <div class="card-body">
                                        <textarea rows="7"
                                            class="form-control border-0"><?php echo $clinic['fees'] ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h1 class="card-title">Working Hours</h1>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Open Days : </strong><?php echo $clinic['open_days'] ?></p>
                                        <p><strong>Hours : </strong> <?php
                                                                        $date = date_create($clinic['open_time']);
                                                                        $open_time_12_hours = date_format($date, "h:i A");

                                                                        $date = date_create($clinic['close_time']);
                                                                        $close_time_12_hours = date_format($date, "h:i A");

                                                                        echo "$open_time_12_hours To $close_time_12_hours</p>";
                                                                        ?></p>
                                        <p><strong>Closed : </strong><?php echo $clinic['close_days'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h1 class="card-title">Doctors at the Clinic</h1>

                                    </div>
                                    <div class="card-body">
                                        <div class="media mb-3">
                                            <img src="/assets/images/doctors/<?php echo $doctor['profile'] ?>"
                                                class="mr-3 rounded-circle" alt="Doctor 1" style="width: 60px;">
                                            <div class="media-body">
                                                <h5><?php echo $doctor['name'] ?></h5>
                                                <p><?php echo $doctor['specialization'] ?> </p>
                                                <p> <?php echo $doctor['experience'] ?></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h1 class="card-title">Book Appointment</h1>
                                    </div>

                                    <div class="card-body">
                                        <?php
                                        if (isset($_POST['submit'])) {
                                            $apt_date = $_POST['apt_date'];
                                            $apt_time = $_POST['apt_time'];
                                            $apt_description = $_POST['apt_description'];
                                            $user_id = $row['user_id'];
                                            $doctor_id = $doctor['doctor_id'];
                                            $clinic_id = $clinic['clinic_id'];

                                            $pet = mysqli_query($conn, "SELECT * FROM pets WHERE user_id = $user_id ");
                                            $pet_data = mysqli_fetch_array($pet);

                                            $pet_id = $pet_data['pet_id'];

                                           
                                            $check = mysqli_query($conn, "SELECT * FROM appointment WHERE appointment_date = '$apt_date' AND appointment_time = '$apt_time';");

                                            if (mysqli_num_rows($check) > 0) {
                                                echo '<script>alert("The Appointment is Already Booked Please Select Another Date and time");</script>';
                                            } else {


                                                $query = "INSERT INTO appointment (appointment_date, appointment_time, appointment_description, user_id, doctor_id, clinic_id,pet_id) 
                                                            VALUES ('$apt_date', '$apt_time', '$apt_description', $user_id, $doctor_id, $clinic_id,$pet_id)";

                                                $result = mysqli_query($conn, $query);

                                                if ($result) {
                                                    echo '<script>alert("Appointment Booked Successfully!");
                                                    window.location.href="user_appointment.php"</script>';
                                                } else {
                                                    echo '<script>alert("Failed to Book Appointment!");</script>';
                                                }
                                            }
                                        }
                                        ?>
                                        <form method="post" id="apt_form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="apt_date">Appointment Date :</label>
                                                        <input type="date" class="form-control" id="apt_date" name="apt_date">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="apt_time">Appointment Time :</label>
                                                        <input type="time" class="form-control" id="apt_time" name="apt_time">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="apt_description">Appointment Description :</label>
                                                        <textarea class="form-control" id="apt_description"
                                                            name="apt_description" rows="3"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 d-flex justify-content-center">
                                                    <div class="form-group">
                                                        <input type="submit" value="Book Appointment" name="submit"
                                                            class="btn btn-primary btn-block ">
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
            } else {
                echo "<script>alert('Clinic Not Selected');
                window.location.href='search_clinic.php'</script>";
            }
                ?>

            <?php
        } else {

            echo "<script>alert('You are not authorized to this page.');
           window.location.href='index.php'</script>";
        }
            ?>
                </div>
                <?php
                include "common/footer.php";

                ?>
    </div>


    <script src="assets/jquery/jquery-3.7.1.min.js"></script>
    <script src="assets/jquery/jquery.validate.min.js"></script>
    <script src="assets/jquery/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#apt_form").validate({
                rules: {
                    apt_date: "required",
                    apt_time: "required",
                    apt_description: "required"
                },
                messages: {
                    apt_date: "Please select appointment date",
                    apt_time: "Please select appointment time",
                    apt_description: "Please enter appointment description"
                }
            });
        });
    </script>