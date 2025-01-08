<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Dashboard</title>
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
        ?>

        <!-- Fetching data to show the count -->
        <?php

        $users = "SELECT * FROM users WHERE role_id = 2";
        $user_result = mysqli_query($conn, $users);

        $pets = "SELECT * FROM pets;";
        $pet_result = mysqli_query($conn, $pets);

        $doctors = "SELECT * FROM doctor;";
        $doctor_result = mysqli_query($conn, $doctors);

        $clinic = "SELECT * FROM clinic;";
        $clinic_result = mysqli_query($conn, $clinic);

        ?>
        <?php
        if ($row['role_id'] == 1) {



        ?>
            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3 class="fw-bold mb-3">Welcome Admin</h3>
                            <!-- <h6 class="op-7 mb-2">Free Bootstrap 5 Admin Dashboard</h6> -->
                        </div>
                        <!-- <div class="ms-md-auto py-2 py-md-0">
                        <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                        <a href="#" class="btn btn-primary btn-round">Add Customer</a>
                    </div> -->
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                        <a href="user_table.php" class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Pet Owners</p>
                                                <h4 class="card-title"><?php echo mysqli_num_rows($user_result) ?></h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                                <i class="fa-solid fa-paw"></i>
                                            </div>
                                        </div>
                                        <a href="pets_table.php" class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Pets</p>
                                                <h4 class="card-title"><?php echo mysqli_num_rows($pet_result) ?></h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                                <i class="fa-solid fa-user-doctor"></i>
                                            </div>
                                        </div>
                                        <a href="doctor_table.php" class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Doctors</p>
                                                <h4 class="card-title"><?php echo mysqli_num_rows($doctor_result) ?></h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                <i class="fa-solid fa-house-chimney-medical"></i>
                                            </div>
                                        </div>
                                        <a href="clinic_table.php" class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Pet Clinics</p>
                                                <h4 class="card-title"><?php echo mysqli_num_rows($clinic_result) ?></h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-8">
                            <div class="card card-round">
                                <div class="card-header">
                                    <div class="card-head-row card-tools-still-right">
                                        <div class="card-title">New Doctor Approvals</div>

                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <!-- Projects table -->
                                            <table class="table align-items-center mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Doctor Name</th>
                                                        <th scope="col" class="text-end">Address</th>
                                                        <th scope="col" class="text-end">Specialization</th>
                                                        <th scope="col" class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $doctor = "SELECT * FROM doctor WHERE approval = 'Pending';";
                                                    $doctor_result = mysqli_query($conn, $doctor);

                                                    if (mysqli_num_rows($doctor_result)>0) {
                                                        while ($doctor_data = mysqli_fetch_array($doctor_result)) {
                                                    ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <?php echo $doctor_data['name']; ?>
                                                                </th>
                                                                <td class="text-end"> <?php echo $doctor_data['address']; ?></td>
                                                                <td class="text-end"> <?php echo $doctor_data['specialization']; ?></td>
                                                                <td class="text-center">
                                                                    <a
                                                                        href="doctor_detail.php?doctor_id=<?php echo $doctor_data['doctor_id'] ?>"><i
                                                                            class="fa-solid text-primary fa-eye"></i></a>

                                                                </td>
                                                            </tr>
                                                        <?php

                                                        }
                                                    } else {

                                                        ?>
                                                        <tr>
                                                            <td colspan="4" class="text-center">No New Doctor Approvals</td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-round">
                                    <div class="card-header">
                                        <div class="card-head-row card-tools-still-right">
                                            <div class="card-title">New Clinic Approvals</div>

                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <!-- Projects table -->
                                            <table class="table align-items-center mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Clinic Name</th>
                                                        <th scope="col">Clinic Doctor</th>
                                                        <th scope="col">Address</th>
                                                        <th scope="col">Pets Type</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $clinic = "SELECT * FROM clinic WHERE approval = 'Pending';";
                                                    $clinic_result = mysqli_query($conn, $clinic);


                                                    if (mysqli_num_rows($clinic_result)) {
                                                        while ($clinic_data = mysqli_fetch_array($clinic_result)) {
                                                            $doctor_id = $clinic_data['doctor_id'];

                                                            $doctor_data = "SELECT * FROM doctor WHERE doctor_id = $doctor_id;";

                                                            $doctor_result = mysqli_query($conn, $doctor_data);

                                                            $doctor_data = mysqli_fetch_assoc($doctor_result);
                                                    ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <?php echo $clinic_data['name']; ?>
                                                                </th>
                                                                <td> <?php echo $doctor_data['name']; ?></td>
                                                                <td> <?php echo $clinic_data['address']; ?></td>
                                                                <td> <?php echo $clinic_data['pet_type']; ?></td>
                                                                <td class="text-center">
                                                                    <a
                                                                        href="clinic_detail.php?clinic_id=<?php echo $clinic_data['clinic_id'] ?>"><i
                                                                            class="fa-solid text-primary fa-eye"></i></a>

                                                                </td>
                                                            </tr>
                                                        <?php

                                                        }
                                                    } else {

                                                        ?>
                                                        <tr>
                                                            <td colspan="5" class="text-center">No New Clinic Approvals</td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-round">
                                <div class="card-body">
                                    <div class="card-head-row card-tools-still-right">
                                        <div class="card-title">New Users</div>
                                    </div>
                                    <div class="card-list py-4">

                                        <?php

                                        $currentdate = date('Y-m-d'); // Get only the current date
                                        $new = "SELECT * FROM users WHERE DATE(created_at) = '$currentdate'";
                                        $new_result = mysqli_query($conn, $new);

                                        if (mysqli_num_rows($new_result)) {
                                            while ($new_data = mysqli_fetch_array($new_result)) {
                                        ?>
                                                <div class="item-list">
                                                    <div class="avatar">
                                                        <img src="assets/images/<?php echo $new_data['profile'] ?>" alt="..."
                                                            class="avatar-img rounded-circle" />
                                                    </div>
                                                    <div class="info-user ms-3">
                                                        <div class="username"><?php echo $new_data['username'] ?></div>
                                                        <div class="status"><?php echo $new_data['address'] ?></div>
                                                    </div>

                                                    <a href="user_view.php?user_id=<?php echo $new_data['user_id']; ?>"
                                                        class="btn btn-icon btn-link btn-primary op-8">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                </div>
                                            <?php

                                            }
                                        } else {
                                            ?>

                                            <div class="item-list justify-content-center">
                                                <p>No New User Found</p>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-round">
                                <div class="card-body">
                                    <div class="card-head-row card-tools-still-right">
                                        <div class="card-title">New Doctors</div>
                                    </div>
                                    <div class="card-list py-4">

                                        <?php

                                        $currentdate = date('Y-m-d'); // Get only the current date
                                        $new = "SELECT * FROM doctor WHERE DATE(created_at) = '$currentdate'";
                                        $new_result = mysqli_query($conn, $new);

                                        if (mysqli_num_rows($new_result)) {
                                            while ($new_data = mysqli_fetch_array($new_result)) {
                                        ?>
                                                <div class="item-list">
                                                    <div class="avatar">
                                                        <img src="assets/images/doctors/<?php echo $new_data['profile'] ?>"
                                                            alt="..." class="avatar-img rounded-circle" />
                                                    </div>
                                                    <div class="info-user ms-3">
                                                        <div class="username"><?php echo $new_data['name'] ?></div>
                                                        <div class="status"><?php echo $new_data['address'] ?></div>
                                                    </div>

                                                    <a href="doctor_detail.php?doctor_id=<?php echo $new_data['doctor_id']; ?>"
                                                        class="btn btn-icon btn-link btn-primary op-8">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                </div>
                                            <?php

                                            }
                                        } else {
                                            ?>

                                            <div class="item-list justify-content-center">
                                                <p>No New User Found</p>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        <?php
        } elseif ($row['role_id'] == 2) {



        ?>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Welcome <?php echo $row['username'] ?></h3>


                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Your Pets</h4>
                                    <a href="pet_register.php" class="btn btn-primary btn-round ms-auto">
                                        <i class="fa fa-plus"></i>
                                        Add Pets
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Breed</th>
                                                <th>Gender</th>
                                                <th style="width: 10%" class="text-center">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $user_id = $row['user_id'];
                                            $pet = "SELECT * FROM pets WHERE user_id = $user_id;";

                                            $pet_result = mysqli_query($conn, $pet);

                                            if (mysqli_num_rows($pet_result) > 0) {

                                                while ($pet_row = mysqli_fetch_assoc($pet_result)) {
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xxl">
                                                                <img src="assets/images/pets/<?php echo $pet_row['image']; ?>"
                                                                    class="avatar-img rounded-circle" alt="no image found">
                                                            </div>
                                                        </td>
                                                        <td><?php echo $pet_row['name'] ?></td>
                                                        <td><?php echo $pet_row['breed'] ?></td>
                                                        <td><?php echo $pet_row['gender'] ?></td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a href="pet_edit.php?pet_id=<?php echo $pet_row['pet_id'] ?>"
                                                                    data-bs-toggle="tooltip" title="Edit"
                                                                    class="btn btn-link btn-primary "
                                                                    data-original-title="Edit Task">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="#" data-bs-toggle="tooltip" title="Remove"
                                                                    class="btn btn-link btn-danger" data-original-title="Remove">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </a>
                                                                <a href="pets_detail.php?pet_id=<?php echo $pet_row['pet_id'] ?>"
                                                                    data-bs-toggle="tooltip" title="View details"
                                                                    class="btn btn-link btn-success" data-original-title="Remove">
                                                                    <i class="fa-regular fa-eye"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="5" class="text-center">No Pet Found</td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <!-- <thead>
                                                <tr>
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Breed</th>
                                                    <th>Gender</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead> -->

                                        <tbody>


                                        </tbody>
                                    </table>
                                </div>



                            </div>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-3">Your Pet Appointments</h3>

                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body">


                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Clinic Name</th>
                                                <th>Clinic Location</th>
                                                <th>Appointment Date</th>
                                                <th>Appointment Time</th>
                                                <th>Appointment Description</th>
                                                <th>Approval</th>
                                                <th>Visit</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $user_id = $row['user_id'];
                                            $user_table = "SELECT * FROM appointment WHERE user_id = $user_id ";

                                            $user_result = mysqli_query($conn, $user_table);

                                            if (mysqli_num_rows($user_result)) {


                                                while ($apt = mysqli_fetch_array($user_result)) {

                                                    $user_id = $apt['user_id'];
                                                    $doctor_id = $apt['doctor_id'];
                                                    $clinic_id = $apt['clinic_id'];

                                                    $user_result = mysqli_query($conn, "SELECT * FROM users WHERE user_id = $user_id");
                                                    $user_data = mysqli_fetch_assoc($user_result);

                                                    $clinic_result = mysqli_query($conn, "SELECT * FROM clinic WHERE clinic_id = $clinic_id;");
                                                    $clinic_data = mysqli_fetch_assoc($clinic_result);

                                                    $doctor_result = mysqli_query($conn, "SELECT * FROM doctor WHERE doctor_id = $doctor_id ");
                                                    $doctor_data = mysqli_fetch_assoc($doctor_result);

                                                    $pet_result = mysqli_query($conn, "SELECT * FROM pets WHERE user_id = $user_id");
                                                    $pet_data = mysqli_fetch_assoc($pet_result);

                                            ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $clinic_data['name'] ?>
                                                        </td>

                                                        <td><?php echo $clinic_data['address'] ?></td>

                                                        <td><?php $date =  date_create($apt['appointment_date']);
                                                            echo date_format($date, "d-m-Y") ?></td>
                                                        <td><?php $time =  date_create($apt['appointment_time']);
                                                            echo date_format($time, "h:i A") ?></td>

                                                        <td><?php echo $apt['appointment_description'] ?></td>


                                                        <?php
                                                        if ($apt['approval'] == "Pending") {
                                                            echo "<td class='text-warning'>Pending</td>";
                                                        } elseif ($apt['approval'] == "Approved") {
                                                            echo "<td class='text-success'>Approved</td>";
                                                        } elseif ($apt['approval'] == "Rejected") {
                                                            echo "<td class='text-danger'>Rejected</td>";
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($apt['visit'] == "Pending") {
                                                            echo "<td class='text-warning'>Pending</td>";
                                                        } elseif ($apt['visit'] == "Booked") {
                                                            echo "<td class='text-success'>Booked</td>";
                                                        } elseif ($apt['visit'] == "Visited") {
                                                            echo "<td class='text-primary'>Visited</td>";
                                                        } elseif ($apt['visit'] == "Cancel") {
                                                            echo "<td class='text-danger'>Cancelled</td>";
                                                        }
                                                        ?>
                                                        </td>


                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<td colspan=7 class='text-center'>No  Appointments </td>";
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

        <?php

        } else {
            echo "<script>alert('Go back');</script>";
        }
        ?>
        <?php
        include("common/footer.php");

        ?>
    </div>



</body>

</html>