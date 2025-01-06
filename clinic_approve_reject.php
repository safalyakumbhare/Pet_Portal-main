<?php
include("common/connection.php");

if (isset($_GET['approve_id'])) {
    // $approve_status = "1";
    $clinic_id = $_GET['approve_id'];
    $update_query = "UPDATE clinic SET approval = 'Approved', status = 'Active' WHERE clinic_id=$clinic_id;";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "<script>alert('clinic Approved');</script>";
        echo "<script>window.location.href = 'clinic_table.php'</script>";
    } else {
        echo "<script>alert('Failed to Approve clinic');</script>";
        echo "<script>window.location.href = 'clinic_table.php'</script>";
    }
}


if (isset($_GET['reject_id'])) {
    // $approve_status = "1";
    $clinic_id = $_GET['reject_id'];
    $update_query = "UPDATE clinic SET approval = 'Rejected' WHERE clinic_id=$clinic_id;";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "<script>alert('clinic Approval Rejected');</script>";
        echo "<script>window.location.href = 'clinic_table.php'</script>";
    } else {
        echo "<script>alert('Failed to Reject clinic');</script>";
        echo "<script>window.location.href = 'clinic_table.php'</script>";
    }
}

?>