<?php
session_start();
include "conn.php";

$user = $_SESSION['login'];
$userSql = mysqli_query($conn, "UPDATE permission SET permission = 'cheat' WHERE username = '$user'");

echo "cheat";