<?php
session_start();
require_once "connection.php";
require_once "mainlinks.php";

// Fetch specializations for the dropdown
$specialization_query = "SELECT sp_id, sp_name FROM specialization";
$specialization_result = mysqli_query($con, $specialization_query);
if (!$specialization_result) {
    die("Error fetching specializations: " . mysqli_error($con));
}

// Fetch cities for the dropdown
$city_query = "SELECT city_id, city_name FROM city";
$city_result = mysqli_query($con, $city_query);
if (!$city_result) {
    die("Error fetching cities: " . mysqli_error($con));
}

// Capture filter inputs from the user
$sp_id = isset($_GET['sp_id']) ? intval($_GET['sp_id']) : 0;
$city_id = isset($_GET['city_id']) ? intval($_GET['city_id']) : 0;

// Construct query based on filters
$query = "SELECT d.*, s.sp_name, c.city_name FROM doctor_add d
          LEFT JOIN specialization s ON d.specialization_id = s.sp_id
          LEFT JOIN city c ON d.city = c.city_id
          WHERE d.status = 'approved'";
if ($sp_id > 0) {
    $query .= " AND d.specialization_id = $sp_id";
}
if ($city_id > 0) {
    $query .= " AND d.city = $city_id";
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
    <title>Care - Find Doctors</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <style>
        .search-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .card-deck {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            width: calc(30% - 20px);
            min-width: 250px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card img {
            height: 180px;
            background-color: #f8f9fa;
            object-fit: contain;
        }.card-body {
    text-align: left;
    padding: 15px;
}

.card-body h5.card-title {
    font-size: 18px;
    font-weight: bold;
    color: #084d7b;
    margin-bottom: 10px;
}

.card-body p.card-text {
    color: #555;
    line-height: 1.5;
    margin-bottom: 10px;
}

.card-body p.card-text strong {
    font-weight: 600;
    color: #04304e;
}

.btn-primary {
    background-color: #084d7b;
    border: none;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #04304e;
}

.btn-sm {
    font-size: 14px;
    padding: 6px 12px;
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

<div class="container my-5">
    <div class="search-section">
        <h2 class="mb-4 text-center">Find Your Doctor</h2>
        <form method="GET" action="" class="row g-3">
            <div class="col-md-5">
                <select name="sp_id" class="form-select">
                    <option value="0">All specializations</option>
                    <?php while ($row = mysqli_fetch_assoc($specialization_result)): ?>
                        <option value="<?php echo $row['sp_id']; ?>" <?php echo $sp_id == $row['sp_id'] ? 'selected' : ''; ?>>
                            <?php echo $row['sp_name']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-5">
                <select name="city_id" class="form-select">
                    <option value="0">All Cities</option>
                    <?php while ($row = mysqli_fetch_assoc($city_result)): ?>
                        <option value="<?php echo $row['city_id']; ?>" <?php echo $city_id == $row['city_id'] ? 'selected' : ''; ?>>
                            <?php echo $row['city_name']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
        </form>
    </div>

    <div class="results-section">
        <h2 class="mb-4 text-center">Search Results</h2>
        <div class="card-deck">
            <?php while ($row = mysqli_fetch_assoc($sel)): ?>
                <div class="card">
                    <?php if (!empty($row['file_name'])): ?>
                        <img src="<?php echo $row['file_name']; ?>" alt="<?php echo $row['doctor_name']; ?>" class="card-img-top">
                    <?php else: ?>
                        <img src="default-doctor.jpg" alt="Doctor Image" class="card-img-top">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["doctor_name"] ?? 'N/A'; ?></h5>
                        <p class="card-text">
                            <strong>Email:</strong> <?php echo $row["doctor_email"] ?? 'N/A'; ?><br>
                            <strong>Phone:</strong> <?php echo $row["doctor_phone"] ?? 'N/A'; ?><br>
                            <strong>Specialization:</strong> <?php echo $row["sp_name"] ?? 'N/A'; ?><br>
                            <strong>City:</strong> <?php echo $row["city_name"] ?? 'N/A'; ?><br>
                            <strong>Available:</strong> <?php echo $row["doctor_days"] ?? 'N/A'; ?><br>
                            <strong>Timing:</strong> <?php echo $row["timing"] ?? 'N/A'; ?>
                        </p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php require_once "jslinks.php"; ?>
</body>
</html>
