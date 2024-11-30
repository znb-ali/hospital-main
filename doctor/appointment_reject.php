<?php
session_start();
require_once "connection.php";

// Check if doctor is logged in
if (!isset($_SESSION["doctor"])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

$appointment_id = $_GET['id'];

// Update the appointment status to rejected
$query = "UPDATE doc_patient_appointments SET status = 'rejected' WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $appointment_id);
$stmt->execute();

header("Location: doc_appointments.php"); // Redirect back to the appointment list
exit();
?>
