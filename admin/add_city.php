<?php
// Ensure no output before the header call
if (isset($_POST["btn_add_city"])) {
    $city_name = $_POST["city_name"];
    
    require_once "connection.php"; // Ensure this file includes your database connection

    $stmt = $con->prepare("INSERT INTO city (city_name) VALUES (?)");
    $stmt->bind_param("s", $city_name);

    if ($stmt->execute()) {
        // Redirect to the cities page after success
        header("Location: cities.php");
        exit(); // Ensure no further code execution after header
    } else {
        echo "<div class='alert alert-danger'>ERROR: " . $stmt->error . "</div>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Add City</title>
    <link rel="stylesheet" href="css/layout.css">
    
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

    .main-content p {
        font-size: 16px;
        color: #333;
        text-align: center;
        margin-bottom: 25px;
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

    .btn_add_city {
        background-color: #084d7b;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn_add_city:hover {
        background-color: #bcddf7;
        color: #333;  
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
                <h1>Add City</h1>
                <form method="post">
                    <input type="text" name="city_name" placeholder="City Name" class="form-control my-4" required>
                    <button type="submit" name="btn_add_city" class="btn_add_city">Add City</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "jslinks.php"; ?>
</body>
</html>
