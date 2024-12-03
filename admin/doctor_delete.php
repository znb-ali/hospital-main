<?php

require_once "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM doctor_add WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header('location:doctor.php');
        exit();
    } else {
        echo "Error deleting record: " . $con->error;
    }
} else {
    header('location:doctor.php');
    exit();
}
?>
