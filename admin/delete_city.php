<?php

require_once "connection.php";

// Check if an ID is passed
if (isset($_GET['city_id'])) {
    $city_id = $_GET['city_id'];

    // Delete the blog from the database
    $deleteQuery = "DELETE FROM city WHERE city_id = $city_id";
    
    if (mysqli_query($con, $deleteQuery)) {
        echo "City deleted successfully!";
        header("Location: cities.php"); 
        exit();
    } else {
        echo "Error: " . $deleteQuery . "<br>" . mysqli_error($con);
    }
}
?>
