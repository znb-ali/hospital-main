<?php
// Include necessary files
require_once "connection.php"; // For database connection

// Fetch appointments from the database
$sql = "SELECT * FROM appointments ORDER BY created_at DESC";
$result = $con->query($sql);

// Close the connection after fetching the data
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Appointments</title>
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

        /* Title and Paragraph Styles */
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
            margin-bottom: 20px;
        }
    </style>
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
                <h1>Appointments</h1>

                <!-- Appointment Table -->
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Appointment Date</th>
                            <th>Message</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Check if there are any appointments
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["phone"] . "</td>";
                                echo "<td>" . $row["date"] . "</td>";  // Changed 'appointment_date' to 'date'
                                echo "<td>" . $row["message"] . "</td>";
                                echo "<td>" . $row["created_at"] . "</td>";

                                // Display action based on the contacted status
                                if ($row["contacted"] == 1) {
                                    echo "<td>Contacted</td>";
                                } else {
                                    echo "<td>
                                            <a href='view_appointment.php?id=" . $row["id"] . "' class='btn btn-info btn-sm'>View Details</a>
                                          </td>";
                                }

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No appointments found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once "jslinks.php"; ?>

</body>
</html>
