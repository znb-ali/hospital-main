
<!-- Display Success/Error Messages -->
<?php if (isset($_SESSION['error'])): ?>
    <div class="alert error"><?= $_SESSION['error'] ?></div>
<?php unset($_SESSION['error']); endif; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert success"><?= $_SESSION['success'] ?></div>
<?php unset($_SESSION['success']); endif; ?>

<?php
// Include necessary files and database connection
require_once 'connection.php';  // Ensure this file contains the correct database connection setup

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
} else {
    // If session is not set, redirect or handle error
    header('Location: login.php'); // Or another appropriate page
    exit();
}

?>
<?php
// Fetch total appointments
$sqlTotalAppointments = "SELECT COUNT(*) AS total FROM doc_patient_appointments WHERE doctor_id = ?";
$stmt = $con->prepare($sqlTotalAppointments);
$stmt->bind_param("i", $doctor['id']);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $totalAppointments = $row['total'];
}

// Fetch accepted appointments
$sqlAcceptedAppointments = "SELECT COUNT(*) AS accepted FROM doc_patient_appointments 
    WHERE doctor_id = ? AND status = 'approved'";
$stmt = $con->prepare($sqlAcceptedAppointments);
$stmt->bind_param("i", $doctor['id']);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $acceptedAppointments = $row['accepted'];
}

// Fetch pending appointments
$sqlPendingAppointments = "SELECT COUNT(*) AS pending FROM doc_patient_appointments 
    WHERE doctor_id = ? AND status = 'pending'";
$stmt = $con->prepare($sqlPendingAppointments);
$stmt->bind_param("i", $doctor['id']);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $pendingAppointments = $row['pending'];
}
// Fetch rejected appointments
$sqlRejectedAppointments = "SELECT COUNT(*) AS rejected FROM doc_patient_appointments 
    WHERE doctor_id = ? AND status = 'rejected'";
$stmt = $con->prepare($sqlRejectedAppointments);
$stmt->bind_param("i", $doctor['id']);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $rejectedAppointments = $row['rejected'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
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
        background-color: #bcddf7;
        color: #333;
        border: #bcddf7;
    }

/* Responsiveness */
@media (max-width: 768px) {
    .card-container, .dashboard-container {
        flex-direction: column;
        align-items: center;
    }

    .card, .stat-card {
        max-width: 100%;
        width: auto;
    }
}

.stat-card:nth-child(1) {
    background-color: #d4edda; /* Light green for Accepted Appointments */
    color: #155724;
}

.stat-card:nth-child(2) {
    background-color: #fff3cd; /* Light yellow for Pending Appointments */
    color: #856404;
}
.stat-card:nth-child(3) {
    background-color: #f8d7da; /* Light red for Rejected Appointments */
    color: #721c24;
}


/* Statistics Cards */
.dashboard-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin-top: 40px;
}

.stat-card {
    background-color: #fff;
    border: 1px solid #ddd;
    text-align: center;
    padding: 20px;
    border-radius: 12px;
    flex: 1;
    min-width: 250px;
    max-width: 300px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.15);
}

.stat-card h4 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #084d7b;
    font-weight: 600;
}

.stat-card p {
    font-size: 18px;
    color: #3e3d3d;
    font-weight: 700;
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
            <h1>Welcome to Your Dashboard,<?= isset($doctor['doctor_name']) ? htmlspecialchars($doctor['doctor_name']) : 'Doctor' ?></h1>
                <p>Manage your appointments, patients, profile, and more from here.</p>
                <div class="card-container">
                    <div class="card">
                        <h2>Appointment Management</h2>
                        <p> <?= isset($doctor['doctor_name']) ? htmlspecialchars($doctor['doctor_name']) : 'Doctor' ?>, You have a total of <strong><?= $totalAppointments ?></strong> appointments.</p>
                        <a href="total_appointment.php" class="btn">View Appointments</a>
                    </div>
                    <div class="card">
                        <h2>Profile Settings</h2>
                        <p>Update your profile, contact info, and other details.</p>
                        <a href="profile.php" class="btn">Edit Profile</a>
                    </div>
                </div>
                <!-- Statistics -->
                <div class="dashboard-container">
    <div class="stat-card">
        <h4>Accepted Appointments</h4>
        <p><?= $acceptedAppointments ?></p>
    </div>
    <div class="stat-card">
        <h4>Pending Appointments</h4>
        <p><?= $pendingAppointments ?></p>
    </div>
    <div class="stat-card">
        <h4>Rejected Appointments</h4>
        <p><?= $rejectedAppointments ?></p>
    </div>
</div>


                
             </div>  
        </div>
    </div>
</div>
<?php require_once "jslinks.php"; ?>
</body>
</html>
