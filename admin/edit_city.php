<?php

require_once "connection.php";

// Fetch the city ID from the URL
$city_id = $_GET['city_id'];

// Query to fetch the current city details
$query = "SELECT * FROM city WHERE city_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $city_id);
$stmt->execute();
$result = $stmt->get_result();
$city = $result->fetch_assoc();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the updated city name
    $new_city_name = $_POST['city_name'];

    // Update the city in the database
    $update_query = "UPDATE city SET city_name = ? WHERE city_id = ?";
    $update_stmt = $con->prepare($update_query);
    $update_stmt->bind_param("si", $new_city_name, $city_id);

    if ($update_stmt->execute()) {
        header('location: cities.php');

        echo "<div class='alert alert-success'>City updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error updating city.</div>";
    }
    $update_stmt->close();
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Portal - Edit City</title>
        <link rel="stylesheet" href="css/layout.css">
        
        <style>
            /* General Reset */
body, html {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    box-sizing: border-box;
}

/* Dashboard Container */
.dashboard_container {
    display: flex;
    flex-direction: column;
    height: 100vh;
}

/* Sidebar */
.dashboard_main {
    display: flex;
    flex: 1;
}

.dashboard_content_main {
    flex: 1;
    overflow-y: auto;
    background-color: #f4f6f9;
}

/* Main Content Styling */
.main-content {
    padding: 40px 20px;
    background-color: #f4f6f9;
    min-height: 100vh;
    box-sizing: border-box;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.main-content h1 {
    font-size: 28px;
    color: #113f56;
    margin-bottom: 15px;
    text-align: center;
    font-weight: bold;
}

.main-content form {
    max-width: 500px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.main-content .form-label {
    font-size: 16px;
    color: #04304e;
    margin-bottom: 8px;
    display: block;
    font-weight: 500;
}

.main-content .form-control {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
    transition: border-color 0.3s;
}

.main-content .form-control:focus {
    border-color: #084d7b;
    outline: none;
}

.main-content .btn {
    width: 100%;
    padding: 10px 15px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    color: #fff;
    background-color: #084d7b;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.main-content .btn:hover {
    background-color: #bcddf7;
    color: #333;
}

.main-content .btn:active {
    transform: scale(0.98);
}

/* Alert Messages */
.alert {
    margin-top: 20px;
    padding: 15px;
    border-radius: 5px;
    text-align: center;
    font-size: 14px;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

/* Responsive Design */
@media (max-width: 768px) {
    .main-content {
        padding: 20px;
    }

    .main-content form {
        width: 90%;
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
                    <h1>Edit City</h1>
                    <form method="post">
                <div class="mb-3">
                    <label for="city_name" class="form-label">City Name</label>
                    <input type="text" name="city_name" class="form-control" value="<?php echo $city['city_name']; ?>" required>
                </div>
                <button type="submit" class="btn btn-outline-info">Update City</button>
            </form>
                </div>
            </div>
        </div>
    </div>
        <?php require_once "jslinks.php"; ?>
    </body>
    </html>
