<?php
// Include database connection
require_once 'connection.php'; // Ensure this file contains the correct DB connection

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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Update admin details
    $update_sql = "UPDATE reg SET name = ?, email = ? WHERE email = ?";
    $update_stmt = $con->prepare($update_sql);
    $update_stmt->bind_param("sss", $name, $email, $admin_email);

    if ($update_stmt->execute()) {
        // Update the session with the new email
        $_SESSION['admin'] = $email;
        header("Location: profile.php");
        exit();
    } else {
        $error = "Failed to update profile. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Edit Admin Profile</title>
    <link rel="stylesheet" href="css/layout.css">
    <?php include('mainlinks.php'); ?>
    <style>
        .main-content {
            padding: 40px 20px;
            background-color: #f4f6f9;
            min-height: 100vh;
            box-sizing: border-box;
        }

        .edit-form {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            width: 50%;
            max-width: 500px;
        }

        .edit-form h1 {
            font-size: 24px;
            color: #084d7b;
            margin-bottom: 20px;
            text-align: center;
        }

        .edit-form label {
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
            color: #333;
        }

        .edit-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #084d7b;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #055b80;
            transform: scale(1.05);
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
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
                    <form method="POST" class="edit-form">
                        <h1>Edit Profile</h1>
                        <?php if (isset($error)): ?>
                            <div class="error-message"><?= htmlspecialchars($error); ?></div>
                        <?php endif; ?>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?= htmlspecialchars($admin['name']); ?>" required>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($admin['email']); ?>" required>

                        <button type="submit" class="btn-submit">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include JS Links -->
    <?php include('jslinks.php'); ?>
</body>
</html>
