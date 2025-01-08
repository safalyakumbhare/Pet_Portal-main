<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Doctor Detail</title>
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
        <?php
        include("common/sidebar.php");

        if ($row['role_id'] == 1) {


            if (isset($_GET['doctor_id'])) {
                $doctor_id = $_GET['doctor_id'];


                $doctor_data = "SELECT * FROM doctor WHERE doctor_id='$doctor_id';";
                $doctor_result = mysqli_query($conn, $doctor_data);

                if (mysqli_num_rows($doctor_result)) {


                    $doctor_row = mysqli_fetch_assoc($doctor_result);

        ?>

                    <div class="container">
                        <div class="page-inner">
                            <div class="page-header">
                                <h1 class="fw-bold mb-3">Doctor Detail</h1>

                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="card">
                                        <div class="card-header rounded-top-3" style="background-color: lightgray;">
                                            <div class="card-title">Doctor Information</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-between">
                                                <div class="col-md-4">
                                                    <img src="assets/images/doctors/<?php echo $doctor_row['profile'] ?>"
                                                        class="img-fluid rounded-4" alt="No Profile Photo">
                                                </div>
                                                <div class="col-md-7 ">
                                                    <div class="row ">
                                                        <div class="col-md-5 m-md-2">
                                                            <h5 class="text-secondary">Doctor Name :</h5>
                                                            <p class="fw-light"><?php echo $doctor_row['name'] ?></p>
                                                        </div>
                                                        <div class="col-md-5 m-md-2">
                                                            <h5 class="mt-1 text-secondary">Address :</h5>

                                                            <p class="fw-light"><?php echo $doctor_row['address'] ?></p>
                                                        </div>
                                                        <div class="col-md-5 m-md-2">
                                                            <h5 class="mt-1 text-secondary">Email :</h5>

                                                            <p class="fw-light"><?php echo $doctor_row['email'] ?></p>
                                                        </div>
                                                        <div class="col-md-5 m-md-2">
                                                            <h5 class="mt-1 text-secondary">Phone Number :</h5>

                                                            <p class="fw-light"><?php
                                                                                echo $doctor_row['phone']
                                                                                ?></p>
                                                        </div>
                                                        <div class="col-md-5 m-md-2">
                                                            <h5 class="text-secondary">Date of Birth :</h5>
                                                            <p class="fw-light"><?php $date = date_create($doctor_row['dob']);
                                                                                echo date_format($date, "d-m-Y"); ?></p>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header rounded-top-3" style="background-color: lightgray;">
                                            <div class="card-title">Pets Portal Details</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Status :</h5>
                                                        <?php
                                                        if ($doctor_row['status'] == "Active") {
                                                            echo "<p  class='text-success'>Active</p >";
                                                        } else {
                                                            echo "<p  class='text-danger'>Inactive</p >";
                                                        }

                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Approval :</h5>
                                                        <?php
                                                        if ($doctor_row['approval'] == "Approved") {
                                                            echo "<p  class='text-success'>Approved</p >";
                                                        } else if ($doctor_row['approval'] == "Pending") {
                                                            echo "<p  class='text-warning'>Pending</p >";
                                                        } else if ($doctor_row['approval'] == "Rejected") {
                                                            echo "<p  class='text-danger'>Rejected</p >";
                                                        }

                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Registration At :</h5>
                                                        <p class="fw-light"><?php $date = date_create($doctor_row['created_at']);
                                                                            echo date_format($date, "d-m-Y");
                                                                            echo "<br>";
                                                                            echo date_format($date, "h:m:s"); ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">Updated At : </h5>
                                                        <p class="fw-light"><?php

                                                                            $date = date_create($doctor_row['updated_at']);
                                                                            echo date_format($date, "d-m-Y");
                                                                            echo "<br>";
                                                                            echo date_format($date, "h:m:s");
                                                                            // echo $doctor_row['updated_at'];

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
                                            <div class="card-title">Doctor Professional Details</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5 class="text-secondary">License Number :</h5>
                                                        <p class="fw-light"><?php echo $doctor_row['license_no'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
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

                        if ($doctor_row['approval'] == "Pending" || $doctor_row['approval'] == "Rejected") {
                        ?>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body justify-content-center">

                                        <div class="row justify-content-center">
                                            <div class="col-md-2">

                                                <a href="doctor_approve_reject.php?approve_id=<?php echo $doctor_id; ?>"
                                                    class="btn btn-success btn-block" name="approve">
                                                    Approve
                                                </a>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="doctor_approve_reject.php?reject_id=<?php echo $doctor_id; ?>"
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
                ?>

                <div class="container">
                    <h1 class="text-center">Doctor already approved</h1>
                </div>

    <?php
                    }
                }
            } else {
                echo "<script>alert('You are not a authorised to view this page');
            window.location.href='index.php'</script>";
            }

    ?>


    </div>
    <?php
    include("common/footer.php");

    ?>
    </div>
    </div>