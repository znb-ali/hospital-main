<?php
require_once "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $status = $_POST['status'];

    $insert_query = "INSERT INTO doc_patient_appointments (patient_id, doctor_id, appointment_date, appointment_time, status)
                     VALUES ('$patient_id', '$doctor_id', '$appointment_date', '$appointment_time', '$status')";

    if (mysqli_query($con, $insert_query)) {
        header("Location: appointments.php");
        exit;
    } else {
        echo "Error adding appointment: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
    <link rel="stylesheet" href="css/layout.css">
    <?php require_once "mainlinks.php"; ?>
</head>
<body>
    <div class="dashboard_container">
        <?php include('linkheader.php'); ?>
        <div class="dashboard_main">
            <?php include('side.php'); ?>
            <div class="dashboard_content_main">
                <div class="main-content">
                    <h1>Add Appointment</h1>
                    <form method="POST">
                        <label for="patient_id">Patient ID:</label>
                        <input type="number" name="patient_id" required><br>

                        <label for="doctor_id">Doctor ID:</label>
                        <input type="number" name="doctor_id" required><br>

                        <label for="appointment_date">Appointment Date:</label>
                        <input type="date" name="appointment_date" required><br>

                        <label for="appointment_time">Appointment Time:</label>
                        <input type="time" name="appointment_time" required><br>

                        <button type="submit" class="btn">Add Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "jslinks.php"; ?>
</body>
</html>
