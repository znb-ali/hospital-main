<?php 
session_start();
$logout = session_destroy();
if($logout){
  header('location:../login.php');
}

?>