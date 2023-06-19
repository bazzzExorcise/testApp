<?php

include "conn.php";

$id = $_POST['id'];
$nama = $_POST['edit-nama'];

if( empty($nama) ) {
  echo "masukan nama tolong";
}else{
  mysqli_query($conn, "UPDATE account SET username = '$nama' WHERE id = '$id' ");
  echo "berhasil mengubah";
}
