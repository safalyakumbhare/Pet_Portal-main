<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Doctor Profile Edit</title>
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
        include("common/doctor-sidebar.php");

        if ($row['role_id'] == 3) {

            if (isset($row['doctor_id'])) {


                $doctor_id = $row['doctor_id'];
                $doctor_detail_result = mysqli_query($conn, "SELECT * FROM doctor WHERE doctor_id=$doctor_id");

                $doctor_detail = mysqli_fetch_array($doctor_detail_result);



                if (isset($_POST['submit'])) {
                    $doctorname = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $gender = $_POST['gender'];
                    $dob = date('Y-m-d', strtotime($_POST['dob']));
                    $phone = $_POST['phone'];
                    $license = $_POST["license_no"];
                    $specialization = $_POST["specialization"];
                    $certification = $_POST["certification"];
                    $experience = $_POST["experience"];

                    $sql = "UPDATE doctor SET name='$doctorname', email='$email', address='$address', gender='$gender', dob='$dob', phone='$phone' , license_no='$license' , specialization = '$specialization' , certification='$certification' , experience='$experience'  WHERE doctor_id=$doctor_id";

                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Doctor Details Updated Successfully');
                        window.location.href='doctor_profile.php';</script>";
                    } else {
                        echo "<script>alert('Failed to Update doctor Details');</script>";
                    }
                }

                ?>

                <div class="container">
                    <div class="page-inner">
                        <div class="page-header">
                            <h3 class="fw-bold mb-3">My Profile Edit</h3>

                        </div>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-12 ">


                                    <div class="row  d-flex justify-content-center">
                                        <div class="col-md-5 text-center">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        Profile
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <img src="assets/images/doctors/<?php echo $doctor_detail['profile']; ?>"
                                                        style="height:150px; width:150px;" class=" rounded-circle"
                                                        alt="no profile photo">
                                                    <h3 class="mt-md-4"><?php echo $doctor_detail['name']; ?></h3>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">

                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">Edit Personal Information</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Name :</h6>
                                                            <input type="text" class="form-control" name="name"
                                                                value="<?php echo $doctor_detail['name']; ?>">
                                                        </div>

                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Email :</h6>
                                                            <input type="email" class="form-control" name="email"
                                                                value="<?php echo $doctor_detail['email']; ?>">
                                                        </div>

                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Phone :</h6>
                                                            <input type="number" class="form-control" name="phone"
                                                                value="<?php echo $doctor_detail['phone']; ?>">

                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Gender :</h6>
                                                            <input type="text" class="form-control" name="gender"
                                                                value="<?php echo $doctor_detail['gender']; ?>">
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Date of Birth :</h6>

                                                            <input type="text" value="<?php $date = date_create($doctor_detail['dob']);
                                                            echo date_format($date, "d-m-Y"); ?>" name="dob"
                                                                class="form-control">

                                                        </div>

                                                        <div class=" col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Address :</h6>
                                                            <input type="text" class="form-control" name="address"
                                                                value="<?php echo $doctor_detail['address']; ?>" class>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">Edit Professional Information</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">License No. :</h6>
                                                            <input type="text" class="form-control" name="license_no"
                                                                value="<?php echo $doctor_detail['license_no']; ?>">
                                                        </div>

                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Specialization :</h6>
                                                            <input type="text" class="form-control" name="specialization"
                                                                value="<?php echo $doctor_detail['specialization']; ?>">
                                                        </div>

                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Certifications :</h6>
                                                            <textarea class="form-control" rows="3"
                                                                name="certification"><?php echo $doctor_detail['certification']; ?></textarea>

                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Experience :</h6>
                                                            <textarea class="form-control" name="experience"
                                                                rows="3"><?php echo $doctor_detail['experience']; ?></textarea>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">

                                                <div class="col-md-2">
                                                    <button type="submit" class="btn btn-primary btn-block" name="submit">Edit
                                                        Profile</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                    <?php
            } else {
                ?>
                    <div class="container">
                        <h1>doctor Not Selected</h1>
                    </div>
                    <?php
            }
            ?>

                <?php
        } else {

            ?>
                <div class="container">
                    <h1>Access Denied</h1>
                </div>

                <?php
        }
        ?>
        </div>
        <?php
        include("common/footer.php");

        ?>
    </div>