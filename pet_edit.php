<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Pets Edit</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <!-- <link rel="icon" href="/assets/images/kaiadmin/favicon.ico" type="image/x-icon" /> -->
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

            if (isset($_GET['pet_id'])) {

                $pet_id = $_GET['pet_id']; 	
                // $user_id = $row['user_id'];
                // $user_detail_result = mysqli_query($conn, "SELECT * FROM users WHERE user_id=$user_id");
        
                // $user_detail = mysqli_fetch_array($user_detail_result);
        
                $pet_detail_result = mysqli_query($conn, "SELECT * FROM pets WHERE pet_id=$pet_id");
                $pet_detail = mysqli_fetch_array($pet_detail_result);

                if (isset($_POST['submit'])) {

                    $name = $_POST['name'];
                    $type = $_POST['type'];
                    $breed = $_POST['breed'];
                    $dob = date('Y-m-d', strtotime($_POST['dob']));
                    $gender = $_POST['gender'];
                    $color = $_POST['color'];
                    $weight = $_POST['weight'];
                    $medical = $_POST['medical'];
                    $note = $_POST['note'];

                    $sql = "UPDATE pets SET name='$name', `type`='$type', breed='$breed', dob='$dob', gender='$gender', color='$color', weight='$weight', medical='$medical', note='$note' WHERE pet_id=$pet_id";

                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Pet Details Updated Successfully');
                        window.location.href='main-dashboard.php'</script>";
                    } else {
                        echo "<script>alert('Failed to Update Pet Details');</script>";
                    }




                }

                ?>

                <div class="container">
                    <div class="page-inner">
                        <div class="page-header">
                            <h3 class="fw-bold mb-3">Pet Edit</h3>

                        </div>

                        <div class="row">
                            <div class="col-md-12">


                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">Pet Profile</div>
                                            </div>
                                            <div class="card-body">
                                                <img src="assets/images/pets/<?php echo $pet_detail['image']; ?>"
                                                    style="height:150px; width:153px;" class=" rounded-circle"
                                                    alt="no profile photo">
                                                <h3 class="mt-md-4"><?php echo $pet_detail['name']; ?></h3>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-8">

                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">Pet Information</div>
                                            </div>
                                            <div class="card-body">
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Name :</h6>
                                                            <input type="text" class="form-control" name="name"
                                                                value="<?php echo $pet_detail['name']; ?>">
                                                        </div>

                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Type :</h6>
                                                            <input type="text" class="form-control" name="type"
                                                                value="<?php echo $pet_detail['type']; ?>">
                                                        </div>

                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Breed :</h6>
                                                            <input type="text" class="form-control" name="breed"
                                                                value="<?php echo $pet_detail['breed']; ?>">

                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Gender :</h6>
                                                            <input type="text" class="form-control" name="gender"
                                                                value="<?php echo $pet_detail['gender']; ?>">
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Date of Birth :</h6>

                                                            <input type="text" value="<?php $date = date_create($pet_detail['dob']);
                                                            echo date_format($date, "d-m-Y"); ?>" name="dob"
                                                                class="form-control">

                                                        </div>

                                                        <div class=" col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Color :</h6>
                                                            <input type="text" class="form-control" name="color"
                                                                value="<?php echo $pet_detail['color']; ?>" class>
                                                        </div>
                                                        <div class=" col-md-6 mt-2">
                                                            <h6 class="text-secondary fw-bold">Weight :</h6>
                                                            <input type="text" class="form-control" name="weight"
                                                                value="<?php echo $pet_detail['weight']; ?>" class>
                                                        </div>

                                                        <div class="col-md-12 mt-2">
                                                            <h6 class="text-secondary fw-bold">Medical Condition :</h6>
                                                            <textarea name="medical" id="medical" rows="4"
                                                                class="form-control"><?php echo $pet_detail['medical'] ?></textarea>
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <h6 class="text-secondary fw-bold">Note :</h6>
                                                            <textarea name="note" id="note" rows="4"
                                                                class="form-control"><?php echo $pet_detail['note'] ?></textarea>
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