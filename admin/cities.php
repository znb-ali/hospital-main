<?php require_once "connection.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Cities</title>
    <link rel="stylesheet" href="css/layout.css">
    <style>
        /* Adjustments for Main Content */
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
                <h1 class="my-4">Manage Cities</h1>
                <a href="add_city.php" class="btn btn-outline-info">Add City</a>
                <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">City Name</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
     </tr>
  </thead>
  <tbody>
<?php
  $query = "select * from city";
  $sel = mysqli_query($con, $query);
  while($row = mysqli_fetch_assoc($sel))
  {
?>
    <tr>
      <th scope="row"><?php echo $row["city_id"] ?></th>
      <th scope="row"><?php echo $row["city_name"] ?></th>
      <td><a href="edit_city.php?city_id=<?php echo $row['city_id']; ?>" class="btn btn-outline-info">EDIT</a></td>
      <td><a href="delete_city.php?city_id=<?php echo $row['city_id']; ?>" class="btn btn-outline-warning" onclick="return confirm('Are you sure you want to delete this city?');">DELETE</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "jslinks.php"; ?>
</body>
</html>
