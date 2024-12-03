<?php

require_once "connection.php";

// Check if an ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the blog from the database
    $deleteQuery = "DELETE FROM blogs WHERE id = $id";
    
    if (mysqli_query($con, $deleteQuery)) {
        echo "Blog post deleted successfully!";
        header("Location: blog_crud.php"); // Redirect back to the blog list
        exit();
    } else {
        echo "Error: " . $deleteQuery . "<br>" . mysqli_error($con);
    }
}
?>
