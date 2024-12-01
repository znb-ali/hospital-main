<?php
require_once "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM patient_reg WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $patient = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['patient_name'];
        $age = $_POST['patient_age'];
        $email = $_POST['patient_email'];
        $phone = $_POST['patient_phone'];

        $updateQuery = "UPDATE patient_reg SET 
            patient_name = ?, 
            patient_age = ?, 
            patient_email = ?, 
            patient_phone = ? 
            WHERE id = ?";
        $stmt = $con->prepare($updateQuery);
        $stmt->bind_param("sissi", $name, $age, $email, $phone, $id);

        if ($stmt->execute()) {
            header('location:patients.php');
            exit();
        } else {
            echo "Error updating record: " . $con->error;
        }
    }
} else {
    header('location:patients.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Edit Patient</title>
    <link rel="stylesheet" href="css/layout.css">
    
    <style>
        /* General Layout Styles */
.dashboard_container {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.dashboard_main {
    display: flex;
    flex: 1;
}

.dashboard_content_main {
    flex: 1;
    padding: 20px;
}

/* Main Content Styling */
.main-content {
    background-color: #f4f6f9;
    padding: 40px 20px;
    min-height: 100vh;
    box-sizing: border-box;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
    background-color: #fff;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.mb-3 {
    margin-bottom: 20px;
}

.form-label {
    font-size: 16px;
    color: #333;
}

.form-control {
    font-size: 14px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
    box-sizing: border-box;
}

.form-control:focus {
    border-color: #084d7b;
    outline: none;
    box-shadow: 0 0 5px rgba(8, 77, 123, 0.5);
}

/* Button Styling */
.btn {
    background-color: #084d7b;
    color: #fff;
    font-size: 16px;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn:hover {
    background-color: #045a8b;
}

/* Responsive Design */
@media (max-width: 768px) {
    .main-content {
        padding: 30px 15px;
    }
    
    .form-control {
        font-size: 14px;
    }

    .btn {
        width: 100%;
        padding: 12px;
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
                <h1>Edit Patient</h1>
                <form method="POST">
            <div class="mb-3">
                <label for="patient_name" class="form-label">Name</label>
                <input type="text" class="form-control" name="patient_name" value="<?php echo htmlspecialchars($patient['patient_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="patient_age" class="form-label">Age</label>
                <input type="number" class="form-control" name="patient_age" value="<?php echo htmlspecialchars($patient['patient_age']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="patient_email" class="form-label">Email</label>
                <input type="email" class="form-control" name="patient_email" value="<?php echo htmlspecialchars($patient['patient_email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="patient_phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="patient_phone" value="<?php echo htmlspecialchars($patient['patient_phone']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
         </form>
            </div>
        </div>
    </div>
</div>
    <?php require_once "jslinks.php"; ?>
</body>
</html>
