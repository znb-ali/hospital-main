<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "hospital_management_system");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ensure that the user is logged in by checking the session variable
session_start();  // Only keep this in the main pages that need session data
if (!isset($_SESSION["admin"])) {
    header('Location: ../login.php'); // Redirect to login if not logged in
    exit();
}
// Get the patient email from the session
$admin_email = $_SESSION["admin"];  // Assuming the patient email is stored in session

// Secure the query to prevent SQL injection by using prepared statements
$query = "SELECT name, email FROM reg WHERE email = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $admin_email); // Bind email as string

// Execute the query
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Check if the result contains any rows
if (mysqli_num_rows($result) > 0) {
    // Fetch the result as an associative array
    $user = mysqli_fetch_assoc($result);
    $admin_name = $user['name'];
    $admin_email = $user['email'];
} else {
    // If no result, provide default values to avoid warnings
    $admin_name = "Unknown";
    $admin_email = "No email found";
}
?>
