<?php
// Include necessary files
require_once "connection.php"; // For database connection

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $appointment_id = $_GET['id'];

    // Fetch appointment details based on the ID
    $sql = "SELECT * FROM appointments WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $appointment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the appointment exists
    if ($result->num_rows > 0) {
        $appointment = $result->fetch_assoc();
    } else {
        echo "No appointment found.";
        exit();
    }

    // If you want to update the "contacted" status, uncomment the next lines:
    // $update_sql = "UPDATE appointments SET contacted = 1 WHERE id = ?";
    // $update_stmt = $con->prepare($update_sql);
    // $update_stmt->bind_param("i", $appointment_id);
    // $update_stmt->execute();

    // Close the database connection
    $stmt->close();
} else {
    echo "Invalid Appointment ID.";
    exit();
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointment Details</title>
    <link rel="stylesheet" href="css/layout.css">
    <?php require_once "mainlinks.php"; ?>
    <style>
        /* Main Content */
        .main-content {
            padding: 40px 20px;
            background-color: #f4f6f9;
            min-height: 100vh;
            box-sizing: border-box;
        }

        .appointment-details {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .appointment-details h2 {
            color: #084d7b;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .appointment-details p {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }

        .appointment-details .btn {
            background-color: #084d7b;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .appointment-details .btn:hover {
            background-color: #bcddf7;
            color: #333;
            border: #bcddf7 ;
        }
    </style>
</head>

<body class="tt-magic-cursor">

    <div class="dashboard_container">
        <!-- Include the header file -->
        <?php include('linkheader.php'); ?>

        <div class="dashboard_main">
            <!-- Sidebar -->
            <?php include('side.php'); ?>

            <!-- Main Content -->
            <div class="dashboard_content_main">
                <div class="main-content">
                    <h1>Appointment Details</h1>

                    <!-- Appointment Details -->
                    <div class="appointment-details">
                        <h2>Appointment Information</h2>
                        <p><strong>Name:</strong> <?php echo $appointment["name"]; ?></p>
                        <p><strong>Email:</strong> <?php echo $appointment["email"]; ?></p>
                        <p><strong>Phone:</strong> <?php echo $appointment["phone"]; ?></p>
                        <p><strong>Appointment Date:</strong> <?php echo $appointment["date"]; ?></p>
                        <p><strong>Message:</strong> <?php echo $appointment["message"]; ?></p>
                        <p><strong>Created At:</strong> <?php echo $appointment["created_at"]; ?></p>

                        <!-- Contact Button (This could be changed to 'Contacted' if already marked) -->
                        <a href="contact_appointment.php?id=<?php echo $appointment["id"]; ?>" class="btn">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once "jslinks.php"; ?>

</body>

</html>