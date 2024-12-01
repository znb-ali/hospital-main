<?php
session_start();
require_once "connection.php";

// Ensure patient session is active


require_once "mainlinks.php";

// Capture the `city_id` from the URL
$city_id = isset($_GET['city_id']) ? intval($_GET['city_id']) : 0;

// Modify the query to filter doctors based on `city_id`
$query = "SELECT d.*, s.sp_name,c.city_name FROM doctor_add d
          LEFT JOIN specialization s ON d.specialization_id = s.sp_id
          LEFT JOIN city c ON d.city = c.city_id
          WHERE d.status = 'approved'";

if ($city_id > 0) {
    $query .= " AND d.city = $city_id"; // Add city filter if `city_id` is provided
}

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
    <title>Care - Docctors By City</title>
    <style>
        /* CSS for three cards per row */
        .card-deck {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: space-between;
        }
        .card {
            flex: 0 0 calc(33.333% - 10px);
            margin-bottom: 15px;
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

    <?php require_once "linkheader.php"; ?>

    <div class="container-xxl">
        <div class="row">
            <div class="col-lg-3">
                
            </div>
            <div class="col-lg-9">
                <!-- <h1 class="my-4">Doctors Profile</h1> -->
                 <br><br>
                <div class="card-deck">
                    <?php
                    while ($row = mysqli_fetch_assoc($sel)) {
                    ?>
                    <div class="card">
                        <div class="post-image">
                            <?php if (!empty($row['file_name'])): ?>
                                <img src="<?php echo $row['file_name']; ?>" alt="<?php echo $row['doctor_name']; ?>" class="card-img-top">
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Name: <?php echo $row["doctor_name"] ?? 'N/A'; ?></h5>
                            <p class="card-text">
                                <strong>Email:</strong> <?php echo $row["doctor_email"] ?? 'N/A'; ?><br>
                                <strong>Phone No.:</strong> <?php echo $row["doctor_phone"] ?? 'N/A'; ?><br>
                                <strong>Specialization:</strong> <?php echo $row["sp_name"] ?? 'N/A'; ?><br>
                                <strong>City:</strong> <?php echo isset($row["city_name"]) ? $row["city_name"] : 'N/A'; ?><br>
                                <strong>Days Available:</strong> <?php echo $row["doctor_days"] ?? 'N/A'; ?><br>
                                <strong>Timing:</strong> <?php echo $row["timing"] ?? 'N/A'; ?>
                            </p>
                            <a href="appointment.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-info">Book Appointment</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php require_once "jslinks.php"; ?>
</body>
</html>
