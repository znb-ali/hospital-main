<?php
// Include database connection
require_once 'connection.php';

$doctor_email = $_SESSION['doctor'] ?? null;

if (!$doctor_email) {
    header("Location: login.php"); // Redirect if session is missing
    exit();
}

// Fetch doctor details from the database
$sql = "SELECT * FROM doctor_add WHERE doctor_email = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $doctor_email);
$stmt->execute();
$result = $stmt->get_result();
$doctor = $result->fetch_assoc();

// Redirect if doctor is not found
if (!$doctor) {
    header("Location: error.php");
    exit();
}

// Fetch specializations
$specialization_result = $con->query("SELECT * FROM specialization");

// Fetch cities
$city_result = $con->query("SELECT * FROM city");

// Handle form submission
$success_message = $error_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doctor_name = trim($_POST['doctor_name']);
    $doctor_phone = trim($_POST['doctor_phone']);
    $specialization_id = $_POST['specialization_id'];
    $doctor_days = trim($_POST['doctor_days']);
    $timing = trim($_POST['timing']);
    $city = $_POST['city'];

    // Validate inputs
    if (
        empty($doctor_name) || empty($doctor_phone) ||
        empty($specialization_id) || empty($doctor_days) ||
        empty($timing) || empty($city)
    ) {
        $error_message = "All fields are required.";
    } else {
        // Update doctor details
        $update_sql = "UPDATE doctor_add SET 
                        doctor_name = ?, 
                        doctor_phone = ?, 
                        specialization_id = ?, 
                        doctor_days = ?, 
                        timing = ?, 
                        city = ? 
                        WHERE doctor_email = ?";
        $update_stmt = $con->prepare($update_sql);
        $update_stmt->bind_param("sssssss", $doctor_name, $doctor_phone, $specialization_id, $doctor_days, $timing, $city, $doctor_email);

        if ($update_stmt->execute()) {
            $success_message = "Profile updated successfully.";
        } else {
            $error_message = "Error updating profile. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Portal - Edit Doctor Profile</title>
    <link rel="stylesheet" href="css/layout.css">
    <?php include('mainlinks.php'); ?>
    <style>
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            font-size: 24px;
            color: #04304e;
            text-align: center;
        }

        .form-group label {
            font-size: 16px;
            color: #333;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input:focus, .form-group select:focus {
            border-color: #084d7b;
        }

        .btn-submit {
            background-color: #084d7b;
            color: #fff;
            padding: 10px;
            width: 100%;
            border-radius: 5px ;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #bcddf7;
            transform: scale(1.05);
            color: black;
        }

        .message {
            text-align: center;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .message.error {
            color: #721c24;
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 5px;
        }

        .message.success {
            color: #155724;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
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

    <?php include('linkheader.php'); ?>
    <div class="dashboard_container">
        <div class="dashboard_main">
            <?php include('side.php'); ?>
            <div class="dashboard_content_main">
                <div class="main-content">
                    <h1>Edit Your Profile</h1>
                    <div class="form-container">
                        <?php if ($error_message): ?>
                            <div class="message error"><?= htmlspecialchars($error_message); ?></div>
                        <?php elseif ($success_message): ?>
                            <div class="message success"><?= htmlspecialchars($success_message); ?></div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="doctor_name">Name:</label>
                                <input type="text" id="doctor_name" name="doctor_name" value="<?= htmlspecialchars($doctor['doctor_name']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="doctor_phone">Phone:</label>
                                <input type="text" id="doctor_phone" name="doctor_phone" value="<?= htmlspecialchars($doctor['doctor_phone']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="specialization_id">Specialization:</label>
                                <select id="specialization_id" name="specialization_id" required>
    <option value="">Select Specialization</option>
    <?php while ($specialization = $specialization_result->fetch_assoc()): ?>
        <option value="<?= htmlspecialchars($specialization['sp_id']); ?>" <?= $doctor['specialization_id'] == $specialization['sp_id'] ? 'selected' : ''; ?>>
            <?= htmlspecialchars($specialization['sp_name']); ?>
        </option>
    <?php endwhile; ?>
</select>

                            </div>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <select id="city" name="city" required>
    <option value="">Select City</option>
    <?php while ($city = $city_result->fetch_assoc()): ?>
        <option value="<?= htmlspecialchars($city['city_id']); ?>" <?= $doctor['city'] == $city['city_id'] ? 'selected' : ''; ?>>
            <?= htmlspecialchars($city['city_name']); ?>
        </option>
    <?php endwhile; ?>
</select>

                            </div>
                            <div class="form-group">
                                <label for="doctor_days">Availability Days:</label>
                                <input type="text" id="doctor_days" name="doctor_days" value="<?= htmlspecialchars($doctor['doctor_days']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="timing">Timing:</label>
                                <input type="text" id="timing" name="timing" value="<?= htmlspecialchars($doctor['timing']); ?>" required>
                            </div>
                            <button type="submit" class="btn-submit">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('jslinks.php'); ?>
</body>
</html>
