<?php
require_once "connection.php";

require_once "mainlinks.php";

// Handle errors
if (isset($_GET['error']) && $_GET['error'] == 'invalid_id') {
    echo "<div class='alert alert-danger'>Invalid doctor ID. Please try again.</div>";
}

// Fetch doctor data
$query = "SELECT d.*, s.sp_name, c.city_name FROM doctor_add d
          LEFT JOIN specialization s ON d.specialization_id = s.sp_id
          LEFT JOIN city c ON d.city = c.city_id
          WHERE d.status = 'approved'";
$sel = mysqli_query($con, $query);

if (!$sel) {
    die("Error fetching doctor data: " . mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard - Doctors</title>
    <link rel="stylesheet" href="css/layout.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f9;
    }

    .post-image {
        width: 100%;
        height: 200px;
        overflow: hidden;
        border-radius: 8px;
        background-color: #f4f6f9;
    }

    .post-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;  /* Changed from 'cover' to 'contain' */
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-body {
        padding: 20px;
        text-align: center;
    }

    .card-body h5 {
        font-size: 20px;
        color: #04304e;
        margin: 10px 0;
    }

    .card-body p {
        font-size: 14px;
        color: #848484;
        margin: 5px 0;
    }

    .btn-outline-info {
        margin-top: 10px;
        padding: 8px 20px;
        background-color: #084d7b;
        color: #fff;
        text-transform: uppercase;
        border-radius: 20px;
        text-decoration: none;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .btn-outline-info:hover {
        background-color: #bcddf7;
    }

    
    .dashboard_content_main h1 {
        color: #084d7b;
        font-size: 28px;
        text-align:center;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 40px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .col-lg-5, .col-md-5, .col-sm-6 {
        max-width: 300px;
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

<div class="dashboard_container">
    <?php include('linkheader.php'); ?>

    <div class="dashboard_main">
        <?php include('side.php'); ?>

        <div class="dashboard_content_main">
            <h1>Doctors Profile</h1>
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($sel)): ?>
                    <div class="col-lg-5 col-md-5 col-sm-6 mx-auto mb-4">
                        <div class="card">
                            <div class="post-image">
                                <?php if (!empty($row['file_name'])): ?>
                                    <img src="../<?php echo $row['file_name']; ?>" alt="<?php echo $row['doctor_name']; ?>">
                                <?php else: ?>
                                    <img src="default-doctor.jpg" alt="Default Doctor">
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <h5>Name: <?php echo $row['doctor_name'] ?? 'N/A'; ?></h5>
                                <p>
                                    <strong>Email:</strong> <?php echo $row['doctor_email'] ?? 'N/A'; ?><br>
                                    <strong>Phone:</strong> <?php echo $row['doctor_phone'] ?? 'N/A'; ?><br>
                                    <strong>Specialization:</strong> <?php echo $row['sp_name'] ?? 'N/A'; ?><br>
                                    <strong>City:</strong> <?php echo $row['city_name'] ?? 'N/A'; ?><br>
                                    <strong>Days:</strong> <?php echo $row['doctor_days'] ?? 'N/A'; ?><br>
                                    <strong>Timing:</strong> <?php echo $row['timing'] ?? 'N/A'; ?>
                                </p>
                                <a href="appointment.php?id=<?php echo $row['id']; ?>" class="btn-outline-info">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once "jslinks.php"; ?>
</body>
</html>
