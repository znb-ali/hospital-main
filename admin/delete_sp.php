
<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header('location: ../login.php');
    exit();
}

require_once "connection.php";

// Check if an ID is passed
if (isset($_GET['sp_id'])) {
    $sp_id = $_GET['sp_id'];

    // Delete the blog from the database
    $deleteQuery = "DELETE FROM specialization WHERE sp_id = $sp_id";
    
    if (mysqli_query($con, $deleteQuery)) {
        echo "Specialization deleted successfully!";
        header("Location: specialization.php"); 
        exit();
    } else {
        echo "Error: " . $deleteQuery . "<br>" . mysqli_error($con);
    }
}
?>
