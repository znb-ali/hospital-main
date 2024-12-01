<?php
// Include the database connection file
require_once 'connection.php';


// Fetch the logged-in patient's email from the session
$patient_email = $_SESSION['patient'];

// Fetch patient details from the `patient_reg` table
$sql = "SELECT * FROM patient_reg WHERE patient_email = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $patient_email);
$stmt->execute();
$result = $stmt->get_result();
$patient = $result->fetch_assoc();

// If no patient is found, redirect to an error page
if (!$patient) {
    header("Location: ../login.php");
    exit();
}

// Update patient details if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient_name = $_POST['patient_name'];
    $patient_age = $_POST['patient_age'];
    $patient_phone = $_POST['patient_phone'];

    // Update the patient's profile
    $update_sql = "UPDATE patient_reg SET patient_name = ?, patient_age = ?, patient_phone = ? WHERE patient_email = ?";
    $update_stmt = $con->prepare($update_sql);
    $update_stmt->bind_param("ssss", $patient_name, $patient_age, $patient_phone, $patient_email);

    if ($update_stmt->execute()) {
        header("Location: profile.php");
        $success_message = "Profile updated successfully.";
    } else {
        $error_message = "Failed to update profile. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Portal - Edit Patient Profile</title>
    <link rel="stylesheet" href="css/layout.css">
    <?php include('mainlinks.php'); ?>
    <style>
        /* Styling for the edit profile page */
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

        .edit-profile-form {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            width: 50%;
            max-width: 500px;
        }

        .edit-profile-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .edit-profile-form button {
            width: 100%;
            padding: 10px;
            background-color: #084d7b;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .edit-profile-form button:hover {
            background-color:  #bcddf7;
            transform: scale(1.05);
            color: black;
        }

        .success-message,
        .error-message {
            padding: 10px;
            color: white;
            margin: 10px 0;
            border-radius: 5px;
        }

        .success-message {
            background-color: #28a745;
        }

        .error-message {
            background-color: #dc3545;
        }

        @media (max-width: 768px) {
            .edit-profile-form {
                width: 80%;
            }
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

    <!-- Include Header -->
    <?php include('linkheader.php'); ?>

    <div class="dashboard_container">
        <div class="dashboard_main">
            <!-- Sidebar -->
            <?php include('side.php'); ?>

            <!-- Main Content -->
            <div class="dashboard_content_main">
                <div class="main-content">
                    <h1>Edit Your Profile</h1>

                    <!-- Display success or error messages -->
                    <?php if (isset($success_message)): ?>
                        <div class="success-message"><?= $success_message; ?></div>
                    <?php elseif (isset($error_message)): ?>
                        <div class="error-message"><?= $error_message; ?></div>
                    <?php endif; ?>

                    <!-- Profile Edit Form -->
                    <form action="edit_profile.php" method="POST" class="edit-profile-form">
                        <label for="patient_name">Name</label>
                        <input type="text" id="patient_name" name="patient_name" value="<?= htmlspecialchars($patient['patient_name']); ?>" required>

                        <label for="patient_age">Age</label>
                        <input type="number" id="patient_age" name="patient_age" value="<?= htmlspecialchars($patient['patient_age']); ?>" required>

                        <label for="patient_phone">Phone</label>
                        <input type="text" id="patient_phone" name="patient_phone" value="<?= htmlspecialchars($patient['patient_phone']); ?>" required>

                        <button type="submit">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include JS Links -->
    <?php include('jslinks.php'); ?>
</body>
</html>
