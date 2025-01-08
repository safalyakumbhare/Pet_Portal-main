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
        include("common/sidebar.php");
        if ($row['role_id'] == 2) {


            




        ?>


            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Your Pet Appointments</h3>
                    </div>

                    <div class="row">
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
                                                $user_table = "SELECT * FROM appointment WHERE user_id = $user_id ORDER BY created_at DESC ";

                                                $user_result = mysqli_query($conn, $user_table);

                                                if (mysqli_num_rows($user_result)) {


                                                    while ($apt = mysqli_fetch_array($user_result)) {
                                                    
                                                        $user_id = $apt['user_id'];
                                                        $doctor_id = $apt['doctor_id'];
                                                        $clinic_id = $apt['clinic_id'];
                                                    
                                                        $user_query = mysqli_query($conn, "SELECT * FROM users WHERE user_id = $user_id");
                                                        $user_data = mysqli_fetch_assoc($user_query);
                                                    
                                                        $clinic_query = mysqli_query($conn, "SELECT * FROM clinic WHERE clinic_id = $clinic_id;");
                                                        $clinic_data = mysqli_fetch_assoc($clinic_query);
                                                    
                                                        $doctor_query = mysqli_query($conn, "SELECT * FROM doctor WHERE doctor_id = $doctor_id ");
                                                        $doctor_data = mysqli_fetch_assoc($doctor_query);
                                                    
                                                        $pet_query = mysqli_query($conn, "SELECT * FROM pets WHERE user_id = $user_id");
                                                        $pet_data = mysqli_fetch_assoc($pet_query);

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
            </div>
            <?php
            include("common/footer.php");

            ?>
        <?php

        } elseif ($row['role_id'] == 1) {

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