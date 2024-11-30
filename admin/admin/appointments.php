<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apppointments</title>
    <?php
     require_once "mainlinks.php";
     require_once "connection.php";
    ?>
</head>
<body>
<?php
     require_once "linkheader.php";
    ?>

  <div class="container-xxl">
    <div class="row">
        <div class="col-lg-3">
            <?php 
             require_once "side.php";
            ?>
        </div>
        <div class="col-lg-9">
        <table class="table">
  <thead>
    <tr>
   
      <th scope="col">ID</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Doctor Name</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Status</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      
     
    
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
      <td><a href="appointment_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-info">EDIT</a></td>
      <td><a href="appointment_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-warning" onclick="return confirm('Are you sure you want to delete this patient?')">DELETE</a></td>

    </tr>
   <?php 
  }
   ?>
   
   
  </tbody>
</table>
<a href="add_appointment.php" class="btn btn-outline-info">Add Appointment</a>

        </div>
    </div>
  </div>




<?php
     require_once "jslinks.php";
    ?>
    
</body>
</html>