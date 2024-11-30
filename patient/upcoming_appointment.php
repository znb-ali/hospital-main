<?php
// Include the necessary files
require_once 'connection.php';

// Fetch success and error messages (if any)
$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';

// Clear the session messages after displaying them
unset($_SESSION['success']);
unset($_SESSION['error']);

// Query to fetch upcoming appointments
$query = "SELECT * FROM `doc_patient_appointments` 
          WHERE `patient_id` = ? 
          AND `status` = 'approved' 
          AND `appointment_date` >= CURDATE() 
          ORDER BY `appointment_date` ASC";

// Prepare and execute the query
$stmt = $con->prepare($query);
$stmt->bind_param("i", $patient_id);
$stmt->execute();
$result = $stmt->get_result();
$appointments = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard - Upcoming Appointments</title>
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
        background-color: #113f56;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        font-size: 14px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .card .btn:hover {
        background-color:#bcddf7;
    }
    </style>

    <?php require_once "mainlinks.php"; ?>
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
                <h1>Upcoming Appointments</h1>
                <p>View your upcoming approved appointments below:</p>

                <!-- Display appointments -->
                <?php if (count($appointments) > 0): ?>
                    <div class="card-container">
                        <?php foreach ($appointments as $appointment): ?>
                            <div class="card">
                                <h2>Appointment with Doctor ID: <?= htmlspecialchars($appointment['doctor_id']); ?></h2>
                                <p>Date: <?= htmlspecialchars($appointment['appointment_date']); ?></p>
                                <p>Time: <?= htmlspecialchars($appointment['appointment_time']); ?></p>
                                <p>Status: <?= htmlspecialchars($appointment['status']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>No upcoming appointments found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once "jslinks.php"; ?>
</body>
</html>
