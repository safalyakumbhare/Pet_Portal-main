<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Pet's Owners</title>
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


            if (isset($_GET['dlt_id'])) {
                $user_id = $_GET['dlt_id'];
                $sql = mysqli_query($conn, "DELETE FROM users WHERE user_id = '$user_id'");
                $dlt_pet = mysqli_query($conn, "DELETE FROM pets WHERE user_id = '$user_id'");

                if ($sql && $dlt_pet) {
                    echo "<script>alert('User Deleted');</script>";
                    echo "<script>window.location.href = 'user_table.php'</script>";
                }

            }

            if (isset($_GET['user_id'])) {
                $rid = intval($_GET['user_id']);

                $check = "SELECT * FROM users WHERE user_id = $rid;";

                $result = mysqli_query($conn, $check);
                $check_row = mysqli_fetch_array($result);

                $status = $check_row['status'];

                if ($status == 'Inactive') {


                    $sql = mysqli_query($conn, "UPDATE users SET status = 'Active' WHERE user_id = '$rid';");
                    $pet = mysqli_query($conn, "UPDATE pets SET status = 'Active' WHERE user_id = '$rid';");
                    if ($sql && $pet) {
                        echo "<script>alert('User Activated');</script>";
                        echo "<script>window.location.href = 'user_table.php'</script>";
                    } else {
                        echo "<script>alert('Failed to Activate user');</script>";
                        echo "<script>window.location.href = 'user_table.php'</script>";
                    }

                }
                if ($status == 'Active') {
                    $sql = mysqli_query($conn, "UPDATE users SET status = 'Inactive' WHERE user_id = '$rid'");
                    $pet = mysqli_query($conn, "UPDATE pets SET status = 'Inactive' WHERE user_id = '$rid'");
                    if ($sql && $pet) {
                        echo "<script>alert('User Deactivated');</script>";
                        echo "<script>window.location.href = 'user_table.php'</script>";
                    } else {
                        echo "<script>alert('Failed to deactivate user');</script>";
                        echo "<script>window.location.href = 'user_table.php'</script>";
                    }
                }
            }




            ?>


            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Pet Owners</h3>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-body">


                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Profile Photo</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    <th style="width: 10%; text-align:center;">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php

                                                $user_table = "SELECT * FROM users WHERE role_id = 2";

                                                $user_result = mysqli_query($conn, $user_table);

                                                while ($user = mysqli_fetch_array($user_result)) {


                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xxl">
                                                                <img src="assets/images/<?php echo $user['profile']; ?>"
                                                                    class="avatar-img rounded-circle" alt="no image found">
                                                            </div>
                                                        </td>
                                                        <td><?php echo $user['username'] ?></td>
                                                        <td><?php echo $user['email'] ?></td>
                                                        <td><?php echo $user['address'] ?></td>
                                                        <td><?php
                                                        if ($user['status'] == "Active") {
                                                            echo "<span class='text-success'>Active</span>
                                                     </td>";
                                                        } else {
                                                            echo "<span class='text-danger'>Inactive</span>
                                                     </td>";
                                                        }

                                                        ?>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a href="user_table.php?dlt_id=<?php echo $user['user_id'] ?>"
                                                                    data-bs-toggle="tooltip" title="Remove"
                                                                    class="btn btn-link btn-primary "
                                                                    data-original-title="Remove" onclick="return remove()">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </a>

                                                                <?php
                                                                if ($user['status'] == "Active") {
                                                                    ?>


                                                                    <a href="user_table.php?user_id=<?php echo $user['user_id'] ?>"
                                                                        data-bs-toggle="tooltip" title="Inactive User"
                                                                        class="btn btn-link btn-danger"
                                                                        onclick="return confirmDeactivation()"
                                                                        data-original-title="Inactive">
                                                                        <i class="fa-solid fa-user-xmark"></i>
                                                                    </a>


                                                                    <?php
                                                                } elseif ($user['status'] == "Inactive") {
                                                                    ?>

                                                                    <a href="user_table.php?user_id=<?php echo $user['user_id'] ?>"
                                                                        data-bs-toggle="tooltip" title="Active User"
                                                                        class="btn btn-link btn-success"
                                                                        onclick="return confirmactivation()"
                                                                        data-original-title="Inactive">
                                                                        <i class="fa-solid fa-user-check"></i>
                                                                    </a>

                                                                    <?php
                                                                }
                                                                ?>

                                                                <a href="user_view.php?user_id=<?php echo $user['user_id']; ?>"
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
            return confirm('Do you want to Deactivate this user?');
        }
        function confirmactivation() {
            return confirm('Do you want to activate this user?');
        }
        function remove() {
            return confirm('Do you want to Remove this user?');
        }
    </script>