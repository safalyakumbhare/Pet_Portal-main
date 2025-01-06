<?php
include("common/connection.php");

if (isset($_GET['approve_id'])) {
    // $approve_status = "1";
    $doctor_id = $_GET['approve_id'];
    $update_query = "UPDATE doctor SET approval = 'Approved', status = 'Active' WHERE doctor_id=$doctor_id;";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "<script>alert('Doctor Approved');</script>";
        echo "<script>window.location.href = 'doctor_table.php'</script>";
    } else {
        echo "<script>alert('Failed to Approve Doctor');</script>";
        echo "<script>window.location.href = 'doctor_table.php'</script>";
    }
}


if (isset($_GET['reject_id'])) {
    // $approve_status = "1";
    $doctor_id = $_GET['reject_id'];
    $update_query = "UPDATE doctor SET approval = 'Rejected' WHERE doctor_id=$doctor_id;";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "<script>alert('Doctor Approval Rejected');</script>";
        echo "<script>window.location.href = 'doctor_table.php'</script>";
    } else {
        echo "<script>alert('Failed to Reject Doctor');</script>";
        echo "<script>window.location.href = 'doctor_table.php'</script>";
    }
}

?>