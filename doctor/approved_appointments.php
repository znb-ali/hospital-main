<?php
require_once "connection.php";
// Fetch doctor's details
$query_doctor = "SELECT * FROM doctor_add WHERE doctor_email = ?";
$stmt_doctor = $con->prepare($query_doctor);
$stmt_doctor->bind_param("s", $doctor_email);
$stmt_doctor->execute();
$result_doctor = $stmt_doctor->get_result();
$doctor = $result_doctor->fetch_assoc();

// Fetch approved appointments for this doctor
$query_appointments = "SELECT a.id, p.patient_name, a.appointment_date, a.appointment_time, a.status 
                       FROM doc_patient_appointments a 
                       JOIN patient_reg p ON a.patient_id = p.id
                       WHERE a.doctor_id = ? AND a.status = 'approved'
                       ORDER BY a.appointment_date ASC";
$stmt_appointments = $con->prepare($query_appointments);
$stmt_appointments->bind_param("i", $doctor['id']);
$stmt_appointments->execute();
$result_appointments = $stmt_appointments->get_result();

// Get current date for comparison
$current_date = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Portal - Approved Appointments</title>
    <link rel="stylesheet" href="css/layout.css">
    
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

    /* Card Styling */
    .card-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
    }

    .card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
        width: 300px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
    }

    .card h2 {
        font-size: 20px;
        color: #084d7b;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 14px;
        color: #555;
        margin-bottom: 15px;
    }

    .card .btn {
        display: inline-block;
        background-color: #084d7b;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        font-size: 14px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .card .btn:hover {
        background-color: #04304e;
    }

    .past-date {
        background-color: #FF9999 ; /* Background for testing */
    }

    </style>
    <?php require_once "mainlinks.php"; ?>
    <?php require_once "connection.php"; ?>
</head>
<body class="tt-magic-cursor">

<!-- Preloader Start -->
<div class="preloader">
    <div class="loading-container">
        <div class="loading"></div>
        <div id="loading-icon"><img src="images/new_care.png" alt=""></div>
    </div>
</div>
<!-- Preloader End -->

<!-- Magic Cursor Start -->
<div id="magic-cursor">
    <div id="ball"></div>
</div>
<!-- Magic Cursor End -->

<div class="dashboard_container">
    <!-- Include the header file -->
    <?php include('linkheader.php'); ?>

    <div class="dashboard_main">
        <!-- Sidebar -->
        <?php include('side.php'); ?>

        <!-- Main Content -->
        <div class="dashboard_content_main">
            <div class="main-content">
            <h1>Approved Appointments for <?php echo $doctor['doctor_name']; ?></h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>View Details</th>
                </tr>
            </thead>
            <tbody>
    <?php 
    if ($result_appointments->num_rows > 0) {
        while ($appointment = $result_appointments->fetch_assoc()) {
            // Check if the appointment date is in the past
            $is_past = (strtotime($appointment['appointment_date']) < strtotime($current_date));
            // Adding debugging for clarity
            echo "<!-- Debugging - Appointment Date: " . $appointment['appointment_date'] . " | Current Date: " . $current_date . " | Is Past: " . ($is_past ? 'Yes' : 'No') . " -->";
    ?>
            <tr class="<?= $is_past ? 'past-date' : ''; ?>">
                <td><?php echo $appointment['id']; ?></td>
                <td><?php echo $appointment['patient_name']; ?></td>
                <td><?php echo $appointment['appointment_date']; ?></td>
                <td><?php echo $appointment['appointment_time']; ?></td>
                <td><?php echo $appointment['status']; ?></td>
                <td>
                <td>
    <a href="view_patient.php?id=<?php echo $appointment['id']; ?>" class="btn btn-info">View</a>
</td>

                </td>
            </tr>
        <?php }
    } else {
        echo "<tr><td colspan='6' class='text-center'>No approved appointments found.</td></tr>";
    }
    ?>
</tbody>
        </table>
            </div>
        </div>
    </div>
</div>
    <?php require_once "jslinks.php"; ?>
</body>
</html>
