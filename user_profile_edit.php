<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - User Profile Edit</title>
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

        if ($row['role_id'] == 2) {

            if (isset($row['user_id'])) {


                $user_id = $row['user_id'];
                $user_detail_result = mysqli_query($conn, "SELECT * FROM users WHERE user_id=$user_id");

                $user_detail = mysqli_fetch_array($user_detail_result);

                $pet_detail_result = mysqli_query($conn, "SELECT * FROM pets WHERE user_id=$user_id");
                $pet_detail = mysqli_fetch_array($pet_detail_result);

                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $gender = $_POST['gender'];
                    $dob = date('Y-m-d', strtotime($_POST['dob']));
                    $phone = $_POST['phone'];

                    $sql = "UPDATE users SET username='$username', email='$email', address='$address', gender='$gender', dob='$dob', phone='$phone' WHERE user_id=$user_id";

                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('User Details Updated Successfully');
                        window.location.href='user_profile.php';</script>";
                    } else {
                        echo "<script>alert('Failed to Update User Details');</script>";
                    }
                }

                ?>

                <div class="container">
                    <div class="page-inner">
                        <div class="page-header">
                            <h3 class="fw-bold mb-3">My Profile</h3>

                        </div>

                        <div class="row">
                            <div class="col-md-12">


                                <div class="row">
                                    <div class="col-md-5 text-center">
                                        <div class="card">

                                            <div class="card-body">
                                                <img src="assets/images/<?php echo $user_detail['profile']; ?>"
                                                    style="height:150px; width:150px;" class=" rounded-circle"
                                                    alt="no profile photo">
                                                <h3 class="mt-md-4"><?php echo $user_detail['username']; ?></h3>
                                                <p><?php if (isset($pet_detail['name'])) {
                                                    echo "Owner of " . $pet_detail['name'];
                                                } else {
                                                    echo "Pet not Registered";
                                                } ?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-7">

                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">Personal Information</div>
                                            </div>
                                            <div class="card-body">
                                                <form action="user_profile_edit.php" method="post">
                                                    <div class="row">
                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Name :</h6>
                                                            <input type="text" class="form-control" name="username"
                                                                value="<?php echo $user_detail['username']; ?>">
                                                        </div>

                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Email :</h6>
                                                            <input type="email" class="form-control" name="email"
                                                                value="<?php echo $user_detail['email']; ?>">
                                                        </div>

                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Phone :</h6>
                                                            <input type="number" class="form-control" name="phone"
                                                                value="<?php echo $user_detail['phone']; ?>">

                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Gender :</h6>
                                                            <input type="text" class="form-control" name="gender"
                                                                value="<?php echo $user_detail['gender']; ?>">
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Date of Birth :</h6>

                                                            <input type="text" value="<?php $date = date_create($user_detail['dob']);
                                                            echo date_format($date, "d-m-Y"); ?>" name="dob" class="form-control">

                                                        </div>

                                                        <div class=" col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Address :</h6>
                                                            <input type="text" class="form-control" name="address"
                                                                value="<?php echo $user_detail['address']; ?>" class>
                                                        </div>


                                                        <div class="w-100"></div>
                                                        <div class="col-md-6 mt-3">
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
                        </div>
                    </div>

                    <?php
            } else {
                ?>
                    <div class="container">
                        <h1>User Not Selected</h1>
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