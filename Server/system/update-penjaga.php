<?php

include "conn.php";

$id = $_POST['id'];
$nama = $_POST['edit-nama'];

if( empty($nama) ) {
  echo "masukan nama tolong";
}else{
  if( empty($password) ) {
    echo "tolong masukan password";
  }else{
    mysqli_query($conn, "UPDATE account SET username = '$nama', password = '$password' WHERE id = '$id' ");
    echo "berhasil mengubah";
  }
}