<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Appointment Detail</title>
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

</head>

<body>
    <div class="wrapper">

        <!-- Including sidebar and navbar -->
        <?php
        include("common/doctor-sidebar.php");

        if ($row['role_id'] == 3) {


            if (isset($_GET['apt_id'])) {
                $appointment_id = $_GET['apt_id'];


                $apt_data = "SELECT * FROM appointment WHERE appointment_id='$appointment_id';";
                $apt_result = mysqli_query($conn, $apt_data);

                if (mysqli_num_rows($apt_result)) {


                    $apt_row = mysqli_fetch_assoc($apt_result);
                    $doctor_id = $apt_row['doctor_id'];
                    $pet_id = $apt_row['pet_id'];
                    $user_id = $apt_row['user_id'];
                    $clinic_id = $apt_row['clinic_id'];

                    $doctor_data = "SELECT * FROM doctor WHERE doctor_id='$doctor_id';";
                    $doctor_result = mysqli_query($conn, $doctor_data);
                    $doctor_row = mysqli_fetch_assoc($doctor_result);

                    $pet_data = "SELECT * FROM pets WHERE pet_id='$pet_id';";
                    $pet_result = mysqli_query($conn, $pet_data);
                    $pet_row = mysqli_fetch_assoc($pet_result);

                    $user_data = "SELECT * FROM users WHERE user_id='$user_id';";
                    $user_result = mysqli_query($conn, $user_data);
                    $user_row = mysqli_fetch_assoc($user_result);

                    $clinic_data = "SELECT * FROM clinic WHERE clinic_id='$clinic_id';";
                    $clinic_result = mysqli_query($conn, $clinic_data);
                    $clinic_row = mysqli_fetch_assoc($clinic_result);

        ?>

                    <div class="container">
                        <div class="page-inner">
                            <div class="page-header">
                                <h1 class="fw-bold mb-3">Appointment Details</h1>

                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header rounded-top-3" style="background-color: lightgray;">
                                            <h1 class="card-title">Patient Pet Photo</h1>
                                        </div>
                                        <div class="card-body">
                                            <img src="/assets/images/pets/<?php echo $pet_row['image']?>" alt="Pet Photo"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="card">
                                        <div class="card-header rounded-top-3" style="background-color: lightgray;">
                                            <div class="card-title">Appointment Information</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Appointment Date :</h5>
                                                        <?php
                                                        $date = date_create($apt_row['appointment_date']);
                                                        echo date_format($date, "d-m-Y");
                                                        ?>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Appointment Time :</h5>
                                                        <?php
                                                        $appointment_time = date_create($apt_row['appointment_time']);
                                                        echo date_format($appointment_time, "h:i A");
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Appointment Description :</h5>
                                                        <p class="card-text"><?php echo $apt_row['appointment_description'] ?></p>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Appointment Approval :</h5>
                                                        <?php
                                                            if($apt_row['approval'] == 'Approved')
                                                            {
                                                                echo "<p class='text-success'>Approved</p>";
                                                            }
                                                            elseif($apt_row['approval'] == 'Rejected')
                                                            {
                                                                echo "<p class='text-danger'>Rejected</p>";
                                                            }
                                                            elseif($apt_row['approval'] == 'Pending')
                                                            {
                                                                echo "<p class='text-warning'>Pending</p>";
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header rounded-top-3" style="background-color: lightgray;">
                                                <div class="card-title">Pets Information</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="card-body">
                                                    <div class="row ">

                                                        <div class="col-md-3 ">
                                                            <h5 class="text-secondary">Name :</h5>
                                                            <p><?php echo $pet_row['name'] ?></p>
                                                        </div>

                                                       
                                                        <div class="col-md-3 ">
                                                            <h5 class="mt-1 text-secondary">Age :</h5>

                                                            <p><?php
                                                                $dob = $pet_row['dob'];

                                                                // Convert the birthdate into a DateTime object
                                                                $birthDate = new DateTime($dob);
                                                                $currentDate = new DateTime(); // Get the current date

                                                                // Calculate the difference between the current date and birth date
                                                                $age = $currentDate->diff($birthDate)->y;

                                                                // Print the age
                                                                // echo $age . " years";

                                                                if ($age == 0) {
                                                                    echo "Newly born puppy";
                                                                } else {
                                                                    echo $age . " years";
                                                                }
                                                                ?></p>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <h5 class="text-secondary">Date of Birth :</h5>
                                                            <p><?php $date = date_create($pet_row['dob']);
                                                                echo date_format($date, "d-m-Y"); ?></p>
                                                        </div>

                                                        <div class="col-md-3">

                                                            <h5 class="text-secondary">Pet Type :</h5>
                                                            <p><?php echo $pet_row['type'] ?></p>



                                                        </div>

                                                        <div class="col-md-3">

                                                            <h5 class="mt-1 text-secondary">Breed :</h5>

                                                            <p><?php echo $pet_row['breed'] ?></p>

                                                        </div>

                                                        <div class="col-md-3">


                                                            <h5 class="text-secondary">Gender :</h5>
                                                            <p><?php echo $pet_row['gender'] ?></p>


                                                        </div>
                                                        <div class="col-md-3">
                                                                <h5 class="mt-1 text-secondary">Color :</h5>
                                                                <p><?php echo $pet_row['color'] ?></p>

                                                           
                                                        </div>
                                                        <div class="col-md-3">

                                                            <h5 class="text-secondary">Weight :</h5>
                                                            <p><?php echo $pet_row['weight'] . " kgs"; ?></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header rounded-top-3" style="background-color: lightgray;">
                                                <div class="card-title">Pet's Owner Information</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Name :</h5>
                                                            <p class="fw-light"><?php echo $user_row['username'] ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Address : </h5>
                                                            <p class="fw-light"><?php echo $user_row['address'] ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Phone Number :</h5>
                                                            <p class="fw-light"><?php echo $user_row['phone'] ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Email Address :</h5>
                                                            <p class="fw-light"><?php echo $user_row['email'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php

                            if ($apt_row['approval'] == "Pending" || $apt_row['approval'] == "Rejected") {
                            ?>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body justify-content-center">

                                            <div class="row justify-content-center">
                                                <div class="col-md-2">

                                                    <a href="appointment_approve_reject.php?approve_id=<?php echo $appointment_id; ?>"
                                                        class="btn btn-success btn-block" name="approve">
                                                        Approve
                                                    </a>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="appointment_approve_reject.php?reject_id=<?php echo $appointment_id; ?>"
                                                        class="btn btn-danger btn-block" name="reject">Reject</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                        </div>
        <?php

                            }
                        } else {
                            echo "<script>alert('Clinic Already Approved');
                    window.location.href='appointment_approve_reject.php';</script>";
                        }
                    } else {
                        echo "<script>alert('Clinic not Selected');
                window.location.href='appointment_approve_reject.php';</script>";
                    }
                } else {
                    echo "<script>alert('You Do not have right to view this page');
            window.location.href='index.php';</script>";
                }

        ?>


                    </div>
                    <?php
                    include("common/footer.php");

                    ?>
    </div>
    </div>