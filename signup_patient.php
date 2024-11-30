<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care - Patient Signup</title>
    <?php require_once "mainlinks.php"; // Include any required CSS or links ?>
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


 <?php require_once "linkheader.php"; ?> 


<div class="container">
    <h1>Patient Signup</h1>
    <form method="post" action="">
        <input type="text" name="patient_name" placeholder="Patient Name" class="form-control my-3" required>
        <input type="number" name="patient_age" placeholder="Patient Age" class="form-control my-3" required>
        <input type="email" name="patient_email" placeholder="Patient Email" class="form-control my-3" required>
        <input type="text" name="patient_phone" placeholder="Patient Phone" class="form-control my-3" required>
        <input type="password" name="patient_password" placeholder="Patient Password" class="form-control my-3" required>
        <button type="submit" name="btn_patient" class="btn btn-outline-info">Add Patient</button>
    </form>

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

</div>

<?php require_once "jslinks.php"; // Include any required JavaScript files ?>
</body>
</html>
