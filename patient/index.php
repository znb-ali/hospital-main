<?php
// Include the necessary files
require_once 'connection.php';


// Fetch success and error messages
$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';

// Clear the session messages after displaying them
unset($_SESSION['success']);
unset($_SESSION['error']);
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Patient Dashboard</title>
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
                    <h1>Welcome to the Patient Dashboard</h1>
                    <p>Manage hospital data, doctors, patients, and more from here.</p>
                    <div class="card-container">
                        <div class="card">
                            <h2>Upcoming Appointments</h2>
                            <p>View and manage your scheduled appointments.</p>
                            <a href="appointments.php" class="btn">View Details</a>
                        </div>
                        <div class="card">
                            <h2>Medical Records</h2>
                            <p>Access your medical history and documents.</p>
                            <a href="patient_appointments.php" class="btn">View Records</a>
                        </div>
                        <div class="card">
                            <h2>Account Settings</h2>
                            <p>Update your profile and account information.</p>
                            <a href="profile.php" class="btn">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php require_once "jslinks.php"; ?>
    </body>
    </html>
