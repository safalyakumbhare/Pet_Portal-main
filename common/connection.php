<?php

    $conn = mysqli_connect("localhost","root","","pets_testing");
    

    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }
    else{
        // echo "Connected successfully";
    
    }
?>