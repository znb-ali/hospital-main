<?php
// Include necessary files
require_once "connection.php"; // For database connection

// Check if the ID is passed
if (isset($_GET['id'])) {
    $appointment_id = $_GET['id'];

    // Update the 'contacted' status to 1
    $sql = "UPDATE appointments SET contacted = 1 WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $appointment_id);

    if ($stmt->execute()) {
        // Redirect back to the appointments page after updating
        header("Location: appointment.php");
    } else {
        echo "Error updating appointment status.";
    }
} else {
    echo "No appointment ID provided.";
}

// Close the connection
$con->close();
?>
<?php
// Include necessary files
require_once "connection.php"; // For database connection

// Fetch appointments from the database
$sql = "SELECT * FROM appointments ORDER BY created_at DESC";
$result = $con->query($sql);

// Close the connection after fetching the data
$con->close();
?>
