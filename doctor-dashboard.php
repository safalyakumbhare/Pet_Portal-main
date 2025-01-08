<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Dashboard</title>
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
        <?php

        include("common/doctor-sidebar.php");


        if ($row['role_id'] == 3) {
        ?>
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Welcome <?php echo $row['name'] ?></h3>


                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Your Clinics</h4>
                                    <a href="clinic_register.php" class="btn btn-primary btn-round ms-auto">
                                        <i class="fa fa-plus"></i>
                                        Add Clinics
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Approval</th>
                                                <th style="width: 10%" class="text-center">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $user_id = $row['doctor_id'];
                                            $doctor = "SELECT * FROM clinic WHERE doctor_id = $user_id;";

                                            $doctor_result = mysqli_query($conn, $doctor);

                                            if (mysqli_num_rows($doctor_result) > 0) {

                                                while ($doctor_row = mysqli_fetch_assoc($doctor_result)) {
                                            ?>
                                                    <tr>

                                                        <td><?php echo $doctor_row['name'] ?></td>
                                                        <td><?php echo $doctor_row['address'] ?></td>
                                                        <td><?php echo $doctor_row['phone'] ?></td>
                                                        <td>
                                                            <?php
                                                            if ($doctor_row['status'] == "Active") {
                                                                echo "<span class='text-success'>Active</span>
                                                     </td>";
                                                            } else {
                                                                echo "<span class='text-danger'>Inactive</span>
                                                     </td>";
                                                            }

                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($doctor_row['approval'] == "Pending") {
                                                                echo "<span class='text-warning'>Pending</span>";
                                                            } elseif ($doctor_row['approval'] == "Approved") {
                                                                echo "<span class='text-success'>Approved</span>";
                                                            } elseif ($doctor_row['approval'] == "Rejected") {
                                                                echo "<span class='text-danger'>Rejected</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a href="clinic_edit.php?edit_id=<?php echo $doctor_row['clinic_id'] ?>"
                                                                    class="btn btn-link btn-primary "
                                                                    data-original-title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="clinic_table.php?dlt_id=<?php echo $doctor_row['clinic_id'] ?>"
                                                                    data-bs-toggle="tooltip" title="Remove"
                                                                    class="btn btn-link btn-danger "
                                                                    data-original-title="Remove"
                                                                    onclick="return remove()">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>

                                                                <a href="clinic_view.php?clinic_id=<?php echo $doctor_row['clinic_id'] ?>"
                                                                    data-bs-toggle="tooltip" title="View Details"
                                                                    class="btn btn-link btn-success "
                                                                    data-original-title="View Details">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="6" class="text-center">No Clinic Registered</td>
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
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Upcoming Appointments</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Pet Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $doctor_id = $row['doctor_id'];
                                            $currentdatetime = date("Y-m-d H:i:s");

                                            $appointment_table = "SELECT * FROM appointment WHERE doctor_id = $doctor_id AND visit = 'Booked' AND created_at < '$currentdatetime';";

                                            $appointment_result = mysqli_query($conn, $appointment_table);

                                            if (mysqli_num_rows($appointment_result) > 0) {

                                                while ($apt = mysqli_fetch_array($appointment_result)) {

                                                    $pet_id = $apt['pet_id'];
                                                    $pet_query = "SELECT name FROM pets WHERE pet_id = $pet_id";

                                                    $pet_result = mysqli_query($conn, $pet_query);
                                                    $pet_data = mysqli_fetch_array($pet_result);

                                            ?>

                                                    <tr>

                                                        <td><?php $date = strtotime($apt['appointment_date']);
                                                        echo date('d-m-Y', $date); ?></td>
                                                        <td><?php echo $apt['appointment_time'] ?></td>
                                                        <!-- <td><?php echo $apt['time'] ?></td> -->
                                                        <td><?php echo $pet_data['name'] ?></td>
                                                        <td><?php
                                                                if ($apt['status'] == "active") {
                                                                    echo "<span class='text-success'>Active</span>
                                                     </td>";
                                                                } else {
                                                                    echo "<span class='text-danger'>Inactive</span>
                                                     </td>";
                                                                }

                                                                ?></td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a href="appointment_details.php?apt_id=<?php echo $apt['appointment_id'] ?>"
                                                                    class="btn btn-link btn-primary "
                                                                    data-original-title="View">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                            <?php

                                                }
                                            } else {
                                                echo "<td colspan=7 class=text-center>No Upcoming Appointments</td>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php
            }
                ?>