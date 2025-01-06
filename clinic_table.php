<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Clinics</title>
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
        if ($row['role_id'] == 1) {


            if (isset($_GET['dlt_id'])) {
                $clinic_id = $_GET['dlt_id'];
                $sql = mysqli_query($conn, "DELETE FROM clinic WHERE clinic_id = '$clinic_id'");
                // $dlt_pet = mysqli_query($conn, "DELETE FROM pets WHERE clinic_id = '$clinic_id'");
        
                if ($sql && $dlt_pet) {
                    echo "<script>alert('Clinic Deleted');</script>";
                    echo "<script>window.location.href = 'clinic_table.php'</script>";
                }

            }

            if (isset($_GET['clinic_id'])) {
                $rid = intval($_GET['clinic_id']);

                $check = "SELECT * FROM clinic WHERE clinic_id = $rid;";

                $result = mysqli_query($conn, $check);
                $check_row = mysqli_fetch_array($result);

                $status = $check_row['status'];

                if ($status == 'Inactive') {

                    $doctor_id = $check_row['doctor_id'];
                    $check = mysqli_query($conn, "SELECT * FROM doctor WHERE doctor_id = '$doctor_id';");
                    $check_result = mysqli_fetch_array($check);

                    if ($check_result['status'] == 'Inactive') {

                        echo "<script>alert('Doctor of this clinic is inactive. Please activate doctor first.');</script>";
                        echo "<script>window.location.href = 'clinic_table.php'</script>";
                    } else {
                        $sql = mysqli_query($conn, "UPDATE clinic SET status = 'Active' WHERE clinic_id = '$rid'");
                        echo "<script>alert('Clinic Activated');</script>";
                        echo "<script>window.location.href = 'clinic_table.php'</script>";
                    }

                }
                if ($status == 'Active') {



                    $sql = mysqli_query($conn, "UPDATE clinic SET status = 'Inactive' WHERE clinic_id = '$rid'");
                    echo "<script>alert('Clinic Deactivated');</script>";
                    echo "<script>window.location.href = 'clinic_table.php'</script>";
                }
            }




            ?>


            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Clinics</h3>

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
                                                    <th>Doctor Name</th>
                                                    <th>Address</th>
                                                    <th>Phone No.</th>
                                                    <th>Status</th>
                                                    <th>Approval</th>
                                                    <th style="width: 10%; text-align:center;">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php

                                                $clinic_table = "SELECT * FROM clinic ";

                                                $clinic_result = mysqli_query($conn, $clinic_table);

                                                if (mysqli_num_rows($clinic_result) > 0) {

                                                    while ($clinic = mysqli_fetch_array($clinic_result)) {

                                                        $doctor_id = $clinic['doctor_id'];

                                                        $doctor_query = "SELECT name FROM doctor WHERE doctor_id = $doctor_id";

                                                        $doctor_result = mysqli_query($conn, $doctor_query);

                                                        $doctor = mysqli_fetch_array($doctor_result);
                                                        ?>
                                                        <tr>

                                                            <td><?php echo $clinic['name'] ?></td>
                                                            <td><?php echo $doctor['name'] ?></td>
                                                            <td><?php echo $clinic['address'] ?></td>
                                                            <td><?php echo $clinic['phone'] ?></td>
                                                            <td><?php
                                                            if ($clinic['status'] == "Active") {
                                                                echo "<span class='text-success'>Active</span>
                                                     </td>";
                                                            } else {
                                                                echo "<span class='text-danger'>Inactive</span>
                                                     </td>";
                                                            }

                                                            ?>
                                                                <?php
                                                                if ($clinic['approval'] == "Approved") {
                                                                    echo "<td class='text-success'>Approved</td>";
                                                                } else if ($clinic['approval'] == "Pending") {
                                                                    echo "<td class='text-primary'>Pending</td>";
                                                                } else if ($clinic['approval'] == "Rejected") {
                                                                    echo "<td class='text-danger'>Rejected</td>";
                                                                } ?>
                                                            <td>
                                                                <div class="form-button-action">
                                                                    <a href="clinic_table.php?dlt_id=<?php echo $clinic['clinic_id'] ?>"
                                                                        data-bs-toggle="tooltip" title="Remove"
                                                                        class="btn btn-link btn-primary "
                                                                        data-original-title="Remove" onclick="return remove()">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                    </a>

                                                                    <?php

                                                                    if ($clinic['approval'] == "Pending" || $clinic['approval'] == "Rejected") {
                                                                        // echo "<span class='badge badge-danger'>$clinic[approval]</span>";
                                                                    } else {

                                                                        if ($clinic['status'] == "Active") {
                                                                            ?>


                                                                            <a href="clinic_table.php?clinic_id=<?php echo $clinic['clinic_id'] ?>"
                                                                                data-bs-toggle="tooltip" title="Inactive Clinic"
                                                                                class="btn btn-link btn-danger"
                                                                                onclick="return confirmDeactivation()"
                                                                                data-original-title="Inactive">
                                                                                <i class="fa-solid fa-user-xmark"></i>
                                                                            </a>


                                                                            <?php
                                                                        } elseif ($clinic['status'] == "Inactive") {
                                                                            ?>

                                                                            <a href="clinic_table.php?clinic_id=<?php echo $clinic['clinic_id'] ?>"
                                                                                data-bs-toggle="tooltip" title="Active Clinic"
                                                                                class="btn btn-link btn-success"
                                                                                onclick="return confirmactivation()"
                                                                                data-original-title="Inactive">
                                                                              <i class="fa-solid fa-user-check"></i>
                                                                            </a>

                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>

                                                                    <a href="clinic_detail.php?clinic_id=<?php echo $clinic['clinic_id']; ?>"
                                                                        data-bs-toggle="tooltip" title="View Details"
                                                                        class="btn btn-link btn-success"
                                                                        data-original-title="View Details">
                                                                        <i class="fa-solid fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "<tr><td colspan=7 class=text-center>No Clinic Found</td></tr>";

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
            return confirm('Do you want to Deactivate this Clinic?');
        }
        function confirmactivation() {
            return confirm('Do you want to activate this Clinic?');
        }
        function remove() {
            return confirm('Do you want to Remove this Clinic?');
        }
    </script>