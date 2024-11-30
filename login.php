<?php
session_start();
require_once "connection.php";

if (isset($_POST["user_btn"])) {
    $user_email = $_POST["user_email"];
    $user_pass = $_POST["user_pass"];

    // Admin Login
    if ($user_email === "admin@gmail.com" && $user_pass === "admin") {
        $_SESSION["admin"] = $user_email;
        header('Location: admin/index.php'); // Ensure this path is correct
        exit();
    }

    // Patient Login
    $query_patient = "SELECT * FROM patient_reg WHERE patient_email = ? AND patient_password = ?";
    $stmt_patient = $con->prepare($query_patient);
    $stmt_patient->bind_param("ss", $user_email, $user_pass);
    $stmt_patient->execute();
    $result_patient = $stmt_patient->get_result();

    if ($result_patient->num_rows > 0) {
        $_SESSION["patient"] = $user_email;
        header('Location: patient');
        exit();
    }

    $stmt_patient->close();

    // Doctor Login
$query_doctor = "SELECT * FROM doctor_add WHERE doctor_email = ?";
$stmt_doctor = $con->prepare($query_doctor);
$stmt_doctor->bind_param("s", $user_email);
$stmt_doctor->execute();
$result_doctor = $stmt_doctor->get_result();
$doctor = $result_doctor->fetch_assoc();

if ($doctor) {
    // Check the password using password_verify (ensure password is hashed in the database)
    if (password_verify($user_pass, $doctor['password'])) {
        // Check the doctor's status
        switch ($doctor['status']) {
            case 'approved':
                $_SESSION["doctor"] = $user_email;
                header('Location:doctor'); // Ensure correct path
                exit();
            case 'rejected':
                echo "<div class='alert alert-danger mt-3'>Your account has been rejected. Please contact the admin for further information.</div>";
                break;
            case 'pending':
                echo "<div class='alert alert-warning mt-3'>Your account is pending approval. Please wait for the admin to approve your account.</div>";
                break;
            default:
                echo "<div class='alert alert-danger mt-3'>An unknown error occurred. Please try again later.</div>";
                break;
        }
    } else {
        echo "<div class='alert alert-danger mt-3'>Invalid Email or Password.</div>";
    }
} else {
    echo "<div class='alert alert-danger mt-3'>Invalid Email or Password.</div>";
}

$stmt_doctor->close();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care - Login</title>
    <?php require_once "mainlinks.php"; ?>
    
    <style>
    /* Adjustments for Main Content in the New Layout */
    .main-content {
        margin-bottom: -400px;
        padding: 40px 20px;
        background-image:url(images/cultuer-2.jpg);
        min-height: 100vh;
        box-sizing: border-box;
    }

    .main-content h1 {
        font-size: 28px;
        color:#113243;
        margin-bottom: 15px;
        text-align: center;
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

    .btn {
        background-color: #084d7b;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #04304e;
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

    <!-- Subpage Header -->
    <div class="subpage-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="subpage-header-box">
                        <h1 class="text-anime-style-3">Login</h1>
                        <ol class="breadcrumb wow fadeInUp">
                            <li><a href="index.php">Home</a></li>
                            <li>Login</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Main Content -->
            <div class="main-content">
                <h1>Login</h1>
                <form method="post">
                    <input type="email" name="user_email" placeholder="Email" class="form-control my-4" required>
                    <input type="password" name="user_pass" placeholder="Password" class="form-control my-4" required>
                    <input type="submit" name="user_btn" class="btn btn-outline-info my-2" value="Login">
                </form>
            </div>
<?php require_once "footer.php"; ?>
<?php require_once "jslinks.php"; ?>
</body>
</html>
