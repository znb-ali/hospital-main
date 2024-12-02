<?php
require_once "connection.php";

// Fetch current doctor details from the database using doctor email from session
$doctor_email = $_SESSION['doctor'] ?? null; // Make sure to check if 'doctor' session exists

// Ensure that session is active and doctor email is set
if ($doctor_email) {
    $sql = "SELECT * FROM doctor_add WHERE doctor_email = ?";  // Query for doctor details using email
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $doctor_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $doctor = $result->fetch_assoc();
    $doctor_id = $doctor['id'];

} else {
    // If session is not set, redirect or handle error
    header('Location: login.php'); // Or another appropriate page
    exit();
}

// Get appointment id from query parameter
$appointment_id = $_GET['id'] ?? null;

if (!$appointment_id) {
    // Redirect if no appointment id is passed
    header('Location: appointments.php');
    exit();
}

// Fetch appointment details
$query_appointment = "SELECT a.*, p.patient_name, p.patient_email, p.patient_phone 
                      FROM doc_patient_appointments a
                      JOIN patient_reg p ON a.patient_id = p.id
                      WHERE a.id = ?";
$stmt_appointment = $con->prepare($query_appointment);
$stmt_appointment->bind_param("i", $appointment_id);
$stmt_appointment->execute();
$result_appointment = $stmt_appointment->get_result();

if ($result_appointment->num_rows > 0) {
    $appointment_details = $result_appointment->fetch_assoc();
} else {
    // Redirect if no appointment found
    header('Location: appointments.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Portal - View Patient Details</title>
    <link rel="stylesheet" href="css/layout.css">

    <?php require_once "mainlinks.php"; ?>
    <style>
        /* Adjustments for Main Content in the New Layout */
    .main-content {
        padding: 40px 20px;
        background-color: #f4f6f9;
        min-height: 100vh;
        box-sizing: border-box;
    }

    .main-content h1 {
        font-size: 28px;
        color: #084d7b;
        margin-bottom: 15px;
        text-align: center;
    }

    .main-content p {
        font-size: 16px;
        color: #333;
        text-align: center;
        margin-bottom: 25px;
    }
    </style>
</head>
<body >

    
<div class="dashboard_container">
    <!-- Include the header file -->
    <?php include('linkheader.php'); ?>

    <div class="dashboard_main">
        <!-- Sidebar -->
        <?php include('side.php'); ?>

        <!-- Main Content -->
        <div class="dashboard_content_main">
            <div class="main-content">
                <h1>Welcome to Your Dashboard, Dr. <?= isset($doctor['doctor_name']) ? htmlspecialchars($doctor['doctor_name']) : 'Doctor' ?></h1>
                <table class="table table-bordered">
            <tr>
                <th>Patient Name</th>
                <td><?php echo $appointment_details['patient_name']; ?></td>
            </tr>
            <tr>
                <th>Patient Email</th>
                <td><?php echo $appointment_details['patient_email']; ?></td>
            </tr>
            <tr>
                <th>Patient Phone</th>
                <td><?php echo $appointment_details['patient_phone']; ?></td>
            </tr>
            <tr>
                <th>Appointment Date</th>
                <td><?php echo $appointment_details['appointment_date']; ?></td>
            </tr>
            <tr>
                <th>Appointment Time</th>
                <td><?php echo $appointment_details['appointment_time']; ?></td>
            </tr>
        </table>
            </div>
        </div>  
    </div>
 </div>
</div>
</body>
</html>
