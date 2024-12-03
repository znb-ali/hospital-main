<?php

require_once "connection.php";

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $doctor_id = $_GET['id'];

    // Update the status of the doctor to "rejected"
    $query = "UPDATE doctor_add SET status = 'rejected' WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'i', $doctor_id);
    
    if (mysqli_stmt_execute($stmt)) {
        // Redirect back to the doctor management page after success
        header('Location: doctor_management.php?message=Doctor Rejected');
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "No doctor ID provided.";
}

mysqli_close($con);
?>
