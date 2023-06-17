<?php 
include "conn.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM account WHERE id = '$id'");