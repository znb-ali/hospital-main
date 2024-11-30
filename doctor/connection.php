<?php
session_start();  // Ensure the session is started

// Check if the doctor is logged in
if (!isset($_SESSION["doctor"])) {
    header('Location: ../login.php'); // Redirect to login if not logged in
    exit();
}

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "hospital_management_system");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the doctor's email from the session
$doctor_email = $_SESSION['doctor'];

// Secure query with prepared statement
$query = "SELECT doctor_name, doctor_email, doctor_phone, doctor_days, timing, city, specialization_id, status FROM doctor_add WHERE doctor_email = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $doctor_email); 
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Default values in case the query returns no results
$doctor_name = "Unknown";
$doctor_email = "No email found";

if (mysqli_num_rows($result) > 0) {
    // Fetch the result as an associative array
    $doctor = mysqli_fetch_assoc($result);
    $doctor_name = $doctor['doctor_name'];
    $doctor_email = $doctor['doctor_email'];
    $doctor_phone = $doctor['doctor_phone'];
    $doctor_days = $doctor['doctor_days'];
    $timing = $doctor['timing'];
    $city = $doctor['city'];
    $specialization_id = $doctor['specialization_id'];
    $status = $doctor['status'];
}
?>

