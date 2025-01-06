<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Clinic Detail</title>
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

        <!-- Including sidebar and navbar -->
        <?php
        include("common/sidebar.php");

        if ($row['role_id'] == 1) {


            if (isset($_GET['clinic_id'])) {
                $clinic_id = $_GET['clinic_id'];


                $clinic_data = "SELECT * FROM clinic WHERE clinic_id='$clinic_id';";
                $clinic_result = mysqli_query($conn, $clinic_data);

                if (mysqli_num_rows($clinic_result)) {


                    $clinic_row = mysqli_fetch_assoc($clinic_result);
                    $doctor_id = $clinic_row['doctor_id'];

                    $doctor_data = "SELECT * FROM doctor WHERE doctor_id='$doctor_id';";
                    $doctor_result = mysqli_query($conn, $doctor_data);
                    $doctor_row = mysqli_fetch_assoc($doctor_result);

                    ?>

                    <div class="container">
                        <div class="page-inner">
                            <div class="page-header">
                                <h5 class="fw-bold mb-3">Clinic and Doctors Details</h5>

                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header rounded-top-3" style="background-color: lightgray;">
                                            <h1 class="card-title">Clinic Photo</h1>
                                        </div>
                                        <div class="card-body">
                                            <img src="assets/images/clinics/<?php echo $clinic_row['photo'] ?>" alt="Clinic Photo"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="card">
                                        <div class="card-header rounded-top-3" style="background-color: lightgray;">
                                            <div class="card-title">Clinic Information</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Clinic Name :</h5>
                                                        <p class="fw-light"><?php echo $clinic_row['name'] ?></p>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Address :</h5>
                                                        <p class="fw-light"><?php echo $clinic_row['address'] ?></p>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Phone Number :</h5>
                                                        <p class="fw-light"><?php echo $clinic_row['phone'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Email Address :</h5>
                                                        <p class="fw-light"><?php echo $clinic_row['email'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Timing :</h5>

                                                        <?php
                                                        $date = date_create($clinic_row['open_time']);
                                                        $open_time_12_hours = date_format($date, "h:i A");

                                                        $date = date_create($clinic_row['close_time']);
                                                        $close_time_12_hours = date_format($date, "h:i A");

                                                        echo "<p class='fw-light'>$open_time_12_hours To $close_time_12_hours</p>";
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Days Open :</h5>
                                                        <p class='fw-light'><?php echo $clinic_row['open_days'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Days Close :</h5>
                                                        <p class='fw-light'><?php echo $clinic_row['close_days'] ?></p>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Types of Pets : </h5>
                                                        <p class="fw-light"><?php echo $clinic_row['pet_type'] ?></p>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Ratings :</h5>
                                                        <p class="fw-light"><i class="fa-solid text-warning fa-star"></i>
                                                            <?php echo $clinic_row['rating'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Fees :</h5>
                                                       <textarea class="form-control border-0" rows="6"><?php echo $clinic_row['fees'] ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">About Clinic :</h5>
                                                        <p class="fw-light"><?php echo $clinic_row['about_us'] ?></p>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header rounded-top-3" style="background-color: lightgray;">
                                                <div class="card-title">Clinic Pets Protal Status</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Clinic Status :</h5>
                                                            <?php
                                                            if ($clinic_row['status'] == "Active") {
                                                                echo "<p class='text-success'>Active</p>";
                                                            } else {
                                                                echo "<p class='text-danger'>Inactive</p>";
                                                            }

                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Clinic Approval :</h5>
                                                            <?php
                                                            if ($clinic_row['approval'] == "Approved") {
                                                                echo "<p class='text-success'>Approved</p>";
                                                            } else if ($clinic_row['approval'] == "Pending") {
                                                                echo "<p class='text-warning'>Pending</p>";
                                                            } else if ($clinic_row['approval'] == "Rejected") {
                                                                echo "<p class='text-danger'>Rejected</p>";
                                                            }

                                                            ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Clinic Registered at :</h5>
                                                            <p class="fw-light"><?php $date = date_create($clinic_row['created_at']);
                                                            echo date_format($date, "d-m-Y");
                                                            echo "<br>";
                                                            echo date_format($date, "h:m:s"); ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Clinic Updated at : </h5>
                                                            <p class="fw-light"><?php

                                                            $date = date_create($clinic_row['updated_at']);
                                                            echo date_format($date, "d-m-Y");
                                                            echo "<br>";
                                                            echo date_format($date, "h:m:s");
                                                            // echo $clinic_row['updated_at'];
                                                
                                                            ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header rounded-top-3" style="background-color: lightgray;">
                                                <div class="card-title">Clinic's Doctor Details</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Doctor Name :</h5>
                                                            <p class="fw-light"><?php echo $doctor_row['name'] ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Address : </h5>
                                                            <p class="fw-light"><?php echo $doctor_row['address'] ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Phone Number :</h5>
                                                            <p class="fw-light"><?php echo $doctor_row['phone'] ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Email Address :</h5>
                                                            <p class="fw-light"><?php echo $doctor_row['email'] ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">License Number :</h5>
                                                            <p class="fw-light"><?php echo $doctor_row['license_no'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Specialization :</h5>
                                                            <p class="fw-light"><?php echo $doctor_row['specialization'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Experience :</h5>
                                                            <p class="fw-light"><?php echo $doctor_row['experience'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5 class="text-secondary">Certifications and Qualifications :</h5>
                                                            <p class="fw-light"><?php echo $doctor_row['certification'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php

                            if ($clinic_row['approval'] == "Pending" || $clinic_row['approval'] == "Rejected") {
                                ?>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body justify-content-center">

                                            <div class="row justify-content-center">
                                                <div class="col-md-2">

                                                    <a href="clinic_approve_reject.php?approve_id=<?php echo $clinic_id; ?>"
                                                        class="btn btn-success btn-block" name="approve">
                                                        Approve
                                                    </a>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="clinic_approve_reject.php?reject_id=<?php echo $clinic_id; ?>"
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
                    window.location.href='clinic_table.php';</script>";
                }
            }
            else{
                echo "<script>alert('Clinic not Selected');
                window.location.href='clinic_table.php';</script>";
            }
        }
        else{
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