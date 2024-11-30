<?php
require_once "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_query = "DELETE FROM doc_patient_appointments WHERE id = $id";
    if (mysqli_query($con, $delete_query)) {
        header("Location: appointments.php");
        exit;
    } else {
        echo "Error deleting appointment: " . mysqli_error($con);
    }
} else {
    echo "Invalid request!";
}
?>
