<?php 
include "conn.php";
$sql = mysqli_query($conn, "SELECT * FROM room");
while( $rows = mysqli_fetch_assoc($sql)) {
  echo 
    "<option value='". $rows['name'] ."'>" . $rows['name'] . "</option>";
}