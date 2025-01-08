<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Pets and Pet's Owner </title>
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


            ?>


            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Pets and Pet's Owner</h3>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-body">


                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Pet's Owner Photo</th>
                                                    <th>Pet Owner's Name</th>
                                                    <th>Pet's Photo</th>
                                                    <th>Pet's Name</th>
                                                    <!-- <th>Status</th>
                                                    <th style="width: 10%; text-align:center;">Action</th> -->
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php

                                                $user_table = "SELECT * FROM users WHERE role_id = 2";

                                                $user_result = mysqli_query($conn, $user_table);

                                                while ($user = mysqli_fetch_array($user_result)) {
                                                    $user_id = $user['user_id'];
                                                    $pet = "SELECT * FROM pets WHERE user_id = $user_id;";

                                                    $pet_result = mysqli_query($conn, $pet);

                                                    while ($pet_data = mysqli_fetch_array($pet_result)) {

                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <div class="avatar-xxl">
                                                                    <img src="assets/images/<?php echo $user['profile']; ?>"
                                                                        class="avatar-img rounded-circle" alt="no image found">
                                                                </div>
                                                            </td>
                                                            <td><?php echo $user['username'] ?></td>
                                                            <!-- <td><?php echo $user['email'] ?></td> -->
                                                            <td>

                                                                <div class="avatar-xxl">
                                                                    <img src="assets/images/pets/<?php echo $pet_data['image']; ?>"
                                                                        class="avatar-img rounded-circle" alt="no image found">
                                                                </div>
                                                            </td>
                                                            <td><?php echo $pet_data['name'] ?></td>


                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include("common/footer.php");

            ?>
            <?php

        } elseif ($row['role_id'] == 2) {

            ?>
            <div class="container">
                <h1 class="text-center text-danger">You are not authorized to open this page</h1>
            </div>
            <?php
            include("common/footer.php");

            ?>
            <?php
        }
        ?>
    </div>