<?php
// Include database connection
require_once 'connection.php'; // Make sure this file contains the correct DB connection

// Fetch the logged-in user's email from the session
$admin_email = $_SESSION['admin'];

// Fetch admin details from the `reg` table
$sql = "SELECT * FROM reg WHERE email = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $admin_email);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();

// If no admin is found, redirect to an error page
if (!$admin) {
    header("Location: ../login.php");
    exit();
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Admin Profile</title>
    <link rel="stylesheet" href="css/layout.css">
    <?php include('mainlinks.php'); ?>
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

        .profile-details {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            width: 50%;
            max-width: 500px;
            line-height: 1.8;
            text-align: left;
        }

        .profile-details p {
            font-size: 16px;
            color: #333;
        }

        .profile-details strong {
            color: #04304e;
            font-weight: bold;
        }

        .btn-edit {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #084d7b;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-edit:hover {
            background-color: #bcddf7;
            transform: scale(1.05);
            color: #333;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .profile-details p {
                font-size: 14px;
            }

            .btn-edit {
                width: 100%;
                text-align: center;
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
                    <h1>Your Profile</h1>
                    <div class="profile-details">
                        <p><strong>ID:</strong> <?= htmlspecialchars($admin['id']); ?></p>
                        <p><strong>Name:</strong> <?= htmlspecialchars($admin['name']); ?></p>
                        <p><strong>Email:</strong> <?= htmlspecialchars($admin['email']); ?></p>
                    </div>
                    <a href="edit_profile.php" class="btn-edit">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include JS Links -->
    <?php include('jslinks.php'); ?>
</body>
</html>
