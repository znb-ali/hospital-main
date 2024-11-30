<?php 
require_once "connection.php"; // Ensure this file correctly sets up $con

if (!isset($con)) {
    die("Database connection is not set. Please check your connection.php file.");
}

if (isset($_POST["btn_doctor"])) {
    $doctor_name = $_POST["doctor_name"];
    $doctor_email = $_POST["doctor_email"];
    $doctor_phone = $_POST["doctor_phone"];
    $doctor_days = $_POST["doctor_days"];
    $doctor_time = $_POST["doctor_time"];
    $doctor_pass = password_hash($_POST["doctor_pass"], PASSWORD_DEFAULT);
    $file_name = $_FILES["file_name"]["name"];
    $tmp_name = $_FILES["file_name"]["tmp_name"];
    $doctor_city = $_POST["doctor_city"];
    $doctor_sp = $_POST["doctor_sp"];

    $target_directory = "image/"; // Ensure this folder exists
    $target_file = $target_directory . basename($file_name);

    if (move_uploaded_file($tmp_name, $target_file)) {
        $stmt = $con->prepare("INSERT INTO doctor_add (doctor_name, doctor_email, doctor_phone, specialization_id, doctor_days, timing, password, file_name, status, city, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending', ?, NOW())");
        $stmt->bind_param("sssssssss", $doctor_name, $doctor_email, $doctor_phone, $doctor_sp, $doctor_days, $doctor_time, $doctor_pass, $target_file, $doctor_city);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Data Inserted. Awaiting admin approval.</div>";
        } else {
            echo "<div class='alert alert-danger'>ERROR in data insertion: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>ERROR in file upload.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care - Doctor Signup</title>
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

<?php require_once "linkheader.php"; ?>

<div class="container-xxl">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-9">
            <h1 class="my-4">Doctor Signup</h1>
            <form method="post" enctype="multipart/form-data">
                <input type="text" name="doctor_name" placeholder="Doctor Name" class="form-control my-4" required>
                <input type="email" name="doctor_email" placeholder="Doctor Email" class="form-control my-4" required>
                <input type="number" name="doctor_phone" placeholder="Doctor Phone" class="form-control my-4" required>
                <input type="text" name="doctor_days" placeholder="Doctor Days" class="form-control my-4" required>
                <input type="text" name="doctor_time" placeholder="Doctor Time" class="form-control my-4" required>
                <input type="password" name="doctor_pass" placeholder="Doctor Password" class="form-control my-4" required>

                <select name="doctor_city" class="form-control my-4" required>
                    <option value="">Select City</option>
                    <?php
                    $query = "SELECT city_id, city_name FROM city";
                    $result = $con->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['city_id'] . "'>" . $row['city_name'] . "</option>";
                    }
                    ?>
                </select>

                <select name="doctor_sp" class="form-control my-4" required>
                    <option value="">Select Specialization</option>
                    <?php
                    $query = "SELECT sp_id, sp_name FROM specialization";
                    $result = $con->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['sp_id'] . "'>" . $row['sp_name'] . "</option>";
                    }
                    ?>
                </select>

                <input type="file" name="file_name" class="form-control my-4" required>
                <input type="submit" value="Doctor Add" name="btn_doctor" class="btn btn-outline-info">
            </form>
        </div>
    </div>
</div>

<?php require_once "jslinks.php"; ?>
</body>
</html>
