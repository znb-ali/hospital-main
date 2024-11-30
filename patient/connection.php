<?php
// Ensure that the user is logged in by checking the session variable
session_start();  // Only keep this in the main pages that need session data
if (!isset($_SESSION["patient"])) {
    header('Location: ../login.php'); // Redirect to login if not logged in
    exit();
}

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "hospital_management_system");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the patient's email from the session
$patient_email = $_SESSION['patient'];

// Secure query with prepared statement
$query = "SELECT patient_name, patient_email, patient_phone FROM patient_reg WHERE patient_email = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $patient_email); 
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if the result contains any rows
if (mysqli_num_rows($result) > 0) {
    // Fetch the result as an associative array
    $user = mysqli_fetch_assoc($result);
    $patient_name = $user['patient_name'];
    $patient_email = $user['patient_email'];
    $patient_phone = $user['patient_phone'];
} else {
    // If no result, provide default values to avoid warnings
    $patient_name = "Unknown";
    $patient_email = "No email found";
    $patient_phone = "No phone found";
}
?>
