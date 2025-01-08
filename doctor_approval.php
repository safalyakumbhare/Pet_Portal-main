<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Doctor Approval</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
      <link rel="shortcut icon" href="/assets/images/pets.png" type="image/x-icon">


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


            if (isset($_GET['doctor_id'])) {
                $doctor_id = $_GET['doctor_id'];


                $doctor_data = "SELECT * FROM doctor WHERE doctor_id=$doctor_id AND approval = 'Pending';";
                $doctor_result = mysqli_query($conn, $doctor_data);

                if (mysqli_num_rows($doctor_result)) {


                    $doctor_row = mysqli_fetch_assoc($doctor_result);

                    ?>

                    <div class="container">
                        <div class="page-inner">
                            <div class="page-header">
                                <h3 class="fw-bold mb-3">Doctor Detail</h3>

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
                                                            <h3>Doctor Name :</h3>
                                                            <h4 class="fw-light"><?php echo $doctor_row['name'] ?></h4>
                                                        </div>
                                                        <div class="col-md-5 m-md-2">
                                                            <h3 class="mt-1">Address :</h3>

                                                            <h4 class="fw-light"><?php echo $doctor_row['address'] ?></h4>
                                                        </div>
                                                        <div class="col-md-5 m-md-2">
                                                            <h3 class="mt-1">Email :</h3>

                                                            <h4 class="fw-light"><?php echo $doctor_row['email'] ?></h4>
                                                        </div>
                                                        <div class="col-md-5 m-md-2">
                                                            <h3 class="mt-1">Phone Number :</h3>

                                                            <h4 class="fw-light"><?php
                                                            echo $doctor_row['phone']
                                                                ?></h4>
                                                        </div>
                                                        <div class="col-md-4 m-md-2">
                                                            <h3>Date of Birth :</h3>
                                                            <h4 class="fw-light"><?php $date = date_create($doctor_row['dob']);
                                                            echo date_format($date, "d-m-Y"); ?></h4>
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
                                            <div class="card-title">Doctor Professional Details</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h3>License Number :</h3>
                                                        <h4 class="fw-light"><?php echo $doctor_row['license_no'] ?></h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h3>Specialization :</h3>
                                                        <h4 class="fw-light"><?php echo $doctor_row['specialization'] ?></h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h3>Experience :</h3>
                                                        <h4 class="fw-light"><?php echo $doctor_row['experience'] ?></h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h3>Certifications and Qualifications :</h3>
                                                        <h4 class="fw-light"><?php echo $doctor_row['certification'] ?></h4>
                                                    </div>
                                                </div>
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

                                            <a href="doctor_approve_reject.php?approve_id=<?php echo $doctor_id; ?>"
                                                class="btn btn-success btn-block" name="approve">
                                                Approve
                                            </a>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="doctor_approve_reject.php?reject_id=<?php echo $doctor_id; ?>" class="btn btn-danger btn-block"
                                                name="reject">Reject</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <?php
                } else {
                    ?>

                    <div class="container">
                        <h1 class="text-center">Doctor already approved</h1>
                    </div>

                    <?php
                }
            }
        }

        ?>


    </div>
    <?php
    include("common/footer.php");

    ?>
    </div>
    </div>