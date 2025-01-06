<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Clinic Edit</title>
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


            if (isset($_GET['edit_id'])) {
                $clinic_id = $_GET['edit_id'];



                $clinic_data = "SELECT * FROM clinic WHERE clinic_id='$clinic_id';";
                $clinic_result = mysqli_query($conn, $clinic_data);
                if (isset($_POST['submit'])) {

                    $date = date_create($_POST['open_time']);
                    $open_time = date_format($date, "H:i:s");
                    $date = date_create($_POST['close_time']);
                    $close_time = date_format($date, "H:i:s");
                    $clinic_name = $_POST['clinic_name'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $open_day = $_POST['open_days'];
                    $close_day = $_POST['close_days'];
                    $pet_type = $_POST['pet_type'];
                    $fees = $_POST['fees'];
                    $about = $_POST['about_us'];
                    $rating = $_POST['rating'];

                    $clinic_update = "UPDATE clinic SET name='$clinic_name', address='$address', phone='$phone', email='$email', open_time='$open_time', close_time='$close_time', open_days='$open_day', close_days='$close_day', pet_type='$pet_type', fees='$fees', about_us='$about' , rating='$rating' WHERE clinic_id='$clinic_id';";

                    if (mysqli_query($conn, $clinic_update)) {
                        echo "<script>alert('Clinic Updated Successfully') 
                        window.location.href='doctor-dashboard.php';</script>";
                    } else {
                        echo "<script>alert('Failed to Update Clinic Details');</script>";
                    }
                }
                if (mysqli_num_rows($clinic_result)) {


                    $clinic_row = mysqli_fetch_assoc($clinic_result);

                    ?>

                    <div class="container">
                        <div class="page-inner">
                            <div class="page-header">
                                <h1 class="fw-bold mb-3">Edit Clinic</h1>

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
                                            <form method="post">
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-secondary">Clinic Name :</label>
                                                            <input type="text" name="clinic_name" class="form-control"
                                                                id="clinic_name" value="<?php echo $clinic_row['name'] ?>">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-secondary">Phone Number :</label>
                                                            <input type="text" name="phone" class="form-control" id="phone"
                                                                value="<?php echo $clinic_row['phone'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-secondary">Address :</label>
                                                            <textarea name="address" id="address" class="form-control"
                                                                rows="3"><?php echo $clinic_row['address'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-secondary">Email Address :</label>
                                                            <input type="email" name="email" class="form-control" id="email"
                                                                value="<?php echo $clinic_row['email'] ?>" ?>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-secondary">Opening Time :</label>

                                                            <?php
                                                            $date = date_create($clinic_row['open_time']);
                                                            $open_time = date_format($date, "h:i A");

                                                            $date = date_create($clinic_row['close_time']);
                                                            $close_time = date_format($date, "h:i A");
                                                            ?>
                                                            <input type="text" name="open_time" class="form-control" id="open_time"
                                                                value="<?php echo $open_time ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-secondary">Closing Time :</label>
                                                            <input type="text" class="form-control" name="close_time"
                                                                id="close_time" value="<?php echo $close_time ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-secondary">Days Open :</label>
                                                            <input type="text" class="form-control" name="open_days"
                                                                value="<?php echo $clinic_row['open_days'] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-secondary">Days Close :</label>
                                                            <input type="text" class="form-control" name="close_days"
                                                                value="<?php echo $clinic_row['close_days'] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-secondary">Types of Pets : </label>
                                                            <input type="text" name="pet_type" id="pet_type" class="form-control"
                                                                value="<?php echo $clinic_row['pet_type'] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-secondary">Ratings :</label>
                                                            <input type="text" class="form-control" name="rating" id="rating"
                                                                value="<?php echo $clinic_row['rating'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="w-100"></div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-secondary">Fees :</label>
                                                            <textarea rows="5" class="form-control" name="fees"
                                                                id="fees"><?php echo $clinic_row['fees'] ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-secondary">About Clinic :</label>
                                                            <textarea name="about_us" id="about_us" class="form-control"
                                                                rows="5"><?php echo $clinic_row['about_us'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 d-flex justify-content-center">
                                                        <button type="submit" name="submit" class="btn btn-primary">Make
                                                            Changes</button>
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
            } else {
                echo "<script>alert('Clinic not Selected');
                window.location.href='clinic_table.php';</script>";
            }
        } else {
            echo "<script>alert('You Do not have right to view this page');
            window.location.href='index.php';</script>";
        }

        ?>


            <?php
            include("common/footer.php");

            ?>
        </div>
    </div>