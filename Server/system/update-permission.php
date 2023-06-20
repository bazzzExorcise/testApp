<?php 
include "conn.php";

$user = $_GET['id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM account WHERE id = '$user'"));
$user = $user['username'];
$userSql = mysqli_query($conn, "UPDATE permission SET permission = 'active' WHERE username = '$user'");

echo $user . " telah dibuka";