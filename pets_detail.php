<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Pets Detail</title>
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


        if (isset($_GET['pet_id'])) {
            // Fetching pet details from the database
            // Assuming you have a function 'getPetDetails' which returns the pet details
            $pet_id = $_GET['pet_id'];

            $pet_data = "SELECT * FROM pets WHERE pet_id=$pet_id;";
            $pet_result = mysqli_query($conn, $pet_data);
            $pet_row = mysqli_fetch_assoc($pet_result);

            $user_id = $pet_row['user_id'];
            $user_data = "SELECT * FROM users WHERE user_id=$user_id;";
            $user_result = mysqli_query($conn, $user_data);
            $user_row = mysqli_fetch_assoc($user_result);
            ?>
            <!-- <div class="col-md-4">
                <img src="assets/images/pets/<?php echo $pet_row['image'] ?>" class="img-fluid rounded-4" alt="">
            </div> -->
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h1 class="fw-bold mb-3">Pets Detail</h1>

                    </div>

                    <div class="row">

                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header rounded-top-3" style="background-color: lightgray;">
                                                    <h1 class="card-title">Pet Image</h1>
                                                </div>
                                                <div class="card-body">
                                                    <img src="/assets/images/pets/<?php echo $pet_row['image'] ?>"
                                                        class="card-img-top" alt="Clinic Image Not Found">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header rounded-top-3" style="background-color: lightgray;">
                                    <div class="card-title">Pet Information</div>
                                </div>
                                <div class="card-body">
                                    <div class="row ">

                                        <div class="col-md-3 ">
                                            <h5 class="text-secondary">Name :</h5>
                                            <p><?php echo $pet_row['name'] ?></p>
                                        </div>

                                        <div class="col-md-3 ">
                                            <h5 class="mt-1 text-secondary">Pet of :</h5>

                                            <p><?php echo $user_row['username'] ?></p>
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

                                        <div class="col-md-3 ">
                                            <h5 class="text-secondary">Date of Birth :</h5>
                                            <p><?php $date = date_create($pet_row['dob']);
                                            echo date_format($date, "d-m-Y"); ?></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header rounded-top-3" style="background-color: lightgray;">
                                    <div class="card-title">Pet Type</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4 d-flex flex-column justify-content-between">
                                            <div class="form-group">
                                                <h5 class="text-secondary">Pet Type :</h5>
                                                <p><?php echo $pet_row['type'] ?></p>
                                            </div>
                                            <div class="form-group">
                                                <h5 class="mt-1 text-secondary">Breed :</h5>

                                                <p><?php echo $pet_row['breed'] ?></p>
                                            </div>

                                        </div>


                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5 class="text-secondary">Gender :</h5>
                                                <p><?php echo $pet_row['gender'] ?></p>
                                            </div>

                                            <div class="form-group">
                                                <h5 class="mt-1 text-secondary">Color :</h5>
                                                <p><?php echo $pet_row['color'] ?></p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
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
                                    <div class="card-title">Pet Medical Condition</div>
                                </div>
                                <div class="card-body">
                                    <p class="fw-light card-text"><?php echo $pet_row['medical'] ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header rounded-top-3" style="background-color: lightgray;">
                                    <div class="card-title">Pet Description</div>
                                </div>
                                <div class="card-body">
                                    <p class="fw-light card-text"><?php echo $pet_row['note'] ?></p>
                                </div>
                            </div>
                        </div>



                    </div>
                    <?php
        }
        ?>


            </div>
            <?php
            include("common/footer.php");

            ?>
        </div>