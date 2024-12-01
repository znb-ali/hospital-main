<?php
// Include the necessary files
require_once 'connection.php';


// Fetch success and error messages
$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';

// Clear the session messages after displaying them
unset($_SESSION['success']);
unset($_SESSION['error']);

// Fetch the status counts from the database
$query = "SELECT status, COUNT(*) AS count FROM doc_patient_appointments GROUP BY status";
$result = mysqli_query($con, $query);

// Check for errors in the query
if (!$result) {
    die('Query Failed: ' . mysqli_error($con));
}

// Initialize counters for each status
$approvedCount = 0;
$pendingCount = 0;
$rejectedCount = 0;

// Loop through the result and assign the counts based on status
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['status'] == 'approved') {
        $approvedCount = $row['count'];
    } elseif ($row['status'] == 'pending') {
        $pendingCount = $row['count'];
    } elseif ($row['status'] == 'rejected') {
        $rejectedCount = $row['count'];
    }
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Portal - Admin Dashboard</title>
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

    /* Card Styling */
    .card-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
    }

    .card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
        width: 300px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
    }

    .card h2 {
        font-size: 20px;
        color: #084d7b;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 14px;
        color: #555;
        margin-bottom: 15px;
    }

    .card .btn {
        display: inline-block;
        background-color: #084d7b;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        font-size: 14px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .card .btn:hover {
        background-color: #bcddf7;
        color: black;
    }
    /* Analytics Section */
    .analytics-section {
            margin-top: 40px;
            text-align: center;
        }

        .analytics-charts {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .chart {
            width: 45%;
            min-width: 300px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        @media (max-width: 768px) {
            .chart {
                width: 100%;
            }
        }
        </style>
        <?php require_once "mainlinks.php"; ?>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <h1>Welcome to the Admin Dashboard</h1>
                    <p>Manage hospital operations, analyze performance, and oversee activities.</p>
                    <div class="card-container">
                    <div class="card">
                            <h2>Manage Doctors</h2>
                            <p>Add, update, or remove doctor profiles and monitor their activities.</p>
                            <a href="doctor.php" class="btn">Manage Doctors</a>
                        </div>
                        <div class="card">
                            <h2>Patient Records</h2>
                            <p>Access and manage all patient records securely.</p>
                            <a href="patients.php" class="btn">View Records</a>
                        </div>
                        <div class="card">
                            <h2>Appointments</h2>
                            <p>Oversee and manage scheduled patient appointments.</p>
                            <a href="appointment.php" class="btn">Manage Appointments</a>
                        </div>
                        <div class="card">
                            <h2>Account Settings</h2>
                            <p>Update your profile and account information.</p>
                            <a href="profile.php" class="btn">Edit Profile</a>
                        </div>
                    </div>
                    <!-- Analytics Section -->

                    <div class="analytics-section">
                        <h2>Hospital Analytics</h2>
                        <div class="analytics-charts">
                            <div class="chart">
                                <h3>Appointments Overview</h3>
                                <canvas id="appointmentsChart"></canvas>
                            </div>
                            <div class="chart">
                                <h3>Monthly Revenue</h3>
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php require_once "jslinks.php"; ?>
    </body>
    </html>

   <!-- Chart.js Scripts -->
<script>
    // Appointments Overview Chart
    const ctx1 = document.getElementById('appointmentsChart').getContext('2d');
    const appointmentsChart = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Completed', 'Pending', 'Cancelled'],
            datasets: [{
                label: 'Appointments',
                data: [<?php echo $approvedCount; ?>, <?php echo $pendingCount; ?>, <?php echo $rejectedCount; ?>],
                backgroundColor: ['#084d7b', '#f8d7da', '#e3e3e3'],
            }]
        },
    });

    // Revenue Chart
    const ctx2 = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Revenue ($)',
                data: [12000, 15000, 10000, 20000, 18000, 25000],
                backgroundColor: 'rgba(8, 77, 123, 0.2)',
                borderColor: '#084d7b',
                borderWidth: 2,
                fill: true,
            }]
        },
        options: {
            scales: {
                x: { title: { display: true, text: 'Months' } },
                y: { title: { display: true, text: 'Revenue ($)' } }
            }
        }
    });
</script>
