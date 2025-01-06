<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pets Portal - Pets</title>
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
                $pet_id = $_GET['dlt_id'];
                $pet = mysqli_query($conn, "DELETE FROM pets WHERE pet_id = $pet_id");
                if ($pet) {
                    echo "<script> alert('Deleted Successfully');
                    window.location.href='pets_table.php';</script>";
                }
            }
            ?>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Pets</h3>


                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Pets</h4>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-resposive">

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Breed</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                                <th style="width: 10%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $sql = "SELECT * FROM pets;";

                                            $result = mysqli_query($conn, $sql);

                                            while ($pet_row = mysqli_fetch_array($result)) {

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
                                                        <?php
                                                        if ($pet_row['status'] == "Active") {
                                                            echo "<span class='text-success'>Active</span>
                                                         </td>";
                                                        } else {
                                                            echo "<span class='text-danger'>Inactive</span>
                                                         </td>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">

                                                            <a href="pets_table.php?dlt_id=<?php echo $pet_row['pet_id'] ?>"
                                                                data-bs-toggle="tooltip" title="Remove"
                                                                class="btn btn-link btn-danger" onclick="return remove()"
                                                                data-original-title="Remove">
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
                                            ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php

        }
        ?>
        <?php
        include("common/footer.php");

        ?>
    </div>

    <script>
        function remove() {
            return confirm('Do you want to Remove this pet?');
        }
    </script>