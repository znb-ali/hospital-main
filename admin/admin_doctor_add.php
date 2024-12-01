<?php
// Include the database connection
require_once "connection.php";

// Your form processing and query logic goes here
if (isset($_POST["btn_doctor"])) {
    // Capture form data
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

    // Move the uploaded file
    if (move_uploaded_file($tmp_name, $target_file)) {
        // Prepare the insert query
        $stmt = $con->prepare("INSERT INTO doctor_add (doctor_name, doctor_email, doctor_phone, specialization_id, doctor_days, timing, password, file_name, status, city, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending', ?, NOW())");
        $stmt->bind_param("sssssssss", $doctor_name, $doctor_email, $doctor_phone, $doctor_sp, $doctor_days, $doctor_time, $doctor_pass, $target_file, $doctor_city);
        
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>user Inserted. </div>";
        } else {
            echo "<div class='alert alert-danger'>ERROR in data insertion: " . $stmt->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>ERROR in file upload.</div>";
    }

    // Close the statement
    $stmt->close();
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Portal - Admin Add Doctor</title>
        <link rel="stylesheet" href="css/layout.css">
        
        <style>
            /* General Styles for Form */
.main-content {
    padding: 40px 20px;
    background-color: #f4f6f9;
    min-height: 100vh;
    box-sizing: border-box;
}

.main-content h1 {
    font-size: 28px;
    color: #084d7b;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bold;
}

.main-content p {
    font-size: 16px;
    color: #333;
    text-align: center;
    margin-bottom: 25px;
}

/* Form Inputs and Select */
input[type="text"], input[type="email"], input[type="number"], input[type="password"], select, input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
}

input[type="text"]:focus, input[type="email"]:focus, input[type="number"]:focus, input[type="password"]:focus, select:focus, input[type="file"]:focus {
    border-color: #084d7b;
    outline: none;
}

/* Button Styles */
button, input[type="submit"] {
    background-color: #084d7b;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
    width: 100%;
}

button:hover, input[type="submit"]:hover {
    background-color: #bcddf7;

}

/* Alert Styles */
.alert {
    padding: 15px;
    margin: 20px 0;
    border-radius: 5px;
}

.alert-success {
    background-color: #155724;
    color: white;
}

.alert-danger {
    background-color: #721c24;
    color: white;
}

/* Responsive Design */
@media (max-width: 768px) {
    .main-content {
        padding: 20px;
    }

    .main-content h1 {
        font-size: 24px;
    }

    input[type="text"], input[type="email"], input[type="number"], input[type="password"], select, input[type="file"] {
        padding: 8px;
        font-size: 14px;
    }

    button, input[type="submit"] {
        padding: 8px 16px;
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
                    <h1>Admin - Add Doctor</h1>
                    <form method="post" enctype="multipart/form-data">
                <input type="text" name="doctor_name" placeholder="Doctor Name" class="form-control my-4" required>
                <input type="email" name="doctor_email" placeholder="Doctor Email" class="form-control my-4" required>
                <input type="number" name="doctor_phone" placeholder="Doctor Phone" class="form-control my-4" required>
                <input type="text" name="doctor_days" placeholder="Doctor Days" class="form-control my-4" required>
                <input type="text" name="doctor_time" placeholder="Doctor Time" class="form-control my-4" required>
                <input type="password" name="doctor_pass" placeholder="Doctor Password" class="form-control my-4" required>
                <!-- City Dropdown -->
                <select name="doctor_city" class="form-control my-4" required>
                    <option value="">Select City</option>
                    <?php
                    // Fetch cities from the database
                    $query = "SELECT city_id, city_name FROM city";
                    $result = $con->query($query);

                    // Loop through the cities and populate the dropdown
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['city_id'] . "'>" . $row['city_name'] . "</option>";
                    }
                    ?>
                </select>

                <!-- sp Dropdown -->
                <select name="doctor_sp" class="form-control my-4" required>
                    <option value="">Select Specilization</option>
                    <?php
                    // Fetch cities from the database
                    $query = "SELECT sp_id, sp_name FROM specialization";
                    $result = $con->query($query);

                    // Loop through the cities and populate the dropdown
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['sp_id'] . "'>" . $row['sp_name'] . "</option>";
                    }
                    ?>
                <input type="file" name="file_name" class="form-control my-4" required>
                <input type="submit" value="Doctor Add" name="btn_doctor" class="btn">
            </form>

                </div>
            </div>
        </div>
    </div>
        <?php require_once "jslinks.php"; ?>
    </body>
    </html>
