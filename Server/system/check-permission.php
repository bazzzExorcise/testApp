<?php
session_start();
include "conn.php";

$user       = $_SESSION['login'];
$permission = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM permission WHERE username = '$user'"));
$permission = $permission['permission'];

echo $permission;