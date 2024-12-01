<?php
session_start();
require_once "connection.php";
require_once "mainlinks.php";

// Capture the `sp_id` (specialization ID) from the URL
$sp_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch specialization name
$specialization_query = "SELECT sp_name FROM specialization WHERE sp_id = $sp_id";
$specialization_result = mysqli_query($con, $specialization_query);

if (!$specialization_result) {
    die("Error fetching specialization: " . mysqli_error($con));
}

$specialization = mysqli_fetch_assoc($specialization_result);
$specialization_name = $specialization ? $specialization['sp_name'] : 'Unknown Specialization';

// Fetch doctors based on specialization
$query = "SELECT d.*, s.sp_name, c.city_name FROM doctor_add d
          LEFT JOIN specialization s ON d.specialization_id = s.sp_id
          LEFT JOIN city c ON d.city = c.city_id
          WHERE d.status = 'approved'";

if ($sp_id > 0) {
    $query .= " AND d.specialization_id = $sp_id";
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
    <title>Doctors in <?php echo htmlspecialchars($specialization_name); ?> - Care</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <style>
        .preloader {
            position: fixed;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-deck .card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card-deck .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .card img {
            height: 180px;
            object-fit: cover;
        }

        .btn-outline-info {
            color: #084d7b;
            border-color: #084d7b;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-outline-info:hover {
            background-color: #084d7b;
            color: #fff;
        }

        .no-results {
            text-align: center;
            padding: 50px 0;
        }
    </style>
</head>
<body>
<div class="preloader">
    <img src="images/new_care.png" alt="Loading...">
</div>

<?php require_once "linkheader.php"; ?>

<div class="container my-5">
    <h1 class="text-center mb-5">Doctors in <?php echo htmlspecialchars($specialization_name); ?></h1>

    <?php if (mysqli_num_rows($sel) > 0): ?>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($sel)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $row['file_name'] ? "../" . $row['file_name'] : 'default-doctor.jpg'; ?>" 
                             class="card-img-top" 
                             alt="<?php echo htmlspecialchars($row['doctor_name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['doctor_name']); ?></h5>
                            <p class="card-text">
                                <strong>Email:</strong> <?php echo htmlspecialchars($row['doctor_email']); ?><br>
                                <strong>Phone:</strong> <?php echo htmlspecialchars($row['doctor_phone']); ?><br>
                                <strong>Specialization:</strong> <?php echo htmlspecialchars($row['sp_name']); ?><br>
                                <strong>City:</strong> <?php echo htmlspecialchars($row['city_name']); ?><br>
                                <strong>Days Available:</strong> <?php echo htmlspecialchars($row['doctor_days']); ?><br>
                                <strong>Timing:</strong> <?php echo htmlspecialchars($row['timing']); ?>
                            </p>
                            <a href="appointment.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-info">Book Appointment</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <div class="no-results">
            <h2>No doctors found in this specialization.</h2>
            <p>Please try selecting a different specialization or check back later.</p>
        </div>
    <?php endif; ?>
</div>

<?php require_once "jslinks.php"; ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector('.preloader').style.display = 'none';
    });
</script>
</body>
</html>
