<?php
include("connection.php");
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
    // echo "<script?alert('Login Error');</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- <title>Pets Protal -Dashboard</title> -->
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="/assets/images/kaiadmin/favicon.ico" type="image/x-icon" />

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



    <?php

    $user = $_SESSION['username'];
    $doctor_check = mysqli_query($conn, "SELECT * FROM doctor WHERE name = '$user';");
    $doctor_count = mysqli_num_rows($doctor_check);
    if ($doctor_count > 0) {
        header('Location: /index.php');
        exit;
    }

    $sql = "SELECT * FROM users WHERE username = '$user';";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if ($row['role_id'] == 2) {




    ?>

        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="/main-dashboard.php" class="logo">
                        <h1 class="text-white">Pets Portal</h1>
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item active">
                            <a class="nav-link" href="main-dashboard.php">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="pet_register.php">
                                <i class="fa-solid fa-dog"></i>
                                <p>Register Pet</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="search_clinic.php">
                                <i class="fa-solid fa-house-chimney-medical"></i>
                                <p>Pets Clinic</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_appointment.php">
                                <i class="fa-solid fa-user-doctor"></i>
                                <p>Your Appoinments</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">

                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="assets/images/<?php echo $row['profile'] ?>" alt="..."
                                            class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Welcome,</span>
                                        <span class="fw-bold"><?php echo $row['username'] ?></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="assets/images/<?php echo $row['profile'] ?>"
                                                        alt="image profile" class="avatar-img rounded" />
                                                </div>
                                                <div class="u-text">
                                                    <h4><?php echo $row['username'] ?></h4>
                                                    <p class="text-muted"><?php echo $row['email'] ?></p>
                                                    <a href="user_profile.php" class="btn btn-xs btn-secondary btn-sm">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="user_profile.php">My Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="common/logout.php">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>


        <?php
    } else if ($row['role_id'] == 1) {


        ?>

            <div class="sidebar" data-background-color="dark">
                <div class="sidebar-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="/main-dashboard.php" class="logo">
                            <h1 class="text-white">Pets Portal</h1>
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <ul class="nav nav-secondary">
                            <li class="nav-item">
                                <a href="/main-dashboard.php" class="nav-link" aria-expanded="false">
                                    <i class="fas fa-home"></i>
                                    <p>Dashboard</p>
                                    <!-- <span class="caret"></span> -->
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="/user_table.php" class="nav-link" aria-expanded="false">
                                    <i class="fa-solid fa-users"></i>
                                    <p>Users</p>
                                    <!-- <span class="caret"></span> -->
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a href="/pets_table.php" class="nav-link" aria-expanded="false">
                                    <i class="fa-solid fa-dog"></i>
                                    <p>Pets</p>
                                    <!-- <span class="caret"></span> -->
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/pets_and_petsowner.php" class="nav-link" aria-expanded="false">
                                    <i class="fa-solid fa-person"></i>
                                    <p>Pets and Pet's Owner</p>
                                    <!-- <span class="caret"></span> -->
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="/doctor_table.php" class="nav-link" aria-expanded="false">
                                    <i class="fa-solid fa-user-doctor"></i>
                                    <p>Doctors</p>
                                    <!-- <span class="caret"></span> -->
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/clinic_table.php" class="nav-link" aria-expanded="false">
                                    <i class="fa-solid fa-house-chimney-medical"></i>
                                    <p>Clinic</p>
                                    <!-- <span class="caret"></span> -->
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->

            <div class="main-panel">
                <div class="main-header">
                    <div class="main-header-logo">
                        <!-- Logo Header -->
                        <div class="logo-header" data-background-color="dark">
                            <a href="index.html" class="logo">
                                <img src="assets/images/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                    height="20" />
                            </a>
                            <div class="nav-toggle">
                                <button class="btn btn-toggle toggle-sidebar">
                                    <i class="gg-menu-right"></i>
                                </button>
                                <button class="btn btn-toggle sidenav-toggler">
                                    <i class="gg-menu-left"></i>
                                </button>
                            </div>
                            <button class="topbar-toggler more">
                                <i class="gg-more-vertical-alt"></i>
                            </button>
                        </div>
                        <!-- End Logo Header -->
                    </div>
                    <!-- Navbar Header -->
                    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                        <div class="container-fluid">
                            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                                <li class="nav-item topbar-user dropdown hidden-caret">
                                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                        aria-expanded="false">
                                        <div class="avatar-sm">
                                            <img src="assets/images/<?php echo $row['profile']; ?>" alt="..."
                                                class="avatar-img rounded-circle" />

                                        </div>
                                        <span class="profile-username">
                                            <span class="op-7">Welcome,</span>
                                            <span class="fw-bold"><?php echo $row['username'] ?></span>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                                        <div class="dropdown-user-scroll scrollbar-outer">
                                            <li>
                                                <div class="user-box">
                                                    <div class="avatar-lg">
                                                        <img src="assets/images/<?php echo $row['profile'] ?>"
                                                            alt="image profile" class="avatar-img rounded" />
                                                    </div>
                                                    <div class="u-text">
                                                        <h4><?php echo $row['username'] ?></h4>
                                                        <p class="text-muted"><?php echo $row['email'] ?></p>
                                                        <a href="admin_profile.php"
                                                            class="btn btn-xs btn-secondary btn-sm">View
                                                            Profile</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="admin_profile.php">My Profile</a>
                                                <!-- <a class="dropdown-item" href="#">My Balance</a> -->
                                                <!-- <a class="dropdown-item" href="#">Inbox</a> -->
                                                <!-- <div class="dropdown-divider"></div> -->
                                                <!-- <a class="dropdown-item" href="#">Account Setting</a> -->
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="common/logout.php">Logout</a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>

            <?php
        }
            ?>











            <!--   Core JS Files   -->
            <script src="/assets/js/dashboard_js/core/jquery-3.7.1.min.js"></script>
            <script src="/assets/js/dashboard_js/core/popper.min.js"></script>
            <script src="/assets/js/dashboard_js/core/bootstrap.min.js"></script>

            <!-- jQuery Scrollbar -->
            <script src="/assets/js/dashboard_js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

            <!-- Chart JS -->
            <script src="/assets/js/dashboard_js/plugin/chart.js/chart.min.js"></script>

            <!-- jQuery Sparkline -->
            <script src="/assets/js/dashboard_js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

            <!-- Chart Circle -->
            <script src="/assets/js/dashboard_js/plugin/chart-circle/circles.min.js"></script>

            <!-- Datatables -->
            <script src="/assets/js/dashboard_js/plugin/datatables/datatables.min.js"></script>

            <!-- Bootstrap Notify -->
            <script src="/assets/js/dashboard_js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

            <!-- jQuery Vector Maps -->
            <script src="/assets/js/dashboard_js/plugin/jsvectormap/jsvectormap.min.js"></script>
            <script src="/assets/js/dashboard_js/plugin/jsvectormap/world.js"></script>

            <!-- Sweet Alert -->
            <script src="/assets/js/dashboard_js/plugin/sweetalert/sweetalert.min.js"></script>

            <!-- Kaiadmin JS -->
            <script src="/assets/js/dashboard_js/kaiadmin.min.js"></script>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const navLinks = document.querySelectorAll('.nav-link');

                    // Get the active link from localStorage and set it
                    const activeLink = localStorage.getItem('activeLink');
                    if (activeLink) {
                        document.querySelector(`#${activeLink}`).classList.add('active');
                    }

                    // Loop through each nav-link and add click event
                    navLinks.forEach(link => {
                        link.addEventListener('click', function() {
                            // Remove 'active' class from all links
                            navLinks.forEach(nav => nav.classList.remove('active'));

                            // Add 'active' class to the clicked link
                            this.classList.add('active');

                            // Store the clicked link's id in localStorage
                            localStorage.setItem('activeLink', this.id);
                        });
                    });
                });
            </script>
            <script>
                $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
                    type: "line",
                    height: "70",
                    width: "100%",
                    lineWidth: "2",
                    lineColor: "#177dff",
                    fillColor: "rgba(23, 125, 255, 0.14)",
                });

                $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
                    type: "line",
                    height: "70",
                    width: "100%",
                    lineWidth: "2",
                    lineColor: "#f3545d",
                    fillColor: "rgba(243, 84, 93, .14)",
                });

                $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
                    type: "line",
                    height: "70",
                    width: "100%",
                    lineWidth: "2",
                    lineColor: "#ffa534",
                    fillColor: "rgba(255, 165, 52, .14)",
                });
            </script>

</body>

</html>