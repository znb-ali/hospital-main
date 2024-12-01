<?php
require_once "connection.php"; // Include the database connection

if (isset($_POST["btn_patient"])) {
    // Retrieve and sanitize input
    $patient_name = $_POST["patient_name"];
    $patient_age = $_POST["patient_age"];
    $patient_email = $_POST["patient_email"];
    $patient_phone = $_POST["patient_phone"];
    $patient_password = password_hash($_POST["patient_password"], PASSWORD_DEFAULT);

    // Insert data into the database with a prepared statement
    $query = "INSERT INTO patient_reg (patient_name, patient_age, patient_email, patient_phone, patient_password) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("sisss", $patient_name, $patient_age, $patient_email, $patient_phone, $patient_password);

    if ($stmt->execute()) {
        // Redirect after successful insertion to prevent resubmission of the form
        header("Location: admin_patient_add.php");
        exit(); // Always call exit() after header redirection
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
    $con->close();
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Portal - Admin Add Patient</title>
        <link rel="stylesheet" href="css/layout.css">
        
        <style>
   /* Main content styling */
.main-content {
    padding: 40px 20px;
    background-color: #f4f6f9;
    min-height: 100vh;
    box-sizing: border-box;
    text-align: center;
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

/* Form Styling */
form {
    background-color: #fff;
    border-radius: 8px;
    padding: 30px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 0 auto;
}

/* Input field styling */
.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

/* Focused input field */
.form-control:focus {
    border-color: #084d7b;
    outline: none;
}

/* Button styling */
.btn-outline-info {
    background-color: #084d7b;
    color: white;
    padding: 12px 30px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
    cursor: pointer;
}

/* Button hover effect */
.btn-outline-info:hover {
    background-color: #04304e;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .form-control {
        font-size: 14px;
    }

    .btn-outline-info {
        width: 100%;
        font-size: 14px;
    }
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
                    <h1>Admin - Add Patient</h1>

                    <form method="post" action="">
        <input type="text" name="patient_name" placeholder="Patient Name" class="form-control my-3" required>
        <input type="number" name="patient_age" placeholder="Patient Age" class="form-control my-3" required>
        <input type="email" name="patient_email" placeholder="Patient Email" class="form-control my-3" required>
        <input type="text" name="patient_phone" placeholder="Patient Phone" class="form-control my-3" required>
        <input type="password" name="patient_password" placeholder="Patient Password" class="form-control my-3" required>
        <button type="submit" name="btn_patient" class="btn btn-outline-info">Add Patient</button>
    </form>
                </div>
            </div>
        </div>
    </div>
        <?php require_once "jslinks.php"; ?>
    </body>
    </html>
