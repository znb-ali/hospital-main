<?php
// Include database connection
require_once 'connection.php'; // Make sure this file contains the correct DB connection

$doctor_email = $_SESSION['doctor'];

// Fetch doctor details from the database
$sql = "SELECT * FROM doctor_add WHERE doctor_email = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $doctor_email);
$stmt->execute();
$result = $stmt->get_result();
$doctor = $result->fetch_assoc();

// If no doctor is found, redirect to an error page
if (!$doctor) {
    header("Location: ../login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Portal - Doctor Profile</title>
    <link rel="stylesheet" href="css/layout.css">
    <?php include('mainlinks.php'); ?>
    <style>
        /* Main Content */
.main-content {
    padding: 40px 20px;
    background-color: #f4f6f9;
    min-height: 100vh;
    box-sizing: border-box;
}

.main-content h1 {
    font-size: 32px;
    color: #04304e;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bold;
    text-transform: uppercase;
}

.main-content p {
    font-size: 16px;
    color: #555;
    text-align: left;
    margin-bottom: 25px;
}

/* Profile Header */
.profile-header {
    text-align: center;
    margin-bottom: 30px;
}

.profile-header h1 {
    font-size: 32px;
    color: #04304e;
    margin-bottom: 10px;
}

.profile-header p {
    font-size: 18px;
    color: #777;
}

/* Profile Section Layout */
.profile-container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
    padding: 20px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
}

/* Profile Image */
.profile-image {
    width: 300px;
    height: 300px;
    object-fit: contain;
    background-color: #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    border: 4px solid #04304e;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.profile-image:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
}

/* Profile Details */
.profile-details {
    flex: 1;
    max-width: 500px;
    background: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    line-height: 1.8;
}

.profile-details p {
    font-size: 16px;
    color: #333;
    margin-bottom: 10px;
}

.profile-details strong {
    color: #04304e;
    font-weight: bold;
}

/* Edit Profile Button */
.btn-edit {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 30px;
    background-color: #084d7b;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    text-align: center;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-edit:hover {
    background-color: #bcddf7;
    transform: translateY(-2px);
    color: black;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .profile-container {
        flex-direction: column;
        align-items: center;
        padding: 15px;
    }

    .profile-image {
        width: 200px;
        height: 200px;
        margin-bottom: 20px;
    }

    .profile-details {
        width: 100%;
        padding: 15px;
    }

    .main-content h1 {
        font-size: 28px;
    }

    .profile-details p {
        font-size: 14px;
    }

    .btn-edit {
        width: 100%;
        padding: 12px;
    }
}

    </style>
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

    <!-- Include Header -->
    <?php include('linkheader.php'); ?>

    <div class="dashboard_container">
        <div class="dashboard_main">
            <!-- Sidebar -->
            <?php include('side.php'); ?>

            <!-- Main Content -->
            <div class="dashboard_content_main">
                <div class="main-content">
                    <h1>Your Profile</h1>
                    <div class="profile-container">
    <!-- Profile Image -->
    <img src="../<?= htmlspecialchars($doctor['file_name']); ?>" alt="Doctor Profile Image" class="profile-image">

    <!-- Profile Details -->
    <div class="profile-details">
        <p><strong>Name:</strong> <?= htmlspecialchars($doctor['doctor_name']); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($doctor['doctor_email']); ?></p>
        <p><strong>Phone:</strong> <?= htmlspecialchars($doctor['doctor_phone']); ?></p>
        <p><strong>Specialization:</strong> <?= htmlspecialchars($doctor['specialization_id'] ?? 'N/A'); ?></p>
        <p><strong>Availability:</strong> <?= htmlspecialchars($doctor['doctor_days']); ?></p>
        <p><strong>Timing:</strong> <?= htmlspecialchars($doctor['timing']); ?></p>
        <p><strong>Status:</strong> <?= htmlspecialchars($doctor['status']); ?></p>
        <p><strong>City:</strong> <?= htmlspecialchars($doctor['city']); ?></p>
    </div>
</div>
        
                    <a href="edit_profile.php" class="btn-edit">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include JS Links -->
    <?php include('jslinks.php'); ?>
</body>
</html>
