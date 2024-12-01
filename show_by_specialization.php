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

/* Search Section */
.search-section {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.search-section h2 {
    font-size: 24px;
    font-weight: bold;
    color: #084d7b;
    margin-bottom: 20px;
    text-align: center;
}

.search-section select.form-select {
    border: 2px solid #084d7b;
    border-radius: 5px;
    padding: 10px;
    color: #555;
}

.search-section .btn-primary {
    background-color: #084d7b;
    border: none;
    padding: 10px 15px;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s;
}

.search-section .btn-primary:hover {
    background-color: #04304e;
}

/* Results Section */
.results-section {
    margin-top: 30px;
}

.results-section h2 {
    font-size: 24px;
    font-weight: bold;
    color: #084d7b;
    margin-bottom: 20px;
    text-align: center;
}

.card-deck {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 20px;
}

.card {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    flex: 1;
    max-width: 300px;
    margin: 0 auto;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
}

.card img {
    height: 200px;
    object-fit: cover;
    width: 100%;
    background-color: #f8f9fa;
}

.card-body {
    padding: 15px;
    text-align: left;
}

.card-body h5 {
    font-size: 18px;
    font-weight: bold;
    color: #084d7b;
    margin-bottom: 10px;
}

.card-body p {
    font-size: 14px;
    color: #555;
    line-height: 1.6;
}

.card-body p strong {
    color: #04304e;
    font-weight: 600;
}

.btn-sm {
    font-size: 14px;
    padding: 5px 10px;
    background-color: #084d7b;
    color: #fff;
    border: none;
    transition: background-color 0.3s;
}

.btn-sm:hover {
    background-color: #04304e;
}

/* Responsive Design */
@media (max-width: 768px) {
    .card-deck {
        flex-direction: column;
        align-items: center;
    }

    .card {
        width: 90%;
        margin-bottom: 20px;
    }

    .search-section {
        padding: 15px;
    }

    .search-section h2 {
        font-size: 20px;
    }

    .results-section h2 {
        font-size: 20px;
    }
}

        .no-results {
            text-align: center;
            padding: 50px 0;
        }
    </style>
</head><body class="tt-magic-cursor">

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
    <h1 class="text-center mb-5">Doctors in <?php echo htmlspecialchars($specialization_name); ?></h1>

    <?php if (mysqli_num_rows($sel) > 0): ?>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($sel)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $row['file_name'] ? htmlspecialchars($row['file_name']) : 'path/to/default-doctor.jpg'; ?>" 
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
