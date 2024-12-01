<?php
require_once "connection.php";

// Retrieve patient information based on session
$query = "SELECT * FROM patient_reg WHERE patient_email = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $_SESSION["patient"]);
$stmt->execute();
$patient_info = $stmt->get_result()->fetch_assoc();
$patient_id = $patient_info['id'];

// Fetch appointments for the logged-in patient, including doctor information and specialist
$query = "
    SELECT a.appointment_date, a.appointment_time, a.status, a.status_message, d.doctor_name, s.sp_name 
    FROM doc_patient_appointments a 
    JOIN doctor_add d ON a.doctor_id = d.id
    JOIN specialization s ON d.specialization_id = s.sp_id
    WHERE a.patient_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $patient_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Dashboard - My Appointments</title>
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
/* Adjustments for Main Content in the New Layout */
.main-content {
    padding: 40px 20px;
    background-color: #f4f6f9;
    min-height: 100vh;
    box-sizing: border-box;
    width: 1500px; /* Ensure container takes full width */
}

/* Table Container Styling */
.table-container {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    padding: 30px 20px; /* Increase padding for a more spacious look */
    margin-top: 20px;
    width: 100%; /* Ensure container takes full width */
    max-width: 1500px; /* Set a max-width to control container's maximum size */
    box-sizing: border-box; /* Ensure padding is included in the total width */
    margin-left: auto;
    margin-right: auto; /* Center the container */
}

/* Table Styling */
.table {
    width: 100%; /* Full width table */
    min-width: 1400px; /* Ensure table stretches to cover more area */
    margin-top: 20px; /* Add space above the table */
    border-collapse: collapse; /* Collapses borders for a cleaner look */
    table-layout: auto; /* Allow table to grow and shrink based on content */
}

/* Table header styling */
.table th, .table td {
    padding: 10px 15px; /* Padding for cells */
    text-align: left; /* Align text to the left */
    vertical-align: middle; /* Center vertically */
    border: 1px solid #ddd; /* Light grey border */
    white-space: nowrap; /* Prevent text from wrapping */
}

/* Last column (Status Message) should span the full container width */
.table td:last-child {
    width: auto; /* Let the last column take the remaining space */
    padding-right: 0; /* Remove right padding to align with container edge */
}

/* Table header background */
.table th {
    background-color: #084d7b; /* Dark blue background for headers */
    color: white; /* White text for header */
    font-weight: bold; /* Bold text */
}

/* Table rows background */
.table td {
    background-color: #fff; /* White background for data rows */
}

/* Hover effect for table rows */
.table tbody tr:hover {
    background-color: #f1f1f1; /* Light grey background on hover */
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
                    <h1>My Appointments</h1>
                    <div class="table-container">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Doctor's Name</th>
                                    <th>Specialist</th> <!-- New column for specialist -->
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                    <th>Status Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($appointment = $result->fetch_assoc()) {
                                        // Default style for the Status Message column
                                        $statusMessageStyle = 'background-color: #f0f0f0;'; // Default background color

                                        // Get the status and remove any extra spaces
                                        $status = ucfirst(trim($appointment['status'])); // Capitalize the first letter of status

                                        // Check appointment status and apply styles accordingly
                                        if ($status === 'Approved') {
                                            $statusMessageStyle = 'background-color: #d4edda; color: #155724;';
                                            $statusMessage = $appointment['status_message'] ?? 'Your appointment has been approved by the doctor.';
                                        } elseif ($status === 'Rejected') {
                                            $statusMessageStyle = 'background-color: #f8d7da; color: #721c24;';
                                            $statusMessage = $appointment['status_message'] ?? 'Your appointment has been rejected by the doctor.';
                                        } elseif ($status === 'Pending') {
                                            $statusMessageStyle = 'background-color: #fff3cd; color: #856404;';
                                            $statusMessage = $appointment['status_message'] ?? 'Your appointment is pending approval by the doctor.';
                                        }

                                        ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($appointment['doctor_name']); ?></td>
                                            <td><?php echo htmlspecialchars($appointment['sp_name']); ?></td> <!-- Display specialist -->
                                            <td><?php echo htmlspecialchars($appointment['appointment_date']); ?></td>
                                            <td><?php echo htmlspecialchars($appointment['appointment_time']); ?></td>
                                            <td style="<?php echo $statusMessageStyle; ?>">
                                                <?php echo htmlspecialchars($statusMessage); ?>
                                            </td>
                                        </tr>
                                    <?php }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>No appointments found.</td></tr>";
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