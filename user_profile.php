<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - User Profile</title>
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

        if ($row['role_id'] == 2) {

            if (isset($row['user_id'])) {


                $user_id = $row['user_id'];
                $user_detail_result = mysqli_query($conn, "SELECT * FROM users WHERE user_id=$user_id");

                $user_detail = mysqli_fetch_array($user_detail_result);

                $pet_detail_result = mysqli_query($conn, "SELECT * FROM pets WHERE user_id=$user_id");
                $pet_detail = mysqli_fetch_array($pet_detail_result);
                ?>

                <div class="container">
                    <div class="page-inner">
                        <div class="page-header">
                            <h3 class="fw-bold mb-3">My Profile</h3>

                        </div>

                        <div class="row">
                            <div class="col-md-12">


                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6 text-center">
                                        <div class="card">

                                            <div class="card-body">
                                                <img src="assets/images/<?php echo $user_detail['profile']; ?>"
                                                    class="card-img-top" style="height: 230px;width: 200px;"
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


                                    <div class="col-md-12">

                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">Personal Information</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h6 class="text-secondary fw-bold">Name :</h6>
                                                        <p><?php echo $user_detail['username']; ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 class="text-secondary fw-bold">Pet's Name :</h6>
                                                        <p> <?php if (isset($pet_detail['name'])) {
                                                            echo $pet_detail['name'];
                                                        } else {
                                                            echo "Pet not Registered";
                                                        } ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 class="text-secondary fw-bold">Email :</h6>
                                                        <p><?php echo $user_detail['email']; ?></p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <h6 class="text-secondary fw-bold">Phone :</h6>
                                                        <p><?php echo $user_detail['phone']; ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 class="text-secondary fw-bold">Gender :</h6>
                                                        <p><?php echo $user_detail['gender']; ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 class="text-secondary fw-bold">Date of Birth :</h6>
                                                        <p>
                                                            <?php
                                                            $date = date_create($user_detail['dob']);
                                                            echo date_format($date, "d-m-Y"); ?>
                                                        </p>

                                                    </div>

                                                    <div class="col-md-4">
                                                        <h6 class="text-secondary fw-bold">Address :</h6>
                                                        <p><?php echo $user_detail['address']; ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 class="text-secondary fw-bold">Account Created On :</h6>
                                                        <p><?php $date = date_create($user_detail['created_at']);
                                                        echo date_format($date, "d-m-Y"); ?></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6 class="text-secondary fw-bold">Status :</h6>
                                                        <p class="text-success"><?php echo $user_detail['status']; ?></p>
                                                    </div>

                                                    <div class="w-100"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 d-flex justify-content-center">
                                                        <a href="user_profile_edit.php" class="btn btn-primary">Edit Profile</a>
                                                    </div>
                                                </div>
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
            // header("Location: index.php");
            // exit();
            echo "You are not authorized to view this page.";
        }
        ?>
        </div>
        <?php
        include("common/footer.php");

        ?>
    </div>