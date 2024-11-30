<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Request</title>
    <link rel="stylesheet" href="css/layout.css">
    
    <style>
/* Adjustments for Main Content in the New Layout */
.main-content {
    padding: 40px 20px;
    background-color: #f4f6f9;
    min-height: 100vh;
    box-sizing: border-box;
}

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
    margin-bottom: 25px;
}
    </style>
    <?php require_once "mainlinks.php"; ?>
    <?php require_once "connection.php"; ?>
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
            <h1>Manage Doctors</h1>

                <!-- Doctors Table -->
                <p>Pending or Rejected Doctors</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">City</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Days</th>
                            <th scope="col">Timing</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Approve</th>
                            <th scope="col">Reject</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Fetch doctors with pending or rejected status and join with city and specialization tables
                            $query = "SELECT d.*, c.city_name, s.sp_name AS specialization_name 
                                    FROM doctor_add d
                                    LEFT JOIN city c ON d.city = c.city_id
                                    LEFT JOIN specialization s ON d.specialization_id = s.sp_id
                                    WHERE d.status IN ('pending', 'rejected')";
                            $sel = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_assoc($sel)) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row["id"]; ?></th>
                                    <td><?php echo htmlspecialchars($row["doctor_name"]); ?></td>
                                    <td><img src="../<?php echo htmlspecialchars($row["file_name"]); ?>" alt="Doctor Picture" width="50"></td>
                                    <td><?php echo htmlspecialchars($row["doctor_email"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["doctor_phone"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["city_name"]); ?></td> <!-- City name -->
                                    <td><?php echo htmlspecialchars($row["specialization_name"]); ?></td> <!-- Specialization name -->
                                    <td><?php echo htmlspecialchars($row["doctor_days"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["timing"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["status"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["created_at"]); ?></td>
                                    <td>
                                        <?php if ($row["status"] == "pending") { ?>
                                            <a href="doctor_approve.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-success">Approve</a>
                                        <?php } else { ?>
                                            <span class="text-muted">No Action Available</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($row["status"] == "pending") { ?>
                                            <a href="doctor_reject.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-danger">Reject</a>
                                        <?php } else { ?>
                                            <span class="text-muted">No Action Available</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php 
                            }
                            ?>
                            </tbody>
                        </table>
        </div>
    </div>
</div>
    <?php require_once "jslinks.php"; ?>
</body>
</html>
