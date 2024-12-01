<?php
// Include the necessary files
require_once 'connection.php';


// Fetch success and error messages
$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';

// Clear the session messages after displaying them
unset($_SESSION['success']);
unset($_SESSION['error']);
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Portal - Appointments</title>
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
                    <h1>Doctor Patient Appointments</h1>
                    
        <table class="table">
  <thead>
    <tr>
   
      <th scope="col">ID</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Doctor Name</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
<?php
  $query = "select * from doc_patient_appointments";
  $sel = mysqli_query($con, $query);
  while($row = mysqli_fetch_assoc($sel))
  {
?>
    <tr>
      <th scope="row"><?php echo $row["id"] ?></th>
      <td><?php echo $row["patient_id"] ?></td>
      <td><?php echo $row["doctor_id"] ?></td>
      <td><?php echo $row["appointment_date"] ?></td>
      <td><?php echo $row["appointment_time"] ?></td>
      <td><?php echo $row["status"] ?></td>
    </tr>
   <?php 
  }
   ?>
   
   
  </tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php require_once "jslinks.php"; ?>
    </body>
    </html>
