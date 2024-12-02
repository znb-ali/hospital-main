<?php
require_once "connection.php";

// Fetch doctor's details using email from session
$doctor_email = $_SESSION['doctor'] ?? null; // Make sure to check if 'doctor' session exists

// Ensure session is active and doctor email is set
if ($doctor_email) {
    $sql = "SELECT * FROM doctor_add WHERE doctor_email = ?"; // Query for doctor details using email
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

// Fetch appointments for the doctor, join with patient_reg to get patient name
$sqlAppointments = "SELECT a.id, p.patient_name, a.appointment_date, a.appointment_time, a.status, a.status_message
                    FROM doc_patient_appointments a
                    JOIN patient_reg p ON a.patient_id = p.id
                    WHERE a.doctor_id = ?
                    ORDER BY a.appointment_date ASC";
$stmt = $con->prepare($sqlAppointments);
$stmt->bind_param("i", $doctor_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Portal - Appointments</title>
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

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #084d7b;
        color: #fff;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .past-date {
        color: red; /* Highlight passed appointment dates in red */
    }
    .no-data {
        text-align: center;
        margin-top: 20px;
        font-size: 18px;
        color: #333;
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
            <h1>Appointments for <?php echo htmlspecialchars($doctor['doctor_name']); ?></h1>

            <?php if ($result->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Appointment ID</th>
                            <th>Patient Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): 
                            $appointment_date = $row['appointment_date'];
                            $current_date = date('Y-m-d'); // Get current date
                            $is_past = (strtotime($appointment_date) < strtotime($current_date)); // Check if the date has passed
                        ?>
                            <tr class="<?= $is_past ? 'past-date' : ''; ?>">
                                <td><?= htmlspecialchars($row['id']) ?></td>
                                <td><?= htmlspecialchars($row['patient_name']) ?></td>
                                <td><?= htmlspecialchars($row['appointment_date']) ?></td>
                                <td><?= htmlspecialchars($row['appointment_time']) ?></td>
                                <td><?= htmlspecialchars($row['status']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="no-data">No appointments found for you.</div>
            <?php endif; ?>

            </div>  
        </div>
    </div>
</div>
<?php require_once "jslinks.php"; ?>
</body>
</html>
