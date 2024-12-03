<?php

require_once "connection.php";

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $doctor_id = $_GET['id'];

    // Update the status of the doctor to 'approved' in the doctor_add table
    $update_query = "UPDATE doctor_add SET status = 'approved' WHERE id = ?";
    $update_stmt = mysqli_prepare($con, $update_query);
    mysqli_stmt_bind_param($update_stmt, 'i', $doctor_id);

    if (mysqli_stmt_execute($update_stmt)) {
        // Redirect back to the doctor management page after success
        header('Location: doctor_management.php?message=Doctor Approved');
        exit();
    } else {
        echo "Error updating status to 'approved': " . mysqli_error($con);
    }

    mysqli_stmt_close($update_stmt);
} else {
    echo "No doctor ID provided.";
}

mysqli_close($con);
?>
