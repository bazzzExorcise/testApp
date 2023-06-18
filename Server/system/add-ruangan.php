<?php

include "conn.php";

$nama = $_POST['nama'];

if( empty($nama) ) {
  echo "tolong masukan nama ruangan";
} else {
  mysqli_query($conn, "INSERT INTO room (`name`)
                      VALUES ('$nama')");
  echo "berhasil menambahkan";
}
