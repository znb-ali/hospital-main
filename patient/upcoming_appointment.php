<?php
require_once "connection.php";

// Ensure the patient is logged in and retrieve their information
$query = "SELECT * FROM patient_reg WHERE patient_email = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $_SESSION["patient"]);
$stmt->execute();
$patient_info = $stmt->get_result()->fetch_assoc();
$patient_id = $patient_info['id'];

// Fetch upcoming and approved appointments
$query = "
    SELECT a.appointment_date, a.appointment_time, a.status, a.status_message, d.doctor_name, s.sp_name 
    FROM doc_patient_appointments a 
    JOIN doctor_add d ON a.doctor_id = d.id
    JOIN specialization s ON d.specialization_id = s.sp_id
    WHERE a.patient_id = ? AND a.status = 'Approved' AND a.appointment_date >= CURDATE()
    ORDER BY a.appointment_date, a.appointment_time";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $patient_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Portal - Upcoming Appointments</title>
    <link rel="stylesheet" href="css/layout.css">
    <?php require_once "mainlinks.php"; ?>
    <style>
        .main-content h1 {
            font-size: 50px;
            font-weight: bold;
            color: #084d7b;
            margin-bottom: 15px;
            text-align: center;
        }

        .main-content {
            padding: 40px 20px;
            background-color: #f4f6f9;
            min-height: 100vh;
        }

        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px 20px;
            margin-top: 20px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 10px 15px;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #084d7b;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body class="tt-magic-cursor">

<!-- Include header and sidebar -->
<div class="dashboard_container">
    <?php include('linkheader.php'); ?>
    <div class="dashboard_main">
        <?php include('side.php'); ?>

        <!-- Main Content -->
        <div class="dashboard_content_main">
            <div class="main-content">
                <h1>Upcoming Appointments</h1>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Doctor's Name</th>
                                <th>Specialist</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Status Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($appointment = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($appointment['doctor_name']); ?></td>
                                        <td><?php echo htmlspecialchars($appointment['sp_name']); ?></td>
                                        <td><?php echo htmlspecialchars($appointment['appointment_date']); ?></td>
                                        <td><?php echo htmlspecialchars($appointment['appointment_time']); ?></td>
                                        <td><?php echo htmlspecialchars($appointment['status_message'] ?? 'Your appointment is confirmed.'); ?></td>
                                    </tr>
                                <?php }
                            } else {
                                echo "<tr><td colspan='5' class='text-center'>No upcoming appointments found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "jslinks.php"; ?>
</body>
</html>
