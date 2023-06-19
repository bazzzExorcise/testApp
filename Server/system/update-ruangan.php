<?php

include "conn.php";

$id = $_POST['id'];
$nama = $_POST['edit-nama'];

if( empty($nama) ) {
  echo "tolong masukan nama ruangan";
}else{
  $query = mysqli_query($conn, "UPDATE room SET name = '$nama' WHERE id = '$id' ");
  echo "berhasil mengubah";
}