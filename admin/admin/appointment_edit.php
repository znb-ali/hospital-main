<?php
require_once "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM doc_patient_appointments WHERE id = $id";
    $result = mysqli_query($con, $query);
    $appointment = mysqli_fetch_assoc($result);

    if (!$appointment) {
        echo "Appointment not found!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $status = $_POST['status'];

    $update_query = "UPDATE doc_patient_appointments 
                     SET appointment_date = '$appointment_date', appointment_time = '$appointment_time', status = '$status' 
                     WHERE id = $id";

    if (mysqli_query($con, $update_query)) {
        header("Location: appointments.php");
        exit;
    } else {
        echo "Error updating appointment: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
</head>
<body>
<form method="POST">
    <label for="appointment_date">Appointment Date:</label>
    <input type="date" name="appointment_date" value="<?= $appointment['appointment_date'] ?>" required><br>
    <label for="appointment_time">Appointment Time:</label>
    <input type="time" name="appointment_time" value="<?= $appointment['appointment_time'] ?>" required><br>
    <label for="status">Status:</label>
    <select name="status" required>
        <option value="pending" <?= $appointment['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="approved" <?= $appointment['status'] === 'approved' ? 'selected' : '' ?>>Approved</option>
        <option value="rejected" <?= $appointment['status'] === 'rejected' ? 'selected' : '' ?>>Rejected</option>
    </select><br>
    <button type="submit">Update Appointment</button>
</form>
</body>
</html>
