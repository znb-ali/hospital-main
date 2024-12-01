<?php
require_once "connection.php";
// Fetch doctor's details
$query_doctor = "SELECT * FROM doctor_add WHERE doctor_email = ?";
$stmt_doctor = $con->prepare($query_doctor);
$stmt_doctor->bind_param("s", $doctor_email);
$stmt_doctor->execute();
$result_doctor = $stmt_doctor->get_result();
$doctor = $result_doctor->fetch_assoc();

// Fetch appointments for this doctor (only pending and rejected appointments)
$query_appointments = "SELECT a.id, p.patient_name, a.appointment_date, a.appointment_time, a.status 
                       FROM doc_patient_appointments a 
                       JOIN patient_reg p ON a.patient_id = p.id
                       WHERE a.doctor_id = ? AND a.status IN ('pending', 'rejected')
                       ORDER BY a.appointment_date ASC";

$stmt_appointments = $con->prepare($query_appointments);
$stmt_appointments->bind_param("i", $doctor['id']);
$stmt_appointments->execute();
$result_appointments = $stmt_appointments->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard - Doctor Appointments</title>
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
            <h1>Appointments for Dr. <?php echo $doctor['doctor_name']; ?></h1              >
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>View</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result_appointments->num_rows > 0) {
                    while ($appointment = $result_appointments->fetch_assoc()) { 
                        // Check if action is already taken
                        $status = $appointment['status'];
                ?>
                    <tr>
                        <td><?php echo $appointment['id']; ?></td>
                        <td><?php echo $appointment['patient_name']; ?></td>
                        <td><?php echo $appointment['appointment_date']; ?></td>
                        <td><?php echo $appointment['appointment_time']; ?></td>
                        <td><?php echo $status; ?></td>
                        <td>
                            <a href="view_patient.php?id=<?php echo $appointment['id']; ?>" class="btn btn-info">View</a>
                        </td>
                        <td>
                            <?php if ($status == 'pending') { ?>
                                <a href="appointment_approve.php?id=<?php echo $appointment['id']; ?>" class="btn btn-warning">Approve</a>
                                <a href="appointment_reject.php?id=<?php echo $appointment['id']; ?>" class="btn btn-danger">Reject</a>
                            <?php } else { ?>
                                <span class="text-muted">No Action Available</span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No pending or rejected appointments found.</td></tr>";
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

<body>
    <?php require_once "linkheader.php"; ?>
    <?php require_once "side.php"; ?>

    <div class="container mt-5">
        
    </div>

    <?php require_once "jslinks.php"; ?>
</body>
</html>
