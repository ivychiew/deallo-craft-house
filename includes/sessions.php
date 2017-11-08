<?php 
 session_start(); 
 
  if (!isset($_SESSION)){
  session_start(); 
 }

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: pages/login.php');
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: pages/login.php");
  }

?>