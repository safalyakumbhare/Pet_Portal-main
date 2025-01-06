<?php
include("common/connection.php");

if (isset($_GET['approve_id'])) {
    // $approve_status = "1";
    $apt_id = $_GET['approve_id'];
    $update_query = "UPDATE appointment SET approval = 'Approved', status = 'active',visit = 'Booked' WHERE appointment_id=$apt_id;";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "<script>alert('appointment Approved');</script>";
        echo "<script>window.location.href = 'doctor_appointments.php'</script>";
    } else {
        echo "<script>alert('Failed to Approve appointment');</script>";
        echo "<script>window.location.href = 'doctor_appointments.php'</script>";
    }
}


if (isset($_GET['reject_id'])) {
    // $approve_status = "1";
    $apt_id = $_GET['reject_id'];
    $update_query = "UPDATE appointment SET approval = 'Rejected' , visit = 'Cancel' WHERE appointment_id=$apt_id;";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "<script>alert('appointment Approval Rejected');</script>";
        echo "<script>window.location.href = 'doctor_appointments.php'</script>";
    } else {
        echo "<script>alert('Failed to Reject appointment');</script>";
        echo "<script>window.location.href = 'doctor_appointments.php'</script>";
    }
}

?>