<?php
require_once "connection.php";


// Check and validate doctor ID
$doctor_id = $_GET['id'] ?? null;
if (empty($doctor_id)) {
    header("Location: patient_appointments.php?error=invalid_id");
    exit();
}

// Fetch patient information
$query = "SELECT * FROM patient_reg WHERE patient_email = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $_SESSION["patient"]);
$stmt->execute();
$patient_info = $stmt->get_result()->fetch_assoc();

// Fetch doctor information with specialization
$doctor_query = "
    SELECT doctor_add.*, specialization.sp_name 
    FROM doctor_add 
    JOIN specialization ON doctor_add.specialization_id = specialization.sp_id 
    WHERE doctor_add.id = ? AND doctor_add.status = 'approved'";
$stmt = $con->prepare($doctor_query);
$stmt->bind_param("i", $doctor_id);
$stmt->execute();
$doctor_info = $stmt->get_result()->fetch_assoc();

// Handle appointment form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["appointment_btn"])) {
    $appointment_date = $_POST["appointment_date"];
    $appointment_time = $_POST["appointment_time"];
    $patient_id = $patient_info["id"];
    $status = "Pending";

    $insert_query = "
        INSERT INTO doc_patient_appointments (patient_id, doctor_id, appointment_date, appointment_time, status) 
        VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($insert_query);
    $stmt->bind_param("iisss", $patient_id, $doctor_id, $appointment_date, $appointment_time, $status);
    if ($stmt->execute()) {
        $_SESSION['message'] = "Appointment successfully booked!";
        header("Location: " . $_SERVER['REQUEST_URI'] . "?status=success");
        exit();
    } else {
        $_SESSION['message'] = "Error booking appointment. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Portal - Book Appointents</title>
    <link rel="stylesheet" href="css/layout.css">
    <style>
.main-content {
    padding: 40px;
    background-color: #f4f6f9;
    min-height: 100vh;
    text-align: center;
}

.alert {
    margin: 20px 0;
}

.form-control {
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 8px 12px;
}

.btn {
    margin-top: 10px;
    padding: 10px 20px;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    border: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.doctor-profile img {
    max-width: 100%;
    border-radius: 8px;
    margin-bottom: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.doctor-profile h4 {
    margin-bottom: 10px;
    color: #084d7b;
    font-weight: bold;
}

.card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
    width: 80%;
    margin: 0 auto;
}

.card:hover {
    transform: scale(1.05);
}

.post-image {
    overflow: hidden;
    border-radius: 8px;
    background-color: #f4f6f9;
}

.post-image img {
    object-fit: contain; /* Ensures the image does not distort */
    border-radius: 8px;
}

.card-body {
    text-align: center;
}

.card-body h5 {
    font-size: 20px;
    color: #04304e;
    margin: 4px 0;
}

.card-body p {
    font-size: 14px;
    color: #848484;
    margin: 6px 0;
}

.btn_appointment {
    margin-top: 10px;
    padding: 8px 20px;
    background-color: #084d7b;
    border: #084d7b;
    color: #fff;
    text-transform: uppercase;
    border-radius: 15px;
    text-decoration: none;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.btn_appointment:hover {
    background-color: #bcddf7 ;
    color: #333;
    border: #bcddf7 ;
}

.doctor-profile {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.doctor-profile h3 {
    color: #084d7b;
    font-size: 28px;
    text-transform: uppercase;
    font-weight: bold;
}

.doctor-profile .card {
    max-width: 100%;
}

.doctor-profile .row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.col-lg-6 {
    max-width: 400px;
    margin-bottom: 20px;
}

    </style>
    <?php require_once "mainlinks.php"; ?>
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
        <!-- Header -->
        <?php include('linkheader.php'); ?>

        <div class="dashboard_main">
            <!-- Sidebar -->
            <?php include('side.php'); ?>

            <!-- Main Content -->
            <div class="dashboard_content_main">
                <div class="main-content">
                    <h1>Book Appointment</h1>

                    <!-- Display Messages -->
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-success"><?php echo htmlspecialchars($_SESSION['message']); ?></div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>

                    <div class="row">
                        <!-- Appointment Form -->
                        <div class="col-lg-6 col-md-6">
                            <h3>Appointment Form</h3>
                            <form method="post">
                                <input type="text" value="<?php echo htmlspecialchars($patient_info["patient_name"]); ?>" disabled class="form-control">
                                <input type="number" value="<?php echo htmlspecialchars($patient_info["patient_age"]); ?>" disabled class="form-control">
                                <input type="email" value="<?php echo htmlspecialchars($patient_info["patient_email"]); ?>" disabled class="form-control">
                                <input type="text" value="<?php echo htmlspecialchars($patient_info["patient_phone"] ?? 'N/A'); ?>" disabled class="form-control"> <!-- Fixed Field -->
                                <input type="text" value="<?php echo htmlspecialchars($doctor_info["doctor_name"]); ?>" disabled class="form-control">
                                <input type="text" value="<?php echo htmlspecialchars($doctor_info["sp_name"]); ?>" disabled class="form-control">
                                <input type="date" name="appointment_date" class="form-control" required>
                                <input type="time" name="appointment_time" class="form-control" required>
                                <button type="submit" name="appointment_btn" class="btn_appointment">Book Appointment</button>
                            </form>
                        </div>

                        <!-- Doctor Profile -->
                        <div class="col-lg-6 col-md-6">
                            <h3>Doctor Profile</h3>
                            <div class="card">
                                <div class="post-image">
                                    <?php if (!empty($doctor_info['file_name'])): ?>
                                        <img src="../<?php echo htmlspecialchars($doctor_info["file_name"]); ?>" alt="Doctor Picture">
                                    <?php else: ?>
                                        <img src="default-doctor.jpg" alt="Default Doctor">
                                    <?php endif; ?>
                                </div>
                                <div class="card-body">
                                    <h5>Name: <?php echo htmlspecialchars($doctor_info["doctor_name"] ?? "N/A"); ?></h5>
                                    <p>
                                        <strong>Email:</strong> <?php echo htmlspecialchars($doctor_info["doctor_email"] ?? "N/A"); ?><br>
                                        <strong>Phone:</strong> <?php echo htmlspecialchars($doctor_info["doctor_phone"] ?? "N/A"); ?><br>
                                        <strong>Specialization:</strong> <?php echo htmlspecialchars($doctor_info["sp_name"] ?? "N/A"); ?><br>
                                        <strong>Available Days:</strong> <?php echo htmlspecialchars($doctor_info["doctor_days"] ?? "N/A"); ?><br>
                                        <strong>Timing:</strong> <?php echo htmlspecialchars($doctor_info["timing"] ?? "N/A"); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "jslinks.php"; ?>
</body>
</html>
