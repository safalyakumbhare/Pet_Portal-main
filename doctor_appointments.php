<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Appointments</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
      <link rel="shortcut icon" href="/assets/images/pets.png" type="image/x-icon">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        include("common/doctor-sidebar.php");
        if ($row['role_id'] == 3) {




            if(isset($_GET['visit_id'])){
                $visit_id = $_GET['visit_id'];

                $done = "UPDATE appointment SET visit = 'Visited' WHERE appointment_id = '$visit_id'";

                $result = mysqli_query($conn,$done);

                if($result){
                    echo "<script>alert('Appointment marked as visited');</script>";
                    echo "<script>window.location.href = 'doctor_appointments.php'</script>";
                }
                else{
                    echo "<script>alert('Failed to mark appointment as visited');</script>";
                    echo "<script>window.location.href = 'doctor_appointments.php'</script>";
                }

            }

            if (isset($_GET['dlt_id'])) {
                $user_id = $_GET['dlt_id'];
                $sql = mysqli_query($conn, "DELETE FROM appointment WHERE user_id = '$user_id'");
                // $dlt_pet = mysqli_query($conn, "DELETE FROM pets WHERE user_id = '$user_id'");

                if ($sql) {
                    echo "<script>alert('User Deleted');</script>";
                    echo "<script>window.location.href = 'doctor_appointments.php'</script>";
                }
            }






        ?>


            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Pet Appointments</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-body">


                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Pet's Owner Name</th>
                                                    <th>Pet Type</th>
                                                    <th>Appointment Date</th>
                                                    <th>Appointment Time</th>
                                                    <th>Clinic Name</th>
                                                    <th>Status</th>
                                                    <th>Approval</th>
                                                    <th>Visit</th>
                                                    <th style="text-align:center;">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $doctor_id = $row['doctor_id'];
                                                $user_table = "SELECT * FROM appointment WHERE doctor_id = $doctor_id ORDER BY created_at DESC ;";

                                                $user_result = mysqli_query($conn, $user_table);

                                                if (mysqli_num_rows($user_result) >0) {
                                                   

                                                    while( $apt = mysqli_fetch_assoc($user_result)) {

                                                        $user_id = $apt['user_id'];
                                                        $doctor_id = $apt['doctor_id'];
                                                        $clinic_id = $apt['clinic_id'];

                                                        $user_info = mysqli_query($conn, "SELECT * FROM users WHERE user_id = $user_id");
                                                        $user_data = mysqli_fetch_assoc($user_info);

                                                        $clinic_result = mysqli_query($conn, "SELECT * FROM clinic WHERE clinic_id = $clinic_id;");
                                                        $clinic_data = mysqli_fetch_assoc($clinic_result);

                                                        $doctor_result = mysqli_query($conn, "SELECT * FROM doctor WHERE doctor_id = $doctor_id ");
                                                        $doctor_data = mysqli_fetch_assoc($doctor_result);

                                                        $pet_result = mysqli_query($conn, "SELECT * FROM pets WHERE user_id = $user_id");
                                                        $pet_data = mysqli_fetch_assoc($pet_result);

                                                ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $user_data['username'] ?>
                                                            </td>

                                                            <td><?php echo $pet_data['type'] ?></td>

                                                            <td><?php $date =  date_create($apt['appointment_date']);
                                                                echo date_format($date, "d-m-Y") ?></td>
                                                            <td><?php $time =  date_create($apt['appointment_time']);
                                                                echo date_format($time, "h:i A") ?></td>

                                                            <td><?php echo $clinic_data['name'] ?></td>

                                                            <td><?php
                                                                if ($apt['status'] == "active") {
                                                                    echo "<span class='text-success'>Active</span>
                                                     </td>";
                                                                } else {
                                                                    echo "<span class='text-danger'>Inactive</span>
                                                     </td>";
                                                                }

                                                                ?>

                                                            <td>
                                                                <?php
                                                                if ($apt['approval'] == "Pending") {
                                                                    echo "<span class='text-warning'>Pending</span>";
                                                                } elseif ($apt['approval'] == "Approved") {
                                                                    echo "<span class='text-success'>Approved</span>";
                                                                } elseif ($apt['approval'] == "Rejected") {
                                                                    echo "<span class='text-danger'>Rejected</span>";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                            <?php
                                                                if ($apt['visit'] == "Pending") {
                                                                    echo "<span class='text-warning'>Pending</span>";
                                                                } elseif ($apt['visit'] == "Booked") {
                                                                    echo "<span class='text-success'>Booked</span>";
                                                                } elseif ($apt['visit'] == "Visited") {
                                                                    echo "<span class='text-primary'>Visited</span>";
                                                                }
                                                                ?>

                                                            </td>

                                                            <td>
                                                                <a href="doctor_appointments.php?dlt_id=<?php echo $apt['user_id'] ?>" class="p-1" data-original-title="Remove" onclick="return remove()" data-bs-toggle="tooltip" title="Remove"><i class="fa-solid fa-trash text-danger"></i></a>

                                                                <a href="appointment_details.php?apt_id=<?php echo $apt['appointment_id'] ?>" data-bs-toggle="tooltip" title="View Appointment" class="p-1"><i class="fa-regular fa-eye"></i></a>

                                                                <?php

                                                                if ($apt['visit'] == 'Booked') {
                                                                ?>

                                                                    <a href="doctor_appointments.php?visit_id=<?php echo $apt['appointment_id'] ?>" data-bs-toggle="tooltip" title="Mark Done"  >
                                                                        <i class="fa-solid p-1 fa-calendar-check text-success"></i>
                                                                    </a>
                                                                <?php
                                                                } 
                                                                ?>
                                                                    

                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                } else {
                                                    echo "<td colspan=9 class='text-center'>No  Appointments </td>";
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
                <h1 class="text-center text-danger">You don't have right to open this page</h1>

            </div>
            <?php
            include("common/footer.php");

            ?>
        <?php
        }
        ?>
    </div>

    <script>
        function confirmDeactivation() {
            return confirm('Do you want to Deactivate this Appointment?');
        }

        function confirmactivation() {
            return confirm('Do you want to activate this Appointment?');
        }

        function remove() {
            return confirm('Do you want to Remove this Appointment?');
        }
    </script>