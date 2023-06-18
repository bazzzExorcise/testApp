<?php

include "conn.php";

$nama = $_POST['nama'];
$password = $_POST['password'];

if( empty($nama) ) {
  echo "masukan nama tolong";
} else {
  if(empty($password)) {
    echo  "tolong masukan password";
  }else{
    mysqli_query($conn, "INSERT INTO account (`username`, `password` ,`status`)
                        VALUES ('$nama', '$password', 'penjaga')");
    echo "berhasil menambahkan";
  }
}
