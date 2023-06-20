<?php
session_start();
include "conn.php";
$keeper = $_SESSION['login'];
$room   = $_GET['id'];
$query  = mysqli_query($conn, "UPDATE room SET keeper = 'not active' WHERE id = '$room'");
if ($query == 1) {
  $id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM room WHERE name = '$room'"));
  echo "../keeper-section/";
}else{
  echo "maaf ada sesuatu yang salah";
}
