<?php
session_start();
include "conn.php";
$user = $_SESSION['login'];
$sql  = mysqli_query($conn, "UPDATE permission SET permission = 'not active' WHERE username = '$user'");
echo "index.php";