
<?php
    if (isset($_POST["btn_patient"])) {
        require_once "connection.php";

        // Retrieve and sanitize input
        $patient_name = $_POST["patient_name"];
        $patient_age = $_POST["patient_age"];
        $patient_email = $_POST["patient_email"];
        $patient_phone = $_POST["patient_phone"];
        $patient_password = $_POST["patient_password"];

        // Insert data into the database with a prepared statement
        $query = "INSERT INTO patient_reg (patient_name, patient_age, patient_email, patient_phone, patient_password) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("sisss", $patient_name, $patient_age, $patient_email, $patient_phone, $patient_password);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Data Inserted Succesfully</div>";
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
    <title>Care - Signup Patient</title>
    <?php require_once "mainlinks.php"; ?>
    
    <style>
    /* Adjustments for Main Content in the New Layout */
    .main-content {
        margin-bottom: -200px;
        padding: 40px 20px;
        background-image:url(images/cultuer-2.jpg);
        min-height: 100vh;
        box-sizing: border-box;
    }

    .main-content h1 {
        font-size: 28px;
        color: #113243;
        margin-bottom: 15px;
        text-align: center;
    }
    /* Form Styling */
    form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .form-control:focus {
        border-color: #084d7b;
        box-shadow: 0 0 5px rgba(0, 77, 123, 0.5);
    }

    .btn {
        background-color: #084d7b;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #bcddf7;
        color: #333;
        border: #bcddf7;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        padding: 15px;
        border-radius: 5px;
        text-align: center;
        font-size: 16px;
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
<?php include('linkheader.php'); ?>

    <!-- Subpage Header -->
    <div class="subpage-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="subpage-header-box">
                        <h1 class="text-anime-style-3">Login</h1>
                        <ol class="breadcrumb wow fadeInUp">
                            <li><a href="index.php">Home</a></li>
                            <li>Login</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Main Content -->
            <div class="main-content">
            <h1>Patient Signup</h1>
    <form method="post" action="">
        <input type="text" name="patient_name" placeholder="Patient Name" class="form-control my-3" required>
        <input type="number" name="patient_age" placeholder="Patient Age" class="form-control my-3" required>
        <input type="email" name="patient_email" placeholder="Patient Email" class="form-control my-3" required>
        <input type="text" name="patient_phone" placeholder="Patient Phone" class="form-control my-3" required>
        <input type="password" name="patient_password" placeholder="Patient Password" class="form-control my-3" required>
        <button type="submit" name="btn_patient" class="btn ">Add Patient</button>
    </form>

            </div>
<?php require_once "footer.php"; ?>
<?php require_once "jslinks.php"; ?>
</body>
</html>
