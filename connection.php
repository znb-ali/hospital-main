<?php
$con = mysqli_connect("localhost", "root", "", "hospital_management_system");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
